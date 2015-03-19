<?php
global $bub_mt;
?>
				<!-- News Section -->
					<div class="row">
						<?php
					global $post;
						$wp_query= null;
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$wp_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged ) );
			
		    if( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post();
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
		     ?>

			<article class="span4">

				<?php if ( has_post_thumbnail()) : ?>
					<?php  the_post_thumbnail('blog-posts'); ?>
				<?php endif; ?>
				<div class="info">
					<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
				</div>
					<ul class="meta">
						<li class="pull-left"><i class="icon-calendar"></i><a href="<?php the_permalink() ?>"><?php echo get_the_date('d M y'); ?></a></li>
						<li class="pull-right"><i class="icon-comment"></i>Comments:<a href="#"><?php comments_popup_link('0', '1', '%','comments-link','Comments are off for this post'); ?></a></li>
					</ul>
			</article>

						<?php endwhile; else : ?>
						   <p class="note">Sorry, no posts matched your criteria.</p>
						<?php endif; ?>


					<div class="row">



					</div>
					</div>

<?php 
		if(isset($bub_mt['blog_page_link']) && $bub_mt['blog_page_link'] != ''){
			echo '<p class="b-more"><a href="' . get_permalink($bub_mt['blog_page_link'][0]) . '" class="btn btn-success btn-large">More Blog post</a></p>
';}
?>

<style>
.b-more {
    text-align: center;
    width: 100%;
}

.b-more > a {
    color: #000000;
    font-weight: bold;
    text-decoration: none;
}
.b-more > a:hover{
    color: #000000;
    font-weight: bold;
	text-decoration: none;
}
</style>
				<!-- News Section -->		