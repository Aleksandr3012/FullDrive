
jQuery(document).ready(function ($item) {

    jQuery('link[rel=stylesheet]').remove();
    jQuery('style').remove();
    jQuery('.social-networks').remove();
  //  jQuery('#custom-background-css').remove();


    jQuery("head").append("<link rel='stylesheet' type='text/css' href='/wp-content/plugins/mibok_glaza/css/bstyle.css' />");
    jQuery("head").append("<link rel='stylesheet' type='text/css' href='/wp-content/plugins/mibok_glaza/css/bootstrap.css' />");


    var menu1 = new toolbar('access_toolbar', false);
//    var elem=document.getElementById('masthead');
//    elem.parentNode.removeChild(elem);
    jQuery(".custom-header-media").remove();
    jQuery('.custom-background').css('background-image', 'inherit');
    jQuery('.menu-toggle').remove();


    var elem=document.getElementById('liink');
   // alert (elem);
    if (elem != null) {
        elem.parentNode.removeChild(elem);
    }

    //

   // alert(document.cookie);
   // alert( getCookie('razmer') + ' - ' +  getCookie('color') + ' - ' +  getCookie('glas') );
    if (getCookie('razmer') == '100') jQuery("#razmer100").click();
    if (getCookie('razmer') == '150') jQuery("#razmer150").click();
    if (getCookie('razmer') == '200') jQuery("#razmer200").click();

    if (getCookie('color') == '1') jQuery("#color1").click();
    if (getCookie('color') == '2') jQuery("#color2").click();
    if (getCookie('color') == '3') jQuery("#color3").click();
    if (getCookie('color') == '4') jQuery("#color4").click();
    if (getCookie('color') == '5') jQuery("#color5").click();

    if (getCookie('graf') == '1') jQuery("#grafon").click();
    if (getCookie('graf') == '2') jQuery("#grafoff").click();

    if (getCookie('kern') == '1') jQuery("#kern1").click();
    if (getCookie('kern') == '2') jQuery("#kern2").click();
    if (getCookie('kern') == '3') jQuery("#kern3").click();

    if (getCookie('interval') == '1') jQuery("#interval1").click();
    if (getCookie('interval') == '2') jQuery("#interval2").click();
    if (getCookie('interval') == '3') jQuery("#interval3").click();

    if (getCookie('gar') == '1') jQuery("#gar1").click();
    if (getCookie('gar') == '2') jQuery("#gar2").click();

    if (getCookie('mono') == '0') jQuery("#mono").click();
    if (getCookie('mono') == '1') jQuery("#mono").click();

    if (getCookie('flash') == '0') jQuery("#flash").click();
    if (getCookie('flash') == '1') jQuery("#flash").click();

  //  jQuery("body").prepend("<b>????????????</b>");
  //  onload="setTimeout (document.body.style.visibility = 'visible', 0)"
    //setTimeout (document.body.style.visibility = "visible", 5);
    //setTimeout (document.body.style.display = "block", 0);
   // setTimeout (document.getElementById("c_panel_special").style.visibility  = "hidden", 0);
 //   jQuery(".visibility").remove();
    //jQuery(getElementById('visibility')).remove();
   // setTimeout (jQuery('#c_panel_special').css('visibility', 'visible'), 5);
    setTimeout ("jQuery('#c_panel_special').css('display','block')", 1000);
});

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}


