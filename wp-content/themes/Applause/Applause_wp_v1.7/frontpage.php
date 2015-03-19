<?php
/*
Template name: Frontpage Template
*/
global $bub_mt;
get_header(); ?>


 <?php 
    if ( ( $locations = get_nav_menu_locations() ) && $locations['top-menu'] ) {
        $menu = wp_get_nav_menu_object( $locations['top-menu'] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $include = $bub_mt['pages_topmenu'];

        query_posts( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
    }
    else
    {
        if(isset($bub_mt['pages_topmenu']) && $bub_mt['pages_topmenu'] != '' )
            query_posts(array( 'post_type' => 'page', 'post__in' => $bub_mt['pages_topmenu'], 'posts_per_page' => count($bub_mt['pages_topmenu']), 'orderby' => 'menu_order', 'order' => 'ASC' ) );
        else
            query_posts(array( 'post_type' => 'page', 'posts_per_page' => 10, 'orderby' => 'menu_order', 'order' => 'ASC' ) );
    }
    
    while(have_posts() ) : the_post(); ?>
    <style>
        #<?php echo $post->post_name;?>{

            <?php if( get_post_meta( $post->ID, 'p_bg_colorpicker', true ) ) : ?> 
                background-color: <?php echo get_post_meta( $post->ID, 'p_bg_colorpicker', true ); ?>;       
            <?php endif; ?>           

            <?php if( get_post_meta( $post->ID, 'p_text_colorpicker', true ) ) : ?> 
                color: <?php echo get_post_meta( $post->ID, 'p_text_colorpicker', true ); ?>;       
            <?php endif; ?>   

        }       


    </style>

    <!-- section -->
    <section id="<?php echo $post->post_name;?>" class="section parallax"

    <?php
                $PTData = get_post_meta($post->ID,  'p_back_image', true );
                $image_attributes = wp_get_attachment_image_src( $PTData, 'full' ); 

                 if($image_attributes) : ?>

     style="background-image: url('<?php echo  $image_attributes[0]; ?>');" 

  <?php endif; ?> 
     data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="container">
            <!-- section header -->     
                    <div class="header">
                        <h2><?php $p_title = get_post_meta($post->ID, 'p_title', true); 
                                if($p_title != '') echo $p_title; else the_title();?></h2>
                        <p><?php echo get_post_meta( $post->ID, 'top_short_des', true ); ?></p>
                    </div>
            <!-- section header end -->            
            <?php global $more; $more = 0; the_content('');?>
        </div>    
    </section>
    <!-- end of sections -->

    <?php endwhile; wp_reset_query(); ?>
<!-- Contact -->
<style>
    #contact{
        background-color:<?php echo $bub_mt['contact_color'];?>;     
    }
</style>
<section id="contact" class="parallax" style="background-image: url('<?php echo $bub_mt['contact_bg'];?>');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="container">
<!-- section header -->     
        <div class="header">
            <h2><?php echo $bub_mt['c_title'];?></h2>
            <p><?php echo $bub_mt['s_title'];?></p>
        </div>
