<?php

/**
 *
 */

class Mandoo_Page_Form {
	private $options;
	private static $instance;
	private static $mandoo_plugin;
	private static $name = 'Mandoo_Page_Form';
	private static $prefix = 'mandoo_page_form';
	private static $public_option = 'no';
	private static $textdomain = 'mandoo-page-form';
	private function __construct () {
		self::load_text_domain();
		self::$mandoo_plugin = Mandoo_Plugin::get_instance();
		register_activation_hook(__FILE__, array(&$this, 'set_up_options'));
		 // Set up the settings.
		add_action('admin_init', array(&$this, 'register_settings'));
		 // Set up the administration page.
		add_action('admin_menu', array(&$this, 'set_up_admin_page'));
		 // Fetch the options, and, if they haven't been set up yet, display a notice to the user.
		add_shortcode( 'mandoo_doForms_page_form', array(&$this, 'mandoo_page_form_display' ));
		$this->get_options();
	}

	public static function get_instance () {
		if (empty(self::$instance)) {
			self::$instance = new self::$name;
		}
		return self::$instance;
	}
	
	public function admin_page () {
		global $blog_id;	
		$page_forms_id = (is_array($this->options)) ? $this->options['page-forms-id'] : '';
		if (isset($_POST[self::$prefix . '_nonce'])) {
			$nonce = $_POST[self::$prefix . '_nonce'];
			$nonce_key = self::$prefix . '_update_options';
			if (! wp_verify_nonce($nonce, $nonce_key)) {
				?>
				<div class="wrap">
					<div id="icon-options-general" class="icon32">
						<br />
					</div>
					<h2>Mandoo Page Form Settings</h2>
					<p><?php  echo __('What you\'re trying to do looks a little shady.', 'mandoo-page-form'); ?></p>
				</div>
				<?php
				return false;
			} else {
				$new_page_forms_id = $_POST[self::$prefix . '-page-forms-id'];
				$new_options['page-forms-id'] = $new_page_forms_id;
				$this->update_options($new_options);
				$page_forms_id = $this->options['page-forms-id'];
			}
		}
		?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32">
				<br />
			</div>
			<h2><?php echo __('Mandoo Page Form Settings', 'mandoo-page-form') ; ?></h2>
			<?php
			$doAPI = self::$mandoo_plugin->get_doAPI();
			if (false == $doAPI) {
				echo $this->get_admin_notices();
			} else {
				$this->lists = new SimpleXMLElement($doAPI->doforms_GetForms());
			?>
			<form action="options.php" method="post">
				<?php settings_fields(self::$prefix . '_options'); ?>
				<p>
					<?php echo __('Put [mandoo_doForms_page_form] in a content page to replace it for the form selected','mandoo-page-form'); ?>
				</p>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
								<label for="<?php echo self::$prefix; ?>-page-form-id"><?php echo __('Select a Form :', 'mandoo-page-form'); ?></label>
						</th>
						<td>
							<select class="widefat" id="<?php echo self::$prefix; ?>-page-form-id" name="<?php echo self::$prefix; ?>_options[page-form-id]">
							<?php	
							foreach ($this->lists->node as $node) {
								$selected = ($this->options['page-form-id'] == $node->id) ? ' selected="selected" ' : '';
								?>	
								<option <?php echo $selected; ?>value="<?php echo $node->id; ?>"><?php echo $node->name; ?></option>
								<?php
							}
							?>
							</select>
						</td>
					</tr>
				</table>
				<p class="submit">
					<input type="submit" name="Submit" class="button-primary" value="<?php echo  __('Save Changes', 'mandoo-page-form'); ?>" />
				</p>
			</form>
			<?php
			}
			?>
		</div>
		<?php
	}
	
	public function get_admin_notices () {
		global $blog_id;
		$notice = '<p>';
		$notice .= __('You\'ll need to set up the Mandoo API conection before use the widget. ', 'mandoo-page-form') . __('You can make your changes', 'mandoo-page-form') . ' <a href="' . get_admin_url($blog_id) . 'admin.php?page=api_keys">' . __('here', 'mandoo-page-form') . '.</a>';
		$notice .= '</p>';
		return $notice;
	}
	
	public function get_options () {
		$this->options = get_option(self::$prefix . '_options');
		return $this->options;
	}
	
	public function load_text_domain () {
		load_plugin_textdomain(self::$textdomain, null, str_replace('lib', 'languages', dirname(plugin_basename(__FILE__))));
	}
	
	public function register_settings () {
		register_setting( self::$prefix . '_options', self::$prefix . '_options');
	}
	
	public function remove_options () {
		delete_option(self::$prefix . '_options');
	}
	
	public function set_up_admin_page () {
		//add_submenu_page('options-general.php', 'Mandoo Widget Options', 'Mandoo Widget', 'activate_plugins', __FILE__, array(&$this, 'admin_page'));
		add_menu_page( 'Mandoo Plugins', 'Mandoo Plugins', 'activate_plugins', 'mandoo_plugins', array(&$this->mandoo_plugin, 'mandoo_add_menu_render'), plugins_url( "images/mandoo-icon.png", dirname(__FILE__) ), 1002); 
		add_submenu_page('mandoo_plugins', 'Page Form', 'Page Form', 'activate_plugins', 'page_form', array(&$this, 'admin_page'));

	}

	public function set_up_options () {
		add_option(self::$prefix . '_options', '', '', self::$public_option);
	}
	
	private function get_page_form_id () {
		if (is_array($this->options) && ! empty($this->options['page-form-id'])) {
			return $this->options['page-form-id'];
		} else {
			return false;
		}
	}
	
	private function update_options ($options_values) {
		$old_options_values = get_option(self::$prefix . '_options');
		$new_options_values = wp_parse_args($options_values, $old_options_values);
		update_option(self::$prefix .'_options', $new_options_values);
		$this->get_options();
	}
	
	public function mandoo_page_form_display () {
		
		$doAPI = self::$mandoo_plugin->get_doAPI();
		
		if (false == $doAPI) {
			return 0;
		} else {
			$xml = new SimpleXMLElement($doAPI->doForms_GetFormApiUrl($this->get_page_form_id($this->number)));
			?>	
			<script type="text/javascript" src="<?php echo $xml->node->url;	?>"></script>
			<?php
		}
	}
}
?>
