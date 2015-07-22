
// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console) {
    arguments.callee = arguments.callee.caller;
    var newarr = [].slice.call(arguments);
    (typeof console.log === 'object' ? log.apply.call(console.log, console, newarr) : console.log.apply(console, newarr));
  }
};

// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());

// place any jQuery/helper plugins in here, instead of separate, slower script files.

/*
 * OneWeb v3.0
 * Author: Seth Warburton
 * Copyright: Seth Warburton - (C) 2013 - All rights reserved
 * Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
 *           DBAD License http://philsturgeon.co.uk/code/dbad-license
 * Date: 30 April 2013
 */

(function( $ ) {
  $.fn.deviceHooks = function() {

      var resizer = function() {

          if ($(window).width() > 319) {
              $("html").removeClass("dumb").removeClass("lap").addClass("palm");
          }

          if ($(window).width() > 719) {
              $("html").removeClass("palm").removeClass("portable").addClass("lap");
          }

          if ($(window).width() > 991) {
              $("html").removeClass("lap").removeClass("desk").addClass("portable");
          }

          if ($(window).width() > 1439) {
              $("html").removeClass("portable").removeClass("desk-wide").addClass("desk");
          }

          if ($(window).width() > 1919) {
              $("html").removeClass("desk").addClass("desk-wide");
          }

      };

      // Call once to set.
      resizer();

      // Function for testing touch screens
     function is_touch_device() {
         return !! ('ontouchstart' in window);
      }

      // Set class on html element for touch/no-touch
      if (is_touch_device()) {
         $('html').addClass('touch');
      } else {
          $('html').addClass('no-touch');
      }

      // Call on resize.
      $(window).on('resize', resizer);

  };

})(jQuery);

/*
 * jQuery Reveal Plugin 1.0
 * www.ZURB.com
 * Copyright 2010, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
*/


(function($) {

/*---------------------------
 Defaults for Reveal
----------------------------*/
   
/*---------------------------
 Listener for data-reveal-id attributes
----------------------------*/

  $('a[data-reveal-id]').live('click', function(e) {
    e.preventDefault();
    var modalLocation = $(this).attr('data-reveal-id');
    $('#'+modalLocation).reveal($(this).data());
  });

/*---------------------------
 Extend and Execute
----------------------------*/

    $.fn.reveal = function(options) {
        
        
        var defaults = {  
        animation: 'fadeAndPop', //fade, fadeAndPop, none
        animationspeed: 300, //how fast animtions are
        closeonbackgroundclick: true, //if you click background will modal close?
        dismissmodalclass: 'close-reveal-modal' //the class of a button or element that will close an open modal
      }; 
      
        //Extend dem' options
        var options = $.extend({}, defaults, options); 
  
        return this.each(function() {
        
/*---------------------------
 Global Variables
----------------------------*/
          var modal = $(this),
            topMeasure  = parseInt(modal.css('top')),
        topOffset = modal.height() + topMeasure,
              locked = false,
        modalBG = $('.reveal-modal-bg');

/*---------------------------
 Create Modal BG
----------------------------*/
      if(modalBG.length == 0) {
        modalBG = $('<div class="reveal-modal-bg" />').insertAfter(modal);
      }       
     
/*---------------------------
 Open & Close Animations
----------------------------*/
      //Entrance Animations
      modal.bind('reveal:open', function () {
        modalBG.unbind('click.modalEvent');
        $('.' + options.dismissmodalclass).unbind('click.modalEvent');
        if(!locked) {
          lockModal();
          if(options.animation == "fadeAndPop") {
            modal.css({'top': $(document).scrollTop()-topOffset, 'opacity' : 0, 'visibility' : 'visible'});
            modalBG.fadeIn(options.animationspeed/2);
            modal.delay(options.animationspeed/2).animate({
              "top": $(document).scrollTop()+topMeasure + 'px',
              "opacity" : 1
            }, options.animationspeed,unlockModal());         
          }
          if(options.animation == "fade") {
            modal.css({'opacity' : 0, 'visibility' : 'visible', 'top': $(document).scrollTop()+topMeasure});
            modalBG.fadeIn(options.animationspeed/2);
            modal.delay(options.animationspeed/2).animate({
              "opacity" : 1
            }, options.animationspeed,unlockModal());         
          } 
          if(options.animation == "none") {
            modal.css({'visibility' : 'visible', 'top':$(document).scrollTop()+topMeasure});
            modalBG.css({"display":"block"}); 
            unlockModal()       
          }
        }
        modal.unbind('reveal:open');
      });   

      //Closing Animation
      modal.bind('reveal:close', function () {
        if(!locked) {
          lockModal();
          if(options.animation == "fadeAndPop") {
            modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
            modal.animate({
              "top":  $(document).scrollTop()-topOffset + 'px',
              "opacity" : 0
            }, options.animationspeed/2, function() {
              modal.css({'top':topMeasure, 'opacity' : 1, 'visibility' : 'hidden'});
              unlockModal();
            });         
          }   
          if(options.animation == "fade") {
            modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
            modal.animate({
              "opacity" : 0
            }, options.animationspeed, function() {
              modal.css({'opacity' : 1, 'visibility' : 'hidden', 'top' : topMeasure});
              unlockModal();
            });         
          }   
          if(options.animation == "none") {
            modal.css({'visibility' : 'hidden', 'top' : topMeasure});
            modalBG.css({'display' : 'none'});  
          }   
        }
        modal.unbind('reveal:close');
      });     
    
/*---------------------------
 Open and add Closing Listeners
----------------------------*/
          //Open Modal Immediately
      modal.trigger('reveal:open')
      
      //Close Modal Listeners
      var closeButton = $('.' + options.dismissmodalclass).bind('click.modalEvent', function () {
        modal.trigger('reveal:close')
      });
      
      if(options.closeonbackgroundclick) {
        modalBG.css({"cursor":"pointer"})
        modalBG.bind('click.modalEvent', function () {
          modal.trigger('reveal:close')
        });
      }
      $('body').keyup(function(e) {
            if(e.which===27){ modal.trigger('reveal:close'); } // 27 is the keycode for the Escape key
      });
      
      
/*---------------------------
 Animations Locks
----------------------------*/
      function unlockModal() { 
        locked = false;
      }
      function lockModal() {
        locked = true;
      } 
      
        });//each call
    }//orbit plugin call
})(jQuery);
        
