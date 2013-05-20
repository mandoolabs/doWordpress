<div class="wrap">
	<div class="icon32" id="icon-mandoo"></div>
	<h2><?php echo __('Page Form Settings', 'mandoo-plugin') ; ?></h2>
	<?php
	$doAPI = $this->get_doAPI();
	if ($doAPI != false) {
	
		$forms = $doAPI->doForms_GetFormsPublicId();
		
		$result = explode("|",$forms);
			
		if ($result[0] != "E:501") {
			
			$forms = new SimpleXMLElement($forms);
			
			settings_fields($_GET['page'] . '_options'); ?>
			<?php
			$data = array();
			foreach ($forms->node as $node) {
				$data[] = array('name' => $node->name, 
								'code' => '[doForms_form code="' . $node->publicId . '"]',
								'link' => '<a href="https://api.mandoocms.com/forms/' . $node->publicId . '.htm" class="lupe" title="' . __("Preview") . '" target="_blank">Ver</a>'
							);
			}
			$list_table = new Page_Form_List_Table($data);
			$list_table->prepare_items();
			$list_table->display();
		}
		else {
			$this->admin_bad_api_keys ();
		}
	}
	?>
</div>