/**
 * Subscribe widget WP-ADMIN script
 */
(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.av_yt_color-field').wpColorPicker();
	});

	$("#av_plugin_star_rating").rateYo({
		rating: 4.5,
		starWidth: "20px",
		halfStar: true,
		onSet: function ( rating, rateYoInstance ) {
 
			$('#av_plugin_rating').val( rating );
		}
	});
	
	$.fn.resizeIframe = function() {
		
		var iframeWidth = jQuery('#av_yt_sidebar').width();
		var ratio = (560 / 315); // YT aspect ratio
		var iframeHeight = Math.round( iframeWidth / ratio );
		this.attr('width', iframeWidth);
		this.attr('height', iframeHeight);
		this.css('width', iframeWidth);
		this.css('height', iframeHeight);
		return this;
	}; 
	
	$('#av_yt_sidebar').find('iframe').resizeIframe();

	$(document).on('click', '#AV_YT_submit_feedback_btn', function( e ) { 

		$('input, textarea').removeClass('av-input-required');
		var submit_btn_txt = $('#AV_YT_submit_feedback_btn').html();
		$('#AV_YT_rating_required_fields').hide();
		$('#AV_YT_submit_feedback_btn').html('<i>Sending...</i>');

		e.preventDefault();

		var submit 		= true;
		var rating 		= $('#AV_YT_plugin_rating').val();
		var msg 		= $('#AV_YT_plugin_feedback').val();
		var name	 	= $('#AV_YT_rating_name').val();
		var email 		= $('#AV_YT_rating_email').val();
		var nonce		= $('#AV_YT_rating_nonce').val();

		if( submit ) {

			var formData = $('#AV_YT_feedback_form').serialize();

			$.post('/wp-admin/admin-ajax.php', { action: 'AV_YT_send_feedback', AV_YT_rating_nonce: nonce, formData: formData }, function(res) {
				
				if( res.status == 200 && res.msg == "ok" ) {

					$('#AV_YT_feedback_success').show();
					$('#AV_YT_feedback_form').hide();
				}
				else if( res.status == 1 ) {

					if( res.error.name == 2 ) { $('#AV_YT_rating_name').addClass('av-input-required') }
					if( res.error.email == 2 ) { $('#AV_YT_rating_email').addClass('av-input-required') }
					if( res.error.descr == 2 ) { $('#AV_YT_plugin_feedback').addClass('av-input-required') }

					$('#AV_YT_rating_required_fields').show();

					$('#AV_YT_submit_feedback_btn').html(submit_btn_txt);
				}
				else {

					$('#AV_YT_rating_required_fields').html( res.msg );
					$('#AV_YT_rating_required_fields').show();
					$('#AV_YT_submit_feedback_btn').html(submit_btn_txt);
				}      
			});
		}
	});
     
})( jQuery );