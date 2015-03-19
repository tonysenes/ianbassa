<?php
/*
	SHORTCODES
*/
//
/*--------------------------------------*/
/*    Clean up Shortcodes
/*--------------------------------------*/
function wpex_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');

//Events
function mt_events($atts){
		extract(shortcode_atts( array(
				"number" => '6',
			), $atts) );

		//$the_query = new WP_Query('post_type=events&posts_per_page='.$number.'&orderby=title&order=DESC');
		$the_query = new WP_Query('post_type=events&posts_per_page='.$number.'');
		if($the_query->have_posts()) :

		$metro = '	<div class="row"> ';

			while ( $the_query->have_posts() ) : $the_query->the_post();

			$id = get_the_ID();
			$metro_title = get_the_title($id);
			$slug = sanitize_title( get_the_title($id));
			$thumbnail = get_the_post_thumbnail($id, 'event-image');
			$m_location = get_post_meta( $id, 'e_location', true );
			$m_venue = get_post_meta( $id, 'e_venue', true );
			$m_start_time = get_post_meta( $id, 'e_start_time', true );
			$m_end_time = get_post_meta( $id, 'e_end_time', true );
			$m_date = get_post_meta( $id, 'e_date', true );
			$m_month = get_post_meta( $id, 'e_month', true );
			$m_day = get_post_meta( $id, 'e_day', true );
			$metro .= '

			<div class="span4 eblock">
				<div class="econtainer">
					<div class="ehalf">
						<a href="'.get_permalink().'" title="'.$metro_title.'">'.$thumbnail.'</a>
					</div>
					<div class="ehalf">
						<h3><a href="'.get_permalink().'">'.$metro_title.'</a></h3>
						<i class="icon-map-marker"><span>'.$m_location.'</span></i>
						<br />
						<i class="icon-home"><span>'.$m_venue.'</span></i><br />
						<i class="icon-time"><span>'.$m_start_time.'-'.$m_end_time.'</span></i><br />
						<div class="dates">
							<span class="day">'.$m_date.' '.$m_month.'</span>
							<span class="week">'.$m_day.'</span>
						</div>						
					</div>
				</div>
			</div>
			';
										
									


				endwhile;
		        $metro .= ' 	 
					</div>
				    ';

				return $metro;
				endif;
		}
	add_shortcode('events', 'mt_events');


//Audios
function mt_audios($atts){
		extract(shortcode_atts( array(
				"number" => '4',
			), $atts) );
		
		//$the_query = new WP_Query('post_type=audios&posts_per_page='.$number.'&orderby=title&order=ASC');
		$the_query = new WP_Query('post_type=audios&posts_per_page='.$number.'');
		if($the_query->have_posts()) :

		$metro = '	<div class="row"> ';

			while ( $the_query->have_posts() ) : $the_query->the_post();

			$id = get_the_ID();
			$metro_title = get_the_title($id);
			$slug = sanitize_title( get_the_title($id));
			
			$metro .= '

			<div class="track">

					';

			       if($audio_embed = get_post_meta( $id, 'audio_embed', true )):
					$metro.= ''.$audio_embed.'';
				   endif;

			$metro .= '';
			          $mp3_file = get_post_meta( $id, 'audio_file', true );
			           
			       if($audio_file = wp_get_attachment_url($mp3_file)):
					$metro.= '
							<div class="sm2-visualization">	
								<div class="ui360 ui360-vis">
									<a href="'.$audio_file.'"></a>
								</div>
							</div>
						';
				   endif;

				    if($audio_url = get_post_meta( $id, 'audio_url', true )):
				   	$metro.= '
							<div class="sm2-visualization">	
								<div class="ui360 ui360-vis">				   
				   					<a href="'.$audio_url.'"></a>
								</div>
							</div>
				   			';
				    endif;
						
					
			$metro .= '
				<div class="up"><i class="icon-caret-up"></i></div>

				<div class="tinfo">
					<h3>'.$metro_title.'</h3>
				</div>
			</div>

			';
										
									


				endwhile;
		        $metro .= ' 	 
					</div>
				    ';

				return $metro;
				endif;
		}
	add_shortcode('audios', 'mt_audios');

