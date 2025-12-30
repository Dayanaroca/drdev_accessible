<?php 

if (!defined('ABSPATH')) exit;

/**
 * Reusable button
 *
 * @param string $text Button text
 * @param string $url URL to which the button points
 * @param string $aria Accessibility text (aria-label)
 */
function drdev_button($class, $text, $aria = null, $extra_attrs = '', $id = null, $icon = null) {
    $aria_label = $aria ? "aria-label='" . esc_attr($aria) . "'" : "";
    $id_attr    = $id ? "id='" . esc_attr($id) . "'" : "";
    $icon_html = $icon ? "{$icon}" : "";

    return "<button class='{$class} inline-flex items-center gap-2' role='button' {$aria_label} {$id_attr} {$extra_attrs}>"
           . "<span>" . esc_html($text) . "</span>"
           . $icon_html
           . "</button>";
}
function drdev_link($class, $text, $url = '#', $aria = null, $extra_attrs = '', $id = null, $icon = null) {
    $aria_label = $aria ? "aria-label='" . esc_attr($aria) . "'" : "";
    $id_attr    = $id ? "id='" . esc_attr($id) . "'" : "";
    $icon_html = $icon ? "<span class='btn-icon'>{$icon}</span>" : "";

    return "<a href='" . esc_url($url) . "' class='{$class} inline-flex items-center gap-2' role='button' {$aria_label} {$id_attr} {$extra_attrs}>"
           . $icon_html
           . "<span>" . esc_html($text) . "</span>"
           . "</a>";
}
function drdev_button_primary($text, $url = '#', $aria = null, $extra_attrs = '', $id = null) {
     $aria_label = $aria ? "aria-label='" . esc_attr($aria) . "'" : "";
     $id_attr = $id ? "id='" . esc_attr($id) . "'" : "";
    return "<a href='" . esc_url($url) . "' class='btn-primary' role='button' {$aria_label} {$extra_attrs}>"
           . esc_html($text) .
           "</a>";
}
function drdev_button_white($text, $url = '#', $aria = null, $extra_attrs = '', $id = null) {
    $aria_label = $aria ? "aria-label='" . esc_attr($aria) . "'" : "";
    $id_attr = $id ? "id='" . esc_attr($id) . "'" : "";
    return "<a href='" . esc_url($url) . "' class='btn-white' role='button' {$aria_label} {$id_attr} {$extra_attrs}>"
           . esc_html($text) .
           "</a>";
}

function drdev_button_whiteAndBlue($text, $url = '#', $aria = null, $extra_attrs = '') {
     $aria_label = $aria ? "aria-label='" . esc_attr($aria) . "'" : "";
    return "<a href='" . esc_url($url) . "' class='btn-whiteAndBlue' role='button' {$aria_label} {$extra_attrs}>"
           . esc_html($text) .
           "</a>";
}


/**
* Decorative image
*
* @param string $src Image URL.
* @param string $class Optional CSS classes for styling (e.g., "w-full h-auto").
* @param string $width Optional width (for loading optimization).
* @param string $height Optional height (for loading optimization).
*
* @return string HTML <img>
*/
function drdev_image_decorative($src, $class = '', $id = '', $width = '', $height = '') {
    if (empty($src)) {
        return '';
    }

    $full_src = esc_url(get_template_directory_uri() . $src);

    $class  = $class ? ' class="' . esc_attr($class) . '"' : '';
    $id     = $id ? ' id="' . esc_attr($id) . '"' : '';
    $width  = $width ? ' width="' . intval($width) . '"' : '';
    $height = $height ? ' height="' . intval($height) . '"' : '';

    return sprintf(
        '<img src="%s" alt="" role="presentation" aria-hidden="true" loading="lazy" decoding="async"%s%s%s%s>',
        $full_src,
        $class,
        $id,
        $width,
        $height
    );
}

/**
 * Accessible and SEO-friendly image
 *
 * @param string $src Image URL (relative to theme directory).
 * @param string $alt Descriptive alternative text (required).
 * @param string $class Optional CSS classes for styling.
 * @param string $id Optional HTML ID attribute.
 * @param string $width Optional width for optimization.
 * @param string $height Optional height for optimization.
 * @param string $title Optional title attribute (for tooltips/SEO).
 *
 * @return string HTML <img> tag
 */
function drdev_image($src, $alt, $class = '', $id = '', $width = '', $height = '', $title = '') {
    if (empty($src) || empty($alt)) {
        return '';
    }

    $full_src = esc_url(get_template_directory_uri() . $src);

    $class  = $class ? ' class="' . esc_attr($class) . '"' : '';
    $id     = $id ? ' id="' . esc_attr($id) . '"' : '';
    $width  = $width ? ' width="' . intval($width) . '"' : '';
    $height = $height ? ' height="' . intval($height) . '"' : '';
    $title  = $title ? ' title="' . esc_attr($title) . '"' : '';

    return sprintf(
        '<img src="%s" alt="%s"%s%s%s%s%s loading="lazy" decoding="async">',
        $full_src,
        esc_attr($alt),
        $title,
        $class,
        $id,
        $width,
        $height
    );
}

function drdev_inline_svg($path, $class = '', $id = '', $width = '', $height = '', $extra_attrs = '') {
    $full_path = get_template_directory() . $path;

    if (!file_exists($full_path)) {
        return ''; 
    }

    $svg = file_get_contents($full_path);

    $svg = preg_replace('/<script.*?<\/script>/is', '', $svg);

    if ($class || $id || $width || $height) {
        $attributes = '';
        if ($class)  $attributes .= ' class="' . esc_attr($class) . '"';
        if ($id)     $attributes .= ' id="' . esc_attr($id) . '"';
        if ($width)  $attributes .= ' width="' . intval($width) . '"';
        if ($height) $attributes .= ' height="' . intval($height) . '"';
        if ($extra_attrs) $attributes .= ' height="' . intval($extra_attrs) . '"';

        $svg = preg_replace('/<svg\b([^>]*)>/', '<svg$1' . $attributes . '>', $svg, 1);
    }

    return $svg;
}