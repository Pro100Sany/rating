<?php
header('Content-Type: text/html; charset=utf-8'); 
?>
<html>
	<head>
		<title>Slidebars Mobile Only Example</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Slidebars CSS -->
		<link rel="stylesheet" href="slidebars/slidebars.css">
		
		<!-- Example Styles -->
		<link rel="stylesheet" href="example-styles.css">
	</head>
	
	<body>	
		<div id="sb-site">
			<h1>Slidebars Mobile Only Example</h1>
			<p>There is text below to control the Slidebars, only visible on screens smaller than 480px. Should the screen width expand past 480px (or your set width) when a Slidebar is open, the Slidebar will be closed. Try it now, resize your window.</p>
			<h2>Control Classes</h2>
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
		
		<div class="sb-slidebar sb-left">
			<!-- Your left Slidebar content. -->
		</div>
		
		<div class="sb-slidebar sb-right">
			<!-- Your right Slidebar content. -->
		</div>
				
		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<!-- Slidebars -->
		<script src="slidebars/slidebars.js"></script>
		<script>
			(function($) {
				$(document).ready(function() {
					$.slidebars({
						disableOver: 480,
						hideControlClasses: true
					});
				});
			}) (jQuery);
		</script>
	</body>
</html>