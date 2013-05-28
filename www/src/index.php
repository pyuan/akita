<!DOCTYPE html>
<html>
	<head>
		<?php require "head.php"; ?>
		<script type="text/javascript" src="main.js"></script>
		<link rel="stylesheet" title="default" type="text/css" href="assets/styles.css"/>	
	</head>
	<body>
		
		<div class="content">
			
			<div class="left">
				
				<div id="logo">
					<a href="#about"><img src="assets/images/logo.png"/></a>
				</div>
				
				<ul id="col1" class="nav">
					<li><a href="#about" alt="アバアオト">about</a></li>
					<li><a href="#download" alt="ダウンロード">download</a></li>
					<li><a href="#install" alt="インストール">install</a></li>
					<li><a href="demo.php" target="_blank" alt="デモ">demo</a></li>
				</ul>
				
				<ul id="col2" class="nav">
					<ul class="subnav">
						<li><a href="#simple" alt="">Show a simple speech bubble</a></li>
						<li><a href="#avail_options" alt="">Available options</a></li>
						<li><a href="#show" alt="">Call show() / hide() directly</a></li>
						<!--<li><a href="#hide" alt="">Call hide() directly</a></li>-->
						<li><a href="#custom_events" alt="">Set a different show/hide event</a></li>
						<li><a href="#show_time" alt="">Set a time to auto hide speech bubble</a></li>
						<li><a href="#colours" alt="">Change Colours</a></li>
						<li><a href="#defaults" alt="">Overriding defaults</a></li>
						<li><a href="#destroy" alt="">Destroy</a></li>
					</ul>
				</ul>
				
			</div>
			
			<div class="right">
				
				<ul class="panels">
					<li id="about" class="panel"><?php require("panels/about.php"); ?></li>
					<li id="install" class="panel"><?php require("panels/install.php"); ?></li>
					<li id="download" class="panel"><?php require("panels/download.php"); ?></li>
					<li id="simple" class="panel usage"><?php require("panels/simple.php"); ?></li>
					<li id="avail_options" class="panel usage"><?php require("panels/avail_options.php"); ?></li>
					<li id="show" class="panel usage"><?php require("panels/show.php"); ?></li>
					<!--<li id="hide" class="panel usage"><?php require("panels/hide.php"); ?></li>-->
					<li id="custom_events" class="panel usage"><?php require("panels/custom_events.php"); ?></li>
					<li id="show_time" class="panel usage"><?php require("panels/show_time.php"); ?></li>
					<li id="colours" class="panel usage"><?php require("panels/colours.php"); ?></li>
					<li id="defaults" class="panel usage"><?php require("panels/defaults.php"); ?></li>
					<li id="destroy" class="panel usage"><?php require("panels/destroy.php"); ?></li>
				</ul>
				
			</div>

		</div>
		
		<?php require "footer.php"; ?>
		
		<!--<div id="beta"></div>-->
		
	</body>
</html>
