<?php 

if (!defined('ABSPATH')) exit;

function drdev_get_global_data() {
  $icon_path = get_theme_file_uri('/assets/images/icons/');
  $img_path  = get_theme_file_uri('/assets/images/');
  $phone     = get_theme_mod('company_phone');
  $email     = get_theme_mod('company_email');
  $ws        = get_theme_mod('company_whatsapp');
  $ws_clean  = preg_replace('/[^0-9]/', '', $ws);
  $schedule  = get_theme_mod('company_schedule');
  $tiktok    = get_theme_mod('company_tiktok');
  $facebook  = get_theme_mod('company_facebook');
  $instagram = get_theme_mod('company_instagram');
  $linkedin  = get_theme_mod('company_linkedin');
  $youtube   = get_theme_mod('company_youtube');
  $direction  = get_theme_mod('company_direction');
  $urlgooglemaps = get_theme_mod('company_directionGoogle');
  $company_terms_conditions_pdf = get_theme_mod('company_terms_conditions_pdf');

  return [
    // ---------General---------//
    'site_name'        => get_bloginfo('name'),
    'site_desc'        => get_bloginfo('description'),
    'page_desc'        => is_singular() && has_excerpt() ? get_the_excerpt() : get_bloginfo('description'),
    'canonical_url'    => is_singular() ? get_permalink() : home_url(add_query_arg([], $_SERVER['REQUEST_URI'])),
    'image_url'        => has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : $img_path . 'socialMedia/team.jpg',
    // ---------Icons---------//
    'logo-footer'      => $icon_path . 'logo-footer.svg',
    'logo'             => $icon_path . 'logo-header.svg',
    'logo-color'       => $icon_path . 'logo-header-color.svg',
    // ---------Contact---------//
    'phone'            => $phone,
    'email'            => $email,
    'whatsapp'         => $ws,
    'whatsapp_clean'   => $ws_clean,
    'schedule'         => $schedule,
    'direction'        => $direction, 
    'urlgooglemaps'    => $urlgooglemaps,
    // ---------Social media---------//
    'tiktok'            => $tiktok,
    'facebook'          => $facebook,
    'instagram'         => $instagram,
    'linkedin'          => $linkedin,
    'youtube'           => $youtube,
    // ---------Legal---------//
    'company_terms_conditions_pdf' => $company_terms_conditions_pdf,
  ];
}