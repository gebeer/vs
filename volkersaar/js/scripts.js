/*
 * OneWeb v3.0
 * Author: Seth Warburton
 * Copyright: Seth Warburton - (C) 2013 - All rights reserved
 * Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
 *           DBAD License http://philsturgeon.co.uk/code/dbad-license
 * Date: 30 April 2013
 */

// Append some styling hooks related to device capabilities to html and body elements
// Got js?
jQuery("html").removeClass("no-js").addClass("js-enabled");

jQuery(document).ready(function(){

	// Touch? Screen type?
	jQuery().deviceHooks();

  // Checks if article images and videos have figure tags and adds them if not
  jQuery(function figtarget() {
     figtag(".article-content img");
  });

  function figtag(theElement) {
    jQuery(theElement).each(function(){
    if (!jQuery(this).parent().is("figure")) {
        jQuery(this).wrap("<figure>");
    }
    });
  }

// Scroll to top
    jQuery(function () {
    var scrollDiv = document.createElement("a");
    jQuery(scrollDiv).attr("class", "to-top").appendTo("body").attr("title", "Hier klicken um elegant wie ein Adler nach oben zu schweben!").text("^");
jQuery(".to-top").fadeOut();
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() !== 0) {
          jQuery(".to-top").fadeIn();
        } else {
          jQuery(".to-top").fadeOut();
        }
      });
      jQuery(".to-top").click(function () {
        jQuery("body,html").animate({
          scrollTop: 0
        },
       800);
      });
    });

//Callbackform
  var callthis = jQuery('.callform').css({'-webkit-transform' : 'translateZ(0)'});
  callthis.click(function() {
    var state = parseInt( jQuery(this).css('width'), 10 ) > 64;
    var focus = jQuery('.callform input,.callform textarea').is(':focus');
    if (!state) {
      jQuery('.callform form').css({'display' : 'block'});
      jQuery(this).animate({'width' : 440}, 500);
      jQuery(this).css({'overflow' : 'visible'});
      jQuery(this).append('<p class="rueru" style="min-width:350px;">Rückruf/ Kontaktaufnahme anfordern</p>');
    }
    if (state && !focus) {
      jQuery('.callform form').css({'display' : 'none'});
      jQuery(this).animate({'width' : 64}, 500);
      jQuery('.rueru').remove();
    }
  });

  jQuery('header,.maincont').click(function() {
       callthis.animate({'width' : 64}, 500);
       jQuery('.rueru').remove();
   });

  //ratinform
  jQuery('#ks_rate input.inputbox.radio').rating();

  //open modal
  var openform = GetURLParameter('openform');
  if (openform) {
    jQuery('#ratingmodal').reveal();
  };

 });
function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}

