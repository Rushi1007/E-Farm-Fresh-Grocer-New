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
jQuery.extend(jQuery.easing,{easeOutOneBounce:function(e,b,c,a,i){var g=0.8;var f=0.2;var d=g*g;if(e<0.0001){return 0}else{if(e<g){return e*e/d}else{return 1-f*f+(e-g-f)*(e-g-f)}}}});jQuery.extend(jQuery.easing,{easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeOutBack:function(c,e,a,g,d,f){if(f==undefined){f=1.70158}return g*((e=e/d-1)*e*((f+1)*e+f)+1)+a},easeOutBack2:function(c,e,a,g,d,f){if(c<f/2){jQuery.easing.easeInCirc(c,e,a,g,d,f/2)}else{return jQuery.easing.easeOutBounce(c-f/2,e,a,g,d,f/2)}}});function ws_page(c,b,a){var e=jQuery;var h=c.angle||17;var g=e(this);var f=e("<div>").addClass("ws_effect ws_page").css({position:"absolute",width:"100%",height:"100%",top:"0%",overflow:"hidden"});var d=a.find(".ws_list");f.hide().appendTo(a.parent());this.go=function(m,k){function o(){f.find("div").stop(1,1);f.hide();f.empty()}o();d.hide();var l=e("<div/>").css({position:"absolute",left:0,top:"-100%",width:"100%",height:"100%",overflow:"hidden","z-index":9}).append(e(b.get(m)).clone()).appendTo(f);var j=e("<div/>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%",overflow:"hidden",outline:"1px solid transparent","z-index":10,"transform-origin":"top left","backface-visibility":"hidden"}).append(e(b.get(k)).clone()).appendTo(f);f.show();if(c.responsive<3){l.find("img").css("width","100%");j.find("img").css("width","100%")}var q=j;var p=q.width(),n=q.height();var i=!!document.all;if(i){j.css({left:"-50%",top:"-50%"});q=j.find("img");q.css({translateX:p/2,translateY:n/2})}q.animate({rotate:h,translateX:i?Math.sqrt(p*p+n*n)*Math.sin(Math.PI*h/180)/2+p/4:0,translateY:i?Math.sqrt(p*p+n*n)*Math.cos(Math.PI*h/180)/2-n/2:0},{duration:2*c.duration/3,easing:"easeOutOneBounce"}).animate(i?{translateY:"+="+n}:{top:"100%"},{duration:c.duration/3,easing:"linear",complete:function(){e(this).hide();o();g.trigger("effectEnd")}});l.animate({top:"-30%"},{duration:c.duration/2}).animate({top:"0%"},{easing:"easeOutBounce",duration:c.duration/2})}};