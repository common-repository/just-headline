<?php


/**
 * JPP_Widget_Post_Preview widget class
 * 
 * Show post preview with different layouts with post link
 * 
 */
class JHL_Widget_Headline extends WP_Widget
{
	/**
	 * JHL_Widget_Headline constructor.
	 * Call WP_Widget contructor to register widget
	 */
	public function __construct()
	{
		parent::__construct(
				'jhl_headline',  // Base ID
				__('Just Headline'),	// Title
				array( 'description' => __( "Single heading html element") )
			);
	}

	/**
	 * Renders widget content on frontend
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance)
	{
		// apply defaults
		$instance = array_merge(array(
			'title' => '',
			'tag' => 'h3',
			'style' => 'default',
		), $instance);

		// print start widget
		echo $args['before_widget'];
		
		// print widget
		$title = apply_filters('jhl_title', $instance['title']);
		$attributes = $this->get_styles_attributes();
		
		echo strtr('<{tag} {attributes}>{title}</{tag}>', array(
			'{tag}' => $instance['tag'],
			'{title}' => esc_html($title),
			'{attributes}' => isset($attributes[ $instance['style'] ])? $attributes[ $instance['style'] ] : '',
		));
		
		// print end widget
		echo $args['after_widget'];
	}

	/**
	 * Renders widget edit form
	 *
	 * @param array $instance
	 * @return void
	 */
	public function form( $instance )
	{
		$title	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$tag	= isset( $instance['tag'] ) ? $instance['tag'] : '';
		$style  = isset( $instance['style'] ) ? $instance['style'] : 'default';
?>
	<div class="jhl_form_controls">
		<p>
			<label for="<?php echo $this->get_field_id( 'tag' ); ?>"><?php _e( 'Heading size:' ); ?></label>
			<select required class="widefat" id="<?php echo $this->get_field_id( 'tag' ); ?>" name="<?php echo $this->get_field_name( 'tag' ); ?>">
				<?php $this->html_options( $this->get_tags_list(), $tag ); ?>
			</select>
			<small>* Heading 1 is the biggest one.</small>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Heading text:' ); ?></label>
			<input required class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Heading style:' ); ?></label>
			<select required class="widefat" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
				<?php $this->html_options( $this->get_styles_list(), $style ); ?>
			</select>
		</p>
	</div>
<?php
	}

	/**
	 * Prepare widget settings before saving them to DB
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['tag'] = strip_tags($new_instance['tag']);
		$instance['style'] = strip_tags($new_instance['style']);
		
		return $instance;
	}

	/**
	 * Helper function to print <option> tags for select
	 *
	 * @param array $options
	 * @param string $selected
	 * @return string
	 */
	protected function html_options( $options, $selected )
	{
		if( !is_array($options) ) return '';
		foreach( $options as $value => $label) {
			print strtr('<option value="{value}" {selected}>{label}</option>', array(
				'{value}' => esc_attr($value),
				'{selected}' => selected($selected, $value, false),
				'{label}' => esc_html($label),
			));
		}
	}

	/**
	 * Tags options to use inside widget settings form
	 *
	 * @return array|mixed|void
	 */
	protected function get_tags_list()
	{
		$tags = array(
			'h1' => 'Heading 1',
			'h2' => 'Heading 2',
			'h3' => 'Heading 3',
			'h4' => 'Heading 4',
			'h5' => 'Heading 5',
			'h6' => 'Heading 6',
		);
		
		$tags = apply_filters('jhl_tags_list', $tags);
		return $tags;
	}

	/**
	 * Style options to use inside widget settings form
	 *
	 * @return array|mixed|void
	 */
	protected function get_styles_list()
	{
		$styles = array(
			'default' => 'Default',
			'primary' => 'Primary',
			'info' => 'Info',
			'success' => 'Success',
			'warning' => 'Warning',
			'danger' => 'Danger',
		);

		$styles = apply_filters('jhl_styles_list', $styles);
		return $styles;
	}

	/**
	 * Style tag attributes to be used in render method
	 *
	 * @return array|mixed|void
	 */
	protected function get_styles_attributes()
	{
		$atts = array(
			'default' 	=> 'class="jhl_heading"',
			'primary' 	=> 'class="jhl_heading jhl-primary"',
			'info'		=> 'class="jhl_heading jhl-info"',
			'success' 	=> 'class="jhl_heading jhl-success"',
			'warning' 	=> 'class="jhl_heading jhl-warning"',
			'danger' 	=> 'class="jhl_heading jhl-danger"',
		);
		$atts = apply_filters('jhl_styles_attributes', $atts);
		return $atts;
	}
}