//Videos
function mt_videos($atts){
		extract(shortcode_atts( array(
				"number" => '4',
			), $atts) );

		$the_query = new WP_Query('post_type=videos_manager&posts_per_page='.$number.'');
		if($the_query->have_posts()) :

		$metro = '	<div class="row"> ';

			while ( $the_query->have_posts() ) : $the_query->the_post();

			$id = get_the_ID();
			$metro_title = get_the_title($id);
			$slug = sanitize_title( get_the_title($id));
			$v_url = get_post_meta( $id, 'v_url', true );	
			$thumbnail = get_the_post_thumbnail($id, 'full');
			$metro .= '

			<div class="span4 video-item">
				<a href="'.$v_url.'" data-rel="prettyPhoto" title="'.$metro_title.'">
				    <div class="video-image">
				         '.$thumbnail.'
				    </div>	

				    <div class="item-overlay">
				        <div class="item-info">
				            <div class="zoom-icon"></div>
				               	<h4 class="item-name">'.$metro_title.'</h4>
				        </div>
				    </div>				    				
				</a>
			</div>
			
			';
										
									


				endwhile;
		        $metro .= ' 	 
					</div>
				    ';

				return $metro;
				endif;
		}
	add_shortcode('videos', 'mt_videos');
//Team

function mt_teams($atts){
		extract(shortcode_atts( array(
				"number" => '6',
			), $atts) );

		$the_query = new WP_Query('post_type=teams&posts_per_page='.$number.'');//$the_query = new WP_Query('post_type=teams&posts_per_page='.$number.'&orderby=title&order=DESC');
		if($the_query->have_posts()) :
		$metro = '	<div class="row"> ';

			while ( $the_query->have_posts() ) : $the_query->the_post();

			$id = get_the_ID();
			$metro_title = get_the_title($id);
			$slug = sanitize_title( get_the_title($id));
			$thumbnail = get_the_post_thumbnail($id, 'full');
			$t_position = get_post_meta( $id, 't_position', true );
			$t_details = get_post_meta( $id, 't_details', true );			
			$metro .= '
			<div class="span3 bmember">
				'.$thumbnail.'
				<div class="bmeta">
					<h3>'.$metro_title.'</h3>
					<h4>'.$t_position.'</h4>
					'.$t_details.'
						<ul class="social">					
					';

			       if($t_fb = get_post_meta( $id, 't_fb', true )):
					$metro.= '<li><a href="'.$t_fb.'" data-placement="top" data-toggle="tooltip" title="facebook"><i class="icon-facebook"></i></a></li>';
				   endif;
						
			       if($t_tw = get_post_meta( $id, 't_tw', true )):
					$metro.= '<li><a href="'.$t_tw.'" data-placement="top" data-toggle="tooltip" title="twitter"><i class="icon-twitter"></i></a></li>';
				   endif;

			       if($t_gp = get_post_meta( $id, 't_gp', true )):
					$metro.= '<li><a href="'.$t_gp.'" data-placement="top" data-toggle="tooltip" title="google plus"><i class="icon-google-plus"></i></a></li>';
				   endif;

			       if($t_tb = get_post_meta( $id, 't_tb', true )):
					$metro.= '<li><a href="'.$t_tb.'" data-placement="top" data-toggle="tooltip" title="tumblr"><i class="icon-tumblr"></i></a></li>';
				   endif;				   				   

												
			$metro .= '
						</ul>						
				</div>
			</div>

			';

				endwhile;
		        $metro .= ' 	 
					</div>
				    ';

				return $metro;
				endif;
		}
	add_shortcode('teams', 'mt_teams');





  //Gallery
function mt_gallery($atts){
    extract(shortcode_atts( array(
        "number" => '4',
      ), $atts) );

    $the_query = new WP_Query('post_type=gallery&posts_per_page=-1');
    if($the_query->have_posts()) :
    $metro = '<div id="gallery-container"><ul class="items--small">';
      while ( $the_query->have_posts() ) : $the_query->the_post();

      $id = get_the_ID();
      $metro_title = get_the_title($id);
      $slug = sanitize_title( get_the_title($id));
      $thumbnail = get_the_post_thumbnail($id, 'gallery');
      $small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'gallery');

      $metro .= '<li class="item"><a href="#"><img src="'.$small_image_url[0].'" alt="" /></a></li>';
                
        endwhile;

      $metro .= '
            </ul>      
          ';

        wp_reset_postdata();

