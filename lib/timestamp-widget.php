<?php
/**
 * Adds Sidebar_Widget widget.
 */
class Bace_Timestamp_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'bace_timestamp', // Base ID
			__( 'Bace Timestamp Widget', 'bace' ), // Name
			apply_filters('bace_timestamp_description', array( 'description' => __( 'Shows Widget for Timestamp', 'bace' ), ) ) // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args[ 'before_widget' ];
		if ( ! empty( $instance[ 'title' ] ) ) {
			echo $args[ 'before_title' ] . apply_filters( 'bace_timestamp_widget_title', $instance[ 'title' ] ). $args[ 'after_title' ];
		}

//		date_default_timezone_set("Asia/Bangkok");
//		$date = date( 'l, j F' );
//		$timestamp = date( 'H:i:s' );

//		echo '<span>' . $date . '</span>';
//		echo '<h4>' . $timestamp . '</h4>';
		get_template_part( 'timestamp' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Date and Time', 'powen-lite' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'bace' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}
// register timestamp widget in sidebar
if( ! function_exists( 'bace_register_timestamp_widget' ) ) :
	function bace_register_timestamp_widget() {
		register_widget( 'Bace_Timestamp_Widget' );
	}
endif;//bace_register_timestamp_widget
add_action( 'widgets_init', 'bace_register_timestamp_widget' );
