<h2>Change show/hide event</h2>
<p>By default, Akita hides the speech bubble on the mouse leave event of the selected element. You can change the <span class="highlight">"hideEvent"</span> by passing it in the options. Similarly, the same applies for the <span class="highlight">"showEvent"</span></p>

<div class="demo">
	<a href="javascript: void(0);">Click on me</a>
</div>

<pre class="brush: javascript;">
	
	/**
	 * Override the default show and hide events
	 */
	var ele = $("css selector");
	var options = {content: "Click to show, mouse over to hide", showEvent: "click", hideEvent: "mouseenter"};
	$(ele).akita(options);

</pre>

<script type="text/javascript">
	$(function() {
		
		var ele = $(".panel#custom_events .demo");
		$(ele).akita({content: "Click to show, mouse over to hide", showEvent: "click", hideEvent: "mouseenter"});

	});	
</script>



