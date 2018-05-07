<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TJ_Recipe
 */

get_header(); ?>

<?php get_template_part('breadcrumbs'); ?>
<!-- ****** Breadcumb Area End ****** -->


<!-- ****** Single Blog Area Start ****** -->
<section class="single_blog_area section_padding_80">
		<div class="container" <?php hybrid_attr( 'content' ); ?>>

				<div class="row justify-content-center">
					<?php
					while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'single' ); ?>
						<?php endwhile; ?>
					<?php get_sidebar(); ?>
				</div>
		</div>
</section>
<!-- ****** Single Blog Area End ****** -->

<?php
//get_sidebar();
get_footer();
