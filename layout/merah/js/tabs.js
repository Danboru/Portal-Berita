jQuery(document).ready(function() {
	setTimeout("size_pictures()",500);
	setTimeout("size_pictures()",1000);
});

var global_triple_box_locked = false;

jQuery(document).ready(function() {	
	jQuery(".kernel_triple_btn").click(function() {
		if(global_triple_box_locked == false) {
			global_triple_box_locked = true;
			
			var btn_id = jQuery(this).attr("id");
			var widget_id = get_widget_id(btn_id);
			var block_id = get_block_id(btn_id);
			
			if(jQuery("#kernel_triple_popular_btn_" + widget_id).hasClass("tab-1-disabled") == false) {
				jQuery("#kernel_triple_popular_btn_" + widget_id).removeClass("active");
				jQuery("#kernel_triple_popular_btn_" + widget_id).addClass("tab-1-disabled");
			}
			if(jQuery("#kernel_triple_popular_btn_" + widget_id).hasClass("active") == true) {
				jQuery("#kernel_triple_popular_btn_" + widget_id).removeClass("active");
			}
					
			if(jQuery("#kernel_triple_recent_btn_" + widget_id).hasClass("tab-1-disabled") == false) {
				jQuery("#kernel_triple_recent_btn_" + widget_id).addClass("tab-1-disabled");
			}
			if(jQuery("#kernel_triple_recent_btn_" + widget_id).hasClass("tab-1-disabled") == true) {
				jQuery("#kernel_triple_recent_btn_" + widget_id).removeClass("active");
			}	
			
			if(jQuery("#kernel_triple_comments_btn_" + widget_id).hasClass("tab-1-disabled") == false ) {
				jQuery("#kernel_triple_comments_btn_" + widget_id).addClass("tab-1-disabled");
			}		
			if(jQuery("#kernel_triple_comments_btn_" + widget_id).hasClass("tab-1-disabled") == true ) {
				jQuery("#kernel_triple_comments_btn_"  + widget_id).removeClass("active");
			}
			


			jQuery("#"+btn_id).removeClass("tab-1-disabled");
			jQuery("#"+btn_id).addClass("active");
			
			
			if(jQuery("#kernel_triple_popular_" + widget_id).css("display") != "none") {
				var old_block = "kernel_triple_popular";
			}
			if(jQuery("#kernel_triple_recent_" + widget_id).css("display") != "none") {
				var old_block = "kernel_triple_recent";
			} 
			if(jQuery("#kernel_triple_comments_" + widget_id).css("display") != "none") {
				var old_block = "kernel_triple_comments";
			}
			
			
			jQuery("#" + old_block + "_" + widget_id).fadeOut("medium",function() {
				
				jQuery("#" + block_id + "_" + widget_id).fadeIn("fast",function() {
					global_triple_box_locked = false;
					menu_cleanup(block_id,widget_id);
				});
			});
		}
		
		
			Cufon.replace('.tabs-1 a', { hover: 'true' } );
			return false;
	
	});
});

function get_widget_id(str) {
	if(str.search("kernel_triple_popular_btn_") != -1) {
		var btn = "kernel_triple_popular_btn_";
		return str.substr(btn.length);
		
	} else if(str.search("kernel_triple_recent_btn_") != -1) {
		var btn = "kernel_triple_recent_btn_";
		return str.substr(btn.length);
		
	} else if(str.search("kernel_triple_comments_btn_") != -1) {
		var btn = "kernel_triple_comments_btn_";
		return str.substr(btn.length);
		
	} else {
		return 0;
	}
}

function get_block_id(str) {
	
	if(str.search("kernel_triple_popular") != -1) {
		var btn = "kernel_triple_popular";
		return str.substr(0,btn.length);
		
	} else if(str.search("kernel_triple_recent") != -1) {
		var btn = "kernel_triple_recent";
		return str.substr(0,btn.length);
		
	} else if(str.search("kernel_triple_comments") != -1) {
		var btn = "kernel_triple_comments";
		return str.substr(0,btn.length);
		
	} else {
		return 0;
	}

}

function menu_cleanup(block_id,widget_id) {
	if(block_id == "kernel_triple_comments") {
		jQuery("#kernel_triple_popular_" + widget_id).hide();
		jQuery("#kernel_triple_recent" + widget_id).hide();
	}
	if(block_id == "kernel_triple_popular_") {
		jQuery("#kernel_triple_comments" + widget_id).hide();
		jQuery("#kernel_triple_recent" + widget_id).hide();
	}
	if(block_id == "kernel_triple_recent") {
		jQuery("#kernel_triple_comments" + widget_id).hide();
		jQuery("#kernel_triple_popular_" + widget_id).hide();
	}
}

function roundNumber(num, dec) {
	var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
}

function size_pictures() {
	
	var text_width = jQuery('.left-side').width();
	if(jQuery('.item.image').width) {
		text_width = text_width - jQuery('.item.image').width();
		
	}
	
	jQuery('.text img').each(function(index)  {
	  if (jQuery(this).width() > text_width - 200) {
			var width = jQuery(this).width();
			var height = jQuery(this).height();
			var ratio = roundNumber(width/height,2);
			width = text_width - 200;
			height = roundNumber(width/ratio,0)
			jQuery(this).css('width', width+'px');
			jQuery(this).css('height', height+'px');
	  }
	});
	jQuery('.text .wp-caption').each(function(index) {
		if (jQuery(this).width() > text_width - 200) {
			jQuery(this).css('width', (text_width - 10) + 'px');
		}
	});
	jQuery('.text embed').each(function(index) {
		var url = jQuery(this).attr("src");
		var is_youtube = url.search("youtube.com");
		if (jQuery(this).width() > text_width && is_youtube != -1 ) {
			var width = jQuery(this).width();
			var height = jQuery(this).height();
			var ratio = roundNumber(width/height,2);
			width = text_width - 200;
			height = roundNumber(width/ratio,0)
			jQuery(this).css('width', width+'px');
			jQuery(this).css('height', height+'px');
		}
	});
		jQuery('.text object').each(function(index) {
		var url = jQuery(this).attr("src");
		if (jQuery(this).width() > text_width - 200 ) {
			var width = jQuery(this).width();
			var height = jQuery(this).height();
			var ratio = roundNumber(width/height,2);
			width = text_width - 200;
			height = roundNumber(width/ratio,0)
			jQuery(this).css('width', width+'px');
			jQuery(this).css('height', height+'px');
		}
	});
}