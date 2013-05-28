<h2>Call show() directly</h2>
<p>It is not required to use an event to show a speech bubble, you can programmatically show a speech bubble and use all the same available options by calling <span class="highlight">$.akita.show(options)</span>. This method also returns the DOM element of the resulting speech bubble.</p>

<div class="demo">
	<a href="javascript: void(0);">Mouse-over me and wait 1 second</a>
</div>

<pre class="brush: javascript;">
	
	/**
	 * show a speech bubble by calling $.akita.show() and position it on an element; and hide it after a second.
	 */
	var element = $("css selector");
	$(element).mouseover(function(){
		setTimeout(function(){
			var speechBubble = $.akita.show({element: element, showTime: 1000, content: "I will go away in just a second"});
			
			//do something with the speechBubble DOM element
			
		}, 1000);
	});

</pre>

<script type="text/javascript">
	$(function() {
		
		var element = $(".panel#show .demo").get(0);
		$(element).mouseover(function(){
			setTimeout(function(){
				var speechBubble = $.akita.show({element: element, showTime: 1000, content: "I will go away in just a second"});
			}, 1000);
		});

	});	
</script>

<h2 style="margin-top: 50px;">Call hide() directly</h2>
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
		
		var ele = $(".panel#show .demo").get(1);
		$(ele).akita({content: "Click on me to call hide()", hideEvent: ""}).click(function(){
			$.akita.hide({element: ele});
		});

	});	
</script>