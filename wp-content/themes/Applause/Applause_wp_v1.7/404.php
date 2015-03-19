<?php
get_header('mt');
?>
		<section class="section error">
			<div class="container">
				<h1><?php _e('404 <i class="icon-frown"></i>','applause'); ?></h1>
				<h2><?php _e('Opps! Something went wrong...','applause'); ?></h2>
				<h3><?php _e('Page not found. Please continue to our','applause'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home page</a></h3>
			</div>
		</section>

<?php get_footer();?>