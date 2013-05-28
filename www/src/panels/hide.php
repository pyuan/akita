<h2>Call hide() directly</h2>
<p>Similar to $.akita.show(), it is not required to use an event to hide a speech bubble. You can programmatically hide a speech bubble by calling <span class="highlight">$.akita.hide(options)</span>.</p>
<p>The only option available for this call is "element", if specified, only speech bubbles positioned based on the element will be hidden. If not specified, all speech bubbles will be hidden.</p>

<div class="demo">
	<a href="javascript: void(0);">Click on me to call $.akita.hide()</a>
</div>

<pre class="brush: javascript;">
	
	/**
	 * show a speech bubble and call $.akita.hide() when the element is clicked
	 */
	var ele = $("css selector");
	$(ele).akita({content: "Click on me to call hide()", hideEvent: ""})
		  .click(function(){
		  	$.akita.hide({element: ele});
		  });

</pre>

<script type="text/javascript">
	$(function() {
		
		var ele = $(".panel#hide .demo");
		$(ele).akita({content: "Click on me to call hide()", hideEvent: ""}).click(function(){
			$.akita.hide({element: ele});
		});

	});	
</script>