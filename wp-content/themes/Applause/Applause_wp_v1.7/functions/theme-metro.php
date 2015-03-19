<?php
$bub_mt = get_option('bub_mt');
//Load theme scripts


//Load theme stylessheets
function theme_mt_styles(){
 global $bub_mt; 
wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', false, false, 'all');
wp_enqueue_style('bootstrap-responsive', get_template_directory_uri().'/css/bootstrap-responsive.css', false, false, 'all');
wp_enqueue_style('styles', get_template_directory_uri().'/css/styles.css', false, false, 'all');
wp_enqueue_style('metro_icon', get_template_directory_uri().'/css/metro-icon.css', false, false, 'all');
wp_enqueue_style('sgallery-styles', get_template_directory_uri().'/css/sgallery-styles.css', false, false, 'all');
wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.css', false, false, 'all');
wp_enqueue_style('flashblock', get_template_directory_uri().'/player/flashblock/flashblock.css', false, false, 'all');
wp_enqueue_style('360player', get_template_directory_uri().'/player/css/360player.css', false, false, 'all');
wp_enqueue_style('360player-visualization', get_template_directory_uri().'/player/css/360player-visualization.css', false, false, 'all');
wp_enqueue_style('googlefont', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,700italic,800italic,400,300,700,800&amp;subset=latin,latin-ext', false, false, 'all');
wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css', false, false, 'all');
wp_enqueue_style('jplayer-css', get_template_directory_uri().'/css/jplayer.css', false, false, 'all');
wp_enqueue_style('YTPlayer-css', get_template_directory_uri().'/css/YTPlayer.css', false, false, 'all');
//wp_enqueue_style('nivo_css', get_template_directory_uri().'/css/nivo-slider.css', false, false, 'all');
}
add_action('wp_enqueue_scripts', 'theme_mt_styles');
//Load theme Scripts
function theme_mt_scripts() {
global $bub_mt;
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);
wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/js/gmap3.js', array('jquery'), false, true);
wp_enqueue_script( 'form', get_template_directory_uri() . '/js/jquery.form.js', array('jquery'), false, true);
wp_enqueue_script( 'jquerynav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), false, true);
wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery'), false, true);
wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'), false, true);
wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), false, true);
wp_enqueue_script( 'ufvalidator', get_template_directory_uri() . '/js/jquery.ufvalidator-1.0.5.js', array('jquery'), false, true);
wp_enqueue_script( 'screenfull', get_template_directory_uri() . '/js/screenfull.min.js', array('jquery'), false, true);
wp_enqueue_script( 'sgallery', get_template_directory_uri() . '/js/sgallery.min.js', array('jquery'), false, true);
wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), false, true);
wp_enqueue_script( 'hammer', get_template_directory_uri() . '/js/hammer.js', array('jquery'), false, true);
wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), false, true);
wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), false, true);
//wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), false, true);
wp_enqueue_script( 'mapssensor', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery'), false, true );
wp_enqueue_script( 'berniecode-animator', get_template_directory_uri() . '/player/script/berniecode-animator.js', array('jquery'), false, true);
wp_enqueue_script( 'soundmanager2', get_template_directory_uri() . '/player/script/soundmanager2.js', array('jquery'), false, true);
wp_enqueue_script( '360player', get_template_directory_uri() . '/player/script/360player.js', array('jquery'), false, true);
wp_enqueue_script( 'jplayer-min', get_template_directory_uri() . '/js/jquery.jplayer.min.js', array('jquery'), false, true);
wp_enqueue_script( 'jplayer-config', get_template_directory_uri() . '/js/jplayer.config.js', array('jquery'), false, true);
wp_enqueue_script( 'jplayer-playlist', get_template_directory_uri() . '/js/jplayer.playlist.min.js', array('jquery'), false, true);
wp_enqueue_script( 'YTPlayer-js', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js', array('jquery'), false, true);

wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array('jquery'), false, true);
wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/skrollr.js', array('jquery'), false, true);
if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'theme_mt_scripts');

