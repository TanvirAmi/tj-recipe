<!-- Single Post -->
<article class="col-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
    <div class="single-post wow fadeInUp" data-wow-delay=".2s">
        <!-- Post Thumb -->
        <div class="post-thumb">
            <?php tj_recipe_post_thumbnail(); ?>
        </div>
        <!-- Post Content -->
        <div class="post-content">
        <?php tj_recipe_posted_on(); ?>
        <?php
        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>');
        ?>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
        </div>
    </div>
</article>
