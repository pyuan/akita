/**
 * This plugin was developed by Paul Yuan
 * This plugin create a speech bubble tooltip base on the specified options
 * This plugin requires jQuery 1.7 and above
 * This plugin is released under the MIT license and anyone can use and modify without any restriction
 * http://www.paulyuan.ca
 */
(function($) {
	
	$.fn.akita = function(options) 
	{
		var opts = $.extend({}, $.fn.akita.options, options);
		
		return this.each(function() {
			if(!isDestroyCommand(opts))
			{
				var copy = $.extend({}, opts);
				copy.element = $(this);
				$(this).data($.akita.NAMESPACE, copy);
				
				$(this).bind(opts.showEvent + "." + $.akita.NAMESPACE, function(){
					var opts = $(this).data($.akita.NAMESPACE);
					$.akita.show(opts);
				});
				
				if(opts.showTime == -1 && opts.hideEvent)
				{
					$(this).bind(opts.hideEvent + "." + $.akita.NAMESPACE, function(){
						var opts = $(this).data($.akita.NAMESPACE);
						$.akita.hide(opts);
					});
				}
			}
			
			//destroy speech bubble 
			else
			{
				$.akita.hide();
				$(this).unbind(opts.showEvent + "." + $.akita.NAMESPACE);
				$(this).unbind(opts.hideEvent + "." + $.akita.NAMESPACE);
				$(this).removeData($.akita.NAMESPACE);
			}
	    });
	
		/**
		 * check to see if options is a destroy command
		 * @param options, object
		 * @return isDestroyCommand, boolean
		 */
	    function isDestroyCommand(options) 
	    {
	    	var command = "";
	    	for(var i=0; i<=$.akita.DESTROY_COMMAND.length; i++)
	    	{
	    		if(!options.hasOwnProperty(i)){
	    			break;
	    		}
	    		command += options[i];
	    	}
	    	return command == $.akita.DESTROY_COMMAND;
	    }
	}
	
	/**
	 * customization options
	 * @param content, string, can be html
	 * @param animationTime, int time in ms for the animation, -1 to show no animation
	 * @param showTime, int time in ms for the speech bubble to stay visible, if specified, will override hideEvent; specify to auto hide bubble after time
	 * @param maxWidth, int maximum width of the speech bubble in px
	 * @param backgroundColor, string, hexadecimal value of the colour, requires "#" prefix
	 * @param fontColor, string, hexadecimal value of the colour, requires "#" prefix
	 * @param showEvent, string, jquery event name to show the speech bubble
	 * @param hideEvent, sring, jquery event name to hide the speech bubble, can be overriden by specifying 'showTime'
	 * @param x, int, x position of the speech bubble, if not set, center on specified element and adjust based on position in window 
	 * @param y, int y position of the speech bubble, if not set, center on specified element and adjust based on position in window
	 * @param element, DOM element to position the speech bubble, only needed if x and y are not specified
	 */
	$.fn.akita.options = 
	{
		content: "This is an <b><i>Akita</i></b> Speech Bubble",
		animationTime: 150,
		showTime: -1,
		maxWidth: 200,
		backgroundColor: "#1a1a1a",
		fontColor: "#eaeaea",
		showEvent: "mouseenter",
		hideEvent: "mouseleave",
		x: -1,
		y: -1,
		element: undefined
	}

})(jQuery);

/**
 * akita specific functions
 */
