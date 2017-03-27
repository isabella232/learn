jQuery( function( $ ){
	$('body').on( 'click', 'a[href^="#siteorigin-learn-"]', function( e ) {
		var $$ = $(this);
		var courseId = $$.attr( 'href' ).replace( '#siteorigin-learn-', '' );

		if( courseId && soLearn.courses.hasOwnProperty( courseId ) ) {
			e.preventDefault();
			var course = soLearn.courses[ courseId ];

			$( '#siteorigin-learn' ).show();
			var dialog = $( '#siteorigin-learn-dialog' );

			// Add all the data
			dialog
				.find( '.video-iframe' ).hide().end()
				.find( '.poster-wrapper' ).data( 'video', course.video ).end()
				.find( '.main-poster' ).attr( 'src', course.poster ).end()
				.find( '.learn-title' ).text( course.title ).end()
				.find( '.learn-description' ).html( course.description ).end()
				.find( '.form-description' ).html( course.form_description ).end()
				.find( 'input[name="course_id"]' ).val( courseId ).end();

			dialog.css({
				'margin-top': - dialog.outerHeight() / 2,
				'margin-left': - dialog.outerWidth() / 2,
			});
		}
	} );

	// General actions of the dialog
	$( '#siteorigin-learn-overlay' ).add( '#siteorigin-learn .learn-close' ).click( function(){
		$( '#siteorigin-learn' )
			.hide()
			.find( '.video-iframe' ).empty().hide().end()
			.find( '.poster-wrapper' ).show();
	} );

	$( '#siteorigin-learn form' ).submit( function( e ){
		var $$ = $( this );

		// Check the content
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var email = $$.find( 'input[name="email"]' );

		if( email.val() === '' || ! re.test( email.val() ) ) {
			e.preventDefault();
			alert( $$.data( 'email-error' ) );
			return;
		}

		$( '#siteorigin-learn .learn-close' ).click();
	} );

	$( '#siteorigin-learn' ).find( '.main-poster, .play-button' ).click( function(){
		$( '#siteorigin-learn' )
			.find( '.poster-wrapper' ).hide().end()
			.find( '.video-iframe' ).show().html( $( '#siteorigin-learn .poster-wrapper' ).data( 'video' ) );
	} );
} );
