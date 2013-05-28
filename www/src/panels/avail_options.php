<h2>Available options</h2>
<p>Here are all the available options recognized by Akita, if not specified, default values will be used.</p>
<table class="options">
	<tr>
		<td>content</td>
		<td>Specifies the text/html string that goes into the speech bubble.</td>
	</tr>
	<tr>
		<td>animationTime</td>
		<td>Specifies the amount of time in milliseconds for the animation, use -1 to show no animation.</td>
	</tr>
	<tr>
		<td>showTime</td>
		<td>Specifies the amount of time in milliseconds for the speech bubble to stay visible; if specified, this will override the "hideEvent". The speech bubble will automatically hide after the specified time.</td>
	</tr>
	<tr>
		<td>maxWidth</td>
		<td>Specifies the maximum width of the speech bubble in pixels.</td>
	</tr>
	<tr>
		<td>backgroundColor</td>
		<td>Specifies the hexadecimal string value of the colour to be used for the background of the speech bubble, "#" prefix is required.</td>
	</tr>
	<tr>
		<td>fontColor</td>
		<td>Specifies the hexadecimal string value of the colour to be used for the text of the speech bubble, "#" prefix is required.</td>
	</tr>
	<tr>
		<td>showEvent</td>
		<td>Specifies the jquery event name string to show the speech bubble.</td>
	</tr>
	<tr>
		<td>hideEvent</td>
		<td>Specifies the jquery event name string to hide the speech bubble, will be ignored if "showTime" is specified.</td>
	</tr>
	<tr>
		<td>placement</td>
		<td>Specifies the placement of the speech bubble in relation to the element. <span class="highlight">If not specified, akita will always position the speech bubble within the viewable area of the window.</span> Possible values are "top", "bottom", "left", "right". You can also use constant values: "$.akita.PLACEMENT_TOP", "$.akita.PLACEMENT_BOTTOM", "$.akita.PLACEMENT_LEFT", "$.akita.PLACEMENT_RIGHT".</td>
	</tr>
	<tr>
		<td>x</td>
		<td>Specifies the x position as an integer of the speech bubble, if not set, it will center based on the element and adjust based on its position in the window.</td>
	</tr>
	<tr>
		<td>y</td>
		<td>Specifies the y position as an integer of the speech bubble, if not set, it will center based on the element and adjust based on its position in the window.</td>
	</tr>
	<tr>
		<td>element</td>
		<td>Specifies the DOM element to position the speech bubble; this is only needed if x and y are not specified.</td>
	</tr>
</table>

<div class="demo">
	<a href="javascript: void(0);">Mouse over me</a>
</div>

<pre class="brush: javascript;">
	
	/**
	 * Below are all the avilable options with the Akita default values
	 */
	var options = {
		content: "This is an <b><i>Akita</i></b> Speech Bubble",
		animationTime: 150,
		showTime: -1,
		maxWidth: 200,
		backgroundColor: "#1a1a1a",
		fontColor: "#eaeaea",
		showEvent: "mouseenter",
		hideEvent: "mouseleave",
		placement: "auto",
		x: -1,
		y: -1,
		element: undefined
	}
	$("css selector").akita(options);

</pre>

<script type="text/javascript">
	$(function() {
	
		$(".panel#avail_options .demo a").akita();

	});	
</script>