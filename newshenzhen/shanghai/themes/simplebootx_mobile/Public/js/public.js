$(function(){
	$(".menu_box").height($(document).height());
	$(".menu-tab-left").height($(window).height() - $('.menu-head').height() - $('.menu-tabs').height());
	$(".menu-tab-right").height($(window).height() - $('.menu-head').height() - $('.menu-tabs').height());
	$(window).bind("scroll",function() { 
		if ($(document).scrollTop() >=50 ) {
			$(".btn-top").css("display","block");
		}else{
			$(".btn-top").css("display","none");
		}
	})
	$(".btn-top").click(function(){
		$("html, body").animate({
			"scroll-top":0
		},"fast");
	});
	$(".submenu").click(function(){
		//$(".menu_box").css('display','block');
		$(".menu_box").animate({right:'0px'});
        //$('body').css('overflow', 'hidden')
	})
	$(".menu-head-close").click(function(){
		$(".menu_box").animate({right:'-100%'});
        //$('body').css('overflow', 'visible')
	});
});

//商务通
function swtClick(){
	 window.open('http://swt.szddkqyy.com/LR/chatwin.aspx?id=MTI57225838');
}
//商务通 可传字符
function OnlineLink() {
    var e = 'moren';
    if (arguments.length == 1) {
        e = encodeURIComponent(arguments[0]);
    }
    if(typeof openZoosUrl == "undefined"){
        var url = 'http://swt.szddkqyy.com/LR/chatwin.aspx?id=MTI57225838&lng=cn&rf1=' + encodeURIComponent(document.referrer);
        url = url + '&e=' + e + '&p=' + encodeURIComponent(location.href);
        try{
            window.open(url, 'news' + (new Date()).getTime());
        }catch(e){qa
            location.href = url;
        }
    }else{
        openZoosUrl('chatwin', '&e=' + e);
    }
    return false;
}
$(function(){
	$(window).bind("scroll",function() { 
		if ($(document).scrollTop() >=50 ) {
			$(".btn-top").css("display","block");
		}else{
			$(".btn-top").css("display","none");
		}
	})
	$(".btn-top").click(function(){
		$("html, body").animate({
			"scroll-top":0
		},"fast");
	});
});
/*top*/
/*$(function(){
	var sHTML = [
        '<div class="topTips" id="toptips">',
        '   <div class="tipsInner">',
        '       <a href="http://swt.39995888.com/LR/Chatpre.aspx?id=LNY92749060&lng=cn&e=%e9%a1%b6%e9%83%a8QQ_'+window.location.host+'&p=%e9%a1%b6%e9%83%a8QQ_'+window.location.host+'" class="JS-SWT-PLACEHOLD" target="_blank">',     
        '         <img src="/public/images/wx.png" alt="">',
        '         <dl>',
        '           <dt>李主任：</dt>',
        '           <dd>我是在线医生，请问有什么可以帮您?</dd>',
        '         </dl>',
        '       </a>',
        '   </div>',
        '</div>'].join('\r\n');
    var o = document.createElement('div');
    o.innerHTML = sHTML;	
    while(o.firstElementChild){
        document.body.appendChild(o.firstElementChild);
		
    }; 
	
         T={hasClass:function(d,a){var c=d.className.split(/\s+/);for(var b=0;b<c.length;b++){if(c[b]==a){return true}}return false},addClass:function(b,a){if(!this.hasClass(b,a)){b.className+=" "+a}},removeClass:function(d,a){if(this.hasClass(d,a)){var c=d.className.split(/\s+/);for(var b=0;b<c.length;b++){if(c[b]==a){delete c[b]}}d.className=c.join(" ")}}};

        function Toptips(options){
            this.init(options);
        };

        Toptips.prototype = {

            constructor : Toptips,

            init : function(options){
                this.item = options.item;
                this.itemInner = options.item.children[0];
                this.loop = typeof options.loop == "undefined" ? true : options.loop;
                this.showTime = typeof options.showTime == "undefined" ? 8000 : options.showTime;
                this.hideTime = typeof options.hideTime == "undefined" ? 15000 : options.hideTime;
                this.showTimer = null;
                this.hideTimer = null;
                this.preTimer = null;
                this.item.style.WebkitTransition = this.item.style.transition = this.itemInner.style.WebkitTransition = this.itemInner.style.transition = "0.5s";
                var me = this;
                var initTimer = setTimeout(function(){
                        me.showTip();
                },15000);
            },

            showTip : function(){
                var me = this;
                T.addClass(me.item,"showTip");
                T.removeClass(me.item,"hideTip");

                clearTimeout(me.hideTimer);
                me.showTimer = setTimeout(function(){
                    me.hideTip();
                },me.showTime);

            },

            hideTip : function(){
                var me = this;
                T.removeClass(me.item,"showTip");
                T.addClass(me.item,"hideTip");
                me.item.style.height = me.itemInner.style.height = "0";

                if(me.loop){
                    clearTimeout(me.showTimer);

                    me.preTimer = setTimeout(function(){
                        me.item.style.height = me.itemInner.style.height = "60px";
                    },me.hideTime-100);

                    me.hideTimer = setTimeout(function(){
                        me.showTip();
                    },me.hideTime);

                }
            },

        };

        var toptip = document.getElementById("toptips");

        new Toptips({
            item : toptip,
            loop : true
        }); 
        return false;
   delete o;
});*/