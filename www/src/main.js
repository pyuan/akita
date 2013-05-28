$(function() {
	
	//initialize syntax highlighter plugin
	SyntaxHighlighter.all();
	
	//set akita defaults
	$.akita.setDefaults({backgroundColor: "#ffffff", fontColor: "#994f00"});
	init();
	
});	

/**
 * init page
 * @param none
 */
function init()
{
	//var options = {content: "Play with caution"};
	//$("#beta").akita(options);
	
	var options = {content: "<b>\"Akita\"</b> is a jQuery plugin that makes creating tooltips easy on the web."};
	$("#logo").akita(options);
	
	var options = {content: "Usage"};
	$(".subnav").akita(options);
	
	//add tooltips and click event to nav links
	$(".nav a").each(function(){
		var txt = $(this).attr("alt");
		if(txt){
			var options = {content: txt};
			$(this).akita(options);
		}
	}).click(function(){
		var id = $(this).attr("href"); 
		if(id.indexOf("#") == -1) {
			window.open(url);
			return false;
		}
		
		var panel = $(".panels .panel" + id);
		scrollToPanel(panel);
	});
	
	//add click event to logo
	$("#logo").click(function(){
		scrollToPanel();
	});
	
	//show the panel based on the hash tag in the url
	var hash = window.location.hash;
	var panel = $(".panel" + hash);
	scrollToPanel(panel);
}

/**
 * scroll to a panel
 * @param panel, DOM element
 */
function scrollToPanel(panel)
{
	var parent = $(".right");
	if($(panel).size() > 0)
	{
		$(parent).scrollTo(panel, 350, {easing:'easeInOutBack', onAfter: function(){
			$(panel).scrollTo(0, 250);
		}});
	}
	else
	{
		//default panel
		var defaultPanel = $(".panel#about");
		scrollToPanel(defaultPanel);
		return false;
	}
	
	var selectedId = $(panel).attr("id");
	updateNav(selectedId);
}

/**
 * disable selected nav link and enable all other nav links
 * @param selectedId, string, selected panel id
 */
function updateNav(selectedId)
{
	$(".nav a").each(function(){
		if($(this).attr("href") == "#" + selectedId) {
			$(this).addClass("disabled");
		}
		else {
			$(this).removeClass("disabled");	
		}
	});
}










