<!DOCTYPE html>
<html>
<head>
<?php require "head.php"; ?>
<link rel="stylesheet" title="default" type="text/css" href="assets/demo.css"/>	

<script type="text/javascript">
	
	$(function() {
		
		$.akita.setDefaults({backgroundColor: "#ffffff", fontColor: "#994f00"});
		
		$("h1").akita({animationTime: 500});
		$("h2").akita({content: "This is some really long speech bubble that has a lot of text so it wraps around and demonstrates the layout where there are multiple lines of text."});
		//var dom = $.akita.show({x: 200, y: 100});
		//console.log(dom);
		//$("h2").akita("destroy");
		//$.akita.hide();
		
		$("#somelist").akita({showEvent: "click", showTime: 1500, content: "This is a ul with id 'somelist'"});
		
		$("#somelist li").each(function(index){
			$(this).akita({content: "This is a list item #" + (index+1)});
		});
		
		var options = {hideEvent: "click", content: "I am a red box... Click on me to hide!", backgroundColor: "#610B21", fontColor: "#F7D358"};
		$("#redbox").akita(options);
		
		var options = {content: "I am a link!"};
		$("a").akita(options);
		
		var options = {content: "Oh Canada!"};
		$("#flag").akita(options);
		
		var options = {content: "M'erica!"};
		$("#usa").akita(options);
		
		var options = {content: "I am the third paragraph..."};
		$("p").eq(2).akita(options);
		
		var options = {content: "I am a horizontal list item"};
		$("#hList li").akita(options);
		
		$("#hello").load(function(){
			var options = {content: "I always talk out of my <a href='http://github.com/pyuan' target='_blank'>right side</a>!", element: $(this),
				placement: $.akita.PLACEMENT_RIGHT};
			$.akita.show(options);
		});
		
	});	
	
</script>
	
</head>
<body>
	
	<div class="content">
		<h1 id="title">Hello Akita</h1>
		<h2>A jQuery based speech bubble plugin</h2>
		
		<ul id="somelist">
			<li>This is item #1</li>
			<li>This is item #2</li>
			<li>This is item #3</li>
			<li>This is item #4</li>
			<li>This is item #5</li>
			<li>This is item #6</li>
			<li>This is item #7</li>
			<li>This is item #8</li>
			<li>This is item #9</li>
			<li>This is item #10</li>
			<li>This is item #11</li>
			<li>This is item #12</li>
			<li>This is item #13</li>
			<li>This is item #14</li>
			<li>This is item #15</li>
		</ul>
		
		<div id="redbox"></div>
		
		<a href="javascript: void(0);">I am a link that doesn't go anywhere</a>
		
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vehicula vulputate lacus id ultricies. Aenean tincidunt dignissim ligula at ultricies. Fusce at felis ac lacus volutpat gravida. Suspendisse laoreet urna sed ante gravida mattis. Duis tempor aliquam risus, sed rutrum ipsum dapibus ac. Quisque tellus lorem, aliquet vitae cursus sit amet, lacinia eget orci. Aliquam in nibh neque, in volutpat ipsum. Praesent vitae tortor sapien. In faucibus lorem ante, at pharetra libero. Maecenas sed odio arcu. Duis id vehicula mi.</p>
		<p>Duis in lobortis velit. Nullam sed nunc libero, nec blandit lacus. Pellentesque id adipiscing odio. Sed tortor leo, consequat non gravida quis, suscipit a metus. Donec libero nibh, tristique in pulvinar at, lacinia et neque. In hac habitasse platea dictumst. Nam tincidunt quam laoreet orci sodales sagittis. Praesent dignissim ullamcorper felis sed interdum. Aenean auctor eros id dolor auctor at volutpat ante semper.</p>
		<p>Proin scelerisque imperdiet dolor, nec laoreet magna feugiat eget. Donec aliquet auctor arcu, et malesuada ipsum egestas vel. Ut ante mi, sollicitudin non tempor quis, vestibulum eu augue. Quisque risus mauris, molestie ut laoreet fringilla, vestibulum nec sem. <a href="javascript: void(0);">Aenean eleifend</a> porttitor mauris, ac faucibus sem sollicitudin a. Vivamus dui mi, lacinia non mollis bibendum, mattis elementum lacus. Integer a arcu libero, sit amet euismod ligula.</p>
		<p>Suspendisse tempor vestibulum turpis, a ultricies orci tempor sed. Nam at nulla nibh, vel congue turpis. Nulla tincidunt risus eget velit iaculis ultricies. Pellentesque pellentesque vestibulum eros ac tempor. Aliquam vitae dui nec tellus eleifend cursus in a neque. Maecenas non odio diam, eu dignissim est. Vestibulum accumsan, velit ut auctor consequat, sapien dui condimentum felis, bibendum cursus lectus magna sed diam. Phasellus accumsan rhoncus tristique. Maecenas tincidunt, enim sit amet dictum fermentum, leo ipsum placerat felis, ac accumsan velit nunc condimentum erat. Vestibulum posuere magna ac dolor tempor malesuada. Nunc a ante nec eros vestibulum egestas eget sed enim. Nulla dictum venenatis iaculis.</p>
		<p>Pellentesque magna ante, dictum vitae varius in, scelerisque id urna. Quisque tincidunt sem vitae libero condimentum pretium non id elit. Suspendisse in nunc nisi, sit amet semper eros. Ut porttitor eleifend pretium. Sed ut justo eget lectus scelerisque egestas. Nullam urna lectus, hendrerit non rutrum quis, scelerisque quis metus. Curabitur dapibus neque eu dui interdum iaculis. Pellentesque urna sapien, facilisis a consectetur ac, feugiat in justo. Aliquam erat volutpat. Cras at auctor est. Mauris tempor magna vel eros dignissim dictum. Donec quis massa nec sem cursus imperdiet aliquet ut nisi. Nam sapien elit, porta vitae fringilla in, interdum nec nisl. Aenean dolor dolor, sagittis vel lobortis in, laoreet et lectus. Duis auctor pellentesque mattis. Fusce congue arcu in lorem dignissim feugiat.</p>
		
		<img id="usa" src="assets/images/usa.jpeg"/>
		
		<ul id="hList">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	
	<div class="test">
		<h2>I am in an absolute div</h2>
	</div>
	
	<img id="flag" src="assets/images/canada.gif"/>
	
	<img id="hello" src="assets/images/hello_kitty.gif"/>
	
</body>
</html> 	