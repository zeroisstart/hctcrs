/**
 * @author Roger Wu
 */
(function($){
	$.pdialog = {
		_op:{height:300, width:500, minH:250, minW:300, total:20, max:false},
		_current:null,
		_zIndex:42,
		getCurrent:function(){
			return this._current;
		},
		reload:function(url, data){
			if (this._current) {
				var dialog = this._current;
				var jDContent = dialog.find(".dialogContent");
				jDContent.loadUrl(url, data, function(){
					jDContent.find("[layoutH]").layoutH(jDContent);
					$(".pageContent", dialog).width($(dialog).width()-14);
					$("button.close").click(function(){
						$.pdialog.close(dialog);
						return false;
					});
				});
			}
		},
		//打开一个层
		open:function(url, dlgid, title, options) {
			var dialog = $("body").data(dlgid);
			//重复打开一个层
			if(dialog) {
				if(dialog.is(":hidden")) {
					dialog.show();
				}
				dialog.find(".dialogHeader").find("h1").html(title);
				this.switchDialog(dialog);
				var jDContent = dialog.find(".dialogContent");
				jDContent.loadUrl(url, {}, function(){
					jDContent.find("[layoutH]").layoutH(jDContent);
					$(".pageContent", dialog).width($(dialog).width()-14);
					$("button.close").click(function(){
						$.pdialog.close(dialog);
						return false;
					});
				});
			} else {//打开一个全新的层

				$("body").append(DWZ.frag["dialogFrag"]);
				dialog = $(">.dialog:last-child", "body");
				dialog.data("id",dlgid);
				
				($.fn.bgiframe && dialog.bgiframe());
				
				dialog.find(".dialogHeader").find("h1").html(title);
				$(dialog).css("zIndex", ($.pdialog._zIndex+=2));
				$("div.shadow").css("zIndex", $.pdialog._zIndex - 3).show();
				$.pdialog._init(dialog, options);
				$(dialog).click(function(){
					$.pdialog.switchDialog(dialog);
				});
				dialog.jresize().dialogDrag();
				$("a.close", dialog).click(function(event){ 
					$.pdialog.close(dialog);
					return false;
				});
				$("a.maximize",dialog).click(function(event){
					$.pdialog.switchDialog(dialog);
					$.pdialog.maxsize(dialog);
					dialog.jresize("destroy").dialogDrag("destroy");
					return false;
				});
				$("a.restore",dialog).click(function(event){
					$.pdialog.restore(dialog);
					dialog.jresize().dialogDrag();
					return false;
				});
				$("a.minimize",dialog).click(function(event){
					$.pdialog.minimize(dialog);
					return false;
				});
				$("div.dialogHeader a", dialog).mousedown(function(){
					return false;
				});
				$("div.dialogHeader", dialog).dblclick(function(){
					if($("a.restore",dialog).is(":hidden"))
						$("a.maximize",dialog).trigger("click");
					else
						$("a.restore",dialog).trigger("click");
				});
				if(options.max) {
					$.pdialog.switchDialog(dialog);
					$.pdialog.maxsize(dialog);
					dialog.jresize("destroy").dialogDrag("destroy");
				}
				$("body").data(dlgid, dialog);
				$.pdialog._current = dialog;
				$.pdialog.attachShadow(dialog);
				//load data
				var jDContent = $(".dialogContent",dialog);
				jDContent.loadUrl(url, {}, function(){
					jDContent.find("[layoutH]").layoutH(jDContent);
					$(".pageContent", dialog).width($(dialog).width()-14);
					$("button.close").click(function(){
						$.pdialog.close(dialog);
						return false;
					});
				});
			}
			if (options.mask) {
				$(dialog).css("zIndex", 1000);
				$("a.minimize",dialog).hide();
				$(dialog).data("mask", true);
				$("#dialogBackground").show();
			}else {
				//add a task to task bar
				$.taskBar.addDialog(dlgid,title);
			}
		},
		/**
		 * 切换当前层
		 * @param {Object} dialog
		 */
		switchDialog:function(dialog) {
			var index = $(dialog).css("zIndex");
			$.pdialog.attachShadow(dialog);
			if($.pdialog._current) {
				var cindex = $($.pdialog._current).css("zIndex");
				$($.pdialog._current).css("zIndex", index);
				$(dialog).css("zIndex", cindex);
				$("div.shadow").css("zIndex", cindex - 1);
				$.pdialog._current = dialog;
			}
			$.taskBar.switchTask(dialog.data("id"));
		},
		/**
		 * 给当前层附上阴隐层
		 * @param {Object} dialog
		 */
		attachShadow:function(dialog) {
			var shadow = $("div.shadow");
			if(shadow.is(":hidden")) shadow.show();
			shadow.css({
				top: parseInt($(dialog)[0].style.top) - 2,
				left: parseInt($(dialog)[0].style.left) - 4,
				height: parseInt($(dialog).height()) + 8,
				width: parseInt($(dialog).width()) + 8,
				zIndex:parseInt($(dialog).css("zIndex")) - 1
			});
			$(".shadow_c", shadow).children().andSelf().each(function(){
				$(this).css("height", $(dialog).outerHeight() - 4);
			});
		},
		_init:function(dialog, options) {
			var op = $.extend({}, this._op, options);
			var height = op.height>op.minH?op.height:op.minH;
			var width = op.width>op.minW?op.width:op.minW;
			if(isNaN(dialog.height()) || dialog.height() < height){
				$(dialog).height(height+"px");
				$(".dialogContent",dialog).height(height - $(".dialogHeader", dialog).outerHeight() - $(".dialogFooter", dialog).outerHeight() - 6);
			}
			if(isNaN(dialog.css("width")) || dialog.width() < width) {
				$(dialog).width(width+"px");
			}
			
			dialog.css({
				left: ($(window).width()-dialog.width())/2,
				top: ($(window).height()-dialog.height())/2
			});
		},
		/**
		 * 初始化半透明层
		 * @param {Object} resizable
		 * @param {Object} dialog
		 * @param {Object} target
		 */
		initResize:function(resizable, dialog,target) {
			$("body").css("cursor", target + "-resize");
			resizable.css({
				top: $(dialog).css("top"),
				left: $(dialog).css("left"),
				height:$(dialog).css("height"),
				width:$(dialog).css("width")
			});
			resizable.show();
		},
		/**
		 * 改变阴隐层
		 * @param {Object} target
		 * @param {Object} options
		 */
		repaint:function(target,options){
			var shadow = $("div.shadow");
			if(target != "w" && target != "e") {
				shadow.css("height", shadow.outerHeight() + options.tmove);
				$(".shadow_c", shadow).children().andSelf().each(function(){
					$(this).css("height", $(this).outerHeight() + options.tmove);
				});
			}
			if(target == "n" || target =="nw" || target == "ne") {
				shadow.css("top", options.otop - 2);
			}
			if(options.owidth && (target != "n" || target != "s")) {
				shadow.css("width", options.owidth + 8);
			}
			if(target.indexOf("w") >= 0) {
				shadow.css("left", options.oleft - 4);
			}
		},
		/**
		 * 改变左右拖动层的高度
		 * @param {Object} target
		 * @param {Object} tmove
		 * @param {Object} dialog
		 */
		resizeTool:function(target, tmove, dialog) {
			$("div[class^='resizable']", dialog).filter(function(){
				return $(this).attr("tar") == 'w' || $(this).attr("tar") == 'e';
			}).each(function(){
				$(this).css("height", $(this).outerHeight() + tmove);
			});
		},
		/**
		 * 改变原始层的大小
		 * @param {Object} obj
		 * @param {Object} dialog
		 * @param {Object} target
		 */
		resizeDialog:function(obj, dialog, target) {
			var oleft = parseInt(obj.style.left);
			var otop = parseInt(obj.style.top);
			var height = parseInt(obj.style.height);
			var width = parseInt(obj.style.width);
			if(target == "n" || target == "nw") {
				tmove = parseInt($(dialog).css("top")) - otop;
			} else {
				tmove = height - parseInt($(dialog).css("height"));
			}
			$(dialog).css({left:oleft,width:width,top:otop,height:height});
			$(".dialogContent", dialog).css("width", (width-12) + "px");
			$(".pageContent", dialog).css("width", (width-14) + "px");
			if (target != "w" && target != "e") {
				var content = $(".dialogContent", dialog);
				content.css({height:height - $(".dialogHeader", dialog).outerHeight() - $(".dialogFooter", dialog).outerHeight() - 6});
				content.find("[layoutH]").layoutH(content);
				$.pdialog.resizeTool(target, tmove, dialog);
			}
			$.pdialog.repaint(target, {oleft:oleft,otop: otop,tmove: tmove,owidth:width});
		},
		close:function(dialog) {
			if(typeof dialog == 'string') dialog = $("body").data(dialog);
			$(dialog).unbind("click").hide();
			$("div.dialogContent", dialog).html("");
			$("div.shadow").hide();
			if($(dialog).data("mask")){
				$("#dialogBackground").hide();
			} else{
				$.taskBar.closeDialog($(dialog).data("id"));
			}
		},
		closeCurrent:function(){
			this.close($.pdialog._current);
		},
		maxsize:function(dialog) {
			$(dialog).data("original",{
				top:$(dialog).css("top"),
				left:$(dialog).css("left"),
				width:$(dialog).css("width"),
				height:$(dialog).css("height")
			});
			$("a.maximize",dialog).hide();
			$("a.restore",dialog).show();
			var iContentW = $(window).width();
			var iContentH = $(window).height() - 34;
			$(dialog).css({top:"0px",left:"0px",width:iContentW+"px",height:iContentH+"px"});
			$.pdialog._resizeContent(dialog,iContentW,iContentH);
		},
		restore:function(dialog) {
			var original = $(dialog).data("original");
			var dwidth = parseInt(original.width);
			var dheight = parseInt(original.height);
			$(dialog).css({
				top:original.top,
				left:original.left,
				width:dwidth,
				height:dheight
			});
			$.pdialog._resizeContent(dialog,dwidth,dheight);
			$("a.maximize",dialog).show();
			$("a.restore",dialog).hide();
			$.pdialog.attachShadow(dialog);
		},
		minimize:function(dialog){
			$(dialog).hide();
			$("div.shadow").hide();
			var task = $.taskBar.getTask($(dialog).data("id"));
			$(".resizable").css({
				top: $(dialog).css("top"),
				left: $(dialog).css("left"),
				height:$(dialog).css("height"),
				width:$(dialog).css("width")
			}).show().animate({top:$(window).height()-60,left:task.position().left,width:task.outerWidth(),height:task.outerHeight()},250,function(){
				$(this).hide();
				$.taskBar.inactive($(dialog).data("id"));
			});
		},
		_resizeContent:function(dialog,width,height) {
			var content = $(".dialogContent", dialog);
			content.css({width:(width-12) + "px",height:height - $(".dialogHeader", dialog).outerHeight() - $(".dialogFooter", dialog).outerHeight() - 6});
			content.find("[layoutH]").layoutH(content);
			$(".pageContent", dialog).css("width", (width-14) + "px");
		}
	};
})(jQuery);