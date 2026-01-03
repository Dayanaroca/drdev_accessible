<?php
/**
 * Single Post (Blog)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<main class="accesible-seccion flex flex-col gap-16  pt-28 pb-14 w-full mx-auto">
    <?php get_template_part('template-parts/commons/content-stickbanner');  ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class('flex flex-col gap-6 max-w-screen-etg mx-auto'); ?>>
              <!-- Imagen destacada -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="w-full relative">

                    <?php the_post_thumbnail( 'large', [
                        'class' => 'w-full h-auto max-h-96 rounded-custom object-cover',
                        'alt'   => get_the_title(),
                    ] ); ?>

                    <?php
                    $categories = get_the_category();

                    if ( ! empty( $categories ) ) {
                        $child_category = $categories[0]; // categoría del post
                        $parent_category = $child_category->parent
                            ? get_term( $child_category->parent, 'category' )
                            : $child_category;

                        $flag_path = get_term_meta( $parent_category->term_id, 'flag_svg', true );
                    }
                    ?>

                    <!-- Top left: categoría PADRE + tags -->
                    <div class="absolute top-4 left-4 flex flex-row gap-2">

                        <!-- Categoría padre -->
                        <span class="accesible-seccion bg-white backdrop-blur px-2 py-1 rounded-full text-base font-semibold flex items-center gap-1 shadow">
                            <?php if ( ! empty( $flag_path ) && $flag_path !== '0' ) : ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() . $flag_path ); ?>"
                                    alt=""
                                    aria-hidden="true"
                                    class="w-6 h-4">
                            <?php endif; ?>
                            <?php echo esc_html( $parent_category->name ); ?>
                        </span>

                        <!-- Tags SIN links -->
                        <?php
                        $tags = get_the_tags();
                        if ( $tags ) : ?>
                            <div class="accesible-seccion bg-white backdrop-blur px-2 py-1 rounded-full text-base font-semibold flex items-center gap-1 shadow">
                                <?php foreach ( $tags as $tag ) : ?>
                                    <span class="text-sm font-semibold text-gray-700">
                                        <?php echo esc_html( $tag->name ); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                    <!-- Bottom left: SUBCATEGORÍA -->
                    <span class="accesible-seccion absolute bottom-4 left-4 bg-white backdrop-blur px-2 py-1 rounded-full text-base font-semibold shadow">
                        <?php echo esc_html( $child_category->name ); ?>
                    </span>

                </div>
            <?php endif; ?>

            <!-- Título -->
            <h1 class="font-bold text-xl lg:text-3xl text-black">
                <?php the_title(); ?>
            </h1>

            <div class="flex flex-row gap-8">
                <div class="flex gap-1 items-center">
                    <?php echo drdev_inline_svg('/assets/images/icons/calendar_month.svg'); ?>
                    <time datetime="<?php echo get_the_date(); ?>"
                        class="text-sm font-medium">
                        <?php echo get_the_date(); ?>
                    </time>
                </div>
                <div class="flex gap-1 items-center">
                    <?php echo drdev_inline_svg('/assets/images/icons/3p.svg', '', '', '14', '14'); ?>
                    <span class="text-sm font-medium">
                        <?php esc_html_e( 'Publicado por', 'drdevcustomlanguage' ); ?>
                        <?php echo esc_html( get_the_author() ); ?>
                    </span>
                </div>
                
            </div>    
            
            <nav id="toc" class="border-b border-b-black pb-4 mb-6" aria-label="Tabla de contenidos">
                <p class="font-bold mb-2 text-xl">
                    <?php esc_html_e( 'Tabla de contenidos', 'drdevcustomlanguage' ); ?>
                </p>
                <ul id="toc-list" class="space-y-1 text-sm"></ul>
            </nav>

            <!-- Contenido -->
            <div class="descripcion entry-content">
                <?php the_content(); ?>
            </div>

        </article>

    <?php endwhile; endif; ?>

    <?php
$current_post_id = get_the_ID();
$categories = get_the_category( $current_post_id );

if ( ! empty( $categories ) ) {

    // Categoría hija y padre
    $child_cat  = $categories[0];
    $parent_cat = $child_cat->parent
        ? get_term( $child_cat->parent, 'category' )
        : $child_cat;

    $related_args = [
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => [ $current_post_id ],
        'tax_query'      => [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $parent_cat->term_id,
            ],
        ],
    ];

    $related_query = new WP_Query( $related_args );

    if ( $related_query->have_posts() ) : ?>
        <section class="max-w-screen-etg mx-auto">
            <h2 class="text-2xl font-bold mb-6">
                <?php esc_html_e( 'Otros artículos', 'drdevcustomlanguage' ); ?>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                while ( $related_query->have_posts() ) :
                    $related_query->the_post();

                    // ---------- datos para el template ----------
                    $thumbnail_url  = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                    $published_date = get_the_date('d/m/Y'); 
                    $visible_date   = get_the_date('d/m/Y'); 
                    $excerpt        = get_the_excerpt();
                    $author_name    = get_the_author();

                    $cats = get_the_category();
                    $parent = null;
                    $child  = null;
                    $flag_path = null;

                    if ( $cats ) {
                        foreach ( $cats as $cat ) {
                            if ( $cat->parent === 0 ) {
                                $parent = $cat;
                            } else {
                                $child = $cat;
                            }
                        }

                        if ( $parent ) {
                            $flag_path = get_term_meta( $parent->term_id, 'flag_svg', true );
                        }
                    }

                    get_template_part(
                        'template-parts/commons/content-tempost',
                        null,
                        [
                            'thumbnail_url'  => $thumbnail_url,
                            'published_date' => $published_date,
                            'visible_date'   => $visible_date,
                            'excerpt'        => $excerpt,
                            'author_name'    => $author_name,
                            'parent_cat'     => $parent,
                            'child_cat'      => $child,
                            'flag_path'      => $flag_path,
                        ]
                    );
                endwhile;
                ?>
            </div>
        </section>
    <?php
    endif;
    wp_reset_postdata();
}
?>

    <?php get_template_part('template-parts/commons/content-contactcita'); ?>

    <?php $categories = get_the_terms( get_the_ID(), 'destino' ); 
        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
            $term = $categories[0]; // 
            $meses_viaje = get_term_meta( $term->term_id, 'meses_viaje', true );
        } else {
            $meses_viaje = [];
        }

            if ( ! empty( $meses_viaje ) ) :

                $icons = [
                    'bueno'     => '/assets/images/icons/happy.svg',
                    'regular'   => '/assets/images/icons/neutral.svg',
                    'malo'      => '/assets/images/icons/sad.svg',
                    'muy_malo'  => '/assets/images/icons/very-sad.svg',
                ];

                $meses_abreviados = [
                    'enero'      => 'ENE',
                    'febrero'    => 'FEB',
                    'marzo'      => 'MAR',
                    'abril'      => 'ABR',
                    'mayo'       => 'MAY',
                    'junio'      => 'JUN',
                    'julio'      => 'JUL',
                    'agosto'     => 'AGO',
                    'septiembre' => 'SEP',
                    'octubre'    => 'OCT',
                    'noviembre'  => 'NOV',
                    'diciembre'  => 'DIC',
                ];
            ?>
            <section class="max-w-screen-etg mx-auto px-2.5 lg:px-0">
                <h2 class="font-bold text-2xl lg:text-3xl text-black mb-6 text-center">
                    <?php esc_html_e( 'Mejor época para viajar', 'drdevcustomlanguage' ); ?>
                </h2>

                <div class="grid grid-cols-6 lg:grid-cols-12 gap-4">
                    <?php foreach ( $meses_viaje as $mes => $valoracion ) : 

                        $mes_abrev = $meses_abreviados[ $mes ] ?? strtoupper( substr( $mes, 0, 3 ) );
                    ?>
                        <div class="flex flex-col gap-2 items-center text-center">
                            <span class="text-base font-semibold uppercase">
                                <?php echo esc_html( $mes_abrev ); ?>
                            </span>

                            <?php if ( ! empty( $icons[ $valoracion ] ) ) : ?>
                                <img 
                                    src="<?php echo esc_url( get_template_directory_uri() . $icons[ $valoracion ] ); ?>" 
                                    alt="<?php echo esc_attr( $valoracion ); ?>" 
                                    class="w-20 h-20 mb-1"
                                >
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6 place-items-center">
                    <div class="flex flex-row gap-2">
                        <div class="w-6 h-6 rounded-full bg-primary"></div>
                        <span class="text-sm lg:text-lg font-bold"><?php esc_html_e( 'Muy recomendado', 'drdevcustomlanguage' ); ?></span>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-6 h-6 rounded-full bg-secondary"></div>
                        <span class="text-sm lg:text-lg font-bold"><?php esc_html_e( 'Recomendado', 'drdevcustomlanguage' ); ?></span>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-6 h-6 rounded-full bg-color20"></div>
                        <span class="text-sm lg:text-lg font-bold"><?php esc_html_e( 'No es mala opción', 'drdevcustomlanguage' ); ?></span>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-6 h-6 rounded-full bg-color21"></div>
                        <span class="text-sm lg:text-lg font-bold"><?php esc_html_e( 'No es mala opción', 'drdevcustomlanguage' ); ?></span>
                    </div>
                </div>
            </section>
            <?php endif; ?>

    <section class="max-w-screen-etg mx-2.5 lg:mx-auto" >
         <?php if ( comments_open() || get_comments_number() ) :
           
            comment_form([
                'title_reply'          => __('Deja un comentario', 'drdevcustomlanguage'),
                'title_reply_before'   => '<h2 class="text-5xl font-bold mb-4">',
                'title_reply_after'    => '</h2>',
                'comment_notes_before' => '<p class="text-base text-baseblack font-bold mb-2">' . __('Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con un *.', 'drdevcustomlanguage') . '</p>',
                'comment_field'        => '<p class="mb-4"><label class="block mb-1 style-comment">' . __('Comentario*', 'drdevcustomlanguage') . '</label><textarea id="comment" name="comment" class="w-full p-2 border rounded" rows="5" required></textarea></p>',
                'fields'               => [
                    'author' => '<p class="mb-4"><label class="block mb-1 style-comment">' . __('Nombre', 'drdevcustomlanguage') . '</label><input type="text" name="author" class="w-full p-2 border rounded" required></p>',
                    'email'  => '<p class="mb-4"><label class="block mb-1 style-comment">' . __('Correo electrónico', 'drdevcustomlanguage') . '</label><input type="email" name="email" class="w-full p-2 border rounded" required></p>',
                ],

                'label_submit'         => __('Enviar comentario', 'drdevcustomlanguage'),
            ]);


        endif; ?>   
        <?php
        if ( have_comments() ) : ?>
            <h3 class="text-xl font-bold mb-4"><?php comments_number(__('No hay comentarios', 'drdevcustomlanguage'), __('1 comentario', 'drdevcustomlanguage'), __('% comentarios', 'drdevcustomlanguage')); ?></h3>
            <ul class="space-y-4">
                <?php
                wp_list_comments([
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 48,
                ]);
                ?>
            </ul>
        <?php endif; ?>                     
    </section>                    
  
</main>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const content = document.querySelector('.entry-content');
    const tocList = document.getElementById('toc-list');
    const headings = content?.querySelectorAll('h2, h3');

    if (!headings || headings.length === 0 || !tocList) {
        document.getElementById('toc')?.remove();
        return;
    }

    headings.forEach((heading, index) => {
        if (!heading.id) {
            heading.id = 'heading-' + index;
        }

        const li = document.createElement('li');
        li.className = heading.tagName === 'H3'
            ? 'ml-4'
            : '';

        const a = document.createElement('a');
        a.href = '#' + heading.id;
        a.textContent = heading.textContent;
        a.className = 'text-secondary text-base font-semibold hover:underline';

        li.appendChild(a);
        tocList.appendChild(li);
    });
});
</script>


<?php get_footer(); ?>