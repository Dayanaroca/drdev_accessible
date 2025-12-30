<?php 
/**
 * Template part for displaying faq content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if (!defined('ABSPATH')) exit;

function faq_component($faqs = [], $title = 'Preguntas frecuentes') {
    if (empty($faqs)) return;
    ?>
    <section class="faq-section w-full max-w-screen-lg mx-auto px-2.5 lg:px-0">
        <h2 class="font-bold text-2xl lg:text-4xl text-center lg:text-left mb-5">
            <?php echo esc_html($title); ?>
        </h2>        
        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full ">
                <?php foreach ($faqs as $index => $faq) : ?>
                    <div class="faq-item border-b border-secondary pt-8 pb-8">
                        <button  class="faq-question flex justify-between items-center w-full text-left  gap-4" aria-expanded="false" aria-controls="faq-answer-<?php echo $index; ?>" onclick="toggleFaq(<?php echo $index; ?>)">
                            <?php echo drdev_inline_svg('/assets/images/home/open.svg', 'faq-toggle-icon sec-fac w-8 h-8 transition-transform', '', '40', '40'); ?>
                            <h3 class="font-bold text-color2 text-base lg:text-2xl flex-1">
                                <?php echo esc_html($faq['question']); ?>
                            </h3>
                        </button>                        
                        <div id="faq-answer-<?php echo $index; ?>" class="faq-answer hidden ml-2 lg:ml-16 my-8 text-xl text-color5 [&>p]:text-xl [&>p]:text-color5 font-medium border-l-2 border-secondary pl-4">
                            <?php echo wp_kses_post($faq['answer']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}