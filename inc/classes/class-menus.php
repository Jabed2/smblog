<?php

namespace SMBLOG\Inc;
use SMBLOG\Inc\Traits\Singleton;
class Menus{
    use Singleton;
    public function __construct(){
        $this->setup_hooks();
    }
    public function setup_hooks(){
        add_action('init', [$this, "menu_register"]);
    }
    public function menu_register(){
      register_nav_menus( [
        'smblog-header-menu' => esc_html__('Header Menu', "smblog"),
        'smblog-footer-menu' => esc_html__('Footer Menu', "smblog"),
      ] );
    }

    public function get_menu_id($location){
        //Get All the Location 
        $locations = get_nav_menu_locations();
        $menu_id = $locations[$location];
        return !empty($menu_id) ? $menu_id : '';

        
    }    
    public function get_chlid_menus($menus, $parent_id){
       
        $child_meus = [];
        if(!empty($menus) && is_array($menus)){
            foreach ($menus as $menu) {
                if(intval($menu->menu_item_parent) === $parent_id){
                    array_push($child_meus, $menu);
                }
            }
        }
        return $child_meus;
    }
}