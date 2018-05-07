<?php
/**
 * About widget.
 *
 * @package    TJ_Recipe
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2018, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class Tj_Recipe_About_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-tj-recipe-about',
			'description' => __( 'Display your profile info.', 'tj-recipe' )
		);

		// Create the widget.
		parent::__construct(
			'tj-recipe-about',                    // $this->id_base
			__( 'TJ Recipe - About', 'tj-recipe' ), // $this->name
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
    echo '<div class="single-widget-area about-me-widget text-center">';
		// If the title not empty, display it.
		if ( $instance['title'] ) {
			echo $before_title . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . $after_title;
		}

      echo '<div class="about-me-widget-thumb">';
			if ( $instance['gravatar'] ) {
				echo get_avatar( is_email( $instance['gravatar'] ), 200 );
			}
      echo '</div>';

      if ( $instance['name'] ) {
				echo '<h4 class="font-shadow-into-light">' . stripslashes( $instance['name'] ) . '</h4>';
			}

      if ( $instance['bio'] ) {
				echo '<p>' . stripslashes( $instance['bio'] ) . '</p>';
			}

		echo '</div>';

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
		$instance['gravatar'] = is_email( $new_instance['gravatar'] );
		$instance['bio']      = wp_filter_post_kses( $new_instance['bio'] );
    $instance['name']      = wp_filter_post_kses( $new_instance['name'] );


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
			'title'    => '',
			'gravatar' => get_option( 'admin_email' ),
			'bio'      => '',
      'name'     => ''
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
			<label for="<?php echo $this->get_field_id( 'gravatar' ); ?>">
				<?php _e( 'Gravatar Email:', 'biancaa' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'gravatar' ); ?>" name="<?php echo $this->get_field_name( 'gravatar' ); ?>" value="<?php echo is_email( $instance['gravatar'] ); ?>" />
		</p>

    <p>
      <label for="<?php echo $this->get_field_id( 'name' ); ?>">
        <?php _e( 'Name:', 'biancaa' ); ?>
      </label>
      <textarea class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" id="<?php echo $this->get_field_id( 'name' ); ?>"><?php echo stripslashes( $instance['name'] ); ?></textarea>
    </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bio' ); ?>">
				<?php _e( 'Biographical Info:', 'biancaa' ); ?>
			</label>
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'bio' ); ?>" id="<?php echo $this->get_field_id( 'bio' ); ?>" cols="30" rows="5"><?php echo stripslashes( $instance['bio'] ); ?></textarea>
		</p>

	<?php

	}

}

/**
 * Register the widget.
 *
 * @since  1.0.0
 */
function register_about_widget() {
	register_widget( 'Tj_Recipe_About_Widget' );
}
add_action( 'widgets_init', 'register_about_widget' );
