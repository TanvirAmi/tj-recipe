<?php
/**
 * Feedburner widget.
 *
 * @package    TJ_Recipe
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2018, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class Tj_Recipe_Feedburner_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-tj-recipe-feedburner subscribe-widget widget_newsletter',
			'description' => __( 'FeedBurner email subscription.', 'tj-recipe' )
		);

		// Create the widget.
		parent::__construct(
			'tj-recipe-feedburner',                  // $this->id_base
			__( '&raquo; Feedburner', 'tj-recipe' ), // $this->name
			$widget_options                          // $this->widget_options
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

		// If the title not empty, display it.
		if ( $instance['title'] ) {
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;
		}

		// Display the form.
		if ( $instance['feed_id'] ) { ?>
      <?php if ( $instance['before'] ) { ?>
        <p><?php echo stripslashes( $instance['before'] ); ?></p>
      <?php } ?>
      <div class="newsletter-form">
			<form class="form-subscribe" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo strip_tags( $instance['feed_id'] ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520'); return true">

				<input type="text" name="email" placeholder="<?php esc_attr_e( 'Enter your email', 'tj-recipe' ); ?>">
				<input type="hidden" value="<?php echo strip_tags( $instance['feed_id'] ); ?>" name="uri">
				<input type="hidden" value="<?php echo strip_tags( $instance['feed_id'] ); ?>" name="title">
				<input type="hidden" name="loc" value="en_US">
        <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
			</form>
    </div>
		<?php
		}

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

		$instance['title']   = strip_tags( $new_instance['title'] );
		$instance['before']  = stripslashes( $new_instance['before'] );
		$instance['feed_id'] = strip_tags( $new_instance['feed_id'] );

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
			'title'   => esc_html__( 'Get Updates', 'tj-recipe' ),
			'before'  => esc_html__( 'Subscribe our newsletter gor get notification about new updates, information discount, etc.', 'tj-recipe' ),
			'feed_id' => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title:', 'tj-recipe' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'before' ); ?>">
				<?php _e( 'HTML or Text before form:', 'tj-recipe' ); ?>
			</label>
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'before' ); ?>" id="<?php echo $this->get_field_id( 'before' ); ?>" cols="30" rows="6"><?php echo stripslashes( $instance['before'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'feed_id' ); ?>">
				<?php _e( 'Feedburner ID:', 'tj-recipe' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'feed_id' ); ?>" name="<?php echo $this->get_field_name( 'feed_id' ); ?>" value="<?php echo esc_attr( $instance['feed_id'] ); ?>" placeholder="<?php echo esc_attr( 'ThemeJunkie' ); ?>" />
		</p>

	<?php

	}

}

/**
 * Register the widget.
 *
 * @since  1.0.0
 */
function register_feed_burner_widget() {
	register_widget( 'Tj_Recipe_Feedburner_Widget' );
}
add_action( 'widgets_init', 'register_feed_burner_widget' );
