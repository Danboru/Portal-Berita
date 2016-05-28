(function($){
	var scroll = function(el, opts){
		var options = opts;
		var container = $(el);
		var content = container.html();
		$(el).css({
			'position': 'relative'
		});
		container.html("<div>"+content+"</div>");
		var firstone = container.children().first();
		firstone.css({
			'text-align': 'left',
			'position': 'absolute',
			'white-space': 'nowrap',
			'left': 0
		});
		var fulltextwidth = textwidth = parseInt(firstone.css("width"));	
		if(textwidth != NaN && textwidth > 0){
			containerwidth = parseInt(container.css("width"));
			while((containerwidth + textwidth) > fulltextwidth){
				firstone.clone().appendTo(container).css("left", fulltextwidth + options.spaceBetween);
				fulltextwidth += textwidth + options.spaceBetween;
			}
			var scrollf = function(){
				container.children().each(function(){
					leftposition = parseInt($(this).css("left"));
					if(leftposition + fulltextwidth - containerwidth == 0){
						leftposition = containerwidth;
					}
					$(this).css("left", leftposition - 1);
				});
			}
			var animation = setInterval(scrollf, options.scrollInterval);
			container.hover(
				function(){
					clearTimeout(animation);
				},
				function(){
					animation = setInterval(scrollf, options.scrollInterval);
				}
			);
		}
	}
	$.fn.scroller = function(options){
		var opts = $.extend({}, $.fn.scroller.defaults, options);
		return this.each(function(){
			new scroll($(this), opts);
		});
	}
	$.fn.scroller.defaults = {
		scrollInterval: 35,
		spaceBetween: 0
	}
})(jQuery);
$(function(){
	$("#scrollingtext").scroller({spaceBetween: 4});
});