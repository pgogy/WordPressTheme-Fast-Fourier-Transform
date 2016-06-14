( function( $ ) {

	var $style = $( '#fast-fourier-transform-colour-scheme-css' ),
		api = wp.customize;

	if ( ! $style.length ) {
	$style = $( 'head' ).append( '<style type="text/css" id="fast-fourier-transform-colour-scheme-css" />' )
		                    .find( '#fast-fourier-transform-colour-scheme-css' );
	}

	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	api( 'site_allsite_background_colour', function( value ) {
		value.bind( function( to ) {
			console.log(to);
			$( 'html' ).css("background-color", to );
			$( 'header#masthead' ).css("background-color", to );
			$( 'html' ).css("background", to );
		} );
	} );		
		
	api( 'site_allsite_colour', function( value ) {
		value.bind( function( to ) {
			$( 'footer.page-footer h1.page-title span.more' ).css("border-right", "2px solid " + to );
			$( '.page-footer h1 a' ).css("background-color", to );
			$( 'footer#colophon div div div aside' ).css("background-color", to );
			$( 'footer#colophon div div nav' ).css("background-color", to );
			$( 'nav form input[type=submit]' ).css("color", to );
			$( 'input[type=submit]' ).css("color", to );
		} );
	} );
	
	api( 'site_alllink_colour', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css("color", to );
		} );
	} );
	
	
	api( 'site_line_colour', function( value ) {
		value.bind( function( to ) {
			$( 'svg').css("color", to);
			$( 'svg').css("stroke", to);
		} );
	} );
	
	api( 'site_text_colour', function( value ) {
		value.bind( function( to ) {
			$( 'html' ).css("color", to );
		} );
	} );
	
	api( 'site_button_colour', function( value ) {
		value.bind( function( to ) {
			$( 'button' ).css("background-color", to );
			$( 'input[type=submit]' ).css("background-color", to );
		} );
	} );
	
	api( 'site_button_text_colour', function( value ) {
		value.bind( function( to ) {
			$( 'button' ).css("color", to );
			$( 'input[type=submit]' ).css("color", to );
		} );
	} );
	
	api.bind( 'preview-ready', function() {
		api.preview.bind( 'update-color-scheme-css', function( css ) {
			$style.html( css );
		} );
	} );
	
} )( jQuery );