<!-- section header end -->
<!-- social network links-->
        <div class="row">
            <ul class="socialnetwork">
                <?php if(isset($bub_mt['ap_twitter']) && $bub_mt['ap_twitter'] != '') { ?>
                    <li><a href="<?php echo $bub_mt['ap_twitter'];?>" data-placement="top" data-toggle="tooltip" title="Twitter" target="_blank"><i class="mt-twitter"></i></a></li>
                <?php } ?> 

                <?php if(isset($bub_mt['ap_google_plus']) && $bub_mt['ap_google_plus'] != '') { ?>
                    <li><a href="<?php echo $bub_mt['ap_google_plus'];?>" data-placement="top" data-toggle="tooltip" title="Google plus" target="_blank"><i class="mt-google-plus"></i></a></li>
                <?php } ?> 

                <?php if(isset($bub_mt['ap_soundcloud']) && $bub_mt['ap_soundcloud'] != '') { ?>
                    <li><a href="<?php echo $bub_mt['ap_soundcloud'];?>" data-placement="top" data-toggle="tooltip" title="Soundcloud" target="_blank"><i class="mt-soundcloud"></i></a></li>
                <?php } ?>                           
                            
                 <?php if(isset($bub_mt['ap_facebok']) && $bub_mt['ap_facebok'] != '') { ?>
                    <li><a href="<?php echo $bub_mt['ap_facebok'];?>" data-placement="top" data-toggle="tooltip" title="Facebook" target="_blank"><i class="mt-facebook"></i></a></li>
                <?php } ?>                             
                            
                 <?php if(isset($bub_mt['ap_flickr']) && $bub_mt['ap_flickr'] != '') { ?>
                    <li><a href="<?php echo $bub_mt['ap_flickr'];?>" data-placement="top" data-toggle="tooltip" title="Flickr" target="_blank"><i class="mt-flickr-2"></i></a></li>                  
                 <?php } ?> 

                 <?php if(isset($bub_mt['ap_instagram']) && $bub_mt['ap_instagram'] != '') { ?>   
                    <li><a href="<?php echo $bub_mt['ap_instagram'];?>" data-placement="top" data-toggle="tooltip" title="Instagram" target="_blank"><i class="mt-instagram"></i></a></li>
                 <?php } ?> 

                 <?php if(isset($bub_mt['ap_lastfm']) && $bub_mt['ap_lastfm'] != '') { ?>   
                    <li><a href="<?php echo $bub_mt['ap_lastfm'];?>" data-placement="top" data-toggle="tooltip" title="Last fm" target="_blank"><i class="mt-lastfm"></i></a></li>
                 <?php } ?> 

                 <?php if(isset($bub_mt['ap_pinterest']) && $bub_mt['ap_pinterest'] != '') { ?>   
                    <li><a href="<?php echo $bub_mt['ap_pinterest'];?>" data-placement="top" data-toggle="tooltip" title="pinterest" target="_blank"><i class="mt-pinterest-2"></i></a></li>
                 <?php } ?> 
                 
                 <?php if(isset($bub_mt['ap_youtube']) && $bub_mt['ap_youtube'] != '') { ?>   
                    <li><a href="<?php echo $bub_mt['ap_youtube'];?>" data-placement="top" data-toggle="tooltip" title="youtube" target="_blank"><i class="mt-youtube"></i></a></li>          
                <?php } ?> 
            </ul>
        </div>
    </div>
    <?php if(isset($bub_mt['enable_googlemap']) && $bub_mt['enable_googlemap'] == 1) { ?>
    <div class="container-fluid">
        <div class="span4 contact">
              <p class="pinico"><img src="<?php echo get_template_directory_uri(); ?>/img/location1.png" alt="Pin Location"></p>
            <?php echo $bub_mt['c_address_box'];?>
        </div>
        <div id="gmap" class="gmap">                
        </div>
    </div>
    <?php } ?> 
    <div class="container">
        <div class="row">

        <?php if(isset($bub_mt['contact_address']) && $bub_mt['contact_address'] != '') { ?>                                
            <div class="span3 contact-info">
                        <div class="style-icon-1">
                            <i class="icon-map-marker"></i>
                        </div>
                        <div class="contact-text-info">
                            <span>Address:</span><?php echo $bub_mt['contact_address'];?>
                        </div>                
            </div>
         <?php } ?> 

        <?php if(isset($bub_mt['phone']) && $bub_mt['phone'] != '') { ?>           
            <div class="span3 contact-info">
                        <div class="style-icon-1">
                            <i class="icon-phone"></i>
                        </div>
                        <div class="contact-text-info">
                            <span>Phone:</span><?php echo $bub_mt['phone'];?>
                        </div>
            </div>
         <?php } ?> 

        <?php if(isset($bub_mt['fax_add']) && $bub_mt['fax_add'] != '') { ?>           
            <div class="span3 contact-info">
                        <div class="style-icon-1">
                            <i class="icon-print"></i>
                        </div>
                        <div class="contact-text-info">
                            <span>Fax:</span><?php echo $bub_mt['fax_add'];?>
                        </div>
            </div>
         <?php } ?> 

        <?php if(isset($bub_mt['email_add']) && $bub_mt['email_add'] != '') { ?>           
            <div class="span3 contact-info">
                        <div class="style-icon-1">
                            <i class="icon-envelope-alt"></i>
                        </div>
                        <div class="contact-text-info">
                            <span>Mail:</span><?php echo $bub_mt['email_add'];?>
                        </div>
            </div>
         <?php } ?>             
        </div>
    </div>
    <div class="container contact-box">
        <div class="span12">
            <h2>Sign Up For The Mailing List</h2>
            <form class="form" id="form" method="post" action="<?php echo get_template_directory_uri(); ?>/mail/contact.php">
                <input type="text" name="name" class="span3" placeholder="Name" required/>
                <input type="text" class="span4" name="email" placeholder="Email" required/>
                <textarea name="message" placeholder="Message" rows="8" class="span4"></textarea>
                <button type="submit"  class="btn btn-success btn-large"  id="submit">Submit</button>
            </form> 
                <span class="sending">
                    sending...
                </span>
                <div class="mess center">
                </div>                                                                          
        </div>
    </div>  
</section>
<!-- Contact end -->
<?php 
get_footer(); ?>