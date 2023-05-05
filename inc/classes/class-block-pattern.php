<?php

namespace SMBLOG\Inc;
use SMBLOG\Inc\Traits\Singleton;

class Block_pattern {
    use Singleton;
    public function __construct(){
        $this->setup_theme();
    }
    public function setup_theme(){
        add_action('init', [$this, 'custom_block_pattern']);
        add_action('init', [$this, 'register_block_pattern_categories']);
    }
    public function custom_block_pattern(){
        register_block_pattern( 
            'smblog/cover',
            [
                'title' => __( 'smblog cover', "smblog" ),
                'description' => __( 'smblog cover block pattern with image & text', 'smblog'),
                'content' => '<!-- wp:paragraph -->
                <p></p>
                <!-- /wp:paragraph -->
                
                <!-- wp:cover {"url":"http://localhost/sm-blog/wp-content/uploads/2023/05/pexels-cong-h-1404819.jpg","id":101,"hasParallax":true,"dimRatio":50,"isDark":false} -->
                <div class="wp-block-cover is-light has-parallax"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div role="img" class="wp-block-cover__image-background wp-image-101 has-parallax" style="background-position:50% 50%;background-image:url(http://localhost/sm-blog/wp-content/uploads/2023/05/pexels-cong-h-1404819.jpg)"></div><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","textColor":"white","fontSize":"x-large"} -->
                <p class="has-text-align-center has-white-color has-text-color has-x-large-font-size">This si a Blog Post Page</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph {"align":"center","textColor":"cyan-bluish-gray","fontSize":"medium"} -->
                <p class="has-text-align-center has-cyan-bluish-gray-color has-text-color has-medium-font-size">We are Expert in Computer Technology</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","textColor":"white","gradient":"blush-light-purple"} -->
                <div class="wp-block-button"><a class="wp-block-button__link has-white-color has-blush-light-purple-gradient-background has-text-color has-background has-text-align-center wp-element-button"><strong>Read More</strong></a></div>
                <!-- /wp:button --></div>
                <!-- /wp:buttons --></div></div>
                <!-- /wp:cover -->',
                'categories' => array( 'cover' ),

                ]
         );
    }
    public function register_block_pattern_categories(){
        
        $categories = [
            'cover' => __( 'Cover', "smblog" ),
            'carousal' => __( 'Carousal', "smblog" )
        ];
        
        if(!empty($categories) && is_array($categories)){
          foreach ($categories as $pattern_category => $pattern_category_label) {
            register_block_pattern_category(
                $pattern_category,
                array( 'label' => $pattern_category_label )
            );
          }
        }

        
    }
}