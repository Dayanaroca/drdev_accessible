<?php
/**
 * Template part for displaying destinations content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
function drdev_get_destino_link( $slug ) {
  $term = get_term_by( 'slug', $slug, 'destino' );

  if ( ! $term || is_wp_error( $term ) ) {
    return '';
  }

  // WPML: obtener el término en el idioma actual
  if ( function_exists( 'apply_filters' ) ) {
    $term_id = apply_filters( 'wpml_object_id', $term->term_id, 'destino', true );
    $term    = get_term( $term_id, 'destino' );
  }

  return get_term_link( $term );
}
?>

<section aria-labelledby="destinos-title" class="w-full max-w-screen-etg ml-2.5 lg:mx-auto gap-6">
  <h2 id="destinos-title" class="sr-only">
    <?php esc_html_e( 'Destinos disponibles', 'drdevcustomlanguage' ); ?>
  </h2>
  <div class="trips-slider swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
       <a href="<?php echo esc_url( drdev_get_destino_link( 'rep-dominicana' ) ); ?>" class="group block">
         <article class="relative rounded-[0.9375rem] overflow-hidden transition-shadow duration-300 group-hover:shadow-[0_10px_25px_rgba(0,0,0,0.25)] group-focus-visible:shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
            <h3 id="destino-rd" class="sr-only">
              <?php esc_html_e( 'Destino: República Dominicana', 'drdevcustomlanguage' ); ?>
            </h3>
            <?php
              $alt_rd = esc_html__( 'Paisaje turístico accesible en República Dominicana', 'drdevcustomlanguage' );
              echo drdev_image(
                '/assets/images/trips/republica-dominicana.webp',
                $alt_rd,
                'h-40 lg:h-48 object-cover w-full',
                '',
                '273',
                '179',
                $alt_rd
              );
            ?>
            <div class="absolute bottom-4 w-full px-2">
              <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
                <?php echo drdev_image_decorative(
                  '/assets/images/trips/rdominicana.svg',
                  'w-6 h-4',
                  '',
                  '16',
                  '16'
                ); ?>
                <span class="font-semibold text-sm text-baseblack uppercase">
                  <?php esc_html_e( 'R. Dominicana', 'drdevcustomlanguage' ); ?>
                </span>
              </div>
            </div>
          </article>
        </a>
      </div>

      <!-- Card: México -->
      <div class="swiper-slide">
        <a href="<?php echo esc_url( drdev_get_destino_link( 'mexico' ) ); ?>" class="group block">
          <article class="relative rounded-[0.9375rem] overflow-hidden transition-shadow duration-300 group-hover:shadow-[0_10px_25px_rgba(0,0,0,0.25)] group-focus-visible:shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
            <h3 id="destino-mexico" class="sr-only">
              <?php esc_html_e( 'Destino: México', 'drdevcustomlanguage' ); ?>
            </h3>
            <?php
              $alt_mex = esc_html__( 'Destino accesible en México', 'drdevcustomlanguage' );
              echo drdev_image(
                '/assets/images/trips/mexico.webp',
                $alt_mex,
                'h-40 lg:h-48 object-cover w-full',
                '',
                '273',
                '179',
                $alt_mex
              );
            ?>
            <div class="absolute bottom-4 w-full px-2">
              <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
                <?php echo drdev_image_decorative(
                  '/assets/images/trips/mexico.svg',
                  'w-6 h-4',
                  '',
                  '16',
                  '11'
                ); ?>
                <span class="font-semibold text-sm text-baseblack uppercase">
                  <?php esc_html_e( 'México', 'drdevcustomlanguage' ); ?>
                </span>
              </div>
            </div>
          </article>
        </a>
      </div>

      <!-- Card: Cuba -->
      <div class="swiper-slide">
        <a href="<?php echo esc_url( drdev_get_destino_link( 'cuba' ) ); ?>" class="group block">
          <article class="relative rounded-[0.9375rem] overflow-hidden transition-shadow duration-300 group-hover:shadow-[0_10px_25px_rgba(0,0,0,0.25)] group-focus-visible:shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
            <h3 id="destino-cuba" class="sr-only">
              <?php esc_html_e( 'Destino: Cuba', 'drdevcustomlanguage' ); ?>
            </h3>
            <?php
              $alt_cuba = esc_html__( 'Destino turístico accesible en Cuba', 'drdevcustomlanguage' );
              echo drdev_image(
                '/assets/images/trips/cuba.jpg',
                $alt_cuba,
                'h-40 lg:h-48 object-cover w-full',
                '',
                '273',
                '179',
                $alt_cuba
              );
            ?>
            <div class="absolute bottom-4 w-full px-2">
              <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
                <?php echo drdev_image_decorative(
                  '/assets/images/trips/cu.svg',
                  'w-6 h-4',
                  '',
                  '16',
                  '11'
                ); ?>
                <span class="font-semibold text-sm text-baseblack uppercase">
                  <?php esc_html_e( 'Cuba', 'drdevcustomlanguage' ); ?>
                </span>
              </div>
            </div>
          </article>
        </a>
      </div>

      <!-- Card: Estados Unidos -->
      <div class="swiper-slide">
        <a href="<?php echo esc_url( drdev_get_destino_link( 'florida' ) ); ?>" class="group block">
          <article class="relative rounded-[0.9375rem] overflow-hidden transition-shadow duration-300 group-hover:shadow-[0_10px_25px_rgba(0,0,0,0.25)] group-focus-visible:shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
            <h3 id="destino-eeuu" class="sr-only">
              <?php esc_html_e( 'Destino: Estados Unidos', 'drdevcustomlanguage' ); ?>
            </h3>
            <?php
              $alt_eeuu = esc_html__( 'Destino accesible en Estados Unidos', 'drdevcustomlanguage' );
              echo drdev_image(
                '/assets/images/trips/florida.png',
                $alt_eeuu,
                'h-40 lg:h-48 object-cover w-full',
                '',
                '273',
                '179',
                $alt_eeuu
              );
            ?>
            <div class="absolute bottom-4 w-full px-2">
              <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
                <?php echo drdev_image_decorative(
                  '/assets/images/trips/eeuu.svg',
                  'w-6 h-4',
                  '',
                  '16',
                  '11'
                ); ?>
                <span class="font-semibold text-sm text-baseblack uppercase whitespace-nowrap">
                  <?php esc_html_e( 'Estados Unidos', 'drdevcustomlanguage' ); ?>
                </span>
              </div>
            </div>
          </article>
        </a>
      </div>

    </div>
  </div>
</section>

