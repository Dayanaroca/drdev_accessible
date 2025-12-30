<?php
/**
 * Template part for displaying destinations V2 content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
  ?>
  <section aria-label="Destinos" class="w-full max-w-screen-xl ml-2.5 lg:mx-auto gap-6">
  <div class="trips-blog-slider swiper">
    <div class="swiper-wrapper">
      <!-- Card 1 -->
      <div class="swiper-slide">
        <div class="relative rounded-[0.9375rem] overflow-hidden">
          <h3 class="sr-only"><?php esc_html_e( 'Destino: R. Dominicana', 'drdevcustomlanguage' ); ?></h3>
          <?php
            $alt_rd = esc_html__( 'Imagen de fondo República Dominicana', 'drdevcustomlanguage' );
            echo drdev_image( '/assets/images/trips/republica-dominicana.webp', $alt_rd, 'h-40 lg:h-48 object-cover w-full', '', '273', '179', $alt_rd);
          ?>
          <div class="absolute bottom-4 w-full px-2">
            <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
              <?php echo drdev_image_decorative( '/assets/images/trips/rdominicana.svg', 'w-6 h-4', '', '16', '16'); ?>
              <span class="font-semibold text-sm text-baseblack uppercase"><?php esc_html_e( 'R. Dominicana', 'drdevcustomlanguage' ); ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="swiper-slide">
        <h3 class="sr-only"><?php esc_html_e( 'Destino: México', 'drdevcustomlanguage' ); ?></h3>
        <div class="relative rounded-[0.9375rem] overflow-hidden">
          <?php
            $alt_mex = esc_html__( 'Imagen de fondo México', 'drdevcustomlanguage' );
            echo drdev_image( '/assets/images/trips/mexico.webp', $alt_mex, 'h-40 lg:h-48 object-cover w-full', '', '273', '179', $alt_mex);
          ?>
          <div class="absolute bottom-4 w-full px-2">
            <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
              <?php echo drdev_image_decorative( '/assets/images/trips/mexico.svg', 'w-6 h-4', '', '16', '11'); ?>
              <span class="font-semibold text-sm text-baseblack uppercase"><?php esc_html_e( 'México', 'drdevcustomlanguage' ); ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="swiper-slide">
        <h3 class="sr-only"><?php esc_html_e( 'Destino: Cuba', 'drdevcustomlanguage' ); ?></h3>
        <div class="relative rounded-[0.9375rem] overflow-hidden">
          <?php
            $alt_cuba = esc_html__( 'Imagen de fondo Cuba', 'drdevcustomlanguage' );
            echo drdev_image( '/assets/images/trips/cuba.jpg', $alt_cuba, 'h-40 lg:h-48 object-cover w-full', '', '273', '179', $alt_cuba);
          ?>
          <div class="absolute bottom-4 w-full px-2">
            <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
              <?php echo drdev_image_decorative( '/assets/images/trips/cu.svg', 'w-6 h-4', '', '16', '11'); ?>
              <span class="font-semibold text-sm text-baseblack uppercase"><?php esc_html_e( 'Cuba', 'drdevcustomlanguage' ); ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="swiper-slide">
        <h3 class="sr-only"><?php esc_html_e( 'Destino: Estados Unidos', 'drdevcustomlanguage' ); ?></h3>
        <div class="relative rounded-[0.9375rem] overflow-hidden">
          <?php
            $alt_florida = esc_html__( 'Imagen de fondo florida', 'drdevcustomlanguage' );
            echo drdev_image( '/assets/images/trips/florida.png', $alt_florida, 'h-40 lg:h-48 object-cover w-full', '', '273', '179', $alt_florida);
          ?>
          <div class="absolute bottom-4 w-full">
            <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
              <?php echo drdev_image_decorative( '/assets/images/trips/eeuu.svg', 'w-6 h-4', '', '16', '11'); ?>
              <span class="font-semibold text-sm text-baseblack whitespace-nowrap uppercase"><?php esc_html_e( 'Estados Unidos', 'drdevcustomlanguage' ); ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="swiper-slide">
        <h3 class="sr-only"><?php esc_html_e( 'Destino: Canadá', 'drdevcustomlanguage' ); ?></h3>
        <div class="relative rounded-[0.9375rem] overflow-hidden">
          <?php
            $alt_florida = esc_html__( 'Imagen de fondo Canadá', 'drdevcustomlanguage' );
            echo drdev_image( '/assets/images/trips/canada.png', $alt_florida, 'h-40 lg:h-48 object-cover w-full', '', '273', '179', $alt_florida);
          ?>
          <div class="absolute bottom-4 w-full">
            <div class="accesible-seccion mx-auto w-max bg-white px-2 py-1 rounded-full flex items-center gap-1">
              <?php echo drdev_image_decorative( '/assets/images/trips/ca.svg', 'w-6 h-4', '', '16', '11'); ?>
              <span class="font-semibold text-sm text-baseblack whitespace-nowrap uppercase"><?php esc_html_e( 'Canadá', 'drdevcustomlanguage' ); ?></span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
