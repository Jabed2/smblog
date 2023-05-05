<?php

function get_the_post_custom_thumbnail($post_id, $size = 'feature-thumbnail', $addition_attr = []){
   $custom_thumbnail = '';
   if(null === $post_id){
    $post_id = get_the_ID();
   }
   if(has_post_thumbnail($post_id)){
    $default_attr = [
        'loading' => 'lazy',
    ];
   }
   $attributes = array_merge($addition_attr, $default_attr);
   $custom_thumbnail = wp_get_attachment_image(
   get_post_thumbnail_id($post_id),
   $size,
   false,
   $addition_attr
   );
   return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $size = 'feature-thumbnail', $addition_attr = []){
   echo get_the_post_custom_thumbnail($post_id, $size, $addition_attr);
}

function smblog_posted_on(){
   $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
   
   if(get_the_date('U') !== get_the_modified_time( 'U' )){
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="update" datetime="%3$s">%4$s</time>';
   }
   $time_string = sprintf(
      $time_string,
      esc_attr( get_the_date(DATE_W3C) ),
      esc_attr( get_the_date() ),
      esc_attr( get_the_date(DATE_W3C) ),
      esc_attr( get_the_date() ),
   
   );
   $posted_on = sprintf(
      esc_html_x('Posted on %1$s', 'post date', 'smblog'),
      '<a href="'.esc_url( get_permalink() ).'">'.$time_string.'</a>',
   );
   echo '<span class="posted-on text-secondary">'.$posted_on.'</span>';

}

function smblog_post_author(){
   $byline = sprintf(
     esc_html_x('by %s', 'post author', 'smblog'),
      '<span class="author"><a href="'.esc_url( get_the_author_url(get_the_author_meta('ID')) ).'">'.esc_html( get_the_author() ).'</a></span>'
   );
   echo '<span class="byline text-secondary">'.$byline.' </span>';


}

function smblog_the_excerpt($trim_character_count = 0){
   if(!has_excerpt() || 0 === $trim_character_count) {
      the_excerpt();
      return;
   }
   else {
      $excerpt = wp_strip_all_tags(get_the_excerpt());
      $excerpt = substr($excerpt, 0, $trim_character_count);
      $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
      echo $excerpt . '...';
   }
}
function smblog_read_more($more = ''){
   if(!is_single()){
      $more = sprintf(
         '<div><a class="smblog-read-more btn btn-info text-white" href="%1$s">%2$s</a></div>',
         get_permalink(get_the_ID()),
         __('Read More', 'smblog'),

      );
      return $more;
   }
 
}
function smblog_paginate(){
   $allowed_tags = [
      'span' => [
         "class" => [],
      ],
      'a' => [
         "class" => [],
         'href' => [],
      ]
   ];
   $args = [
      'before_page_number' => '<span class="btn btn-secondary">' ,
      'after_page_number' => '</span>',
   ];
   printf('<nav class="smblog-pagination">%s</nav>', wp_kses( paginate_links( $args), $allowed_tags ));
}