<?php
if ( !empty( $_SERVER['HTTP_X_RHX'] ) && (int) $_SERVER['HTTP_X_RHX'] === 1 ) {
	if ( $_GET['test'] === 'test_001' ) {
		echo 'GET Response';
	}

	if ( $_GET['test'] === 'test_002' ) {
		print_r( $_GET );
	}

	if ( $_GET['test'] === 'test_003' ) {
		echo 'POST Response';
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
	.border-right {
		border-right: 1px solid #bebebe;
	}
	.clear {
		clear: both;
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

<div class="big-blocks border-right">
<h3>Actions</h3>
<hr />

<p>
<script>
function test_001() {
	rhx.get( "?test=test_001", { on_load: function( e ) { show_results( "test_001", e ); } } );
}
document.write( test_001.toString() );
</script>
<p><button type="button" onclick="test_001()">Test 001: Simple GET</button></p>
</p>
<hr />

<p>
<script>
function test_002() {
	rhx.get( "?test=test_002&color=green&animal=dog", { on_load: function( e ) { show_results( "test_002", e ); } } );
}
document.write( test_002.toString() );
</script>
<p><button type="button" onclick="test_002()">Test 002: GET with variables</button></p>
</p>
<hr />

<p>
<script>
function test_003() {
	rhx.post( "?test=test_003", { on_load: function( e ) { show_results( "test_003", e ); } } );
}
document.write( test_003.toString() );
</script>
<p><button type="button" onclick="test_003()">Test 003: Simple POST</button></p>
</p>

</div>

<div class="big-blocks">
<h3>Results</h3>
<hr />

<pre id="results"></pre>

</div>

<hr class="clear" />
<p><pre>
<script>document.write( show_results.toString() );</script>
</pre></p>

</body>
</html>
