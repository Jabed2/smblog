<?php

namespace SMBLOG\Inc;
use SMBLOG\Inc\Traits\Singleton;

class Assets{
    use Singleton;
    public function __construct(){
       $this->setup_hooks(); 
    }
    public function setup_hooks(){
        add_action("wp_enqueue_scripts", [$this, "register_style"]);
        add_action("wp_enqueue_scripts", [$this, "register_script"]);
    }
    public function register_style(){
        wp_register_style( 'mainstyle', get_stylesheet_uri(), "all" );
        wp_register_style( 'bootstrap-css', SMBLOG_DIR_URI."/assets/src/library/bootstrap/css/bootstrap.min.css", [], false, "all" );
        wp_register_style( 'fonts-css', SMBLOG_DIR_URI."/assets/src/library/fonts/fonts.css", [], false, "all" );
       
        wp_enqueue_style( 'bootstrap-css' );
        wp_enqueue_style( 'mainstyle' );
       wp_enqueue_style( 'fonts-css' );
      }
      public function register_script(){
        wp_register_script( "bootstrap-js", SMBLOG_DIR_URI."/assets/src/library/bootstrap/js/bootstrap.min.js", ["jquery"], "5.2.0", true );
        wp_register_script( "main-js", SMBLOG_BUILD_JS_URI."/bundle.js", ["jquery"], "1.0.0", true );

        wp_enqueue_script("bootstrap-js");
        wp_enqueue_script("main-js");
      }
}