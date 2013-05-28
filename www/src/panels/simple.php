<h2>Show a simple speech bubble</h2>
<p>To create an Akita speech bubble with all of the default options, select the DOM element and pass in an object with the property "content" to set the text/html of your speech bubble.</p>

<div class="demo">
	<a href="javascript: void(0);">Mouse over me</a>
</div>

<pre class="brush: javascript;">
	
	/**
	 * content can be html, however try to use only simple tags like b, i, h1 etc
	 */
	$("css selector").akita({content: "This is an Akita tooltip"});

</pre>

<script type="text/javascript">
	$(function() {
	
		$(".panel#simple .demo a").akita({content: "This is an Akita tooltip"});

	});	
</script>