// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by $AppName$ $AppVersion$
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
function ws_fly(c,a,b){var d=jQuery;var e=d(this);var g={position:"absolute",left:0,top:0,width:"100%",height:"100%",transform:"translate3d(0,0,0)"};var f=d("<div>").addClass("ws_effect ws_fly").css(g).css({overflow:"visible"}).appendTo(b.parent());this.go=function(o,l,k){if(k==undefined){k=!!c.revers}else{k=!k}var j=-(c.distance||f.width()/4),m=Math.min(-j,Math.max(0,d(window).width()-f.offset().left-f.width())),h=(k?m:j),p=(k?j:m);var i=d(a.get(l));i={width:i.width(),height:i.height()};var q=d("<div>").css(g).css({"z-index":1,overflow:"hidden"}).html(d(a.get(l)).clone().css(i)).appendTo(f);var n=d("<div>").css(g).css({opacity:0,left:h,"z-index":3,overflow:"hidden"}).html(d(a.get(o)).clone().css(i)).appendTo(f).show();n.animate({opacity:1},{duration:c.duration,queue:false});n.animate({left:0},{duration:2*c.duration/3,queue:false});setTimeout(function(){var r=b.find(".ws_list").hide();q.animate({left:p,opacity:0},2*c.duration/3,function(){q.remove();e.trigger("effectEnd");n.remove()})},c.duration/3)}};