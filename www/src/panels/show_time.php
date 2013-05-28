<h2>Set time to auto-hide</h2>
<p>An Akita speech bubble can be set to auto-hide after a certain amount of time, this can be set by in the options object with the key <span class="highlight">"showTime"</span>.</p>

<div class="demo">
	<a href="javascript: void(0);">Mouse over me</a>
</div>

<pre class="brush: javascript;">
	
	/**
	 * set a time so the speech bubble will hide after a certain amount of time
	 */
	var ele = $("css selector");
	var options = {content: "I will disappear in 2 seconds", showTime: 2000};
	$(ele).akita(options);

</pre>

<script type="text/javascript">
	$(function() {
		
		var ele = $(".panel#show_time .demo");
		$(ele).akita({content: "I will disappear in 2 seconds", showTime: 2000});

	});	
</script>