function toolbar(id) {
    this.$id = jQuery('#' + id);
    this.$rootItems = this.$id.find('button');
    this.$items = this.$id.find('button');
    this.$allItems = this.$items;
    this.$btnGroup = this.$id.find('.btn-group');

    this.$firstButton = [];
    for (i = 1; i <= this.$btnGroup.length; i++) {
        this.$firstButton[i - 1] = this.$btnGroup.eq(i).find('button:first');
    }

    this.$activeItem = null;

    this.keys = {
        tab: 9,
        enter: 13,
        esc: 27,
        space: 32,
        left: 37,
        up: 38,
        right: 39,
        down: 40
    };
    this.bindHandlers();

    if (jQuery('#mibok_special_auth_timeout').is('div')) {
        var time_out = jQuery('#mibok_special_auth_timeout').attr('data-time-out');
        setInterval(function () {
            if (!jQuery('.panel-auth').is('.active')) {
                jQuery('.panel-auth').slideDown({
                    duration: 'fast',
                    complete: function () {
                        jQuery('.panel-auth', '100', function () {
                            jQuery('.panel-auth').addClass('active').attr('aria-hidden', 'false');
                            jQuery('.panel-auth .help-block').focus();
                            jQuery('.panel-auth h3').attr('tabindex', '0');
                            jQuery('.panel-auth p.help-block-default').attr('tabindex', '0');
                            jQuery('.panel-auth input').attr('tabindex', '0');
                            jQuery('.panel-auth button').attr('tabindex', '0');
                        });
                    },
                    start: function () {
                        $focused = jQuery(':focus');
                    }
                });
            }
        }, time_out);
        jQuery('.panel-auth h3').attr('tabindex', '-1');
        jQuery('.panel-auth p').attr('tabindex', '-1');
        jQuery('.panel-auth input').attr('tabindex', '-1');
        jQuery('.panel-auth button').attr('tabindex', '-1');
    }
}
;
toolbar.prototype.bindHandlers = function () {
    var thisObj = this;
    this.$items.mouseenter(function (e) {
        if (jQuery(this).is('.checked')) {
            jQuery(this).addClass('menu-hover-checked');
        }
        else {
            jQuery(this).addClass('menu-hover');
        }
        return true;
    });
    this.$items.mouseout(function (e) {
        jQuery(this).removeClass('menu-hover menu-hover-checked');
        return true;
    });



    this.$allItems.click(function (e) {
        return thisObj.handleClick(jQuery(this), e);
    });
    this.$allItems.keydown(function (e) {
        return thisObj.handleKeyDown(jQuery(this), e);
    });
    this.$allItems.keypress(function (e) {
        return thisObj.handleKeyPress(jQuery(this), e);
    });
    this.$allItems.focus(function (e) {
        return thisObj.handleFocus(jQuery(this), e);
    });
    this.$allItems.blur(function (e) {
        return thisObj.handleBlur(jQuery(this), e);
    });
    jQuery(document).click(function (e) {
        return thisObj.handleDocumentClick(e);
    });

}; // end bindHandlers()
toolbar.prototype.handleClick = function ($item, e) {
    this.processMenuChoice($item);
    this.$allItems.removeClass('menu-hover menu-hover-checked menu-focus menu-focus-checked');
    e.stopPropagation();
    return false;

}; // end handleClick()
toolbar.prototype.handleFocus = function ($item, e) {

    // if activeItem is null, we are getting focus from outside the menu. Store
    // the item that triggered the event
    if (this.$activeItem == null) {
        this.$activeItem = $item;
    }
    else if ($item[0] != this.$activeItem[0]) {
        return true;
    }

    // remove focus styling from all other menu items
    this.$allItems.removeClass('menu-focus menu-focus-checked');

    // add styling to the active item
    if (this.$activeItem.is('.checked')) {
        this.$activeItem.addClass('menu-focus-checked');
    }
    else {
        this.$activeItem.addClass('menu-focus');
    }

    return true;

} // end handleFocus()
toolbar.prototype.handleBlur = function ($item, e) {

    $item.removeClass('menu-focus menu-focus-checked');

    return true;

} // end handleBlur()
toolbar.prototype.handleKeyDown = function ($item, e) {


    if (e.altKey || e.ctrlKey) {
        // Modifier key pressed: Do not process
        return true;
    }
    switch (e.keyCode) {
        case this.keys.tab:
        {
            this.$allItems.removeClass('menu-focus');
            this.$activeItem = null;
            break;
        }
        case this.keys.esc:
        {
            e.stopPropagation();
            return false;
        }
        case this.keys.enter:
        case this.keys.space:
        {
            this.processMenuChoice($item);
            this.$allItems.removeClass('menu-hover menu-hover-checked');
            this.$allItems.removeClass('menu-focus menu-focus-checked');
            this.$activeItem = null;
            /*this.textarea.$id.focus();*/
            e.stopPropagation();
            return false;
        }
        case this.keys.left:
        {
            this.$activeItem = this.moveToPrevious($item);
            this.$activeItem.focus();
            e.stopPropagation();
            return false;
        }
        case this.keys.right:
        {
            this.$activeItem = this.moveToNext($item);
            this.$activeItem.focus();
            e.stopPropagation();
            return false;
        }
        case this.keys.up:
        {
            e.stopPropagation();
            return false;
        }
        case this.keys.down:
        {
            e.stopPropagation();
            return false;
        }
    }
    return true;
};
toolbar.prototype.moveToNext = function ($item) {

    var $itemUL = $item.parents('.access-toolbar'); // $item's containing menu 
    var $menuItems = $itemUL.find('button:not(.disabled)'); // the items in the currently active menu
    var menuNum = $menuItems.length; // the number of items in the active menu
    var menuIndex = $menuItems.index($item); // the items index in its menu
    var $newItem = null;
    var $newItemUL = null;
    if ($itemUL.is('.access-toolbar')) {
        if (menuIndex < menuNum - 1) {
            $newItem = $menuItems.eq(menuIndex + 1);
        }
        else {
            $newItem = $menuItems.first();
        }
        $item.removeClass('menu-focus');
    }
    return $newItem;
};
toolbar.prototype.moveToPrevious = function ($item) {

    var $itemUL = $item.parents('.access-toolbar'); // $item's containing menu 
    var $menuItems = $itemUL.find('button:not(.disabled)'); // the items in the currently active menu
    var menuNum = $menuItems.length; // the number of items in the active menu
    var menuIndex = $menuItems.index($item); // the items index in its menu
    var $newItem = null;
    var $newItemUL = null;

    if ($itemUL.is('.access-toolbar')) {
        if (menuIndex > 0) {
            $newItem = $menuItems.eq(menuIndex - 1);
        }
        else {
            $newItem = $menuItems.last();
        }
        $item.removeClass('menu-focus');
    }
    return $newItem;
};
toolbar.prototype.moveDown = function ($item, startChr) {

};
toolbar.prototype.moveUp = function ($item) {

};
toolbar.prototype.handleKeyPress = function ($item, e) {

    if($item.hasClass('disabled'))
        e.stopPropagation();


    if (e.altKey || e.ctrlKey || e.shiftKey) {
        // Modifier key pressed: Do not process
        return true;
    }

    switch (e.keyCode) {
        case this.keys.tab:
        {
            return true;
        }
        case this.keys.esc:
        case this.keys.enter:
        case this.keys.space:
        case this.keys.up:
        case this.keys.down:
        case this.keys.left:
        case this.keys.right:
        {
            e.stopPropagation();
            return false;
        }
        default :
        {
            this.$activeItem.focus();
            e.stopPropagation();
            return false;
        }

    }

    return true;

}; // end handleKeyPress()
toolbar.prototype.handleDocumentClick = function (e) {
    this.$allItems.removeClass('menu-focus menu-focus-checked');
    this.$activeItem = null;
    return true;

}; // end handleDocumentClick()
toolbar.prototype.processSetChoice = function (param, value) {
    jQuery.ajax({
        type: "POST",
        cache: false,
        url: this.$id.attr('data-path-params'),
        data: [{name: param, value: value}],
        success: function (data) {

        }
    });
    return false;
}
toolbar.prototype.processMenuChoice = function ($item) {
    var choice = $item.attr('data-choice');
    $item.parent().find('button').removeClass('checked').attr('aria-checked', 'false');
    switch (choice) {
        default :
        {
            return false;
        }
        case 'content':
        {
            jQuery.scrollTo('#main_content .page-header:first', '100', function () {
                jQuery('#main_content .page-header:first').focus();
            });
            break;
        }
        case 'font-size-100':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('font-size-100');
            jQuery('#content, #c_panel_special').removeClass('font-size-150 font-size-200');
            this.processSetChoice('FONT_SIZE', 'font-size-100');
            document.cookie = "razmer=100; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'font-size-150':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
          //  jQuery('#content').addClass('font-size-150');
            jQuery('#content, #c_panel_special').addClass('font-size-150');
            jQuery('#content, #c_panel_special').removeClass('font-size-100 font-size-200');
            this.processSetChoice('FONT_SIZE', 'font-size-150');
            document.cookie = "razmer=150; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'font-size-200':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('font-size-200');
            jQuery('#content, #c_panel_special').removeClass('font-size-100 font-size-150');
            this.processSetChoice('FONT_SIZE', 'font-size-200');
            document.cookie = "razmer=200; expires=15/02/2021 00:00:00; path=/";
            break;
        }

        case 'images':
        {
          //  jQuery$('img').toggle();
            /*if (jQuery('#content').is('.not-images')) {
             jQuery('#content').removeClass('not-images');
             this.processSetChoice('IMAGES', 'images');
             } else {
             $item.attr('aria-checked', 'true').addClass('checked');
             jQuery('#content').addClass('not-images');
             this.processSetChoice('IMAGES', 'not-images');
             }*/
           $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#c_panel_special').addClass('images');
            jQuery('#c_panel_special').removeClass('not-images');
            jQuery('.btn-mono').removeClass('disabled');
            this.processSetChoice('IMAGES', 'images');
            document.cookie = "graf=1; expires=15/02/2021 00:00:00; path=/";
            break;

        }
        case 'not-images':
        {
           // jQuery$('img').toggle();

            //jQuery$('img').toggle();
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#c_panel_special').addClass('not-images');
            jQuery('#c_panel_special').removeClass('images mono');
            jQuery('.btn-mono').addClass('disabled').removeClass('checked');
            this.processSetChoice('IMAGES', 'not-images');
            document.cookie = "graf=2; expires=15/02/2021 00:00:00; path=/";
            break;

        }
        case 'mono':
        {
            if (jQuery('#content, #c_panel_special').is('.mono')) {
                jQuery('#content, #c_panel_special').removeClass('mono');
                this.processSetChoice('MONO_IMAGES', 'not-mono');
                document.cookie = "mono=0; expires=15/02/2021 00:00:00; path=/";
            } else {
                $item.attr('aria-checked', 'true').addClass('checked');
                jQuery('#content, #c_panel_special').addClass('mono');
                this.processSetChoice('MONO_IMAGES', 'mono');
                document.cookie = "mono=1; expires=15/02/2021 00:00:00; path=/";
            }
            break;
        }
        case 'flash':
        {
            if (jQuery('#content, #c_panel_special').is('.not-flash')) {
                jQuery('#content, #c_panel_special').removeClass('not-flash');
                jQuery('object').css('margin-left', 0);
                this.processSetChoice('FLASH', 'flash');
                document.cookie = "flash=0; expires=15/02/2021 00:00:00; path=/";
            } else {
                $item.attr('aria-checked', 'true').addClass('checked');
                jQuery('#content, #c_panel_special').addClass('not-flash');
                jQuery('object')
                    .wrap('<div class="fl-wrapper">')
                    .parent().css({'overflow': 'hidden'})
                    .children().css({'margin-left': -99999});
                this.processSetChoice('FLASH', 'not-flash');
                document.cookie = "flash=1; expires=15/02/2021 00:00:00; path=/";
            }
            break;
        }
        case 'color-1':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('color-1');
            jQuery('#content, #c_panel_special').removeClass('color-2 color-3 color-4 color-5');
            this.processSetChoice('COLOR', 'color-1');
            document.cookie = "color=1; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'color-2':
        {
       //    $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('color-2');
            jQuery('#content, #c_panel_special').removeClass('color-1 color-3 color-4 color-5');
            this.processSetChoice('COLOR', 'color-2');
            document.cookie = "color=2; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'color-3':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('color-3');
            jQuery('#content, #c_panel_special').removeClass('color-1 color-2 color-4 color-5');
            this.processSetChoice('COLOR', 'color-3');
            document.cookie = "color=3; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'color-4':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('color-4');
            jQuery('#content, #c_panel_special').removeClass('color-1 color-2 color-3 color-5');
            this.processSetChoice('COLOR', 'color-4');
            document.cookie = "color=4; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'color-5':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('color-5');
            jQuery('#content, #c_panel_special').removeClass('color-1 color-2 color-3 color-4');
            this.processSetChoice('COLOR', 'color-5');
          //  jQuery('#content').addClass('color-5');
            document.cookie = "color=5; expires=15/02/2021 00:00:00; path=/";

            break;
        }
        case 'kerning-1':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('kerning-1');
            jQuery('#content, #c_panel_special').removeClass('kerning-2 kerning-3');
            this.processSetChoice('KERNING', 'kerning-1');
            document.cookie = "kern=1; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'kerning-2':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('kerning-2');
            jQuery('#content, #c_panel_special').removeClass('kerning-1 kerning-3');
            this.processSetChoice('KERNING', 'kerning-2');
            document.cookie = "kern=2; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'kerning-3':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('kerning-3');
            jQuery('#content, #c_panel_special').removeClass('kerning-1 kerning-2');
            this.processSetChoice('KERNING', 'kerning-3');
            document.cookie = "kern=3; expires=15/02/2021 00:00:00; path=/";
            break;
        }

        case 'line-1':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('line-1');
            jQuery('#content, #c_panel_special').removeClass('line-2 line-3');
            this.processSetChoice('LINE', 'line-1');
            document.cookie = "interval=1; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'line-2':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('line-2');
            jQuery('#content, #c_panel_special').removeClass('line-1 line-3');
            this.processSetChoice('LINE', 'line-2');
            document.cookie = "interval=2; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'line-3':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('line-3');
            jQuery('#content, #c_panel_special').removeClass('line-1 line-2');
            this.processSetChoice('LINE', 'line-3');
            document.cookie = "interval=3; expires=15/02/2021 00:00:00; path=/";
            break;
        }

        case 'garnitura-1':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('garnitura-1');
            jQuery('#content, #c_panel_special').removeClass('garnitura-2 garnitura-3');
            this.processSetChoice('GARNITURA', 'garnitura-1');
            document.cookie = "gar=1; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'garnitura-2':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content, #c_panel_special').addClass('garnitura-2');
            jQuery('#content, #c_panel_special').removeClass('garnitura-1 garnitura-3');
            this.processSetChoice('GARNITURA', 'garnitura-2');
            document.cookie = "gar=2; expires=15/02/2021 00:00:00; path=/";
            break;
        }
        case 'voice-1':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content').addClass('voice-1');
            jQuery('#content').attr('data-volume', 0);
            jQuery('#content').removeClass('voice-2 voice-3 voice-4');
            document.getElementById('start_sound').volume = 0;
            if(jQuery('.play_voice').length)
                if(jQuery('.play_voice').length)
                {
                    jQuery('.play_voice').each(function(){
                        jQuery(this)[0].volume = 0;
                    })
                }
            //document.getElementById('play_voice').volume = 0;
            //document.querySelector(".play_voice").volume = 0;
            this.processSetChoice('VOICE', 'voice-1');
            this.processSetChoice('VOLUME',0 );
            jQuery('#current-volume').text(0);
            // this;
            break;
        }
        case 'voice-2':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content').addClass('voice-2');
            jQuery('#content').removeClass('voice-1 voice-3 voice-4');
            this.processSetChoice('VOICE', 'voice-2');

            var volume = 0.1;
            var data_volume = 0;
            data_volume = jQuery('#content').attr('data-volume');
            if(data_volume > 0.1)
                volume = (data_volume - volume).toFixed(1);
            jQuery('#content').attr('data-volume', volume);

            document.getElementById('start_sound').volume = volume;
            if(jQuery('.play_voice').length)
            {
                jQuery('.play_voice').each(function(){
                    jQuery(this)[0].volume = volume;
                })
            }
            //document.querySelector(".play_voice").volume = volume;
            this.processSetChoice('VOLUME',volume);
            document.getElementById("start_sound").play();
            jQuery('#current-volume').text(volume * 100);
            break;
        }
        case 'voice-3':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content').addClass('voice-3');
            jQuery('#content').attr('data-volume', 0.5);
            jQuery('#content').removeClass('voice-2 voice-1  voice-4');
            this.processSetChoice('VOICE', 'voice-3');
            document.getElementById('start_sound').volume = 0.5;
            if(jQuery('.play_voice').length)
            {
                jQuery('.play_voice').each(function(){
                    jQuery(this)[0].volume = 0.5;
                })
            }
            //document.querySelector(".play_voice").volume = 0.5;
            this.processSetChoice('VOLUME',0.5 );
            document.getElementById("start_sound").play();
            jQuery('#current-volume').text(50);
            break;
        }
        case 'voice-4':
        {
            $item.attr('aria-checked', 'true').addClass('checked');
            jQuery('#content').addClass('voice-4');
            jQuery('#content').removeClass('voice-2 voice-1 voice-3');
            this.processSetChoice('VOICE', 'voice-4');

            var volume = 0.1;
            var data_volume = 0;
            data_volume = parseFloat(jQuery('#content').attr('data-volume'));
            if(data_volume < 1)
            {
                console.log(data_volume);
                volume = (volume + data_volume).toFixed(1);
            }
            else if(data_volume == 1)
                volume  = 1;
            jQuery('#content').attr('data-volume', volume);


            document.getElementById('start_sound').volume = volume;
            if(jQuery('.play_voice').length)
            {
                jQuery('.play_voice').each(function(){
                    jQuery(this)[0].volume = volume;
                })
            }
            //document.querySelector(".play_voice").volume = volume;
            this.processSetChoice('VOLUME',volume);
            document.getElementById("start_sound").play();
            jQuery('#current-volume').text(volume * 100);
            break;
        }
        case 'reset':
        {
            for (i = 1; i <= this.$firstButton.length; i++) {
                //console.log(this.$firstButton[i - 1]);
               // this.resetMenuChoice(this.$firstButton[i]);
            }
            this.processSetChoice('RESET', 'Y');
            jQuery("#razmer100").click();
            jQuery("#color1").click();
            jQuery("#grafon").click();
            jQuery("#kern1").click();
            jQuery("#interval1").click();
            jQuery("#gar1").click();

// mono
            jQuery('#content, #c_panel_special').removeClass('mono');
            this.processSetChoice('MONO_IMAGES', 'not-mono');
            document.cookie = "mono=0; expires=15/02/2021 00:00:00; path=/";
            jQuery("#mono").removeClass("checked");
// flash
            jQuery('#content, #c_panel_special').removeClass('not-flash');
            jQuery('object').css('margin-left', 0);
            this.processSetChoice('FLASH', 'flash');
            document.cookie = "flash=0; expires=15/02/2021 00:00:00; path=/";
            jQuery("#flash").removeClass("checked");
            break;
        }
        case 'setting':
        {
            if (this.$id.find('.panel-subsetting').is('.active')) {
                this.$id.find('.panel-subsetting').slideUp({
                    duration: 'fast',
                    complete: function () {
                        jQuery(this).removeClass('active').attr('aria-hidden', 'true');
                    },
                    start: function () {

                    }
                });
            } else {
                this.$id.find('.panel-subsetting').slideDown({
                    duration: 'fast',
                    complete: function () {
                        jQuery(this).addClass('active').attr('aria-hidden', 'false');
                    },
                    start: function () {

                    }
                });
            }
            break;
        }
        case 'resume':
        {
            this.resumeAuth();
            break;
        }
        case 'no-resume':
        {
            this.resumeNoAuth();
            break;
        }
    } // end switch

}; // end processMenuChoice()
/*
toolbar.prototype.resetMenuChoice = function ($item) {
    var choice = $(item).attr('data-choice');
    switch (choice) {
        default :
        {
            $item.trigger('click');
            return false;
        }
        case 'content':
        {
            break;
        }
        case 'reset':
        {
            break;
        }
        case 'setting':
        {
            break;
        }
        case 'images':
        {
         //   jQuery$('img').toggle();
            if (jQuery('#content').is('.not-images')) {
                $item.trigger('click');
            }
            break;
        }
        case 'flash':
        {
            if (jQuery('#content').is('.not-flash')) {
                $item.trigger('click');
            }
            break;
        }
        case 'voice-1':
        {
            jQuery('.btn-voice-3').trigger('click');
            break;
        }
        case 'mono':
        {
            if (jQuery('#content').is('.mono')) {
                $item.trigger('click');
            }
            break;
        }
    }
};
*/
toolbar.prototype.resumeNoAuth = function () {
    if (jQuery('.panel-auth').is('.active')) {
        jQuery('.panel-auth').slideUp({
            duration: 'fast',
            complete: function () {
                jQuery('.panel-auth').removeClass('success active').attr('aria-hidden', 'true');
                jQuery('.panel-auth button:first').focus();
                jQuery('.panel-auth h3').attr('tabindex', '-1');
                jQuery('.panel-auth p').attr('tabindex', '-1');
                jQuery('.panel-auth input').attr('tabindex', '-1');
                jQuery('.panel-auth button').attr('tabindex', '-1');
                if ($focused.parents('#content').is('div')) {
                    $.scrollTo($focused, 300, function () {
                        $focused.focus();
                    });
                }
            },
            start: function () {

            }
        });
    }
};
toolbar.prototype.resumeAuth = function () {
    if (jQuery('.panel-auth').is('.success')) {
        jQuery('.panel-auth').slideUp({
            duration: 'fast',
            complete: function () {
                jQuery('.panel-auth').removeClass('success active').attr('aria-hidden', 'true');
                jQuery('.panel-auth button:first').focus();
                jQuery('.panel-auth h3').attr('tabindex', '-1');
                jQuery('.panel-auth p').attr('tabindex', '-1');
                jQuery('.panel-auth input').attr('tabindex', '-1');
                jQuery('.panel-auth button').attr('tabindex', '-1');
                if ($focused.parents('#content').is('div')) {
                    $.scrollTo($focused, 300, function () {
                        $focused.focus();
                    });
                }
            },
            start: function () {

            }
        });
    } else {
        jQuery('#panel_auth_form').trigger('submit');
    }
};