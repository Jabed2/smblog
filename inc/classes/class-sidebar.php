<?php

namespace SMBLOG\Inc;
use SMBLOG\Inc\Traits\Singleton;
class Sidebar{
    use Singleton;

    public function __construct(){
        $this->setup_hooks();
    }
    public function setup_hooks(){
       add_action('widgets_init', [$this, 'smblog_register_sidebars']);
    }
    public function smblog_register_sidebars(){
        $rs_args = [
        'name'         => __( 'Main Sidebar', 'smblog' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
        ];
        register_sidebar($rs_args);
    }
}