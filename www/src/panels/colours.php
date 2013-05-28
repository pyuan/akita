<h2>Change Colours</h2>
<p>The Akita speech bubble accepts user specified <span class="highlight">"backgroundColor"</span> and <span class="highlight">"fontColor"</span> as options. Both values require a "#" prefix.</p>

<div class="demo">
	<a href="javascript: void(0);">Mouse over me</a>
</div>

<pre class="brush: javascript;">
	
	/**
	 * setting different colours for the speech bubble
	 */
	var ele = $("css selector");
	var options = {content: "I have style", backgroundColor: "#1a1a1a", fontColor: "#eaeaea"};
	$(ele).akita(options);

</pre>

<script type="text/javascript">
	$(function() {
		
		var ele = $(".panel#colours .demo");
		$(ele).akita({content: "I have style", backgroundColor: "#1a1a1a", fontColor: "#eaeaea"});

	});	
</script>



