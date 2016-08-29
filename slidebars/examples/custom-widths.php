<?php
header('Content-Type: text/html; charset=utf-8'); 
?>
<html>
	<head>
		<title>Slidebars Custom Width Example</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Slidebars CSS -->
		<link rel="stylesheet" href="slidebars/slidebars.css">
		
		<!-- Example Styles -->
		<link rel="stylesheet" href="example-styles.css">
	</head>
	
	<body>	
		<div id="sb-site">
			<h1>Slidebars Custom Width Example</h1>
			<p>In this example both Slidebars have custom widths. You can set these by adding the modifier class '.sb-width-custom' to your Slidebar, and pass the width as a data attribute 'data-sb-width'. This can be a px or % value.</p>
			<p>The left Slidebar has a width of 50%, and the right Slidebar has a width of 100px, no matter what the screen size.</p> 
			<ul>
				<li class="sb-toggle-left">Toggle left Slidebar</li>
				<li class="sb-toggle-right">Toggle right Slidebar</li>
				<li class="sb-open-left">Open left Slidebar</li>
				<li class="sb-open-right">Open right Slidebar</li>
				<li class="sb-close">Close either Slidebar</li>
			</ul>
			
			<h2>More Examples</h2>
			<ul>
				<li><a href="control-classes.html">Control Classes</a></li>
				<li><a href="api-usage.html">API Usage</a></li>
				<li><a href="mobile-only.html">Mobile Only</a></li>
				<li><a href="animation-styles.html">Animation Styles</a></li>
				<li><a href="optional-widths.html">Optional Widths</a></li>
				<li><a href="custom-widths.html">Custom Widths</a></li>
				<li><a href="scroll-lock.html">Scroll Lock</a></li>
				<li><a href="slidebar-links.html">Slidebar Links</a></li>
				<li><a href="static-slidebars.html">Static Slidebars</a></li>
				<li><a href="momentum-scrolling.html">Momentum Scrolling</a></li>
				<li><a href="left-slidebar-only.html">Left Slidebar Only</a></li>
				<li><a href="right-slidebar-only.html">Right Slidebar Only</a></li>
			</ul>
		</div>
		
		<div class="sb-slidebar sb-left sb-width-custom" data-sb-width="50%">
			<!-- Your left Slidebar content. -->
		</div>
		
		<div class="sb-slidebar sb-right sb-width-custom" data-sb-width="100px">
			<!-- Your right Slidebar content. -->
		</div>
				
		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<!-- Slidebars -->
		<script src="slidebars/slidebars.js"></script>
		<script>
			(function($) {
				$(document).ready(function() {
					$.slidebars();
				});
			}) (jQuery);
		</script>
	</body>
</html>