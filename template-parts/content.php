<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TJ_Recipe
 */

?>
<!-- Single Post -->
<?php
$delay = '0.' . $GLOBALS[ 'var' ] . 's';
$GLOBALS[ 'var' ] = $GLOBALS[ 'var' ] + 2;
?>
<article class="col-12 col-md-6" id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	<div class="single-post wow fadeInUp" data-wow-delay="<?php echo esc_attr( $delay ); ?>">
			<!-- Post Thumb -->
			<div class="post-thumb">
					<?php tj_recipe_post_thumbnail(); ?>
			</div>
			<!-- Post Content -->
			<div class="post-content">
				<?php tj_recipe_posted_on(); ?>
				<?php
        the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>');
        ?>
			</div>
	</div>
</article>
