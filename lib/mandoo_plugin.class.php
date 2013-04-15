<?php

/**
 *
 */
if (!class_exists('Mandoo_Plugin')) {
	class Mandoo_Plugin {
		private $options;
		private static $instance;
		private static $doAPI;
		private static $name = 'Mandoo_Plugin';
		private static $prefix = 'mandoo_plugin';
		private static $public_option = 'no';
		private static $textdomain = 'mandoo-plugin';
		private function __construct () {
			self::load_text_domain();
			register_activation_hook(__FILE__, array(&$this, 'set_up_options'));
			 // Set up the settings.
			add_action('admin_init', array(&$this, 'register_settings'));
			 // Set up the administration page.
			add_action('admin_menu', array(&$this, 'set_up_admin_page'));
			 // Fetch the options, and, if they haven't been set up yet, display a notice to the user.
			$this->get_options();
			if ('' == $this->options) {
				add_action('admin_notices', array(&$this, 'admin_notices'));
			}
		}

		public static function get_instance () {
			if (empty(self::$instance)) {
				self::$instance = new self::$name;
			}
			return self::$instance;
		}
		
		public function admin_notices () {
			echo '<div class="error fade">' . $this->get_admin_notices() . '</div>';
		}

		public function admin_page () {
			global $blog_id;	
			$api_client_id = (is_array($this->options)) ? $this->options['api-client-id'] : '';
			$api_client_secret = (is_array($this->options)) ? $this->options['api-client-secret'] : '';
			if (isset($_POST[self::$prefix . '_nonce'])) {
				$nonce = $_POST[self::$prefix . '_nonce'];
				$nonce_key = self::$prefix . '_update_options';
				if (! wp_verify_nonce($nonce, $nonce_key)) {
					?>
					<div class="wrap">
						<div id="icon-options-general" class="icon32">
							<br />
						</div>
						<h2>Mandoo API Keys Settings</h2>
						<p><?php  echo __('What you\'re trying to do looks a little shady.', 'mandoo-widget'); ?></p>
					</div>
					<?php
					return false;
				} else {
					$new_api_client_id = $_POST[self::$prefix . '-api-client-id'];
					$new_options['api-client-id'] = $new_api_client_id;
					$new_api_client_secret = $_POST[self::$prefix . '-api-client-secret'];
					$new_options['api-client-secret'] = $new_api_client_secret;
					$this->update_options($new_options);
					$api_client_id = $this->options['api-client-id'];
					$api_client_secret = $this->options['api-client-secret'];
				}
			}
			?>
			<div class="wrap">
				<div id="icon-options-general" class="icon32">
					<br />
				</div>
				<h2><?php echo __('Mandoo API Keys Settings', 'mandoo-widget') ; ?></h2>
				<p><?php echo __('Enter a valid Mandoo API config keys here to get started. Once you\'ve done that, you can use the Mandoo Widget from the Widgets menu. You will need to have at least a form created with Mandoo doForms to set up the widget.', 'mandoo-widget') ?> 				
				</p>
				<form action="options.php" method="post">
					<?php settings_fields(self::$prefix . '_options'); ?>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">
								<label for="' . self::$prefix . '-api-client-id">Mandoo Api Client ID</label>
							</th>
							<td>
								<input class="regular-text" id="<?php echo self::$prefix; ?>-api-client-id" name="<?php echo self::$prefix; ?>_options[api-client-id]" type="password" value="<?php echo $api_client_id ?>" />
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">
								<label for="' . self::$prefix . '-api-client-secret">Mandoo Api Client Secret</label>
							</th>
							<td>
								<input class="regular-text" id="<?php echo self::$prefix; ?>-api-client-secret" name="<?php echo self::$prefix; ?>_options[api-client-secret]" type="password" value="<?php echo $api_client_secret ?>" />
							</td>
						</tr>
					</table>
					<p class="submit">
						<input type="submit" name="Submit" class="button-primary" value="<?php echo  __('Save Changes', 'mandoo-widget'); ?>" />
					</p>
				</form>
			</div>
			<?php
		}
		
		public function get_admin_notices () {
			global $blog_id;
			$notice = '<p>';
			$notice .= __('You\'ll need to set up the Mandoo API conection before use the widget. ', 'mandoo-widget') . __('You can make your changes', 'mandoo-widget') . ' <a href="' . get_admin_url($blog_id) . 'admin.php?page=api_keys">' . __('here', 'mandoo-widget') . '.</a>';
			$notice .= '</p>';
			return $notice;
		}
		
		public function get_doAPI () {
			$api_client_id = $this->get_api_client_id();
			$api_client_secret = $this->get_api_client_secret();
			if (false == $api_client_id || false == $api_client_secret) {
				return false;
			} else {
				if (empty(self::$doAPI)) {
					self::$doAPI = new DoAPI($api_client_id, $api_client_secret);
				}
				return self::$doAPI;
			}
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
			add_menu_page( 'Mandoo Plugins', 'Mandoo Plugins', 'activate_plugins', 'mandoo_plugins', array(&$this, 'mandoo_add_menu_render'), plugins_url( "images/mandoo-icon.png", dirname(__FILE__) ), 1002); 
			add_submenu_page('mandoo_plugins', 'Mandoo API Keys', 'Mandoo API Keys', 'activate_plugins', 'api_keys', array(&$this, 'admin_page'));
		}

		public function set_up_options () {
			add_option(self::$prefix . '_options', '', '', self::$public_option);
		}
		
		private function get_api_client_id () {
			if (is_array($this->options) && ! empty($this->options['api-client-id'])) {
				return $this->options['api-client-id'];
			} else {
				return false;
			}
		}
		
		private function get_api_client_secret () {
			if (is_array($this->options) && ! empty($this->options['api-client-secret'])) {
				return $this->options['api-client-secret'];
			} else {
				return false;
			}
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
		
		public function mandoo_add_menu_render() {
			global $title;
			$active_plugins = get_option('active_plugins');
			$all_plugins		= get_plugins();

			$array_activate = array();
			$array_install	= array();
			$array_recomend = array();
			$count_activate = $count_install = $count_recomend = 0;
			$array_plugins	= array(
				array( 'mandoo-page-form\/mandoo-page-form.php', 'Page Form', 'http://wordpress.org/extend/plugins/mandoo-page-form/', 'http://www.mandoocms.com/plugin/mandoo-page-form/', '/wp-admin/plugin-install.php?tab=search&type=term&s=Mandoo+Page+Form&plugin-search-input=Search+Plugins', 'admin.php?page=page_form' ), 
				array( 'mandoo-widget\/mandoo-widget.php', 'Mandoo Widget', 'http://wordpress.org/extend/plugins/mandoo-widget/', 'http://www.mandoocms.com/plugin/mandoo-widget/', '/wp-admin/plugin-install.php?tab=search&type=term&s=Mandoo+Widget&plugin-search-input=Search+Plugins', '' ), 
			);
			foreach($array_plugins as $plugins) {
				if( 0 < count( preg_grep( "/".$plugins[0]."/", $active_plugins ) ) ) {
					$array_activate[$count_activate]['title'] = $plugins[1];
					$array_activate[$count_activate]['link']	= $plugins[2];
					$array_activate[$count_activate]['href']	= $plugins[3];
					$array_activate[$count_activate]['url']	= $plugins[5];
					$count_activate++;
				}
				else if( array_key_exists(str_replace("\\", "", $plugins[0]), $all_plugins) ) {
					$array_install[$count_install]['title'] = $plugins[1];
					$array_install[$count_install]['link']	= $plugins[2];
					$array_install[$count_install]['href']	= $plugins[3];
					$count_install++;
				}
				else {
					$array_recomend[$count_recomend]['title'] = $plugins[1];
					$array_recomend[$count_recomend]['link']	= $plugins[2];
					$array_recomend[$count_recomend]['href']	= $plugins[3];
					$array_recomend[$count_recomend]['slug']	= $plugins[4];
					$count_recomend++;
				}
			}
			?>
			<div class="wrap">
				<div class="icon32" id="icon-options-general" style="background-image:url(<?php echo plugins_url( "images/mandoo-icon.png", dirname(__FILE__) ); ?>); background-position:center;"></div>
				<h2><?php echo $title;?></h2>
				<?php if( 0 < $count_activate ) { ?>
				<div>
					<h3><?php _e( 'Activated plugins', 'mandoo_plugins' ); ?></h3>
					<?php foreach( $array_activate as $activate_plugin ) { ?>
					<div style="float:left; width:200px;"><?php echo $activate_plugin['title']; ?></div> <p><a href="<?php echo $activate_plugin['link']; ?>" target="_blank"><?php echo __( "Read more", 'mandoo_plugins'); ?></a> <a href="<?php echo $activate_plugin['url']; ?>"><?php echo __( "Settings", 'mandoo_plugins'); ?></a></p>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if( 0 < $count_install ) { ?>
				<div>
					<h3><?php _e( 'Installed plugins', 'mandoo_plugins' ); ?></h3>
					<?php foreach($array_install as $install_plugin) { ?>
					<div style="float:left; width:200px;"><?php echo $install_plugin['title']; ?></div> <p><a href="<?php echo $install_plugin['link']; ?>" target="_blank"><?php echo __( "Read more", 'mandoo_plugins'); ?></a></p>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if( 0 < $count_recomend ) { ?>
				<div>
					<h3><?php _e( 'Recommended plugins', 'mandoo_plugins' ); ?></h3>
					<?php foreach( $array_recomend as $recomend_plugin ) { ?>
					<div style="float:left; width:200px;"><?php echo $recomend_plugin['title']; ?></div> <p><a href="<?php echo $recomend_plugin['link']; ?>" target="_blank"><?php echo __( "Read more", 'mandoo_plugins'); ?></a> <a href="<?php echo $recomend_plugin['href']; ?>" target="_blank"><?php echo __( "Download", 'mandoo_plugins'); ?></a> <a class="install-now" href="<?php echo get_bloginfo( "url" ) . $recomend_plugin['slug']; ?>" title="<?php esc_attr( sprintf( __( 'Install %s' ), $recomend_plugin['title'] ) ) ?>" target="_blank"><?php echo __( 'Install now from wordpress.org', 'mandoo_plugins' ) ?></a></p>
					<?php } ?>
					<span style="color: rgb(136, 136, 136); font-size: 10px;"><?php _e( 'If you have any questions, please contact us via help@mandoocms.com or fill in our contact form on our site', 'mandoo_plugins' ); ?> <a href="http://www.mandoocms.com">www.mandoocms.com</a></span>
				</div>
				<?php } ?>
			</div>
			<?php
		}
	}
}
?>
