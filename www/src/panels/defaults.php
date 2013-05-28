<h2>Overriding defaults</h2>
<p>Sometimes it may be tedius to have to set the same values over and over again for all the different speech bubbles. Instead, you can call <span class="highlight">$.akita.setDefaults(options)</span> to override any of the default options so any of the speech bubble created following this call will abide by the new defaults.</p>

<div class="demo">
	<a href="javascript: void(0);">Mouse over me</a>
</div>

<pre class="brush: javascript;">
	
	/**
	 * set new defaults
	 */
	$.akita.setDefaults({backgroundColor: "#bbbbbb", fontColor: "#000000"});
	
	/**
	 * now any speech bubble created after the setDefaults call 
	 * will inherit the new defaults
	 */
	var ele = $("css selector");
	$(ele).akita({content: "<b>I got new defaults</b>"});

</pre>

<script type="text/javascript">
	$(function() {
		
		$.akita.setDefaults({backgroundColor: "#bbbbbb", fontColor: "#000000"});
		var ele = $(".panel#defaults .demo");
		$(ele).akita({content: "<b>I got new defaults</b>"});
		$.akita.setDefaults({backgroundColor: "#ffffff", fontColor: "#994f00"}); //reset defaults just in case

	});	
</script>



