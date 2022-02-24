/**
 * Js template
 *
 * @package ClubBlog
 */

jQuery( document ).ready(function( $ ) {

	$( '.dropdown-toggle' ).keyup( function( e ) {
		if ( e.keyCode == 9 ) {
			if ( $( e.target ).hasClass( 'dropdown-toggle' ) ) {
				$( this ).dropdown( 'toggle' );
			}
		}
	});

	$( '.navbar-toggler' ).keyup( function( e ) {
		if ( e.keyCode == 9 ) {
			if ( $( e.target ).hasClass( 'navbar-toggler' ) ) {
				$( '#navbarSupportedContent' ).toggle();
			}
		}
	});

});
