<?php
global $blog_id;	
$api_client_id = (is_array($this->options)) ? $this->options['api-client-id'] : '';
$api_client_secret = (is_array($this->options)) ? $this->options['api-client-secret'] : '';
if (isset($_POST[$_GET['page'] . '_nonce'])) {
	$nonce = $_POST[$_GET['page'] . '_nonce'];
	$nonce_key = $_GET['page'] . '_update_options';
	if (! wp_verify_nonce($nonce, $nonce_key)) {
		?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32">
				<br />
			</div>
			<h2>Mandoo API Keys Settings</h2>
			<p><?php  echo __('What you\'re trying to do looks a little shady.', 'mandoo-plugin'); ?></p>
		</div>
		<?php
		return false;
	} else {
		$new_api_client_id = $_POST[$_GET['page'] . '-api-client-id'];
		$new_options['api-client-id'] = $new_api_client_id;
		$new_api_client_secret = $_POST[$_GET['page'] . '-api-client-secret'];
		$new_options['api-client-secret'] = $new_api_client_secret;
		$this->update_options($new_options);
		$api_client_id = $this->options['api-client-id'];
		$api_client_secret = $this->options['api-client-secret'];
	}
}
?>
<div class="wrap">
	<div class="icon32" id="icon-mandoo"></div>
	<h2><?php echo __('API Keys Settings', 'mandoo-plugin') ; ?></h2>
	<form action="options.php" method="post">
		<?php settings_fields($_GET['page'] . '_options'); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo $_GET['page']; ?>-api-client-id">Mandoo Api Client ID</label>
				</th>
				<td>
					<input class="regular-text" id="<?php echo $_GET['page']; ?>-api-client-id" name="<?php echo $_GET['page']; ?>_options[api-client-id]" type="password" value="<?php echo $api_client_id ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="<?php echo $_GET['page']; ?>-api-client-secret">Mandoo Api Client Secret</label>
				</th>
				<td>
					<input class="regular-text" id="<?php echo $_GET['page']; ?>-api-client-secret" name="<?php echo $_GET['page']; ?>_options[api-client-secret]" type="password" value="<?php echo $api_client_secret ?>" />
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php echo  __('Save Changes', 'mandoo-plugin'); ?>" />
		</p>
	</form>
</div>