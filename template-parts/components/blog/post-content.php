<?php 

?>
<div class="entry-content">
    <?php
     if(is_single()){
     the_content(
        sprintf(
            wp_kses(
                __('Continue Reading %s <span class=""meta-nav>&rarr</span>', 'smblog'),
                [
                    'span' => [
                        'class' => []
                    ]
                ]
                    ),
                    the_title('<span>', '</span>', false),
                   
        )
     );
     }
     else {
        smblog_the_excerpt(200);
        echo smblog_read_more();
     }
    ?>
</div>