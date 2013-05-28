<div class="footer">
	<div class="links">
		<a id="facebook" href="#" target="_blank"><img src="assets/images/icon_facebook.png"/></a>
		<a id="twitter" href="#" target="_blank"><img src="assets/images/icon_twitter.png"/></a>
		<a id="google" href="#" target="_blank"><img src="assets/images/icon_google.png"/></a>
		<a id="linkedin" href="#" target="_blank"><img src="assets/images/icon_linkedin.png"/></a>
	</div>
	
	<div class="text">
		Made by <a id="myLink" href="http://www.paulyuan.ca" target="_blank">Paul Yuan</a>, 2012 <?php if(date('Y') != "2012"){ echo "-" . date('Y'); } ?>
	</div>
</div>

<script type="text/javascript">

	$(function() {
		
		/**
		 * akita toolitps
		 */
		var options = {content: "My home on the web"};
		$("#myLink").akita(options);
		
		var options = {content: "Share Akita"};
		$(".footer .links").akita(options);
		
		/**
		 * share links 
		 */
		var linkToShare = escape("http://www.paulyuan.ca/akita");
		var titleToShare = escape("Akita - jQuery Speech Bubble Plugin");
		
		var url = "https://www.facebook.com/sharer.php?u=" + linkToShare + "&t=" + titleToShare;
		$(".links #facebook").attr("href", url);
		
		var url = "https://twitter.com/share?url=" + linkToShare + "&text=" + titleToShare;
		$(".links #twitter").attr("href", url);
		
		var url = "https://plus.google.com/share?url=" + linkToShare;
		$(".links #google").attr("href", url);
		
		var url = "http://www.linkedin.com/shareArticle?mini=true&url=" + linkToShare + "&title=" + titleToShare;
		$(".links #linkedin").attr("href", url);
		
	});	
	
</script>