/*
 ### jQuery Star Rating Plugin v4.11 - 2013-03-14 ###
 * Home: http://www.fyneworks.com/jquery/star-rating/
 * Code: http://code.google.com/p/jquery-star-rating-plugin/
 *
 * Licensed under http://en.wikipedia.org/wiki/MIT_License
 ###
*/
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}(';5(1W.1C)(8($){5((!$.1s.1V&&!$.1s.1U))2d{1j.1X("1T",C,s)}1R(e){};$.o.4=8(j){5(3.u==0)9 3;5(M V[0]==\'1m\'){5(3.u>1){7 k=V;9 3.18(8(){$.o.4.K($(3),k)})};$.o.4[V[0]].K(3,$.27(V).26(1)||[]);9 3};7 j=$.1b({},$.o.4.1w,j||{});$.o.4.P++;3.1y(\'.l-4-1g\').p(\'l-4-1g\').18(8(){7 b,m=$(3);7 c=(3.2g||\'28-4\').1f(/\\[|\\]/g,\'Y\').1f(/^\\Y+|\\Y+$/g,\'\');7 d=$(3.2h||1j.1H);7 e=d.6(\'4\');5(!e||e.1o!=$.o.4.P)e={E:0,1o:$.o.4.P};7 f=e[c]||d.6(\'4\'+c);5(f)b=f.6(\'4\');5(f&&b)b.E++;R{b=$.1b({},j||{},($.1d?m.1d():($.25?m.6():w))||{},{E:0,L:[],v:[]});b.z=e.E++;f=$(\'<1G 13="l-4-1I"/>\');m.1J(f);f.p(\'4-12-11-10\');5(m.Z(\'G\')||m.14(\'G\'))b.n=s;5(m.14(\'1c\'))b.1c=s;f.1r(b.D=$(\'<W 13="4-D"><a U="\'+b.D+\'">\'+b.1B+\'</a></W>\').q(\'1e\',8(){$(3).4(\'N\');$(3).p(\'l-4-T\')}).q(\'1h\',8(){$(3).4(\'x\');$(3).I(\'l-4-T\')}).q(\'1i\',8(){$(3).4(\'y\')}).6(\'4\',b))};7 g=$(\'<W 20="21" 22-24="\'+3.U+\'" 13="l-4 t-\'+b.z+\'"><a U="\'+(3.U||3.1k)+\'">\'+3.1k+\'</a></W>\');f.1r(g);5(3.X)g.Z(\'X\',3.X);5(3.1x)g.p(3.1x);5(b.29)b.B=2;5(M b.B==\'1l\'&&b.B>0){7 h=($.o.15?g.15():0)||b.1n;7 i=(b.E%b.B),17=1K.1L(h/b.B);g.15(17).1M(\'a\').1N({\'1O-1P\':\'-\'+(i*17)+\'1Q\'})};5(b.n)g.p(\'l-4-1p\');R g.p(\'l-4-1S\').q(\'1e\',8(){$(3).4(\'1q\');$(3).4(\'J\')}).q(\'1h\',8(){$(3).4(\'x\');$(3).4(\'H\')}).q(\'1i\',8(){$(3).4(\'y\')});5(3.S)b.r=g;5(3.1Y=="A"){5($(3).14(\'1Z\'))b.r=g};m.1t();m.q(\'1u.4\',8(a){5(a.1v)9 C;$(3).4(\'y\')});g.6(\'4.m\',m.6(\'4.l\',g));b.L[b.L.u]=g[0];b.v[b.v.u]=m[0];b.t=e[c]=f;b.23=d;m.6(\'4\',b);f.6(\'4\',b);g.6(\'4\',b);d.6(\'4\',e);d.6(\'4\'+c,f)});$(\'.4-12-11-10\').4(\'x\').I(\'4-12-11-10\');9 3};$.1b($.o.4,{P:0,J:8(){7 a=3.6(\'4\');5(!a)9 3;5(!a.J)9 3;7 b=$(3).6(\'4.m\')||$(3.19==\'1a\'?3:w);5(a.J)a.J.K(b[0],[b.Q(),$(\'a\',b.6(\'4.l\'))[0]])},H:8(){7 a=3.6(\'4\');5(!a)9 3;5(!a.H)9 3;7 b=$(3).6(\'4.m\')||$(3.19==\'1a\'?3:w);5(a.H)a.H.K(b[0],[b.Q(),$(\'a\',b.6(\'4.l\'))[0]])},1q:8(){7 a=3.6(\'4\');5(!a)9 3;5(a.n)9;3.4(\'N\');3.1z().1A().O(\'.t-\'+a.z).p(\'l-4-T\')},N:8(){7 a=3.6(\'4\');5(!a)9 3;5(a.n)9;a.t.2a().O(\'.t-\'+a.z).I(\'l-4-q\').I(\'l-4-T\')},x:8(){7 a=3.6(\'4\');5(!a)9 3;3.4(\'N\');7 b=$(a.r);7 c=b.u?b.1z().1A().O(\'.t-\'+a.z):w;5(c)c.p(\'l-4-q\');a.D[a.n||a.1c?\'1t\':\'2b\']();3.2c()[a.n?\'p\':\'I\'](\'l-4-1p\')},y:8(a,b){7 c=3.6(\'4\');5(!c)9 3;5(c.n)9;c.r=w;5(M a!=\'F\'||3.u>1){5(M a==\'1l\')9 $(c.L[a]).4(\'y\',F,b);5(M a==\'1m\'){$.18(c.L,8(){5($(3).6(\'4.m\').Q()==a)$(3).4(\'y\',F,b)});9 3}}R{c.r=3[0].19==\'1a\'?3.6(\'4.l\'):(3.2e(\'.t-\'+c.z)?3:w)};3.6(\'4\',c);3.4(\'x\');7 d=$(c.r?c.r.6(\'4.m\'):w);7 e=$(c.v).O(\':S\');7 f=$(c.v).1y(d);f.1D(\'S\',C);d.1D(\'S\',s);$(d.u?d:e).2f({1E:\'1u\',1v:s});5((b||b==F)&&c.1F)c.1F.K(d[0],[d.Q(),$(\'a\',c.r)[0]]);9 3},n:8(a,b){7 c=3.6(\'4\');5(!c)9 3;c.n=a||a==F?s:C;5(b)$(c.v).Z("G","G");R $(c.v).2i("G");3.6(\'4\',c);3.4(\'x\')},2j:8(){3.4(\'n\',s,s)},2k:8(){3.4(\'n\',C,C)}});$.o.4.1w={D:\'2l 2m\',1B:\'\',B:0,1n:16};$(8(){$(\'m[1E=2n].l\').4()})})(1C);',62,148,'|||this|rating|if|data|var|function|return||||||||||||star|input|readOnly|fn|addClass|on|current|true|rater|length|inputs|null|draw|select|serial||split|false|cancel|count|undefined|disabled|blur|removeClass|focus|apply|stars|typeof|drain|filter|calls|val|else|checked|hover|title|arguments|div|id|_|attr|drawn|be|to|class|hasClass|width||spw|each|tagName|INPUT|extend|required|metadata|mouseover|replace|applied|mouseout|click|document|value|number|string|starWidth|call|readonly|fill|append|support|hide|change|selfTriggered|options|className|not|prevAll|addBack|cancelValue|jQuery|prop|type|callback|span|body|control|before|Math|floor|find|css|margin|left|px|catch|live|BackgroundImageCache|style|opacity|window|execCommand|nodeName|selected|role|text|aria|context|label|meta|slice|makeArray|unnamed|half|children|show|siblings|try|is|trigger|name|form|removeAttr|disable|enable|Cancel|Rating|radio'.split('|'),0,{}))

