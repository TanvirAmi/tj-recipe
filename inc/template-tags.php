<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package 	 TJ_Recipe
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2018, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

 if ( ! function_exists( 'tj_recipe_site_branding' ) ) :
 /**
  * Site branding for the site.
  *
  * Display site title by default, but user can change it with their custom logo.
  * They can upload it on Customizer panel(Appearance>Customizer).
  *
  * @since  1.0.0
  */
 function tj_recipe_site_branding() {

 	// Get the customizer data.
 	$logo_id  = get_theme_mod( 'logo' );
 	$logo_url = wp_get_attachment_image_src( $logo_id , 'full' );

 	// Check if logo available, then display it.
 	if ( $logo_id ) :
 		echo '<div class="logo-area text-center" itemscope itemtype="http://schema.org/Brand">'. "\n";
 				echo '<a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home">' . "\n";
 					echo '<img src="' . esc_url( $logo_url[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
 				echo '</a>' . "\n";
 		echo '</div>' . "\n";

 	// If not, then display the Site Title and Site Description.
 	else :
 		echo '<div class="logo-area text-center" itemscope itemtype="http://schema.org/Brand">'. "\n";
 			echo '<h1 class="site-title" ' . hybrid_get_attr( 'site-title' ) . '><a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>'. "\n";
 		echo '</div>'. "\n";
 	endif;

 }
 endif;


if ( ! function_exists( 'tj_recipe_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
   * @since 1.0.0
	 */
	function tj_recipe_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s" ' . hybrid_get_attr( 'entry-published' ) . '>%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s" ' . hybrid_get_attr( 'entry-published' ) . '>%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'tj-recipe' ),
			$time_string
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'tj-recipe' ),
			'<span class="author vcard" ' . hybrid_get_attr( 'entry-author' ) . '><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		?>
		<div class="post-meta d-flex">
				<div class="post-author-date-area d-flex">
						<!-- Post Author -->
						<div class="post-author">
								<?php echo $byline; ?>
						</div>
						<!-- Post Date -->
						<div class="post-date">
								<?php echo $posted_on; ?>
						</div>
				</div>

				<div class="post-comment-share-area d-flex">
					<!-- Post Comments -->
					<div class="post-comments">
							<i class="fa fa-comment-o" aria-hidden="true"></i>
							<?php comments_popup_link( __( '0', 'tj-recipe' ), __( '1', 'tj-recipe' ), __( '%', 'tj-recipe' ) ); ?>
					</div>
				</div>
		</div>
		<?php
	}
endif;


if ( ! function_exists( 'tj_recipe_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 * @since 1.0.0
 */
function tj_recipe_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
  // Thumbnail not clickable
	?>
	<div class="post-thumbnail" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    <?php
			the_post_thumbnail( 'tj-recipe-thumb', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		?>
	</div><!-- .post-thumbnail -->

	<?php else :
  // Thumbnail clickable as link
  ?>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" itemscope itemtype="https://schema.org/ImageObject">
		<?php
			the_post_thumbnail( 'tj-recipe-thumb', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		?>
	</a>

	<?php endif; // End is_singular().
}
endif;

if (! function_exists('header_search') ):
/**
* Search input in header.
*
* @since 1.0.0
*/
function header_search(){?>
			<div class="search-area d-flex align-items-center justify-content-end">
					<!-- Search Button -->
					<div class="search_button">
							<a class="searchBtn" href="#"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a>
					</div>
					<!-- Search Form -->
					<div class="search-hidden-form">
							<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
                <input type="search" name="s" id="s" placeholder="<?php echo esc_attr_x('Search Anything..', 'placeholder', 'tj-recipe'); ?>"
                value="<?php echo get_search_query(); ?>" title="<?php esc_attr_x('Search for:', 'label', 'tj-recipe') ?>">
									<span class="searchBtn" id="search"><i class="fa fa-times" aria-hidden="true"></i></span>
							</form>
					</div>
			</div>
<?php
}
endif;

if ( ! function_exists('tj_recipe_tag_list') ):
/**
*	Fetch list of all tags
* @return array
*
* @since 1.0.0
*/
function tj_recipe_tag_list(){
	// Set up an empty array
	$tags = array();
	// Retrive available tags
	$tag_list = get_tags();
	// Set up default/empty tag
	$tags[''] = esc_html__('Select a tag &hellipl', 'tj-recipe');
	// Display the tags
	foreach ($tag_list as $tag) {
		# code...
		$tags[$tag->term_id] = esc_attr($tag->name);
	}
	return $tags;
}
endif;

if ( ! function_exists('tj_recipe_cat_list') ):
/**
*	Fetch list of all categories
* @return array
*
* @since 1.0.0
*/
function tj_recipe_cat_list(){
	// Set up an empty array
	$cats = array();
	// Retrive available categories
	$cat_list = get_categories();
	// Set up default/empty category
	$cats[''] = esc_html__('Select a category &hellipl', 'tj-recipe');
	// Display the cats
	foreach ($cat_list as $cat) {
		# code...
		$cats[$cat->term_id] = esc_attr($cat->name);
	}
	return $cats;
}
endif;


if ( ! function_exists('tj_recipe_featured_category')):
/**
* Three columns home featured category with thumbnail.
*
* Categories are selected form customizer panel.
* @since 1.0.0
*/
function tj_recipe_featured_category(){?>
	<!-- Featured Category Area start -->
	<section class="categories_area clearfix" id="about">
		<div class="container">
				<div class="row">
					<?php
					$enable = get_theme_mod('featured-cat-enable');
						if ( !$enable ) {
									return;
						} ?>
            <!-- First column start -->
						<div class="col-12 col-md-6 col-lg-4">
								<div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
									<?php
									$dummy_image = 'https://dummyimage.com/350x254/ffffff/e33b3b&text=350x254';
									$cat_image = get_theme_mod('first-cat-thumbnail');
									$image_url = esc_url(wp_get_attachment_url($cat_image));
									$cat = get_theme_mod('featured-category-1');
									$cat_link = get_category_link($cat);
									$cat_title = get_cat_name($cat);
									if($cat_image):
										echo '<img src="' . esc_url( $image_url ) . '" alt="'. $cat_title .'">';
									else:
										echo '<img src="'. esc_url( $dummy_image ) .'" alt="'. $cat_title .'">';
									endif;
									?>
										<div class="catagory-title">
												<a href="<?php echo $cat_link; ?>">
														<h5> <?php echo $cat_title; ?> </h5>
												</a>
										</div>
								</div>
						</div>
            <!-- Second column start -->
						<div class="col-12 col-md-6 col-lg-4">
								<div class="single_catagory wow fadeInUp" data-wow-delay=".6s">
									<?php
									$dummy_image = 'https://dummyimage.com/350x254/ffffff/e33b3b&text=350x254';
									$cat_image = get_theme_mod('second-cat-thumbnail');
									$image_url = esc_url(wp_get_attachment_url($cat_image));
									$cat = get_theme_mod('featured-category-2');
									$cat_link = get_category_link($cat);
									$cat_title = get_cat_name($cat);
									if($cat_image):
										echo '<img src="' . esc_url( $image_url ) . '" alt="'. $cat_title .'">';
									else:
										echo '<img src="'. esc_url( $dummy_image ) .'" alt="'. $cat_title .'">';
									endif;
									?>
										<div class="catagory-title">
												<a href="<?php echo $cat_link; ?>">
														<h5> <?php echo $cat_title; ?> </h5>
												</a>
										</div>
									</div>
						</div>
            <!-- Third column Start -->
						<div class="col-12 col-md-6 col-lg-4">
								<div class="single_catagory wow fadeInUp" data-wow-delay=".9s">
									<?php
									$dummy_image = 'https://dummyimage.com/350x254/ffffff/e33b3b&text=350x254';
									$cat_image = get_theme_mod('third-cat-thumbnail');
									$image_url = esc_url(wp_get_attachment_url($cat_image));
									$cat = get_theme_mod('featured-category-3');
									$cat_link = get_category_link($cat);
									$cat_title = get_cat_name($cat);
									if($cat_image):
										echo '<img src="' . esc_url( $image_url ) . '" alt="'. $cat_title .'">';
									else:
										echo '<img src="'. esc_url( $dummy_image ) .'" alt="'. $cat_title .'">';
									endif;
									?>
										<div class="catagory-title">
												<a href="<?php echo $cat_link; ?>">
														<h5><?php echo $cat_title; ?></h5>
												</a>
										</div>
								</div>
						</div>
				</div>
		</div>
	</section>
	<!-- Featured Categories Area End -->
<?php
}
endif;

if ( ! function_exists( 'tj_recipe_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since  1.0.0
 */
function tj_recipe_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<p <?php hybrid_attr( 'comment-content' ); ?>><?php _e( 'Pingback:', 'tj-recipe' ); ?>
      <span <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php comment_author_link(); ?>
      <?php edit_comment_link( __( '(Edit)', 'tj-recipe' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<?php echo get_avatar( $comment, 60 ); ?>

			<div class="comment-des">

				<div class="comment-by">
					<p class="author" <?php hybrid_attr( 'comment-author' ); ?>>
            <strong itemprop="name"><?php echo get_comment_author_link(); ?></strong></p>
					<?php
						printf( '<p class="date"><a href="%1$s"><time datetime="%2$s" ' . hybrid_get_attr( 'comment-published' ) . '>%3$s</time></a></p>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'tj-recipe' ), get_comment_date(), get_comment_time() )
						);
					?>
					<span class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'tj-recipe' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</span><!-- .reply -->
				</div><!-- .comment-by -->

				<section class="comment-content comment" <?php hybrid_attr( 'comment-content' ); ?>>
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tj-recipe' ); ?></p>
					<?php endif; ?>
					<?php comment_text(); ?>
					<?php edit_comment_link( __( 'Edit', 'tj-recipe' ), '<p class="edit-link">', '</p>' ); ?>
				</section><!-- .comment-content -->

			</div><!-- .comment-des -->

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


if ( ! function_exists( 'tj_recipe_post_author' ) ) :
/**
 * Author post informations.
 *
 * @since  1.0.0
 */
function tj_recipe_post_author() {
	// stop the execution if not on the single post.
	if ( ! is_single() ) {
		return;
	}
	// stop the execution if user hasn't fill the Biographical Info field.
	if ( ! get_the_author_meta( 'description' ) ) {
		return;
	}
?>
	<section class="author-box" <?php hybrid_attr( 'entry-author' ) ?>>
		<?php echo get_avatar( is_email( get_the_author_meta( 'user_email' ) ), 72 ); ?>
		<p class="author-title">
			<a class="author-name url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo strip_tags( get_the_author() ); ?></a>
		</p>
		<p><?php echo stripslashes( get_the_author_meta( 'description' ) ); ?></p>
	</section><!-- .author-box -->
<?php
}
endif;


if ( ! function_exists( 'tj_recipe_header_social' ) ) :
/**
* Social icons in header.
*
* @since 1.0.0
*/
function tj_recipe_header_social($position = 'header'){

  // Get the customizer data.
  $fb = get_theme_mod('facebook');
  $tw = get_theme_mod('twitter');
  $ln = get_theme_mod('linkedin');
  $pn = get_theme_mod('pinterest');
  $in = get_theme_mod('instagram');

  // Display the data if any of the variable get the data(URL)
  if($fb || $tw || $ln || $pn || $in){
    echo '<div class="' .$position. '-social">';
        if($fb){
          echo '<a href="' . esc_url($fb) . '"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
        }

        if($tw){
          echo '<a href="' . esc_url($tw) . '"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
        }

        if($ln){
          echo '<a href="' . esc_url($ln) . '"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
        }

        if($pn){
          echo '<a href="' . esc_url($pn) . '"><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
        }

        if($in){
          echo '<a href="' . esc_url($in) . '"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
        }

    echo '</div>';
  }
}
endif;


if ( ! function_exists( 'tj_recipe_footer_social' ) ) :
/**
* Social icons in footer.
*
* @since 1.0.0
*/
function tj_recipe_footer_social(){
  $option = get_theme_mod('footer-social-enable');
  // Check option(on/off).
  if($option === 0):
    echo '<div class="container">';
    echo '<div id="empty-footer">';
    echo '</div>';
    echo '</div>';
    return;
  endif;
  // Get the customizer data.
  $fb = get_theme_mod('footer-facebook');
  $tw = get_theme_mod('footer-twitter');
  $gp = get_theme_mod('footer-google-plus');
  $pn = get_theme_mod('footer-pinterest');
  $in = get_theme_mod('footer-instagram');
  $vm = get_theme_mod('footer-vimeo');
  $yt = get_theme_mod('footer-youtube');

  echo '<div class="social_icon_area clearfix">';
  		echo '<div class="container">';
  				echo '<div class="row">';
  						echo '<div class="col-12">';
  								echo '<div class="footer-social-area d-flex">';
  										echo '<div class="single-icon">';
  												echo '<a href="' . esc_url($fb) . '"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a>';
  										echo '</div>';
  										echo '<div class="single-icon">';
  												echo '<a href="' . esc_url($tw) . '"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>';
  										echo '</div>';
  										echo '<div class="single-icon">';
  												echo '<a href="' . esc_url($gp) . '"><i class="fa fa-google-plus" aria-hidden="true"></i><span>GOOGLE+</span></a>';
  										echo '</div>';
  										echo '<div class="single-icon">';
  												echo '<a href="' . esc_url($pn) . '"><i class="fa fa-pinterest-square" aria-hidden="true"></i><span>Pinterest</span></a>';
  										echo '</div>';
  										echo '<div class="single-icon">';
  												echo '<a href="' . esc_url($in) . '"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>';
  										echo '</div>';
  										echo '<div class="single-icon">';
  												echo '<a href="' . esc_url($vm) . '"><i class="fa fa-vimeo" aria-hidden="true"></i><span>VIMEO</span></a>';
  										echo '</div>';
  										echo '<div class="single-icon">';
  												echo '<a href="' . esc_url($yt) . '"><i class="fa fa-youtube-play" aria-hidden="true"></i><span>YOUTUBE</span></a>';
  										echo '</div>';
  								echo '</div>';
  						echo '</div>';
  				echo '</div>';
  		echo '</div>';
  echo '</div>';
}
endif;

if ( ! function_exists( 'footer_copyright' ) ) :
/**
* Footer copyright section.
*
* @since 1.0.0
*/
function footer_copyright(){
  // Get the customizer data.
  $footer_text = get_theme_mod('footer-text');
  ?>
  <div class="container">
      <div class="row">
          <div class="col-12">
              <!-- Copywrite Text -->
              <div class="copy_right_text text-center">
                  <p><?php echo stripslashes($footer_text); ?></p>
              </div>
          </div>
      </div>
  </div>
<?php
}
endif;

if ( ! function_exists( 'footer_menu' ) ) :
/**
* Footer menu section.
*
* @since 1.0.0
*/
function footer_menu(){?>
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="footer-content">
                  <!-- Logo Area Start -->
                  <?php tj_recipe_site_branding(); ?>
                  <!-- Menu Area Start -->
                  <nav class="navbar navbar-expand-lg">
                      <!-- Menu Area Start -->
                      <div class="collapse navbar-collapse justify-content-center">
                        <?php wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'container'         => '',
                            'fallback_cb'       => '',
                            'menu_class' => 'navbar-nav',
                            ));
                        ?>
                      </div>
                  </nav>
              </div>
          </div>
      </div>
  </div>
<?php
}
endif;