$metro .= '<ul class="items--big">';
      while ( $the_query->have_posts() ) : $the_query->the_post();

      $id = get_the_ID();
      $metro_title = get_the_title($id);
      $slug = sanitize_title( get_the_title($id));
      $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');      
      $metro .= '

        <li class="item--big">
        <a href="#">
          <figure>
          <img src="'.$large_image_url[0].'" alt="'.$metro_title.'" />
          <figcaption class="img-caption">
            '.$metro_title.'
          </figcaption>
          </figure>
          </a>
        </li> 

          ';
                        
        endwhile;
      $metro .= '
            </ul>  
 
		    <ul class="controls">
		    	<li>
				      <a data-placement="top" data-toggle="tooltip" title="previous" >
				      	<span class="control icon-arrow-left" data-direction="Previous"></span>
				      </a> 
				</li>
				<li>
				      <a data-placement="top" data-toggle="tooltip" title="Next" >
				      	<span class="control icon-arrow-right" data-direction="next"></span> 
				      </a>
				</li>
				<li>
					  <a data-placement="top" data-toggle="tooltip" title="Back" >
				      	<span class="grid icon-align-justify"></span>
				      </a>
				</li>
				<li>
				      <a data-placement="top" data-toggle="tooltip" title="Fullscreen" >
				      	<span class="fs-toggle icon-fullscreen mt-fullscreen"></span>
				      </a>
				</li>
		    </ul>

         </div>    
      ';

        return $metro;
        endif;

    }
  add_shortcode('photo-gallery', 'mt_gallery'); 



add_shortcode('blog', 'mt_blog');

function mt_blog($atts=array()) {
    ob_start();
    mt_blog_show($atts);
    $content = ob_get_clean();
    return $content;
}

function mt_blog_show($atts=array()) {
	require (get_template_directory() . '/functions/m-blog.php');
}

//container
    function m_container($atts, $content = null) {
    extract( shortcode_atts( array(), $atts));
    
    $code = '
            <div class="container">

            <div class="content " role="main">

            <div class="row">
                    '.do_shortcode($content).'
                    </div>
                </div>  
              </div>       
    ';
    return $code;
    }

    add_shortcode('mt-container', 'm_container');    


/* 
*Playlist Shortcode
*/

add_shortcode( 'mt_playlist', 'metro_playlist' );

