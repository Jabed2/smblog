
<!DOCTYPE html>
<html lang="<?php  ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 maximum-scale=1.0" />
    <?php wp_head();
    
    ?>
</head>

<body <?php body_class(); ?> >
<header> 
<?php 
 get_template_part( 'template-parts/header/nav' );
?>
</header>
