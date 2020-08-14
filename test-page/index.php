<?php
if ( !empty( $_SERVER['HTTP_X_RHX'] ) && (int) $_SERVER['HTTP_X_RHX'] === 1 ) {
	// test_001
	if ( count( $_GET ) === 0 ) {
		echo 'RESPONSE';
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
</head>
<body>

<h1>Test Page: rhx</h1>

<p>
The raw XHR response object is also logged in the console.
</p>

<div class="big-blocks">
<h3>Actions</h3>
<hr />

<p><button type="button" onclick="test_001()">Test 001: Simple GET</button></p>

</div>

<div class="big-blocks border-left">
<h3>Results</h3>
<hr />

<pre id="results"></pre>

</div>

<script>
function show_results( test_name, resp_event ) {
	console.log( resp_event );

	var r = document.getElementById( "results" );
	r.innerHTML = "*** " + test_name + " ***\n"; 
	r.innerText += resp_event.target.responseText;
}

function test_001() {
	rhx.get( "./", { on_load: function( e ) { show_results( "test_001", e ); } } );
}
</script>

</body>
</html>
