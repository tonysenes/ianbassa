<?php

//Events

add_action( 'init', 'events_mt' );

function events_mt() {
register_post_type( 'events',
    array(
      'labels' => array(
		'name' => __( 'Events', 'post type general name', 'applause' ),
		'singular_name' => __( 'Events Item', 'post type singular name', 'applause' ),
		'add_new' => __( 'Add New Event','applause' ),
		'add_new_item' => __( 'Add New Event', 'applause' ),
		'edit_item' => __( 'Edit Event', 'applause' ),
		'new_item' => __( 'New Event', 'applause' ),
		'view_item' => __( 'View Event', 'applause' ),
		'search_items' => __( 'Search Events', 'applause' ),
		'not_found' =>  __( 'No Events found', 'applause' ),
		'not_found_in_trash' => __( 'No Events found in Trash', 'applause' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','thumbnail'),
	  'menu_icon' => 'dashicons-megaphone',
    )
  );
}

//Audios

add_action( 'init', 'audios_mt' );

function audios_mt() {
register_post_type( 'audios',
    array(
      'labels' => array(
		'name' => __( 'Audios', 'post type general name', 'applause' ),
		'singular_name' => __( 'Audios Item', 'post type singular name', 'applause' ),
		'add_new' => __( 'Add New Audio','applause' ),
		'add_new_item' => __( 'Add New Audio', 'applause' ),
		'edit_item' => __( 'Edit Audio', 'applause' ),
		'new_item' => __( 'New Audio', 'applause' ),
		'view_item' => __( 'View Audio', 'applause' ),
		'search_items' => __( 'Search Audios', 'applause' ),
		'not_found' =>  __( 'No Audios found', 'applause' ),
		'not_found_in_trash' => __( 'No Audios found in Trash', 'applause' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title'),
	  'menu_icon' => 'dashicons-format-audio'
	  //'menu_icon' => get_bloginfo('template_directory') . '/img/icon-events.png'
    )
  );
}

//Team
add_action( 'init', 'teams_mt' );
function teams_mt() {
register_post_type( 'teams',
    array(
      'labels' => array(
		'name' => __( 'Teams', 'post type general name', 'applause' ),
		'singular_name' => __( 'Member Item', 'post type singular name', 'applause' ),
		'add_new' => __( 'Add New Member','applause' ),
		'add_new_item' => __( 'Add New Member', 'applause' ),
		'edit_item' => __( 'Edit Member', 'applause' ),
		'new_item' => __( 'New Member', 'applause' ),
		'view_item' => __( 'View Member', 'applause' ),
		'search_items' => __( 'Search Member', 'applause' ),
		'not_found' =>  __( 'No Members found', 'applause' ),
		'not_found_in_trash' => __( 'No Members found in Trash', 'applause' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','thumbnail'),
	  'menu_icon' => 'dashicons-groups'
	  //'menu_icon' => get_bloginfo('template_directory') . '/img/icon-events.png'
    )
  );
}

//Video
add_action( 'init', 'videos_mt' );
function videos_mt() {
register_post_type( 'videos_manager',
    array(
      'labels' => array(
		'name' => __( 'Videos', 'post type general name', 'applause' ),
		'singular_name' => __( 'Video Item', 'post type singular name', 'applause' ),
		'add_new' => __( 'Add New Video','applause' ),
		'add_new_item' => __( 'Add New Video', 'applause' ),
		'edit_item' => __( 'Edit Video', 'applause' ),
		'new_item' => __( 'New Video', 'applause' ),
		'view_item' => __( 'View Video', 'applause' ),
		'search_items' => __( 'Search Video', 'applause' ),
		'not_found' =>  __( 'No Members found', 'applause' ),
		'not_found_in_trash' => __( 'No Members found in Trash', 'applause' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','thumbnail'),
	  'menu_icon' => 'dashicons-video-alt3'
	  //'menu_icon' => get_bloginfo('template_directory') . '/img/icon-events.png'
    )
  );
}

//Gallery
add_action( 'init', 'gallery_mt' );
function gallery_mt() {
register_post_type( 'gallery',
    array(
      'labels' => array(
		'name' => __( 'Gallery', 'post type general name', 'applause' ),
		'singular_name' => __( 'Gallery Item', 'post type singular name', 'applause' ),
		'add_new' => __( 'Add New Item','applause' ),
		'add_new_item' => __( 'Add New Item', 'applause' ),
		'edit_item' => __( 'Edit Item', 'applause' ),
		'new_item' => __( 'New Item', 'applause' ),
		'view_item' => __( 'View Item', 'applause' ),
		'search_items' => __( 'Search Gallery Item', 'applause' ),
		'not_found' =>  __( 'No Item found', 'applause' ),
		'not_found_in_trash' => __( 'No Item found in Trash', 'applause' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','thumbnail'),
	   'menu_icon' => 'dashicons-format-gallery'
	  //'menu_icon' => get_bloginfo('template_directory') . '/img/icon-events.png'
    )
  );
}


//Register Playlist Post Type

add_action('init', 'applause_playlist_manager_post_type');

function applause_playlist_manager_post_type(){

	$labels = array(
   'name' => __( "Playlist", 'mtlng' ),
   'singular_name' => __( "Playlist", 'mtlng' ),
   'add_new_item' => __( "Add Playlist", 'mtlng' ),
   'edit_item' => __( "Edit Playlist", 'mtlng' ),
   'new_item' => __( "New Playlist", 'mtlng' ),
   'view_item' => __( "View Playlist", 'mtlng' ),
   'search_items' => __( "Search Playlist", 'mtlng' ),
   'not_found' => __( "No Playlist Found", 'mtlng' ),
   'not_found_in_trash' => __( "No Playlist Found in Trash", 'mtlng' ),
   'parent_item_colon' => __( "Parent Playlist", 'mtlng' ),
   'menu_name' => __( "Playlist", 'mtlng' )
   );

	$args = array(
		'labels' => $labels,
    'menu_icon' => 'dashicons-playlist-audio',
		'heirarchical' => false,
		'descriptin' => 'Playlist',
		'supports'  => array('title'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menu' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
   );

	register_post_type( 'mt_playlist', $args );

}

// Change Post Type Enter Title Here
function mt_playlist_title( $title ){

  $screen = get_current_screen();
  if  ( 'mt_playlist' == $screen->post_type ) {
    $title = 'Playlist Title';
  }  
  return $title;
}
add_filter( 'enter_title_here', 'mt_playlist_title' );


// manage_edit-{$post_type}_column

add_filter( 'manage_edit-mt_playlist_columns', 'metro_edit_mt_playlist_columns' );

function metro_edit_mt_playlist_columns( $columns ) {

  $columns = array(
    'cb' => '<input type="checkbox" />',
    'title' => __( 'Playlist Name', 'mtlng' ),
    'mt_playlist_shortcode' => __( 'Playlist Shortcode', 'mtlng' ),
    'mt_playlist_shortcode' => __( 'Playlist Shortcode', 'mtlng' ),
    );

  return $columns;
}

//Manage Shortcode

add_action( 'manage_mt_playlist_posts_custom_column', 'mt_manage_mt_playlist_columns', 10, 2 );

function mt_manage_mt_playlist_columns( $column ){
  global $post;
  $post->ID;

  if( $post->post_type != 'mt_playlist' ) return;

  switch ($column) {
    case 'title':
    echo get_the_title();
    break;

    case 'mt_playlist_shortcode':
    echo '[mt_playlist id="' . get_the_ID() . '"]';
    break;

    default:
                      # code...
    break;
  }

}


?>