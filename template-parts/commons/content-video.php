<?php
/**
 * Template part for displaying video content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<section class="flex flex-col items-center justify-center w-auto lg:w-full max-w-screen-lg mx-2.5 lg:mx-auto" aria-labelledby="videoSectionTitle">
    <h2 id="videoSectionTitle" class="font-bold text-2xl lg:text-4xl text-center lg:text-left lg:leading-[3.375rem] mb-5">
      <?php echo esc_html__( 'Descubre nuestros destinos accesibles', 'drdevcustomlanguage' ); ?>
    </h2>
    <div id="videoCover" class="relative">
        <?php
            $alt_video = esc_attr__( 'Miniatura del video sobre destinos accesibles', 'drdevcustomlanguage' );
            echo drdev_image('/assets/images/commons/image-video.jpg', $alt_video, '', '', '828', '457', $alt_video); 
        ?>     
        <button  type="button"  class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" id="playVideoButton" aria-label="<?php echo esc_attr__( 'Reproducir video sobre destinos accesibles', 'drdevcustomlanguage' ); ?>">
          <?= drdev_inline_svg('/assets/images/icons/play.svg','', '', '90', '90'); ?>
        </button>
    </div>
    <div id="videoContainer" class="w-full mt-4" aria-hidden="true"></div>
</section>