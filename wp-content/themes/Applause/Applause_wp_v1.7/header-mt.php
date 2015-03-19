<?php global $bub_mt; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width" />

    <title><?php
    global $page, $paged;
      wp_title( '|', true, 'right' );
      bloginfo( 'name' );
      $site_description = get_bloginfo( 'description', 'display' );
      if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";?>
    </title>

    <link rel="shortcut icon" href="<?php echo $bub_mt['favicon'];?>" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php global $bub_mt;  
        if(isset($bub_mt['integration_header'])) echo $bub_mt['integration_header'] . PHP_EOL;
        wp_head(); ?>
    <?php if(isset($bub_mt['home_bg']) && $bub_mt['home_bg'] != '') { ?>    
        <style type="text/css">
            #mt-header {
                background-image: url("<?php echo $bub_mt['home_bg'];?>") !important;
            }
        </style>
    <?php } ?>         
</head>
<body <?php body_class(); ?>>
<!-- nav -->
<nav>
  <div class="main-nav">
            <div class="container">
              <button data-target=".nav-collapse" data-toggle="collapse" class="mobilenav" type="button">
                    <span class="title">Menu</span><span class="trig icon-align-justify"></span>
              </button>
              <!-- nav menu -->
              <div class="nav-collapse collapse">

              <ul id="navs" class="nav">
      <!-- menu list -->
                    <?php wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'container' => '',
                        'menu_class' => 'nav', 
                        'menu_id' => null,
                        'fallback_cb' => 'show_top_menu_inset',
                        'echo' => true,
                        'walker' => new inside_walker(),
                        'depth' => 1 ) ); 
                    ?>  
      <!-- menu list end -->                
          </div>
        <!-- nav menu end-->
            </div>
  </div>  
</nav>
<!-- nav end -->





  
    