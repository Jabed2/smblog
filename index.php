<?php
get_header();
?>
<div id="primary">
    <div id="main">
        <?php
        if (have_posts()):
            ?>
            <div class="container">

                <?php
                if(is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title">
                        <?php single_post_title(); ?>
                    </h1>
                </header>
                <?php
                endif;
                ?>


<div class="row">
                    <?php
                    while (have_posts()):
                        the_post();

                        ?>
                        <?php 
                        get_template_part('template-parts/content');
                        ?>
                        <?php
                    endwhile;
                    ?>
</div>
 <?php 
    //   echo get_the_posts_pagination(
    //     [
    //         'prev_text' => __( '<',
            
    //          'smblog' ),
    //         'next_text' => __( '>', 'smblog' ),
    //         'before_page_number' => '<span class="btn btn-secondary">' ,
    //         'after_page_number' => '</span>',
    //     ]
    //   ); 
    smblog_paginate();
      ?>
                <?php
                else : 
                 
                    get_template_part('template-parts/content-none');
                  
        endif;
        ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>