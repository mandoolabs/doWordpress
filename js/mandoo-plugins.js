jQuery(document).ready(function($){
    $('#bg-color').wpColorPicker();
	
	jQuery("#send-mail").click(function () {
		$(this).hide();
		jQuery(".submit .spinner").show();
		
		var error 		= false;
		var message 	= '';
		
		var subjectVal = jQuery("#subject").val();
		if (subjectVal == "") {
			error = true;
			message += '- Ha de introducir un Asunto\n';
		}
		
		var campaignVal = $("#campaign").val()
		if (campaignVal == "0" || campaignVal == "") {
			error = true;
			message += '- Ha de seleccionar una Campaña\n';
		}
		
		var groupsVal 	= '';
		jQuery(".group:checked").each(function () {
			groupsVal += jQuery(this).val() + ',';
		});
		if (groupsVal != "") {
			groupsVal 		= groupsVal.substr(0,groupsVal.length-1);
		}
		else {
			error = true;
			message += '- Ha de seleccionar al menos un Grupo\n';
		}
		
		var postsVal = '';
		jQuery(".post:checked").each(function () {
			postsVal += jQuery(this).val() + ',';
		});
		if (postsVal != "") {
			postsVal 		= postsVal.substr(0,postsVal.length-1);
		}
		else {
			error = true;
			message += '- Ha de seleccionar al menos una Entrada\n';
		}
		
		var publishVal 	= 0;
		if (jQuery("#publishOnRss").is(":checked")) publishVal = jQuery("#publishOnRss").val();
		
		if (error) {
			alert(message);
			jQuery(".submit .spinner").hide().next().show();
		}
		else {
			var typeVal = jQuery("#preview-type").val();
			jQuery.ajax({
				url: "admin-ajax.php",
				type: "POST",
				data: {
					action : 'mandoo_newsletter_send_mail',
					campaign : campaignVal,
					groups : groupsVal,
					posts : postsVal,
					publish : publishVal,
					type : typeVal,
					subject : subjectVal
				},
				success: function(data, textStatus, XMLHttpRequest){
					$("#subject").val("");
					$("#campaign").val("0");
					$(".group:checked, .post:checked, #publishOnRss").attr("checked",false);
					jQuery(".submit .spinner").hide().next().show();
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					alert(errorThrown);
				}
			});
		}
	});
	
	jQuery("#newsletter-preview").click(function () {
		var typeVal = jQuery("#preview-type").val();
		
		var postsVal = '';
		if(parseInt(typeVal) == 1) {
			jQuery(".post:checked").each(function () {
				postsVal += jQuery(this).val() + ',';
			});
			if (postsVal != "") {
				postsVal = postsVal.substr(0,postsVal.length-1);
			}
		}
		jQuery.ajax({
			url: "admin-ajax.php",
			type: "POST",
			data: {
				action : 'print_newsletter_preview',
				type : typeVal,
				posts : postsVal
			},
			dataType: 'html',
			success: function(data, textStatus, XMLHttpRequest){
				jQuery("#newsletter-preview-content").html(data);
				jQuery("#newsletter-preview-wrapper").before('<div class="media-modal-backdrop"></div>').show();
			},
			error: function(MLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});
	
	jQuery("#newsletter-preview-close").click(function () {
		jQuery("#newsletter-preview-wrapper").hide();
		jQuery(".media-modal-backdrop").remove();
	});
	
});