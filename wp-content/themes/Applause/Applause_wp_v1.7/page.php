<?php
global $bub_mt;
get_header('mt');
?>

<?php while ( have_posts() ) : the_post(); ?>
   <style>
        #<?php echo $post->post_name;?>{
        
            <?php if( get_post_meta( $post->ID, '_cmb_p_back_image', true ) ) : ?> 
                background-image:url('<?php echo get_post_meta( $post->ID, 'p_back_image', true ); ?>');        
            <?php endif; ?> 
            <?php if( get_post_meta( $post->ID, '_cmb_p_bg_colorpicker', true ) ) : ?> 
                background-color: <?php echo get_post_meta( $post->ID, 'p_bg_colorpicker', true ); ?>;       
            <?php endif; ?> 
            <?php if( get_post_meta( $post->ID, '_cmb_p_bg_colorpicker', true ) ) : ?> 
                color: <?php echo get_post_meta( $post->ID, 'p_bg_colorpicker', true ); ?>;       
            <?php endif; ?>             
            background-attachment: fixed;
            background-position: center top;
            background-repeat: no-repeat;
            background-size: cover;   
            <?php if( get_post_meta( $post->ID, 'p_text_colorpicker', true ) ) : ?> 
                color: <?php echo get_post_meta( $post->ID, 'p_text_colorpicker', true ); ?>;       
            <?php endif; ?>                 
        }        
    </style>
    <!-- section -->
    <section id="<?php echo $post->post_name;?>" class="section mtcon">
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
<?php endwhile; // end of the loop. ?>	

<?php get_footer();?>