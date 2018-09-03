<?php

/**
 * Adds Sidebar_Widget widget.
 */
class Bace_News_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'news', // Base ID
			__( 'Bace News Widget', 'bace' ), // Name
			apply_filters( 'news_description', array( 'description' => __( 'Shows Widget for News', 'bace' ), ) ) // Args
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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'news_widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>

		<div id="news-slider" class="news-slider">
			<div id="news-slick-slider">
				<?php get_template_part( 'template-parts/widget', 'news' ); ?>
			</div>
			<div class="news-slider__footer" style="display:flex; justify-content: space-between;" >
				<div class="news-slider-actions">
					<button id="prev-news"> < </button>
					<button id="next-news"> > </button>
				</div>
				<a href="<?php echo esc_url( get_category_link( 'news' ) ); ?>"><?php _e( 'More News', 'bace' ); ?></a>
			</div>
		</div>

		<?php

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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'News', 'bace' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'bace' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
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
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}

// register news widget in sidebar
if ( ! function_exists( 'bace_register_news_widget' ) ) :
	function bace_register_news_widget() {
		register_widget( 'Bace_News_Widget' );
	}
endif;//bace_register_news_widget
add_action( 'widgets_init', 'bace_register_news_widget' );
