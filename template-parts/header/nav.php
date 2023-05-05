<?php
use SMBLOG\Inc\Menus;
  $menu_class = Menus::get_instance();

  $header_menu_id = $menu_class->get_menu_id('smblog-header-menu');
  $header_menu = wp_get_nav_menu_items($header_menu_id );

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container-fluid">
  <?php 
    if(function_exists('the_custom_logo')){
      the_custom_logo(  );
    }
    ?>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
     <?php
     if(!empty($header_menu ) && is_array($header_menu)) {
     ?>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<?php
 foreach ($header_menu as $menu_item) {
   if(!$menu_item->menu_item_parent){
   

     $child_menu_items = $menu_class->get_chlid_menus($header_menu, $menu_item->ID);


     $has_children = !empty($child_menu_items) && is_array($child_menu_items);
     if(!$has_children){
      ?>
      <li class="nav-item">
      <a class="nav-link" aria-current="page" href=" <?php echo esc_url( $menu_item->url);?>">
        <?php 
        echo esc_html( $menu_item->title);
        ?>
      </a>
    </li>
    <?php
    }
    else {
      ?>
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href=" <?php echo esc_url( $menu_item->url);?>" data-bs-toggle="dropdown" aria-expanded="false">
          <?php 
        echo esc_html( $menu_item->title);
        ?>
          </a>
          <ul class="dropdown-menu">
          

         
      <?php 
        foreach($child_menu_items as $child_menu_item){
          ?>

          <li><a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url); ?>"><?php echo esc_html($child_menu_item->title); ?></a></li>

          <?php
        }
      ?>
 </ul>

          
           
      </li>
      <?php
    }
    ?>
    
 
 
 <?php
   }
 }
?>
</ul> 
     <?php
     }
     ?>
    
 

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php 
  // wp_nav_menu( [
  //   'theme-location' => 'smblog-header-menu',
  //   'container_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
    
  // ] );
?>
