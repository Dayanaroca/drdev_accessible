<?php
if (!defined('ABSPATH')) exit;
?>
<section aria-labelledby="blog-categories-heading" class="w-full px-2.5 lg:px-0 max-w-screen-etg mx-auto">
  <h2 id="blog-categories-heading" class="font-bold text-4xl lg:text-4xl text-left mb-5">
   <?php esc_html_e( 'Categorías', 'drdevcustomlanguage' ); ?> 
  </h2>

  <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
    <!-- Card 1 -->
    <li class="accesible-seccion bg-white border border-gray-200 rounded-t-[0.625rem] overflow-hidden">
      <figure>
        <img
          src="https://blog.enjoytravelgroup.com/wp-content/uploads/2024/01/Property-col-image.png"
          alt="Consejos prácticos para planificar viajes accesibles"
          width="278"
          height="209"
          loading="lazy"
          class="w-full h-auto"
        />
        <figcaption class="p-4">
          <h3 class="text-lg font-semibold text-baseblack text-center">
            <?php esc_html_e( 'Consejos de viajes', 'drdevcustomlanguage' ); ?>          
          </h3>
        </figcaption>
      </figure>
    </li>

    <!-- Card 2 -->
    <li class="accesible-seccion bg-white border border-gray-200 rounded-t-[0.625rem] overflow-hidden">
      <figure>
        <img
          src="https://blog.enjoytravelgroup.com/wp-content/uploads/2024/01/Property-col-image-1.png"
          alt="Actividades y excursiones accesibles para todos"
          width="278"
          height="209"
          loading="lazy"
          class="w-full h-auto"
        />
        <figcaption class="p-4">
          <h3 class="text-lg font-semibold text-baseblack text-center">
            <?php esc_html_e( 'Actividades y excursiones', 'drdevcustomlanguage' ); ?>
          </h3>
        </figcaption>
      </figure>
    </li>

    <!-- Card 3 -->
    <li class="accesible-seccion bg-white border border-gray-200 rounded-t-[0.625rem] overflow-hidden">
      <figure>
        <img
          src="https://blog.enjoytravelgroup.com/wp-content/uploads/2024/01/image.png"
          alt="Lugares de interés adaptados para turismo accesible"
          width="278"
          height="209"
          loading="lazy"
          class="w-full h-auto"
        />
        <figcaption class="p-4">
          <h3 class="text-lg font-semibold text-baseblack text-center">
            <?php esc_html_e( 'Lugares de interés', 'drdevcustomlanguage' ); ?>
          </h3>
        </figcaption>
      </figure>
    </li>

    <!-- Card 4 -->
    <li class="accesible-seccion bg-white border border-gray-200 rounded-t-[0.625rem] overflow-hidden">
      <figure>
        <img
          src="https://blog.enjoytravelgroup.com/wp-content/uploads/2024/01/Property-col-image-2.png"
          alt="Gastronomía local y experiencias culinarias inclusivas"
          width="278"
          height="209"
          loading="lazy"
          class="w-full h-auto"
        />
        <figcaption class="p-4">
          <h3 class="text-lg font-semibold text-baseblack text-center">
            <?php esc_html_e( 'Gastronomía', 'drdevcustomlanguage' ); ?>
          </h3>
        </figcaption>
      </figure>
    </li>
  </ul>
</section>