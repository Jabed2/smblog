<?php

namespace SMBLOG\Inc;

use SMBLOG\Inc\Traits\Singleton;
class SMBLOG_THEME {
    use Singleton;
public function __construct(){
  Assets::get_instance();
  Menus::get_instance();
  Metaboxes::get_instance();
  Sidebar::get_instance();
  Block_pattern::get_instance();

  $this->setup_hooks();
}
public function setup_hooks(){
  add_action("after_setup_theme", [$this, "setup_theme"]);
}

public function setup_theme(){
  add_theme_support('title-tag');
  add_theme_support("custom-logo", [
    "header-text" => ['site-title', 'site-description'],
    'height' => 100,
    'width' => 400,
    'flex-height' => true,
    'flex-width' => true,

  ]);

add_theme_support('custom-background', [
   'default-color' => '#fff',
   'default-image' => '',
   'default-repeat' => 'no-repeat',
]);

add_theme_support('post-thumbnails');
add_image_size('feature-thumbnail', 355, 200, true);

add_theme_support('customize-selective-refresh-widgets');
add_theme_support('automatic-feed-links');
add_theme_support('html5', [
  'search-form',
  'comment-form',
  'gallery',
  'caption',
  'script',
  'style',

]);
add_theme_support( 'editor-styles' );
add_editor_style('assets/build/css/editor.css');
add_theme_support('wp-block-styles');
add_theme_support('align-wide');


remove_theme_support('core-block-patterns');



global $content_width;

if(!isset($content_width)){
  $content_width = 1240;
}


//add_theme_support('');

}


}