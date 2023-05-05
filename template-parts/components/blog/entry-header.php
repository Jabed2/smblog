<?php
//template for entry header


$the_post_id = get_the_ID();
$hasThumbnailPost = get_the_post_thumbnail($the_post_id);
$hide_title = get_post_meta( $the_post_id, "_hide_page_title", true );
$heading_class = !empty($hide_title) && 'yes'=== $hide_title ? 'hide' : '';
?>
<header class="entry-header">
    <?php
    if ($hasThumbnailPost):
        ?>
        <div>
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php the_post_custom_thumbnail($the_post_id, 'feature-large', [
                    'sizes' => '(max-width : 355px) 355px, 200px',
                    'class' => 'attachment-feature-large size-feature-image',
                ]); ?>
            </a>
        </div>
        
        <?php
    endif;

  if(is_single() || is_page()){
    printf(
        '<h1 class="page-title text-dark %1$s">%2$s</h1>',
        esc_attr($heading_class),
        wp_kses_post(get_the_title()),
    );
  }
  else {
    printf(
        '<h2 class="entry-title mb-3"><a href="%1$s">%2$s</a></h2>',
        esc_url(get_the_permalink()),
        wp_kses_post(get_the_title()),
    );
  }


    ?>
</header>