function metro_playlist( $atts , $content = null ) {

	extract( shortcode_atts(
		array(
			'id' => '',
			), $atts )
	);

	// WP_Query arguments
	$args = array (
		'post_type'  => 'mt_playlist',
		'p'          => $id,
		);

	// The Query
	$PlaylistQuery = new WP_Query( $args );

	// The Loop
	if ( $PlaylistQuery->have_posts() ) {
		while ( $PlaylistQuery->have_posts() ) {
			$PlaylistQuery->the_post(); {
                

                echo '<script type="text/javascript">';
                echo 'jQuery(document).ready(function() {';

                echo 'new jPlayerPlaylist({';

                echo ' jPlayer: "#jquery_jplayer_'.get_the_ID().'",';
                echo ' cssSelectorAncestor: "#jp_container_'.get_the_ID().'"';


                //echo '            jPlayer: "#jquery_jplayer_'.get_the_ID().'",';';
                //echo '        cssSelectorAncestor: "#jp_container_'.get_the_ID().'" ';
                echo ' }, [';


                $PTData = get_post_meta( get_the_ID(), 'mt_playlist_details');

                foreach ($PTData as $PTable ) {
                    $PTData = $PTable;
                $thumbnail = wp_get_attachment_image_src( $PTData['audio-track-image'], 'full');
                $mp3_file = wp_get_attachment_url($PTData['audio-file-mp3']);
                //$ogg_file = wp_get_attachment_url($PTData['audio-file-ogg']);  
                echo '         {';
                echo '            title:"<h2>' . $PTData['audio_track_title'] . '</h2><h3>' . $PTData['audio_track_author'] . '</h3><img src='.$thumbnail[0].'  />",';
                echo '            mp3:"' . $mp3_file. '",';
                //echo '            oga:"' . $ogg_file. '"';
                echo '       },';


            } } }

			} else { 
				echo "Invalid PlayList ID";
			}
/*
                echo '             {';
                echo '                 title:"",';
                echo '                 mp3:"",';
                echo '                 oga:""';
                echo '             }';
*/

                echo '         ], {';
                echo '             swfPath: "' . ME_THEME_ROOT_PATH . '/js",';
                echo '             supplied: "mp3",';
                echo '             wmode: "window",';
                echo '             smoothPlayBar: false,';
                echo '             keyEnabled: false';
                echo '         });';
                echo '     });';
                echo ' </script>';

                //Playlist Background Color 
                $P_playlist_bg_color = get_post_meta( get_the_ID(), 'playlist-bg-color', true );
                //Playlist Track Title Color
                $P_playlist_title_color = get_post_meta( get_the_ID(), 'playlist-title-color', true );
                //Playlist Author Color
                $P_playlist_author_color = get_post_meta( get_the_ID(), 'playlist-author-color', true );
                //Playlist Progress Bar Color
                $P_playlist_progress_bar_color = get_post_meta( get_the_ID(), 'playlist-progress-bar-color', true );
                //Playlist Progress Bar After Color
                $P_playlist_progress_bar_after_color = get_post_meta( get_the_ID(), 'playlist-progress-bar-after-color', true );
                echo '<style>';

                        echo '.boxed-'.get_the_ID().'{';
                                echo 'background:'. $P_playlist_bg_color.';';
                                echo '-webkit-border-radius:5px;
                                        -moz-border-radius:5px;
                                        border-radius:5px;
                                        -webkit-box-shadow: 0 0 12px rgba(58, 51, 46, 0.26);
                                        -moz-box-shadow: 0 0 12px rgba(58, 51, 46, 0.26);
                                        box-shadow: 0 0 12px rgba(58, 51, 46, 0.26);
                                        margin-bottom:30px;
                                        position: relative;
                                        z-index: 0;
                                        ';

                        echo '}';

                        echo '#jp_container_'.get_the_ID().' .song_title h2, .jp-playlist-item h2{';
                                echo 'color:'. $P_playlist_title_color.' !important;';
                        echo '}';

                        echo '#jp_container_'.get_the_ID().' .song_title h3, .jp-playlist-item h3{';
                                echo 'color:'.$P_playlist_author_color.' !important;';
                        echo '}';

                        echo '#jp_container_'.get_the_ID().' .jp-play-bar{';
                                 echo 'background: none repeat scroll 0 0 '.$P_playlist_progress_bar_color.' !important;';
                        echo ' }';

                        echo '#jp_container_'.get_the_ID().' .jp-play-bar:after{';
                                echo 'background: none repeat scroll 0 0 '.$P_playlist_progress_bar_after_color.' !important;';
                        echo '}';


                    //echo '';
                echo '</style>';


                //Playlist column size
                $P_playlist_col_sizes = get_post_meta( get_the_ID(), 'playlist-cols-size', true );

                echo '
                <div class="'.$P_playlist_col_sizes.'">';
                 echo '
                        <!-- Widget Audio Player -->
                        <div class="widget-container widget-audio boxed-'.get_the_ID().'">
                            <div class="inner">
                                <div id="jquery_jplayer_'.get_the_ID().'" class="jp-jplayer"></div>
                                <div id="jp_container_'.get_the_ID().'" class="jp-audio">
                                    <div class="inner">
                                        <div class="jp-gui jp-interface">
                                            <div class="jp-controls-wrap">
                                                <div class="song_title"></div>
                                                <div class="jp-current-time"></div>
                                                <div class="jp-duration"></div>
                                                <div class="jp-progress">
                                                    <div class="jp-seek-bar">
                                                        <div class="jp-play-bar"></div>
                                                    </div>
                                                </div>
                                                <ul class="jp-controls clearfix">
                                                    <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                                    <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                                    <li><a href="javascript:;" class="jp-previous disabled" tabindex="1">previous</a></li>
                                                    <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                                    <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                                    <li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
                                                    <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                                                    <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                                                    <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                                                    <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                                                    <li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
                                                    <li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">shuffle off</a></li>
                                                    <li><a href="javascript:;" class="jp-playlist-toggle" tabindex="1" title="Toggle PlayList">Toggle PlayList</a></li>
                                                </ul>
                                                <div class="jp-volume-bar">
                                                    <div class="jp-volume-bar-value"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-playlist">
                                            <ul class="jp-playlist-inner">
                                                <li></li>
                                            </ul>
                                        </div>
                                        <div class="jp-no-solution">
                                            <span>Update Required</span>
                                            <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Widget Audio Player -->
                    </div>';
                wp_reset_postdata();
            ?>
		<?php
	}

?>