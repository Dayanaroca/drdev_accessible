<?php 

if (!defined('ABSPATH')) exit;

function drdev_allow_font_uploads($mime_types) {
    $mime_types['woff']  = 'font/woff';
    $mime_types['woff2'] = 'font/woff2';
    $mime_types['ttf']   = 'font/ttf';
    $mime_types['otf']   = 'font/otf';
    return $mime_types;
}
add_filter('upload_mimes', 'drdev_allow_font_uploads');

function drdev_fonts_cors_headers() {
    if (isset($_SERVER['REQUEST_URI']) && preg_match('/\.(ttf|woff|woff2|otf)$/i', $_SERVER['REQUEST_URI'])) {
        header("Access-Control-Allow-Origin: *");
    }
}
add_action('init', 'drdev_fonts_cors_headers');
