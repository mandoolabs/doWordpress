<?php
/**
 * @author Mandoo Team
 * 
 */

class Mandoo_Widget extends WP_Widget {
	private $mandoo_plugin;
	
	/**
	 * @author Mandoo Team
	 * 
	 */
	public function Mandoo_Widget () {
		$widget_options = array('classname' => 'mandoo_widget', 'description' => __( "Displays a form from your Mandoo™ doForms account.", 'mandoo-plugin'));
		$this->WP_Widget('mandoo_widget', __('Mandoo™ Widget'), $widget_options);
		$this->mandoo_plugin = Mandoo_Plugin::get_instance();
	}
	
	/**
	 * @author Mandoo Team
	 * 
	 */
	
	public function form ($instance) {
		$doAPI = $this->mandoo_plugin->get_doAPI();
		
		if ($doAPI != false) {
	
			$forms = $doAPI->doForms_GetFormsPublicId();
			
			$result = explode("|",$forms);
			
			if ($result[0] != "E:501") {
				
				$forms = new SimpleXMLElement($forms);
			
				extract($instance);
				?>
						<p>
							<label for="<?php echo $this->get_field_id('form_id'); ?>"><?php echo __('Select a form :', 'mandoo-plugin'); ?></label>
							<select class="widefat" id="<?php echo $this->get_field_id('form_id');?>" name="<?php echo $this->get_field_name('form_id'); ?>">
							<?php	
							foreach ($forms->node as $node) {
								$selected = (isset($form_id) && $form_id == $node->publicId) ? ' selected="selected" ' : '';
								?>	
								<option <?php echo $selected; ?>value="<?php echo $node->publicId; ?>"><?php echo $node->name; ?></option>
								<?php
							}
							?>
							</select>
						</p>
				<?php
			}
		}
	}
	
	/**
	 * @author Mandoo Team
	 * 
	 */
	
	public function update ($new_instance, $old_instance) {
		
		$instance = $old_instance;
		
		$instance['form_id'] = esc_attr($new_instance['form_id']);
		
		return $instance;
		
	}
	
	/**
	 * @author Mandoo Team
	 * 
	 */
	
	public function widget ($args, $instance) {
		
		extract($args);
		
		$form_id = $this->get_form_id($this->number);
		
		if ($form_id == '0') {
			return 0;
		} else {
			echo '<!-- BEGIN Mando Wordpress Widget http://www.mandoocms.com -->';
			echo $before_widget . $before_title; 
			echo '<script type="text/javascript" src="https://api.mandoocms.com/forms/' . $form_id . '.js"></script>';
			echo $after_widget;
			echo '<!-- END Mandoo Wordpress Widget -->';
		}
	}
	
	/**
	 * @author Mandoo Team
	 * 
	 */
	
	private function get_form_id ($number = null) {
		
		$options = get_option($this->option_name);
		
		return $options[$number]['form_id'];
		
	}
}

?>
