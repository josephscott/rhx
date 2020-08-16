<?php
if ( !empty( $_SERVER['HTTP_X_RHX'] ) && (int) $_SERVER['HTTP_X_RHX'] === 1 ) {
	// test_001
	if ( count( $_GET ) === 0 ) {
		echo 'RESPONSE';
	}

	// test_002
	if ( count( $_GET ) >= 1 ) {
		print_r( $_GET );
	}

	exit;
}
?>
<html>
<head>
	<title>Test Page: rhx</title>
	<script src="../src/rhx.js"></script>
	<style>
	.big-blocks {
		float: left;
		padding: 0 5px 5px 5px;
		width: 45%;
	}
	.border-left {
		border-left: 1px solid #bebebe;
	}
	</style>
	<script>
	function show_results( test_name, resp_event ) {
		console.log( resp_event );

		var r = document.getElementById( "results" );
		r.innerHTML = "*** " + test_name + " ***\n";
		r.innerText += resp_event.target.responseText;
	}
	</script>
</head>
<body>

<h1>Test Page: rhx</h1>

<p>
The raw XHR response object is also logged in the console.
</p>

<p><pre>
<script>document.write( show_results.toString() );</script>
</pre></p>

<div class="big-blocks">
<h3>Actions</h3>
<hr />

<p>
<script>
function test_001() {
	rhx.get( "", { on_load: function( e ) { show_results( "test_001", e ); } } );
}
document.write( test_001.toString() );
</script>
<p><button type="button" onclick="test_001()">Test 001: Simple GET</button></p>
</p>
<hr />

<p>
<script>
function test_002() {
	rhx.get( "?color=green&animal=dog", { on_load: function( e ) { show_results( "test_002", e ); } } );
}
document.write( test_002.toString() );
</script>
<p><button type="button" onclick="test_002()">Test 002: GET with variables</button></p>
</p>
<hr />

</div>

<div class="big-blocks border-left">
<h3>Results</h3>
<hr />

<pre id="results"></pre>

</div>

</body>
</html>