/* base64 encode decode: https://github.com/carlo/jquery-base64 */
"use strict";jQuery.base64=(function($){var _PADCHAR="=",_ALPHA="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",_VERSION="1.0";function _getbyte64(s,i){var idx=_ALPHA.indexOf(s.charAt(i));if(idx===-1){throw"Cannot decode base64"}return idx}function _decode(s){var pads=0,i,b10,imax=s.length,x=[];s=String(s);if(imax===0){return s}if(imax%4!==0){throw"Cannot decode base64"}if(s.charAt(imax-1)===_PADCHAR){pads=1;if(s.charAt(imax-2)===_PADCHAR){pads=2}imax-=4}for(i=0;i<imax;i+=4){b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12)|(_getbyte64(s,i+2)<<6)|_getbyte64(s,i+3);x.push(String.fromCharCode(b10>>16,(b10>>8)&255,b10&255))}switch(pads){case 1:b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12)|(_getbyte64(s,i+2)<<6);x.push(String.fromCharCode(b10>>16,(b10>>8)&255));break;case 2:b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12);x.push(String.fromCharCode(b10>>16));break}return x.join("")}function _getbyte(s,i){var x=s.charCodeAt(i);if(x>255){throw"INVALID_CHARACTER_ERR: DOM Exception 5"}return x}function _encode(s){if(arguments.length!==1){throw"SyntaxError: exactly one argument required"}s=String(s);var i,b10,x=[],imax=s.length-s.length%3;if(s.length===0){return s}for(i=0;i<imax;i+=3){b10=(_getbyte(s,i)<<16)|(_getbyte(s,i+1)<<8)|_getbyte(s,i+2);x.push(_ALPHA.charAt(b10>>18));x.push(_ALPHA.charAt((b10>>12)&63));x.push(_ALPHA.charAt((b10>>6)&63));x.push(_ALPHA.charAt(b10&63))}switch(s.length-imax){case 1:b10=_getbyte(s,i)<<16;x.push(_ALPHA.charAt(b10>>18)+_ALPHA.charAt((b10>>12)&63)+_PADCHAR+_PADCHAR);break;case 2:b10=(_getbyte(s,i)<<16)|(_getbyte(s,i+1)<<8);x.push(_ALPHA.charAt(b10>>18)+_ALPHA.charAt((b10>>12)&63)+_ALPHA.charAt((b10>>6)&63)+_PADCHAR);break}return x.join("")}return{decode:_decode,encode:_encode,VERSION:_VERSION}}(jQuery));
