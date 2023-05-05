<?php

if(!defined('SMBLOG_DIR_PATH')){
   define('SMBLOG_DIR_PATH', untrailingslashit( get_template_directory() ) );
}
if(!defined("SMBLOG_DIR_URI")){
    define("SMBLOG_DIR_URI", untrailingslashit( get_template_directory_uri() ));
}
if(!defined("SMBLOG_BUILD_URI")){
    define("SMBLOG_BUILD_URI", untrailingslashit( get_template_directory_uri().'/assets/build' ));
}
if(!defined("SMBLOG_BUILD_JS_URI")){
    define("SMBLOG_BUILD_JS_URI", untrailingslashit( get_template_directory_uri().'/assets/build/src/js' ));
}
if(!defined("SMBLOG_BUILD_IMG_URI")){
    define("SMBLOG_BUILD_IMG_URI", untrailingslashit( get_template_directory_uri().'/assets/build/src/img' ));
}
if(!defined("SMBLOG_BUILD_CSS_URI")){
    define("SMBLOG_BUILD_CSS_URI", untrailingslashit( get_template_directory_uri().'/assets/build/css' ));
}


require_once SMBLOG_DIR_PATH.'/inc/helpers/autoloader.php';
require_once SMBLOG_DIR_PATH.'/inc/helpers/template-tags.php';


function smblog_get_theme_instance(){
    \SMBLOG\Inc\SMBLOG_THEME::get_instance();
}
smblog_get_theme_instance();



