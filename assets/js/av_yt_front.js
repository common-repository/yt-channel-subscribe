/**
 * Subscribe widget front-end script
 */
(function( $ ) {

	jQuery('iframe').each(function(i, v) {

		var elem 	= $(this);
		var src 	= elem.attr('src');

		if( (/^(http(s)?:\/\/)?((w){3}.)?youtu(be|.be)?(\.com)?\/embed\/.+/igm.test(src)) ) {

			if( jQuery(elem).parents( 'figure.is-provider-youtube' ).length > 0 ) {

				jQuery(elem).parents( 'figure.is-provider-youtube' ).after( AV_YT_html );
			}
			else {
			
				jQuery(elem).after( AV_YT_html );
			}
		}
	});
     
})( jQuery );