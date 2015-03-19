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
    
</head>
<body <?php body_class(); ?>>

 <?php

 if(isset($bub_mt['header_image']) && $bub_mt['header_image'] == 1)
    {
?>
<style>
  @media(max-width: 1920px){
    #home{
<?php if(isset($bub_mt['home_bg']) && $bub_mt['home_bg'] != '') { ?> background-image: url('<?php echo $bub_mt['home_bg'];?>');<?php } ?> 
    }
  }


  @media(max-width: 980px){
    #home{
<?php if(isset($bub_mt['home_bg_tab']) && $bub_mt['home_bg_tab'] != '') { ?> background-image: url('<?php echo $bub_mt['home_bg_tab'];?>');<?php } ?> 
    }
  }


  @media(max-width: 400px){
    #home{
<?php if(isset($bub_mt['home_bg_mobile']) && $bub_mt['home_bg_mobile'] != '') { ?> background-image: url('<?php echo $bub_mt['home_bg_mobile'];?>');<?php } ?> 
    }
  }

</style>

<!-- header -->
<!--header id="home" class="header-bg-style"-->
<header id="home" class="parallax" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">  
    <div class="container">
      <div class="logo">
            <?php if(isset($bub_mt['logo']) && $bub_mt['logo'] != '') { ?>
                <img src="<?php echo $bub_mt['logo'];?>" alt="Logo">
            <?php } ?> 
      </div>
      <div class="hgroup">
        <h1><?php echo get_bloginfo('name'); ?></h1>
        <h2><?php echo  get_bloginfo ( 'description' );  ?></h2>
      </div>
    </div> 
</header>
<!-- header end -->
  <?php } ?> 

 <?php

 if(isset($bub_mt['header_video']) && $bub_mt['header_video'] == 1)
    {
?>  
<!--Video Header -->
<header id="home">
      <div id="video-section">
        <div id="customElement"></div>
        <a id="video" class="player" data-property="{videoURL:'<?php echo $bub_mt['header_video_url'];?>',containment:'#customElement', showControls:false, autoPlay:false, loop:true, startAt:0, opacity:1, addRaster:false, quality:'default'}">My video</a> 


        <h1>Play Video <a class="play-button" href="#" onclick="jQuery('.player').playYTP()"></a> Know better</h1>
        
        <a onclick="jQuery('#video').toggleVolume()" id="video-volume"><i class="fa fa-volume-down"></i></a>
      </div>
</header>
<script type="text/javascript">
jQuery( document ).ready( function( $ ) {
   
      $(".player").mb_YTPlayer();
  var playButton = $('.play-button');

    playButton.live('click', function(e){
      e.preventDefault();
      
      if( !$(this).hasClass('active') ) {
        $(this).addClass('active');
        $(this).attr("onclick", "jQuery('.player').pauseYTP()");
      } else {
        $(this).removeClass('active');
        $(this).attr("onclick", "jQuery('.player').playYTP()");
      }
      
    });
});
</script>
<!-- Video Header end-->
  <?php } ?> 
<!-- nav -->
<nav>
  <div class="main-nav">
            <div class="container">
              <button data-target=".nav-collapse" data-toggle="collapse" class="mobilenav" type="button">
                    <span class="title">Menu</span><span class="trig icon-align-justify"></span>
              </button>
              <!-- nav menu -->
              <div class="nav-collapse collapse">
      <!-- menu list -->
                    <?php wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'container' => '',
                        'menu_class' => 'nav', 
                        'menu_id' => 'navs',
                        'fallback_cb' => 'show_top_menu',
                        'echo' => true,
                        'walker' => new description_walker(),
                        'depth' => 1 ) ); 
                    ?>  
      <!-- menu list end -->   
                         
          </div>
        <!-- nav menu end-->
            </div>
  </div>  
</nav>
<!-- nav end -->





  
    