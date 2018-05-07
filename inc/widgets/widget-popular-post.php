<?php
/**
 * Popular post widget.
 *
 * @package    TJ_Recipe
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2018, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class Tj_Recipe_Popular_Post_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-tj-recipe-popular-post',
			'description' => __( 'Display your popular post.', 'tj-recipe' )
		);

		// Create the widget.
		parent::__construct(
			'tj-recipe-popular-post',                    // $this->id_base
			__( 'TJ Recipe - Popular Post', 'tj-recipe' ), // $this->name
			$widget_options                     // $this->widget_options
		);
	}

  /**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo $before_widget;

    if ( $instance['title'] ) {
			echo $before_title . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . $after_title;
		}
		?>

		<div class="tabs-container">
			<div class="tab-content" id="tab1">
				<?php echo tj_recipe_popular_posts( (int) $instance['popular_num'] ); ?>
			</div>

		<?php
		// Close the theme's widget wrapper.
		echo $after_widget;

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;

    $instance['title']    = strip_tags( $new_instance['title'] );
		$instance['popular_num']  = absint( $new_instance['popular_num'] );

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
      'title'   => '',
			'popular_num'  => 5
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">
        <?php _e( 'Title:', 'biancaa' ); ?>
      </label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
    </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'popular_num' ); ?>">
				<?php _e( 'Number of Popular Posts', 'freshlife' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'popular_num' ); ?>" name="<?php echo $this->get_field_name( 'popular_num' ); ?>" value="<?php echo absint( $instance['popular_num'] ); ?>" />
		</p>
	<?php

	}

}

/**
 * Popular Posts by comment
 *
 * @since 1.0.0
 */
function tj_recipe_popular_posts( $number = 5 ) {

	// Posts query arguments.
	$args = array(
		'posts_per_page' => $number,
		'orderby'        => 'comment_count',
		'post_type'      => 'post'
	);

	// The post query
	$popular = get_posts( $args );

	global $post;

	if ( $popular ) {
		$html = '<div class="single-widget-area popular-post-widget">';

			foreach ( $popular as $post ) :
				setup_postdata( $post );

        $html .= '<div class="single-populer-post d-flex">';
          $html .=  get_the_post_thumbnail( $post->ID, 'tj-recipe-thumb', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title( $post->ID ) ) ) );
            $html .= '<div class="post-content">';
                $html .= '<a href="' . esc_url( get_permalink( $post->ID ) ) . '">';
                  $html .=  '<h6>'. esc_attr( get_the_title( $post->ID ) ) .'</h6>';
                $html .= '</a>';
                $html .= '<p>' . get_the_date() . '</p>';
            $html .= '</div>';
        $html .= '</div>';

			endforeach;

		$html .= '</div>';
	}

	// Reset the query.
	wp_reset_postdata();

	if ( isset( $html ) ) {
		return $html;
	}

}

/**
 * Register the widget.
 *
 * @since  1.0.0
 */
function register_popular_post_widget() {
	register_widget( 'Tj_Recipe_Popular_Post_Widget' );
}
add_action( 'widgets_init', 'register_popular_post_widget' );
