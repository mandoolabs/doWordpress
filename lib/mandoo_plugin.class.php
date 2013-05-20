<?php

/**
 *
 */
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
		// Set up the sortcode for each doForms form
		add_shortcode( 'doForms_form', array(&$this, 'mandoo_page_form_display' ));
		// Set up de Widget
		add_action('widgets_init', create_function('', 'return register_widget("Mandoo_Widget");'));
		 // Fetch the options, and, if they haven't been set up yet, display a notice to the user.
		$this->get_options();
		
		$api_keys_options = get_option("api_keys_options");
		if ($api_keys_options == '' || strlen($api_keys_options['api-client-id']) == 0 || strlen($api_keys_options['api-client-secret']) == 0) {
			add_action('admin_notices', array(&$this, 'admin_notices_api_keys'));
		}
		else if ($_GET["page"] == "user_subscribe") {
			if ('' == $this->options || $this->options['group'] == '0') {
				add_action('admin_notices', array(&$this, 'admin_notices_user_subscribe'));
			}
		}
		
		// SUBSCRIBE USER
		add_action( 'register_form', array(&$this, 'ad_register_fields'));
		add_action( 'user_register', array(&$this, 'subscribe_new_user' ));
		add_action( 'show_user_profile', array(&$this, 'extra_user_profile_fields' ));
		add_action( 'edit_user_profile', array(&$this, 'extra_user_profile_fields' ));
		add_action( 'personal_options_update', array(&$this, 'save_extra_user_profile_fields' ));
		add_action( 'edit_user_profile_update', array(&$this, 'save_extra_user_profile_fields' ));
		
		add_action('wp_ajax_mandoo_newsletter_send_mail', array(&$this,'newsletter_send_mail'));
		add_action('wp_ajax_print_newsletter_preview', array(&$this,'print_newsletter_preview'));
		
		if ($_GET["settings-updated"]) {
			add_action('admin_notices', array(&$this, 'admin_settings_updated'));
		}
		
		add_action('wp_ajax_mandoo_form_preview', array(&$this,'get_form_preview'));
		
		// PAGE FORM
		add_filter('set-screen-option', array(&$this, 'page_form_set_option'), 10, 3);
		add_filter('contextual_help', array(&$this, 'plugin_help'), 10, 3);
	
		self::add_scripts ();
	}

	public static function get_instance () {
		if (empty(self::$instance)) {
			self::$instance = new self::$name;
		}
		return self::$instance;
	}
	
	public function admin_notices_api_keys () {
		echo '<div class="error fade">' . $this->get_admin_notices(0) . '</div>';
	}

	public function admin_notices_user_subscribe () {
		echo '<div class="error fade">' . $this->get_admin_notices(1) . '</div>';
	}

	public function admin_bad_api_keys () {
		echo '<div class="error fade">' . $this->get_admin_notices(2) . '</div>';
	}

	
	public function admin_settings_updated () {
		echo '<div class="updated fade">' . $this->get_admin_notices(3) . '</div>';
	}

	
	public function get_admin_notices ($op) {
		global $blog_id;
		$notice = '<p>';
		switch ($op) {
			case 0:
				$notice .= __('You\'ll need to set up the Mandoo API conection before use the widget. ', 'mandoo-plugin') . __('You can make your changes', 'mandoo-plugin') . ' <a href="' . get_admin_url($blog_id) . 'admin.php?page=api_keys">' . __('here', 'mandoo-plugin') . '.</a>';
				break;
			case 1:
				$notice .= __('You\'ll need to select a doMail subscribers group to add your new users. ', 'mandoo-plugin');
				break;
			case 2:
				$notice .= __('An error ocurred conecting with Mandoo API. Please check that api keys stored are correct. ', 'mandoo-plugin') . __('You can make your changes', 'mandoo-plugin') . ' <a href="' . get_admin_url($blog_id) . 'admin.php?page=api_keys">' . __('here', 'mandoo-plugin') . '.</a>';
				break;
			case 3:
				$notice .= __('Saved settings', 'mandoo-plugin');
				break;
		}
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
		$this->options = get_option($_GET['page'] . '_options');
		return $this->options;
	}
	
	public function load_text_domain () {
		load_plugin_textdomain(self::$textdomain, null, str_replace('lib', 'languages', dirname(plugin_basename(__FILE__))));
	}
	
	public function register_settings () {
		register_setting( 'api_keys_options', 'api_keys_options');
		register_setting( 'user_subscribe_options', 'user_subscribe_options');
		register_setting( 'newsletter_options', 'newsletter_options');
	}
	
	public function remove_options () {
		delete_option('api_keys_options');
		delete_option('user_subscribe_options');
		delete_option('newsletter_options');
	}
	
	public function set_up_admin_page () {
		add_menu_page( 'Mandoo™', 'Mandoo™', 'activate_plugins', 'mandoo_plugins', '', '', 1002); 
		add_submenu_page('mandoo_plugins', 'Help', 'Help', 'activate_plugins', 'mandoo_plugins',  array(&$this, 'admin_help'));
		add_submenu_page('mandoo_plugins', 'API Keys', 'API Keys', 'activate_plugins', 'api_keys', array(&$this, 'admin_page_api_keys'));
		$hook = add_submenu_page('mandoo_plugins', 'Page Form', 'Page Form', 'activate_plugins', 'page_form', array(&$this, 'admin_page_form_page'));
		add_submenu_page('mandoo_plugins', 'User Subscribe', 'User Subscribe', 'activate_plugins', 'user_subscribe', array(&$this, 'admin_page_user_subscribe'));
		add_submenu_page('mandoo_plugins', 'Newsletter', 'Newsletter', 'activate_plugins', 'newsletter', array(&$this, 'admin_newsletter'));
		add_submenu_page('mandoo_plugins', 'Widget', 'Widget', 'activate_plugins', 'widgets.php');
		
		add_action( "load-" . $hook, array(&$this,'page_form_add_option') );
	}

	/*********************** ADMIN PAGES FUNCTION ***************************/
	public function admin_help() {
		require_once("admin/help.php");
	}
	
	public function admin_page_api_keys() {
		require_once('admin/api.php');
	}
	
	public function admin_page_form_page() {
		require_once('admin/page-form.php');
	}
	
	public function plugin_help($contextual_help, $screen_id, $screen) {
		switch ($_GET["page"]) {
			case "api_keys":
				$contextual_help = '<p>' . __('Enter a valid', 'mandoo-plugin') . ' <a href="https://account.mandoocms.com/myaccount/api/" target="_blank" title="Mandoo™ API">Mandoo™ API</a> ' . __('keys here to get started. Once you\'ve done that, you can use the Mandoo™ Plugins.', 'mandoo-plugin') . '</p>';
				$contextual_help .= '<p>' . __('Do not have', 'mandoo-plugin') . ' <a href="https://users.mandoocms.com/signup/" target="_blank" title="' . __('Create a Mandoo™ ID', 'mandoo-plugin') . '">Mandoo™ ID</a>? ' .  __('Create an account now.', 'mandoo-plugin') . '</p>';
				break;
			case "page_form":
				$contextual_help = '<p>' . __('Put the code in a "Post" or "Page" content to replace it by the corresponding form created with ', 'mandoo-plugin') .  '<a href="http://www.mandoocms.com/es_ES/features/1249/" target="_blank" title="Mandoo™ doForms">Mandoo™ doForms</a>.</p>';
				$contextual_help .= '<p>' . __('Do not have', 'mandoo-plugin') . ' <a href="https://users.mandoocms.com/signup/" target="_blank" title="' . __('Create a Mandoo™ ID', 'mandoo-plugin') . '">Mandoo™ ID</a>? ' .  __('Create an account now.', 'mandoo-plugin') . '</p>';
				break;
			case "newsletter":
				$contextual_help = '<p>' . __('Customize your template for send your news to your subscribers', 'mandoo-plugin') . '</p>';
				$contextual_help .= '<p>' . __('Do not have', 'mandoo-plugin') . ' <a href="https://users.mandoocms.com/signup/" target="_blank" title="' . __('Create a Mandoo™ ID', 'mandoo-plugin') . '">Mandoo™ ID</a>? ' .  __('Create an account now.', 'mandoo-plugin') . '</p>';
				break;
			case "user_subscribe":
				$contextual_help = '<p>' . __('Select a', 'mandoo-plugin') .  ' <a href="http://www.mandoocms.com/es_ES/features/1247/" target="_blank" title="Mandoo™ doMails">Mandoo™ doMails</a> ' .  __('group where new registered users will be added.', 'mandoo-plugin') . '</p>';
				$contextual_help .= '<p>' . __('Do not have', 'mandoo-plugin') . ' <a href="https://users.mandoocms.com/signup/" target="_blank" title="' . __('Create a Mandoo™ ID', 'mandoo-plugin') . '">Mandoo™ ID</a>? ' .  __('Create an account now.', 'mandoo-plugin') . '</p>';
				break;
		}
		return $contextual_help;
	}
	
	public function page_form_add_option() {
		$option = "per_page";
		$args = array(
		'label' => __('Forms', 'mandoo-plugin'),
		'default' => 10,
		'option' => 'page_form_per_page'
		);
		add_screen_option( $option, $args );
	}
	
	public function page_form_set_option($status, $option, $value) {
		if ( 'page_form_per_page' == $option ) return $value;
	}
	
	public function admin_page_user_subscribe() {
		require_once('admin/user-subscribe.php');
	}
	
	public function admin_newsletter() {
		require_once('admin/newsletter.php');
	}
	
	/************************************************************************/
	
	
	public function set_up_options () {
		add_option($_GET['page'] . '_options', '', '', self::$public_option);
	}
	
	private function get_api_client_id () {
		$api_keys_options = get_option('api_keys_options');
		if (is_array($api_keys_options) && ! empty($api_keys_options['api-client-id'])) {
			return $api_keys_options['api-client-id'];
		} else {
			return false;
		}
	}
	
	private function get_api_client_secret () {
		$api_keys_options = get_option('api_keys_options');
		if (is_array($api_keys_options) && ! empty($api_keys_options['api-client-secret'])) {
			return $api_keys_options['api-client-secret'];
		} else {
			return false;
		}
	}
	
	private function update_options ($options_values) {
		$old_options_values = get_option($_GET['page'] . '_options');
		$new_options_values = wp_parse_args($options_values, $old_options_values);
		update_option($_GET['page'] . '_options', $new_options_values);
		$this->get_options();
	}
	
	public function mandoo_page_form_display ($atts) {
		
		extract(shortcode_atts(array(
				'code' => '0'
		), $atts));
		
		if ($code == '0') {
			return __('The shortcode not referer to any form created by', 'mandoo-plugin') . ' <a href="http://www.mandoocms.com/es_ES/features/1249/" target="_blank" title="Mandoo™ doForms">Mandoo™ doForms</a>. ' . __('Please revise the page content.', 'mandoo-plugin');
		} else {
			return '<script type="text/javascript" src="https://api.mandoocms.com/forms/' . $code . '.js"></script>';
		}
	}
	
	public function ad_register_fields() {
		$output .= '<p>';
			$output .= '<label>';
				$output .= '<input type="checkbox" name="subscribe" id="subscribe" value="1" ' . $checked . ' />';
				$output .= __('Accept newsletter subscribe', 'mandoo-plugin');
			$output .= '</label>';
		$output .= '</p>';
		$output .= '<br />';
		echo $output;
	}
	
	public function subscribe_new_user($user_id) {
		update_user_meta($user_id, 'subscribe', $_POST['subscribe']);
		if (intval($_POST["subscribe"]) == 1) {
			$options = get_option('user_subscribe_options');
			$doAPI = $this->get_doAPI();
			$user = get_userdata($user_id);
			$email = $user->user_email;
			
			$result = $doAPI->doMail_AddSubscriberReturnId($email);
			$result = new SimpleXMLElement($result);

			if ($result->node->id > 0 && intval($options["group"]) > 0) {
				$doAPI->doMail_AddSubscriberToGroup($options["group"],$result->node->id); 
			}
		}
	}
	
	public function extra_user_profile_fields($user) {
		$checked = '';
		if (get_the_author_meta( 'subscribe', $user->ID ) == "1") {
			$checked = 'checked="checked"';
		}
		$output = '<h3>Suscripción a Mandoo</h3>';
		$output .= '<table class="form-table">';
			$output .= '<tr>';
				$output .= '<th>';
					$output .= __('Accept the terms', 'mandoo-plugin');
				$output .= '</th>';
				$output .= '<td>';
					$output .= '<input type="checkbox" name="subscribe" id="subscribe" value="1" ' . $checked . ' />';
				$output .= '</td>';
			$output .= '</tr>';
		$output .= '</table>';
		echo $output;
	}
	
	function save_extra_user_profile_fields( $user_id ) {
		if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
		update_user_meta($user_id, 'subscribe', $_POST['subscribe']);
	}
	
	public function add_scripts () {
			wp_register_style( 'mandoo_plugins_style', plugins_url('mandoo-plugins/css/mandoo_plugins.css'), false, '1.0.0', 'all');
			wp_enqueue_style('mandoo_plugins_style');
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script('mandoo_plugins', plugins_url('mandoo-plugins/js/mandoo-plugins.js'), array('jquery', 'wp-color-picker'), false);
	}
	
	function ilc_admin_tabs( $current = 'template' ) {
		$tabs = array( 'template' => __('Template', 'mandoo-plugin'), 'send' => __('Send', 'mandoo-plugin'));
		echo '<h2 class="nav-tab-wrapper">';
		foreach( $tabs as $tab => $name ){
			$class = ( $tab == $current ) ? ' nav-tab-active' : '';
			echo "<a class='nav-tab$class' href='?page=newsletter&tab=$tab'>$name</a>";

		}
		echo '</h2>';
	}
	
	function get_newsletter_html() {
		if (!empty($_POST["type"])) {
			$op = intval($_POST["type"]);
		}
		else {
			$op = 0;
		}
		$options = get_option('newsletter_options');
		
		$mail = file_get_contents(plugins_url('mandoo-plugins/lib/mail_template.htm'));
		$mail = str_replace("##BGCOLOR##", $options["bg-color"], $mail);
		$mail = str_replace("##HEADER##", $options["header"], $mail);
		$mail = str_replace("##FOOTER##", $options["footer"] ,$mail);
		
		if ($op == 1) {
			$content = "";
			$posts = explode(",",$_POST["posts"]);
			
			if (count($posts) == 1) {
				$post_content = get_post($posts[0]);
				$content = '<h3>' . $post_content->post_title . '</h3>';
				$content .= '<div>' . $post_content->post_content . '</div>';
			}
			else {
				$content = '<ul>';
				for ($i = 0; $i < count($posts); $i++) {
					$post_content = get_post($posts[$i]);
					$content .= '<li>';
						$content .= '<h3>' . $post_content->post_title . '</h3>';
						$content .= '<em>' . wp_trim_words($post_content->post_content) . '</em>';
					$content .= '</li>';
				}
				$content .= '</ul>';
			}
			
			$mail = str_replace("##CONTENT##", $content, $mail);
		}
		return $mail;
	}
	
	function print_newsletter_preview() {
		echo self::get_newsletter_html();
		die();
	}
	
	function newsletter_send_mail() {
		$mail = self::get_newsletter_html();
		
		$doAPI = $this->get_doAPI();
		//$doAPI->doMail_SendNewsletter($_POST["campaign"], $_POST["groups"], "Prueba de envio", $mail, htmlentities($mail), 0, '','');
		$doAPI->doMail_SendNewsletter($_POST["campaign"], $_POST["groups"], $_POST["subject"], $mail, htmlentities($mail), 0, '','');
	}

}
?>
