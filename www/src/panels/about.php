<p>Akita is a light-weight and customizable jQuery plugin that helps web developers create smarter tooltips easily and efficiently.</p>
<p>Akita requires <a id="jquery" href="http://www.jquery.com" target="_blank">jQuery</a> and is released under the open source license <a id="mit" href="http://en.wikipedia.org/wiki/MIT_License" target="_blank">MIT</a>. Anyone can modify and use Akita without any restriction.</p>
<p>Any feedback, comments and suggestions are always welcome, <span id="email" class="em">email</span> or <a id="tweet" href="https://twitter.com/pyuan" target="_blank">tweet</a> me.</p>

<script type="text/javascript">

	$(function() {
		
		var options = {content: "Probably will work with jQuery v.1.5+"};
		$(".panel#about #jquery").akita(options);
		
		var options = {content: "What is \"MIT\""};
		$(".panel#about #mit").akita(options);
		
		var options = {content: "pyuana [at] gmail [dot] com"};
		$(".panel#about #email").akita(options);
		
		var options = {content: "@pyuan"};
		$(".panel#about #tweet").akita(options);
		
	});	
	
</script>



