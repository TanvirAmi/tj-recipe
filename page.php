<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop. ?>
			<?php get_sidebar(); ?>

				</div>
		</div>
</section>

<?php
get_footer();
