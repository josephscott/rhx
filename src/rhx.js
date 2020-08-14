"use strict";

var rhx = {
	// Issue GET request via XHR
	//
	// url: Target URL for the request
	// options.on_load: Function called for on_load event
	// options.on_error: Function called for on_error event
	get( url, options ) {
		// Defaults
		var opt = {
			on_load: function( e ) { console.log( e ); },
			on_error: function( e ) { console.log( e ); }
		};

		// Over ride defaults with provided options
		for ( var i in options ) {
			opt[i] = options[i];
		}

		var xhr = new XMLHttpRequest();
		xhr.addEventListener( "load", opt.on_load );
		xhr.addEventListener( "error", opt.on_error );

		xhr.open( "GET", url );
		xhr.setRequestHeader( "X-RHX", 1 );

		xhr.send();
	}
};
