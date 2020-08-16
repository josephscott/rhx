"use strict";

var rhx = {
	// Issue GET request via XHR
	//
	// url: (string) Target URL for the request
	// options.on_load: (string) Function called for the on_load event
	// options.on_error: (string) Function called for the on_error event
	get( url, options ) {
		// Defaults
		var opt = {
			on_load: function( e ) { console.log( e ); },
			on_error: function( e ) { console.log( e ); }
		};

		// Override defaults with provided options
		for ( var i in options ) {
			opt[i] = options[i];
		}

		var xhr = new XMLHttpRequest();
		xhr.addEventListener( "load", opt.on_load );
		xhr.addEventListener( "error", opt.on_error );

		xhr.open( "GET", url );
		xhr.setRequestHeader( "X-RHX", 1 );

		xhr.send();
	},

	// Issue POST request via XHR
	//
	// url: (string) Target URL for the request
	// options.data: (object) Set of key / value pairs to send
	// options.on_load: (string) Function called for the on_load event
	// options.on_error: (string) Function called for the on_error event
	post( url, options ) {
		// Defaults
		var opt = {
			data: {},
			on_load: function( e ) { console.log( e ); },
			on_error: function( e ) { console.log( e ); }
		};

		// Override defaults with provided options
		for ( var i in options ) {
			opt[i] = options[i];
		}

		// Glue together the key/value pairs
		var encoded_pairs = [];
		for ( var k of Object.keys( opt.data ) ) {
			encoded_pairs.push(
				encodeURIComponent( k )
				+ "=" +
				encodeURIComponent( opt.data[k] )
			);
		}
		var encoded_data = encoded_pairs.join( "&" ).replace( /%20/g, "+" );

		var xhr = new XMLHttpRequest();
		xhr.addEventListener( "load", opt.on_load );
		xhr.addEventListener( "error", opt.on_error );

		xhr.open( "POST", url );
		xhr.setRequestHeader( "X-RHX", 1 );
		xhr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );

		xhr.send( encoded_data );
	}
};
