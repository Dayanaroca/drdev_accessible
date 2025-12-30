<?php
/**
 * Template part for displaying Testimonies CPT in Swiper slider
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>


<section aria-labelledby="testimonios-title" class="testimonios-container flex flex-col items-center justify-center w-full mx-auto">
  
  <h2 id="testimonios-title" class="font-bold text-2xl lg:text-4xl text-center lg:text-left lg:leading-[3.375rem] mb-5">
     <?php esc_html_e( 'Experiencias de viajes accesibles reales', 'drdevcustomlanguage' ); ?>
  </h2>

  <?php
  $args = array(
      'post_type'      => 'testimonies',
      'posts_per_page' => -1,
      'post_status'    => 'publish'
  );
  $testimonies = new WP_Query( $args );

  if ( $testimonies->have_posts() ) :
  ?>
  
  <div class="testimonios-container relative">

    <div class="swiper testimoniosSwiper" id="testimonios-slider">
      <div class="swiper-wrapper">

        <?php while ( $testimonies->have_posts() ) : $testimonies->the_post(); ?>
          <div class="swiper-slide shadow-[0_0_4px_0_rgba(170,170,170,0.25)] rounded-[1.25rem] px-6 py-5">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-4">
                <?php if ( has_post_thumbnail() ) : ?> 
                  <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'w-12 h-12 rounded-full object-cover' ) ); ?> 
                <?php endif; ?>
                <p class="text-black text-sm font-normal"><?php the_title(); ?></p>
              </div>
              <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/stars.svg" 
                alt=""
                role="presentation"
                class="h-6 w-auto"
              />
            </div>

            <p class="text-black text-base font-medium mt-4"><?php the_content(); ?></p>
            <p class="text-xs font-normal text-black opacity-40 mt-4">Hace 1 mes</p>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>

      </div>
    </div>

    <div class="swiper-controls flex items-center justify-center gap-4 mt-4 lg:mt-8">
      <button class="swiper-button-prev custom-arrow"
              aria-label="<?php esc_attr_e('Anterior', 'drdevcustomlanguage'); ?>"
              aria-controls="testimonios-slider">
        <?php echo drdev_inline_svg('/assets/images/icons/primary-arrow.svg', '', '', '26','26'); ?>
      </button>

      <div class="swiper-pagination" aria-hidden="false"></div>

      <button class="swiper-button-next custom-arrow"
              aria-label="<?php esc_attr_e('Siguiente', 'drdevcustomlanguage'); ?>"
              aria-controls="testimonios-slider">
        <?php echo drdev_inline_svg('/assets/images/icons/primary-arrow.svg', '', '', '26','26'); ?>
      </button>
    </div>

  </div>

  <?php else : ?>
    <p class="text-center text-gray-500"><?php _e( 'No testimonies found.', 'drdevcustomlanguage' ); ?></p>
  <?php endif; ?>

</section>
