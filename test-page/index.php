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
function show_results( resp_event ) {
	console.log( resp_event );

	var r = document.getElementById( "results" );
	r.innerText = JSON.stringify( resp_event, undefined, 2 );
}

function test_001() {
	console.log( "test_001" );

	rhx.get( "./", {
		on_load: function( e ) {
			show_results( e );
		}
	} );
}
</script>

</body>
</html>
