<?php
/**
 * Template Name: Home template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TJ_Recipe
 */

get_header(); ?>

<?php tj_recipe_featured_category(); ?>

<!-- ****** Blog Area Start ****** -->
<section class="blog_area section_padding_0_80">
		<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-8">
					 <div class="row">

						<?php

						//echo $a;
						if ( have_posts() ) :
							
							/* Start the Loop */
				      $count = 0;
							while ( have_posts() ) : the_post();

								 /*
								 * Include the Post-Format-specific template for the content.
								 */
				         if($count == 0):
				           get_template_part( 'template-parts/content', 'fullcol' );
				         else:
						       get_template_part( 'template-parts/content', get_post_format() );
				         endif;

				      $count++;
							endwhile; ?>
					</div>

			<?php get_template_part('loop','nav');

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
</div>
<?php get_sidebar();?>
		</div><!-- .container -->
	</div><!-- .row -->
</section><!-- section -->

<?php

get_footer();
