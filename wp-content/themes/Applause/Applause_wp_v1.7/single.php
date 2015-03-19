<?php
global $bub_mt;
get_header('mt');
?>
<section>
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <div class="header">
                        <h2><?php the_title(); ?></h2>
                    </div>   
                                                
                    <?php the_content(''); ?>

                    <div class="post-tags">Tags:  <?php $tag = get_the_tags(); if (! $tag) { ?> There is no tags<?php } else { ?><?php the_tags(''); ?><?php } ?></div>
            <?php endwhile; endif; ?>

            <?php comments_template( '', true ); ?>      
    </div>
</section>  
<?php get_footer();?>