jQuery.extend({
	
    akita: 
    {
    	/**** constants ****/
    	NAMESPACE : "akita",
    	DESTROY_COMMAND : "destroy",
    	SPEECH_BUBBLE_CLASS : "akitaSpeechBubble",
    	PLACEMENT_MARGIN : 15, //used to position speech bubble from specified DOM element
    	SPEECH_BUBBLE_TIP_LENGTH : 10,
    	
    	//constants used to position the speech bubble tip
    	PLACEMENT_TOP : "top",
    	PLACEMENT_BOTTOM : "bottom",
    	PLACEMENT_LEFT : "left",
    	PLACEMENT_RIGHT : "right",
    	PLACEMENT_TOPLEFT : "topLeft",
    	PLACEMENT_TOPRIGHT : "topRight",
    	PLACEMENT_BOTTOMLEFT : "bottomLeft",
    	PLACEMENT_BOTTOMRIGHT : "bottomRight",
    	
    	/**
    	 * show a tooltip 
    	 * requires x, y properties to be set or a DOM element set in the options object
    	 * @param options, object
    	 * @return speechBubble, DOM element
    	 */
    	show: function(options)
    	{
    		//minimum requirement not met
    		if( !options || (options.x == -1 || options.y == -1) && !options.element){
    			throw "Please specify the x, y position OR a DOM element to create the Akita Speech Bubble";
    		}
    		
    		//don't do anything if the speech bubble for the specified element is already showing
    		if(options.element)
    		{
    			var isAlreadyShowing = false;
    			$("." + this.SPEECH_BUBBLE_CLASS).each(function(){
    				var opts = $(this).data($.akita.NAMESPACE);
    				if(opts.element == options.element){
    					isAlreadyShowing = true;
    					return false;
    				}
    			});
    			
    			if(isAlreadyShowing){
    				return false;
    			}
    		}
    		
    		options = $.extend({}, $.fn.akita.options, options);
    		this.hide(options);

    		var content = $("<div/>").addClass("akita_content").html(options.content);
    		$(content).css("max-width", options.maxWidth).css("color", options.fontColor);
    		
    		var contentBackground = $("<div/>").addClass("akita_content_background");
    		$(contentBackground).css("background-color", options.backgroundColor);
    		
    		var contentContainer = $("<div/>").addClass("akita_content_container");
    		$(contentContainer).append(contentBackground).append(content);
    		
    		var speechBubble = $("<div/>").addClass(this.SPEECH_BUBBLE_CLASS).hide();
    		$(speechBubble).append(contentContainer);
    		$(speechBubble).data($.akita.NAMESPACE, options);
    		$("body").append(speechBubble);
    		
    		var pos = this.getSpeechBubblePosition(speechBubble, options);
    		
    		if(this.hasCanvasSupport())
    		{
    			var tip = $("<canvas/>").addClass("akita_speech_bubble_tip")
	    								.attr("width", this.SPEECH_BUBBLE_TIP_LENGTH)
	    								.attr("height", this.SPEECH_BUBBLE_TIP_LENGTH);
				$(speechBubble).append(tip);
				
				var context = $(tip).get(0).getContext('2d');
				if(context) 
				{
					context.strokeStyle = "#cccccc";
					context.lineWidth = 1;
					context.fillStyle = options.backgroundColor;
					context.beginPath();
					context.moveTo(0, 0);
					context.lineTo(this.SPEECH_BUBBLE_TIP_LENGTH/2, this.SPEECH_BUBBLE_TIP_LENGTH);
					context.lineTo(this.SPEECH_BUBBLE_TIP_LENGTH, 0);
					context.lineTo(0, 0);
					context.fill();
					context.stroke();
					context.closePath();
				}
	    		
	    		var tipX = 0;
	    		var tipY = 0;
	    		switch(pos.placement)
	    		{
	    			case this.PLACEMENT_TOP :
	    				tipX = ( $(speechBubble).width() - this.SPEECH_BUBBLE_TIP_LENGTH ) / 2;
	    				tipY = $(speechBubble).height() - 1;
	    				break;
	    				
	    			case this.PLACEMENT_BOTTOM :
	    				tipX = ( $(speechBubble).width() - this.SPEECH_BUBBLE_TIP_LENGTH ) / 2;
	    				tipY = - this.SPEECH_BUBBLE_TIP_LENGTH + 1;
	    				this.rotateElement(tip, 180);
	    				break;
	    			
	    			case this.PLACEMENT_LEFT : 
	    				tipX = $(speechBubble).width() - 1;
	    				tipY = ( $(speechBubble).height() - this.SPEECH_BUBBLE_TIP_LENGTH ) / 2;
	    				this.rotateElement(tip, -90);
	    				break;
	    				
	    			case this.PLACEMENT_RIGHT : 
	    				tipX = - this.SPEECH_BUBBLE_TIP_LENGTH + 1;
	    				tipY = ( $(speechBubble).height() - this.SPEECH_BUBBLE_TIP_LENGTH ) / 2;
	    				this.rotateElement(tip, 90);
	    				break;
	    			
	    			case this.PLACEMENT_TOPLEFT :
	    				tipX = $(speechBubble).width() - 1;
	    				tipY = this.SPEECH_BUBBLE_TIP_LENGTH;
	    				this.rotateElement(tip, -90);
	    				break;
	    				
	    			case this.PLACEMENT_BOTTOMLEFT :
	    				tipX = $(speechBubble).width() - 1;
	    				tipY = $(speechBubble).height() - this.SPEECH_BUBBLE_TIP_LENGTH * 2;
	    				this.rotateElement(tip, -90);
	    				break;
	    				
	    			case this.PLACEMENT_TOPRIGHT :
	    				tipX = - this.SPEECH_BUBBLE_TIP_LENGTH + 1;
	    				tipY = this.SPEECH_BUBBLE_TIP_LENGTH;
	    				this.rotateElement(tip, 90);
	    				break;
	    				
	    			case this.PLACEMENT_BOTTOMRIGHT :
	    				tipX = - this.SPEECH_BUBBLE_TIP_LENGTH + 1;
	    				tipY = $(speechBubble).height() - this.SPEECH_BUBBLE_TIP_LENGTH * 2;
	    				this.rotateElement(tip, 90);
	    				break;
	    		}
	    		$(tip).css("left", tipX + "px").css("top", tipY + "px");
    		}
    		
    		$(speechBubble).css("left", pos.x + "px").css("top", pos.y + "px")
    					   .stop().fadeIn(options.animationTime, function(){
    					   	if(options.showTime >= 0){
    					   		var showTimerId = setTimeout(function(){
    					   			$.akita.hide(options); 
    					   			clearTimeout(showTimerId);
    					   		}, options.showTime);
    					   	}
    					   });
    		
    		return speechBubble;
    	},
    	
    	/**
    	 * hide tooltip, remove all previous instances of the tooltip if initiated from the same element
    	 * @param options, object [optional]
    	 */
    	hide: function(options)
    	{
    		options = $.extend({}, $.fn.akita.options, options);
    		
    		var hideSpeechBubble = function(speechBubble, animationTime)
    		{
    			$(speechBubble).stop().fadeOut(animationTime, function(){
	    			$(this).remove();
	    		});
    		}
    		
    		if(options.element)
    		{
    			$("." + this.SPEECH_BUBBLE_CLASS).each(function(){
    				var opts = $(this).data($.akita.NAMESPACE);
    				if(opts.element == options.element || 
    					$(opts.element).get(0).innerHTML == $(options.element).get(0).innerHTML)
    				{
    					hideSpeechBubble($(this), opts.animationTime);
    					return false;
    				}
    			});
    		}
    		
    		else
    		{
    			//hide all instances of the speech bubble if no match is found on element
				hideSpeechBubble($("." + this.SPEECH_BUBBLE_CLASS), options.animationTime);
    		}
    	},	
    	
    	/**
    	 * returns if canvas is supported by browser
    	 * @param none
    	 * @return canvasSupport, boolean
    	 */
    	hasCanvasSupport: function()
    	{
    		var elem = document.createElement('canvas');
  			return !!(elem.getContext && elem.getContext('2d'));
    	},
    	
    	/**
    	 * rotate an element in the DOM
    	 * using CSS
    	 * @param element, DOM element
    	 * @param angle, int angle to rotate to, allows for negative angles
    	 * @return element, original DOM element
    	 */
    	rotateElement: function(element, angle)
    	{
    		var angleStr = "rotate(" + angle + "deg)";
    		$(element).css("-webkit-transform", angleStr).css("-moz-transform", angleStr);
    		return element; 
    	},
    	
    	/**
    	 * get position of speech bubble
    	 * @param speechBubble, DOM element of the speech bubble
    	 * @param options, object
    	 * @return position, object {x:int, y:int, placement: string constant}
    	 */
    	getSpeechBubblePosition: function(speechBubble, options)
    	{
    		var pos = this.getElementPosition($(options.element).get(0));
    		var placement = this.PLACEMENT_TOP;
    		var x = options.x;
    		if(x == -1 && options.element)
    		{
    			x = pos.x;
    			x += ( $(options.element).width() - $(speechBubble).width() ) / 2;
    		}
    		
    		var y = options.y;
    		if(y == -1 && options.element)
    		{
    			y = pos.y;
    			y -= $(speechBubble).height() + $.akita.PLACEMENT_MARGIN;
    		}
    		
    		//if position is off to the right of the window
    		if(x + $(speechBubble).width() > $("body").scrollLeft() + $(window).width() - $.akita.PLACEMENT_MARGIN)
    		{
    			x = pos.x - $(speechBubble).width() - $.akita.PLACEMENT_MARGIN;
    			y = pos.y + ( $(options.element).height() - $(speechBubble).height() ) / 2;
    			placement = this.PLACEMENT_LEFT;
    		}
    		
    		//if position is off to the left of the window
    		else if(x < $("body").scrollLeft() + $.akita.PLACEMENT_MARGIN)
    		{
    			x = pos.x + $(options.element).width() + $.akita.PLACEMENT_MARGIN;
    			y = pos.y + ( $(options.element).height() - $(speechBubble).height() ) / 2;
    			placement = this.PLACEMENT_RIGHT;
    		}
    		
    		//if position is off to the top of the window
    		if(y < $("body").scrollTop() + $.akita.PLACEMENT_MARGIN)
    		{
    			if(placement != this.PLACEMENT_TOP){
    				y = $("body").scrollTop() + $.akita.PLACEMENT_MARGIN;
    				placement = placement == this.PLACEMENT_RIGHT ? this.PLACEMENT_TOPRIGHT : this.PLACEMENT_TOPLEFT;
    			}
    			else{
    				y = pos.y + $(options.element).height() + $.akita.PLACEMENT_MARGIN;
    				placement = this.PLACEMENT_BOTTOM;
    			}
    		}
    		
    		//if position is off to the bottom of the window
    		if(y + $(speechBubble).height() > $("body").height() - $.akita.PLACEMENT_MARGIN)
    		{
    			y = $("body").height() - $(speechBubble).height() - $.akita.PLACEMENT_MARGIN;
    			if(placement == this.PLACEMENT_TOP){
    				placement = this.PLACEMENT_BOTTOM;
    			}
    			else{
    				placement = placement == this.PLACEMENT_RIGHT ? this.PLACEMENT_BOTTOMRIGHT : this.PLACEMENT_BOTTOMLEFT;
    			}
    		}
    		
    		var position = {x: x, y: y, placement: placement};
    		return position;
    	},
    	
    	/**
    	 * get the absolute position of an element on the webpage
    	 * @param element, DOM element
    	 * @return pos {x:int, y:int}
    	 */
    	getElementPosition: function(element)
    	{
    		var pos = {x: 0, y: 0};
 			if(element){
 				pos = {x: $(element).offset().left, y: $(element).offset().top};
 			}
			return pos;
    	},
    	
    	/**
    	 * change the defaults for the plugin
    	 * any tooltips created prior to this call retains the original default options
    	 * @param newDefaults, object
    	 */
    	setDefaults: function(newDefaults)
    	{
    		var defaults = $.extend({}, $.fn.akita.options, newDefaults);
    		$.fn.akita.options = defaults;
    	}
		
    }
    
});