//Required file's

require_once (get_template_directory() . '/inc/metabox/custom-meta-boxes.php');  //CUSTOM METABOXES
require_once (get_template_directory() .'/inc/cpt.php');        //CUSTOM POST TYPE
require_once(get_template_directory() . '/functions/shortcodes.php');   //Shortcodes
require_once(get_template_directory() . '/functions/flickr_widget.php');  //Flickr widget
require_once(get_template_directory() . '/functions/twitter-widget.php');  //Twitter widget
define( 'ME_THEME_ROOT_PATH', get_template_directory_uri() );

function portfolio_thumbnail_url($pid){
  $image_id = get_post_thumbnail_id($pid);  
  $image_url = wp_get_attachment_image_src($image_id,'screen-shot');  
  return  $image_url[0];  
}
//Post thumbnails
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 771, 270, true ); 
}

//Coustom css
add_action('wp_head', 'nature_custom_css', 11);
function nature_custom_css() {
  global $bub_mt;
  if(isset($bub_mt['custom_css']) && $bub_mt['custom_css'] != '')
      echo '<style type="text/css">' . $bub_mt['custom_css'] . '</style>';
}

if ( ! isset( $content_width ) ) $content_width = 1170;

//Custom image resize
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'event-image', 150, 200, true );
  add_image_size( 't-member', 270, 178, true );
  add_image_size( 'gallery', 235, 155, true );
  add_image_size( 'blog-posts', 370, 250, true );
  //add_image_size( 'single-posts', 838, 260, true );
  add_image_size( 'portfolio_img', 250, 188, true );
}
//POST FORMATS
//add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'image', 'link', 'quote', 'aside' ) );

//Post excerpt length
function custom_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
       global $post;
  return '<a href="'. get_permalink($post->ID) . '"></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


//Local domain
add_action('after_setup_theme', 'lucas_setup');
   function lucas_setup(){
        load_theme_textdomain('applause', get_template_directory() . '/languages');
   }
//FEED LINKS
add_theme_support( 'automatic-feed-links' );
add_editor_style('editor-style.css');
add_theme_support( 'custom-header');
add_theme_support( 'custom-background'); 

//Register Menus
function register_menus() {
	register_nav_menus( array( 'top-menu' => 'Top primary menu')
						);
}
add_action('init', 'register_menus');

//Walker Nav Menu
class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)
      {
           global $wp_query;
            $indent = ( $depth ) ? str_repeat( " ", $depth ) : '';
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="'. esc_attr( $class_names ) . '"';
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
            $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
            $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
            if($item->object == 'page')
            {
            $varpost = get_post($item->object_id);
              if(is_home()){
                $attributes .= ' href="#' . $varpost->post_name . '"'. $class_names .'';
              }else{
                $attributes .= ' href="'.home_url().'/#' . $varpost->post_name . '" class="colapse-menu1"';
              }
            }
            else
            $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"'. $class_names .'' : '';
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

//For inside pages 
class inside_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)
      {
           global $wp_query;
            $indent = ( $depth ) ? str_repeat( " ", $depth ) : '';
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="'. esc_attr( $class_names ) . '"';
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
            $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
            $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
            if($item->object == 'page')
            {
            $varpost = get_post($item->object_id);
              if(is_home()){
                $attributes .= ' href="'.home_url().'#' . $varpost->post_name . '" class="external"';
              }else{
                $attributes .= ' href="'.home_url().'/#' . $varpost->post_name . '"class="external"';
              }
            }
            else
            $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"class="external"' : '';
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

//Register Sidebar

if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'name' => 'Footer',
        'before_widget' => '<div class="side_bar_widget span4">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4> <hr>',
    ));

