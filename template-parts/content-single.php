<div class="col-12 col-lg-8" id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
    <div class="row no-gutters">


        <!-- Single Post -->
        <div class="col-12 col-sm-12">

            <div class="single-post">
              <?php the_title('<h1 class="entry-title">','</h1>'); ?>
              <?php tj_recipe_posted_on(); ?>
                <!-- Post Thumb -->
              <?php tj_recipe_post_thumbnail(); ?>
                <!-- Post Content -->
                <div class="post-content">


                    <?php the_content(); ?>


              </div>
          </div>

            <!-- Tags Area -->
            <div class="tags-area">
              <?php
          			$tags_list = get_the_tag_list();
          			if ( $tags_list ) :
          		?>
          			<span class="tags-links">
          				<?php printf( __( '<i class="fa fa-tags"></i> %1$s', 'tj-recipe' ), $tags_list ); ?>
          			</span>
          		<?php endif; // End if $tags_list ?>
            </div>

            <?php tj_recipe_post_author(); ?>

            <?php get_template_part( 'loop', 'nav' ); // Loads the loop-nav.php template

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
            ?>

        </div>
    </div>
</div>
