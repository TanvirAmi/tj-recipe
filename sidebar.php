<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TJ_Recipe
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!-- ****** Blog Sidebar ****** -->
<div class="col-12 col-sm-8 col-md-6 col-lg-4">
		<div class="blog-sidebar mt-5 mt-lg-0">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
</div>
