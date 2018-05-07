<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TJ_Recipe
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

 if ( post_password_required() ) {
 	return;
 }
 ?>

 <div id="comments" class="comments-area">

 	<?php // You can start editing here -- including this comment! ?>

 	<?php if ( have_comments() ) : ?>
 		<h2 class="comments-title">
 			<?php
 				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'tj-recipe' ),
 					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
 			?>
 		</h2>

 		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
 		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
 			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'tj-recipe' ); ?></h1>
 			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'tj-recipe' ) ); ?></div>
 			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'tj-recipe' ) ); ?></div>
 		</nav><!-- #comment-nav-above -->
 		<?php endif; // check for comment navigation ?>

 		<ol class="commentlist clearfix">
 			<?php wp_list_comments( array(
 				'callback' => 'tj_recipe_comment',
 				'style' => 'ol',
 			) ); ?>
 		</ol><!-- .comment-list -->

 		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
 		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
 			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'tj-recipe' ); ?></h1>
 			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'tj-recipe' ) ); ?></div>
 			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'tj-recipe' ) ); ?></div>
 		</nav><!-- #comment-nav-below -->
 		<?php endif; // check for comment navigation ?>

 	<?php endif; // have_comments() ?>

 	<?php
 		// If comments are closed and there are comments, let's leave a little note, shall we?
 		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
 	?>
 		<p class="no-comments"><?php _e( 'Comments are closed.', 'tj-recipe' ); ?></p>
 	<?php endif; ?>

 	<?php comment_form(
 		array(
 			'class_submit' => 'btn btn-success',
 			'comment_notes_after'  => false,
 			'comment_notes_before' => false,
 			'title_reply'          => __( 'Add Comment', 'tj-recipe' ),
 			'comment_field'        =>  '<div class="form-group comment-form-comment"><textarea class="form-control" id="comment" name="comment" cols="45" rows="6" aria-required="true">' . '</textarea></div>',
 		)
 	); ?>

 </div><!-- #comments -->
