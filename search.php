<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TJ_Recipe
 */

get_header(); ?>

<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area">
	<div class="container h-100">
			<div class="row h-100 align-items-center">
					<div class="col-12">
							<div class="bradcumb-title text-center">
								<h1 class="section-title">
									<?php printf( __( 'Search Results for: %s', 'tj-recipe' ), '<span>' . get_search_query() . '</span>' ); ?>
								</h1>
							</div>
					</div>
			</div>
	</div>
</div>

<!-- ****** Blog Area Start ****** -->
<section class="section_padding_50_20">
		<div class="container">
				<div class="row justify-content-center">
						<div class="col-12 col-lg-8">
								<div class="row">


				<?php
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

	</div><!-- .col-12 col-lg-8 -->
<?php get_sidebar(); ?>
			</div><!-- .container -->
	 </div><!-- .row -->
</section><!-- section -->
<?php get_footer(); ?>
