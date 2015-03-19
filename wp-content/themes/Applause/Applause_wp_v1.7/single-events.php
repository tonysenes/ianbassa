<?php
global $bub_mt;
get_header('mt');
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section>
	<div class="container">
        <div class="header">
            <h2><?php the_title(); ?></h2>
        </div>			
    </div>	
	<div class="container-fluid">
		<div class="span7 eblock-single">			
				<div class="span3 einfo">
					<i class="icon-map-marker"><span><b>Location:</b>  <?php echo get_post_meta( $post->ID, 'e_location', true ); ?></span></i>
						<br />
					<i class="icon-home"><span><b>Venue:</b> <?php echo get_post_meta( $post->ID, 'e_venue', true ); ?></span></i><br />
					<i class="icon-time"><span><b>Time:</b>  <?php echo get_post_meta( $post->ID, 'e_start_time', true ); ?>-<?php echo get_post_meta( $post->ID, 'e_end_time', true ); ?></span></i><br />
					<i class="icon-money"><span><b>Price:</b>   <?php echo get_post_meta( $post->ID, 'e_price', true ); ?></span></i><br />
					<i class="icon-ticket"><span><b>Status:</b> <?php echo get_post_meta( $post->ID, 'e_ticket_status', true ); ?></span></i>
						<div class="date">
							<span class="day"><?php echo get_post_meta( $post->ID, 'e_date', true ); ?> <?php echo get_post_meta( $post->ID, 'e_month', true ); ?> <?php echo get_post_meta( $post->ID, 'e_year', true ); ?></span>
							<span class="week"><?php echo get_post_meta( $post->ID, 'e_day', true ); ?></span>
						</div>
					<?php if( get_post_meta( $post->ID, 'e_buy_url', true ) ) : ?>	
						<a href="<?php echo get_post_meta( $post->ID, 'e_buy_url', true ); ?>"><div class="btn"><i class="icon-shopping-cart"><span>Buy Ticket</span></i></div></a>
                	<?php endif; ?>	
                	<!-- event share -->							
				</div>
				<div class="span3 einfo">
					<?php if( get_post_meta( $post->ID, 'e_details', true ) ) : ?>	
						<?php echo get_post_meta( $post->ID, 'e_details', true ); ?>
                	<?php endif; ?>						
				</div>
		</div>

		<div id="emap" class="emap">				
		</div>

		<script>
			<?php if( get_post_meta( $post->ID, 'e_emap', true ) ) : ?>	
				jQuery( document ).ready( function( $ ) {
						    // Event Google Maps
						      $('#emap').gmap3({
						        marker:{address:"<?php echo get_post_meta( $post->ID, 'e_emap', true ); ?>", options:{icon: "<?php echo get_template_directory_uri(); ?>/img/location1.png"}},
						        map:{
						            options:{
						              zoom: 14
						            }
						           }
						      });
					   
					   });
			<?php endif; ?>	
		</script>
	</div>

</section>
            <?php endwhile;  ?>
	 		<?php endif; ?>

<?php get_footer();?>	