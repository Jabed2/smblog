<?php 
   $class_name = is_single() ? 'mb-5 col-12' : 'mb-5 col-4';
?>
<article id="post-<?php the_ID(); ?> " <?php post_class($class_name) ?>>
     <?php 
     get_template_part('template-parts/components/blog/entry-header');
     get_template_part('template-parts/components/blog/entry-meta');
     get_template_part('template-parts/components/blog/entry-content');
     
     get_template_part('template-parts/components/blog/entry-footer');
     ?>
</article>