//Metaboxes
add_filter( 'cmb_meta_boxes', 'mt_features_meta_box' );
function mt_features_meta_box( $meta_boxes ) {

//$prefix = ''; // Prefix for all fields
  
  //////////////////////////////////////////////////////////////////////////
  ////// CREATE METABOXES FOR PAGES ///////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  $meta_boxes[] = array(
    'id' => 'page_metabox',
    'title' => __('Page Options', 'applause'),
    'pages' => array('page'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(
      array(
        'name' => __('Title', 'applause'),
        'desc' => __('This is section Title', 'applause'),
        'id' => 'p_title',
        'type' => 'text',
      ),
      array(
        'name' => __('Short description', 'applause'),
        'desc' => __('Short description about this section', 'applause'),
        'id' => 'top_short_des',
        'type' => 'textarea_code',
      ),

      array(
        'name' => __('Background Color', 'applause'),
        'desc' => __('Page Background Color', 'applause'),
        'id' => 'p_bg_colorpicker',
        'type' => 'colorpicker',
        'default' => ''
      ),
      array(
        'name' => __('Background Image', 'applause'),
        'desc' => __('Page Background Image', 'applause'),
        'id' => 'p_back_image',
        'type' => 'image'
      ),
      array(
        'name' => __('Text Color', 'applause'),
        'desc' => __('Page Text Color', 'applause'),
        'id' => 'p_text_colorpicker',
        'type' => 'colorpicker',
        'default' => '#ffffff'
      ),
    )
  );


  //////////////////////////////////////////////////////////////////////////
  ////// CREATE METABOXES FOR EVENTS ///////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  $meta_boxes[] = array(
    'id' => 'events_metabox',
    'title' => __('Event Options', 'applause'),
    'pages' => array('events'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(

      //Location
      array(
        'name' => __('Location', 'applause'),
        'desc' => __('', 'applause'),
        'id' => 'e_location',
        'type' => 'text',
        'cols' => 4 ,
      ),  
      
      //Venue
      array(
        'name' => __('Venue', 'applause'),
        'desc' => __('', 'applause'),
        'id' => 'e_venue',
        'type' => 'text',
         'cols' => 4 ,
      ),            
      
      //Start Time
      array(
        'name' =>__('Start Time', 'applause'),
        'desc' => __('', 'applause'),
        'id' => 'e_start_time',
        'type' => 'time',
         'cols' => 2 ,
      ),

      //End Time
      array(
        'name' =>__('End Time', 'applause'),
        'desc' => __('', 'applause'),
        'id' => 'e_end_time',
        'type' => 'time',
         'cols' => 2 ,
      ),      


      //Date
      array(
        'name' =>__('Date', 'applause'),
        'desc' => __('which date', 'applause'),
        'id' => 'e_date',
        'type' => 'select',
        'options' => array(
          array( 'name' => '1', 'value' => '1', ),
          array( 'name' => '2', 'value' => '2', ),
          array( 'name' => '3', 'value' => '3', ),
          array( 'name' => '4', 'value' => '4', ),
          array( 'name' => '5', 'value' => '5', ),
          array( 'name' => '6', 'value' => '6', ),
          array( 'name' => '7', 'value' => '7', ),
          array( 'name' => '8', 'value' => '8', ),
          array( 'name' => '9', 'value' => '9', ),
          array( 'name' => '10', 'value' => '10', ),
          array( 'name' => '11', 'value' => '11', ),
          array( 'name' => '12', 'value' => '12', ),
          array( 'name' => '13', 'value' => '13', ),
          array( 'name' => '14', 'value' => '14', ),
          array( 'name' => '15', 'value' => '15', ),
          array( 'name' => '16', 'value' => '16', ),
          array( 'name' => '17', 'value' => '17', ),
          array( 'name' => '18', 'value' => '18', ),
          array( 'name' => '19', 'value' => '19', ),
          array( 'name' => '20', 'value' => '20', ),
          array( 'name' => '21', 'value' => '21', ),
          array( 'name' => '22', 'value' => '22', ),
          array( 'name' => '23', 'value' => '23', ),
          array( 'name' => '24', 'value' => '24', ),
          array( 'name' => '25', 'value' => '25', ),
          array( 'name' => '26', 'value' => '26', ),
          array( 'name' => '27', 'value' => '27', ),
          array( 'name' => '28', 'value' => '28', ),
          array( 'name' => '29', 'value' => '29', ),
          array( 'name' => '30', 'value' => '30', ),
          array( 'name' => '31', 'value' => '31', ),                                    
        ),
        'cols' => 2 ,
      ),

    //Month
      array(
        'name' =>__('Month', 'applause'),
        'desc' => __('which month', 'applause'),
        'id' => 'e_month',
        'type' => 'select',
        'options' => array(
          array( 'name' => 'January', 'value' => 'Jan', ),
          array( 'name' => 'February', 'value' => 'Feb', ),
          array( 'name' => 'March', 'value' => 'Mar', ),
          array( 'name' => 'April', 'value' => 'Apr', ),
          array( 'name' => 'May', 'value' => 'May', ),
          array( 'name' => 'June', 'value' => 'Jun', ),
          array( 'name' => 'July', 'value' => 'Jul', ),
          array( 'name' => 'August', 'value' => 'Aug', ),
          array( 'name' => 'September', 'value' => 'Sep', ),
          array( 'name' => 'October', 'value' => 'Oct', ),
          array( 'name' => 'November', 'value' => 'Nov', ),
          array( 'name' => 'December', 'value' => 'Dec', ),                                   
        ),
         'cols' => 2 ,
      ),

    //Year
      array(
        'name' =>__('Year', 'applause'),
        'desc' => __('which year', 'applause'),
        'id' => 'e_year',
        'type' => 'select',
        'options' => array(
          array( 'name' => '2013', 'value' => '2013', ),
          array( 'name' => '2014', 'value' => '2014', ),
          array( 'name' => '2015', 'value' => '2015', ),
          array( 'name' => '2016', 'value' => '2016', ),
          array( 'name' => '2017', 'value' => '2017', ),
          array( 'name' => '2018', 'value' => '2018', ),
          array( 'name' => '2019', 'value' => '2019', ),
          array( 'name' => '2020', 'value' => '2020', ),
          array( 'name' => '2021', 'value' => '2021', ),
          array( 'name' => '2022', 'value' => '2022', ),
          array( 'name' => '2023', 'value' => '2023', ),
          array( 'name' => '2024', 'value' => '2024', ),
          array( 'name' => '2025', 'value' => '2025', ),
          array( 'name' => '2026', 'value' => '2026', ),
          array( 'name' => '2027', 'value' => '2027', ),
          array( 'name' => '2028', 'value' => '2028', ),
          array( 'name' => '2029', 'value' => '2029', ),
          array( 'name' => '2030', 'value' => '2030', ),                                    
        ),
        'cols' => 2 ,
      ),      

    //Day

      array(
        'name' =>__('Day', 'applause'),
        'desc' => __('which day', 'applause'),
        'id' => 'e_day',
        'type' => 'select',
        'options' => array(
          array( 'name' => 'Sunday', 'value' => 'Sunday', ),
          array( 'name' => 'Monday', 'value' => 'Monday', ),
          array( 'name' => 'Tuesday', 'value' => 'Tuesday', ),
          array( 'name' => 'Wednesday', 'value' => 'Wednesday', ),
          array( 'name' => 'Thursday', 'value' => 'Thursday', ),
          array( 'name' => 'Friday', 'value' => 'Friday', ),
          array( 'name' => 'Saturday', 'value' => 'Saturday', ),                          
        ),
         'cols' => 2 ,
      ),

      //Price
      array(
        'name' => __('Price', 'applause'),
        'desc' => __('Tickets Price', 'applause'),
        'id' => 'e_price',
        'type' => 'text',
         'cols' => 2 ,
      ),  
      
      //Buy link
      array(
        'name' => __('Buy Url', 'applause'),
        'desc' => __('Tickets buy link', 'applause'),
        'id' => 'e_buy_url',
        'type' => 'text',
         'cols' => 2 ,
      ),  

      //Tickets Status
      array(
        'name' =>__('Tickets Status', 'applause'),
        'desc' => __('About ticket status', 'applause'),
        'id' => 'e_ticket_status',
        'type' => 'select',
        'options' => array(
          array( 'name' => 'Available', 'value' => 'Available', ),
          array( 'name' => 'Unavailable', 'value' => 'Unavailable', ),
          array( 'name' => 'Free', 'value' => 'Free', ),                        
        ),
        'cols' => 6 ,
      ),

      //Google Map Address
      array(
        'name' => __('Map Address', 'applause'),
        'desc' => __('Google Map address for visitors . Example:Haltern am See, Weseler Str. 151', 'applause'),
        'id' => 'e_emap',
        'type' => 'text',
         'cols' => 6 ,
      ),  

      //Details 
      array(
        'name' => __('Details', 'applause'),
        'desc' => __('Some details about your work', 'applause'),
        'id'   => 'e_details',
        'type' => 'wysiwyg',
      ),


    )
  );



  //////////////////////////////////////////////////////////////////////////
  ////// CREATE METABOXES FOR Audios ///////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  $meta_boxes[] = array(
    'id' => 'audios_metabox',
    'title' => __('Audio Options', 'applause'),
    'pages' => array('audios'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(
      array(
        'name' => __('Audio File', 'applause'),
        'desc' => __('Upload your audio file,File Format should be mp3,aac,ogg,wav', 'applause'),
        'id' => 'audio_file',
        'type' => 'file',
      ),

      array(
        'name' => __('Optional Audio Url', 'applause'),
        'desc' => __('Past your uploaded audio url', 'applause'),
        'id' => 'audio_url',
        'type' => 'text',
      ),

      array(
        'name' => __('Optional Soundcloud Embed', 'applause'),
        'desc' => __('Past your Soundcloud Embed code ', 'applause'),
        'id' => 'audio_embed',
        'type' => 'textarea',
      ),      


      )
    );

  //////////////////////////////////////////////////////////////////////////
  ////// CREATE METABOXES FOR TEAMS ///////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  $meta_boxes[] = array(
    'id' => 'teams_metabox',
    'title' => __('member Options', 'applause'),
    'pages' => array('teams'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(

      array(
        'name' => __('Position', 'applause'),
        'desc' => __('Position in the band', 'applause'),
        'id' => 't_position',
        'type' => 'text',
      ),

      array(
        'name' => __('Details', 'applause'),
        'desc' => __('Some details about member', 'applause'),
        'id'   => 't_details',
        'type' => 'wysiwyg',
      ),

      array(
        'name' => __('Facebook profile', 'applause'),
        'desc' => __('Member facebook profile link', 'applause'),
        'id' => 't_fb',
        'type' => 'text',
      ),

      array(
        'name' => __('Twitter profile', 'applause'),
        'desc' => __('Member twitter profile link', 'applause'),
        'id' => 't_tw',
        'type' => 'text',
      ),

      array(
        'name' => __('Google plus profile', 'applause'),
        'desc' => __('Member Google plus profile link', 'applause'),
        'id' => 't_gp',
        'type' => 'text',
      ),

      array(
        'name' => __('Tumblr plus profile', 'applause'),
        'desc' => __('Member Tumblr plus profile link', 'applause'),
        'id' => 't_tb',
        'type' => 'text',
      ),

      )
    );


  //////////////////////////////////////////////////////////////////////////
  ////// CREATE METABOXES FOR VIDEOS ///////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  $meta_boxes[] = array(
    'id' => 'videos_metabox',
    'title' => __('Video Options', 'applause'),
    'pages' => array('videos_manager'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(
      array(
        'name' => __('Video Url', 'applause'),
        'desc' => __('Past your video url', 'applause'),
        'id' => 'v_url',
        'type' => 'text',
      ),

    )
  );

  //////////////////////////////////////////////////////////////////////////
  ////// CREATE METABOXES FOR GALLERY /////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  $meta_boxes[] = array(
    'id' => 'gallery_metabox',
    'title' => __('Gallery Options', 'applause'),
    'pages' => array('work_experience'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(


    )
  );

  $fields = array(
    
    array( 
      'id' => 'playlist-bg-color', 
      'name' => __( "Playlist Background Color", 'mtlng' ), 
      'default' => '#FFFFFF',
      'cols'    =>  3, 
      'type' => 'colorpicker'
       ),
    
    array( 
      'id' => 'playlist-title-color', 
      'name' => __( "Tracks Title Color", 'mtlng' ),
      'default' => '#5C5146',
      'cols'    =>  3, 
      'type' => 'colorpicker'
       ),

    array( 
      'id' => 'playlist-author-color', 
      'name' => __( "Tracks Author Color", 'mtlng' ),
      'default' => '#8E8071',
      'cols'    =>  3, 
      'type' => 'colorpicker'
       ),


    array( 
      'id' => 'playlist-progress-bar-color', 
      'name' => __( "Player Progress Bar Color", 'mtlng' ),
      'default' => '#E05033',
      'cols'    =>  3, 
      'type' => 'colorpicker'
       ),

    array( 
      'id' => 'playlist-progress-bar-after-color', 
      'name' => __( "Player Progress Bar After Color", 'mtlng' ),
      'default' => '#EAA08F',
      'cols'    =>  3, 
      'type' => 'colorpicker'
       ),

          array( 
            'id'      => 'playlist-cols-size', 
            'name'    => __( "Playlist column size", 'mtlng' ),
            'type'    => 'select', 
            'cols'    =>  3,
            'default' => 'span4',
            'options' => array(
              'span1'                  => 'span1',
              'span2'                  => 'span2',
              'span3'                  => 'span3',
              'span4'                  => 'span4',
              'span5'                  => 'span5',
              'span6'                  => 'span6',
              'span7'                  => 'span7',
              'span8'                  => 'span8',
              'span9'                  => 'span9',
              'span10'                  => 'span10',
              'span11'                  => 'span11',
              'span12'                  => 'span12'
              )
            ),
  
  );

  $meta_boxes[] = array(
    'title' => 'Playlist Customizer',
    'pages' => 'mt_playlist',
    'fields' => $fields
  );


  $meta_boxes[] = array(

    'id'          => 'mt_playlist_metabox',
    'title'       => __( "Playlist Manager", 'mtlng' ), 
    'pages'       => array('mt_playlist'),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true, // Show field names on the left
    'fields' => array(

      array( 
        'id'   => 'mt_playlist_details', 
        'name'    => __( "Add Audio Tracks & Details", 'mtlng' ), 
        'type' => 'group',
        'repeatable'     => true,
        'repeatable_max' => 20,
        'fields' => array(

        //Audio Tracks Title
          array(
            'id'              => 'audio_track_title',
            'name'            => __( "Audio Track Title", 'mtlng' ),                
            'type'            => 'text',
            'cols'            => 6
            ),

        //Audio Tracks Artist/ Author 

          array(
            'id'              => 'audio_track_author',
            'name'            => __( "Audio Track Author", 'mtlng' ),                
            'type'            => 'text',
            'cols'            => 6
            ),

    //Audio Track Image
      array( 
          'id'   => 'audio-track-image', 
          'name' => __( "Upload A Audio track Image", 'mtlng' ), 
          'type' => 'image',
          //'show_size' => true,
          'cols' => 4 ,
          'size' => 'height=200&width=400&crop=1'
      ),

    //Upload Mp3 Audio File 
      array( 
          'id'   => 'audio-file-mp3', 
          'name' => __( "Upload A .mp3 Audio track", 'mtlng' ),
          'type' => 'file', 
          'cols'            => 4
      ),
    //Upload Ogg Audio File 
      /*
      array( 
          'id'   => 'audio-file-ogg', 
          'name' => __( "Upload A .ogg Audio track", 'mtlng' ),
          'type' => 'file', 
          'cols'            => 4
      ),

      */

          )
)
)
);
  

return $meta_boxes;
}




?>
