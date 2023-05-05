<?php 
namespace SMBLOG\Inc;
use SMBLOG\Inc\Traits\Singleton;

class Metaboxes{
    use Singleton;
    public function __construct(){
        $this->setup_theme();
    }

    public function setup_theme(){
        add_action('add_meta_boxes', [$this, "smblog_custom_metabox"]);
        add_action('save_post', [$this, 'save_post_meta']);
    }
    function smblog_custom_metabox(){
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box( 
                'hide-page-title', 
                __('Hide Page Title', 'smblog'), 
                [$this, 'post_hide_title_metabox_html'], 
                $screen,
                'side'
            );

        }

       
    }
    public function post_hide_title_metabox_html($post){
        $value = get_post_meta( $post->ID, '_hide_page_title', true );

        wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name' );

        ?>
        <label for="smblog_field"><?php esc_html_e('Hide Page Title'); ?></label>
        <select name="smblog_field" id="smblog_field" class="postbox">
            <option value=""><?php esc_html_e('Select', 'smblog'); ?></option>
            <option value="yes" <?php selected($value, 'yes'); ?> ><?php esc_html_e('yes', 'smblog'); ?></option>
            <option value="no" <?php selected($value, 'no'); ?>><?php esc_html_e('no', 'smblog'); ?></option>
        </select>
        <?php
    }      
    
    public function save_post_meta($post_id){

        if(!current_user_can('edit_post', $post_id)){
            return;
        }

        if(!isset($_POST['hide_title_meta_box_nonce_name']) || ! wp_verify_nonce( $_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__))){
            return;
        }


        if ( array_key_exists( 'smblog_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['smblog_field']
            );
        }
    }


    }
