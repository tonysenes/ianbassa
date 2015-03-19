<?php
global $bub_mt;
get_header('mt');
?>

    <!-- section -->
    <section id="<?php echo $post->post_name;?>" class="section mtcon">
    <div class="container">
 <div class="row">       
                        <?php if (!(have_posts())) { ?><div class="span12"><h2 class="colored">There is no posts</h2></div><?php }  ?>   
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                        ?>        
            <article class="span4">

                <?php if ( has_post_thumbnail()) : ?>
                    <?php  the_post_thumbnail('blog-posts'); ?>
                <?php endif; ?>
                <div class="info">
                    <h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php the_excerpt(); ?></p>
                </div>
                <hr/>
                    <ul class="meta">
                        <li class="pull-left"><i class="icon-calendar"></i><a href="<?php the_permalink() ?>"><?php echo get_the_date('d M y'); ?></a></li>
                        <li class="pull-right"><i class="icon-comment"></i>Comments:<a href="#"><?php comments_popup_link('0', '1', '%','comments-link','Comments are off for this post'); ?></a></li>
                    </ul>
            </article>
<?php endwhile; endif; ?>
<?php wp_link_pages(); ?>

    </div>
    <?php get_template_part ('inc/pagination'); ?>
</div>
 </section>        

<?php get_footer();?>