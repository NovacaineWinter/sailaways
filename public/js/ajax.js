
function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}


function url(uri){

    cleanURI = (uri[0] == '/') ? uri.substr(1) : uri;

    return document.head.querySelector("[property=siteurl]").content+'/'+cleanURI;
}

function getOptionsSelected(){
     var searchIDs = $('.added-option:checked').map(function(){
        
      return $(this).val();
        
    });
     if(searchIDs.get().length >0){
        return searchIDs.get()
     }else{
        return [0];
     }
}




function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}



function manageCookieBar(){
    //check if accept cookies cookie isset
    if (document.cookie.indexOf('acceptCookies=') >= 0){        
     // have cookie
        //deal with removing consent
        $('#cookiebar').hide(200);        
    } else {

        //if not, check if cookiebar element exists
        if($('#cookiebar').length){
            //if so then check if scroll is at pagetop
            if($(window).scrollTop() == 0){
                //then slide out the cookieBar
                $('#cookiebar').show(450);
            }else{
                $('#cookiebar').hide(200);
            }
        }
    }
}

function acceptCookies(){
    setCookie('acceptCookies', 1, 365)
    //set GA

    //$('head').prepend('<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116600911-1"></script><script>window.dataLayer = window.dataLayer || [];  function gtag(){dataLayer.push(arguments);}  gtag("js", new Date()); gtag("config", "UA-116600911-1");</script>');
    //$('#cookiebar').hide(200);

    //ugly solution as the GA cookies are not set when appended into the head of the document - force page refresh

    window.location.reload()
}

function rejectCookies(){
    $('#cookiebar').hide(200);
}

function compileData(){
    delete info;
    info = {} 

    $('input[name=hull]').each(function() {
        if($(this).prop('checked')){
            info.hull = $(this).val();
        }
    });    

    $('input[name=fitout]').each(function() {
        if($(this).prop('checked')){
            info.fitout = $(this).val();
        }
    }); 

    $('input[name=width]').each(function() {
        if($(this).prop('checked')){
            info.width = $(this).val();
        }
    });

    $('input[name=length]').each(function() {
        if($(this).prop('checked')){
            info.length = $(this).val();
        }
    });

    return info;
}


function setElementPositions(){
    
    setFooterPosition();

    $('#cta').css('padding-top',($('#homebanner').height()-$('#cta').height()-50));

    $('.vertcenteredtext').each(function() {
        $(this).css('padding-top','0px');
        $(this).css('padding-bottom','0px');
    });

    $('.vertcenteredtext').each(function() { 
        size=(($(this).parent().height() - $(this).height())/2);
        $(this).css('padding-top',size);
        $(this).css('padding-bottom',size); 
    });                 
    $('#narrowNav').hide(); //to remove a bug where this menu remains when a screen in enlarged but the menu remains
}   




function calculatePrice() {
        extras = 0;
        opts = [];
        $('.added-option').each(function() {
            if($(this).is(':checked')){
                extras = extras + parseInt(Math.round($(this).attr('price')));
                opts.push($(this).attr('title'));
            }                                
        });
        total = extras + parseFloat($('#baseprice').attr('value'));
        totalLiveaboard = Math.round(total + 1500);
        totalLeisure = Math.round(total * 1.2);
        $('#total-price-display').html('&pound;'+totalLiveaboard);
        $('#total-price-display-mobile').html('&pound;'+totalLiveaboard);
        $('#total-price-display-leisure').html('&pound;'+totalLeisure);
        $('#extra-price-display').html('&pound;'+extras);     
      
        parseOptions(opts);
     
}



function setFooterPosition(){
    footerpadding = $('#footimg').height() + 50;  //the 50 is to have some breathing space between the end of content and the footer
    
    $('#footer').css('top','0px');
    $('#footer').css('margin-top','0px');
    
    $('#footer').css('top',$(document).height()-$('#footer').height() + footerpadding +30);

    //$('#footer').css('margin-top',footmargin);
    $('#footimg').css('right',0);
    $('#footimg').css('bottom',0);                  

    $('#content-holder').css('padding-bottom',footerpadding);
} 

function parseOptions(options){
    optionsString = '';
    options.forEach(function(item,index) {
        optionsString = optionsString + '<li>'+item+'</li>';
    });
    $('#optionslist').html(optionsString);
}

function lazyloadimages(){
    $('.imagetile').each(function() {
        $(this).css('height',$(this).width());
        $(this).css('background-image','url("'+$(this).attr('target')+'")');
    });
}

var selectedOptions =[];


/* =================================================================================================================================*/
/* ====================================       Start CompleteJS()     ===============================================================*/
/* =================================================================================================================================*/




function completeJS(){
    
    lazyloadimages();
    setElementPositions();
    calculatePrice();
    manageCookieBar();

    $(window).resize(setElementPositions);


    $('#logoimg').click(function() {
        window.location.href = url('/');
    });

    $('#footimg').click(function() {
        window.location.href = url('/contact');
    });

    $(window).on('scroll',function() {
        manageCookieBar();
    });

    $('#acceptCookies').off().click(acceptCookies);
    $('#rejectCookies').off().click(rejectCookies);    


    $('.expandFaq').off().click(function() {
        $('#'+($(this).attr('target'))).toggle(400);
    });
 
    $('.ajaxradios').change(function() {
        

        if($(this).attr('name')){

            if($(this).attr('name') == 'hull'){ 

                $('input[name=fitout]').each(function() {
                    $(this).prop('checked',false);
                });                
                $('input[name=length]').each(function() {
                    $(this).prop('checked',false);
                });
                $('input[name=width]').each(function() {
                    $(this).prop('checked',false);
                });


            }else if($(this).attr('name') == 'fitout'){   

                $('input[name=width]').each(function() {
                    $(this).prop('checked',false);
                });

                $('input[name=length]').each(function() {
                    $(this).prop('checked',false);
                });
                

            }else if($(this).attr('name') == 'width'){
                $('input[name=length]').each(function() {
                    $(this).prop('checked',false);
                });
            }
        }        



        $.ajax({
            url: url('/configure/ajax'),
            method: 'GET',
            data:compileData(),
            success: function(response) {
                $('#ajax-target').html(response);   

                $('.added-option').each(function() {
                    
                    if(inArray($(this).val(),selectedOptions)){
                        $(this).prop('checked',true);
                    }else{
                        $(this).prop('checked',false);
                    }                                
                });
                calculatePrice();

            },
            error: function(response) {
                console.log('There was an error - it was:');
                console.dir(response);
            }
        }); 

    });


    $('#SaveConfig').click(function() {
        window.scrollTo(0,0);
        $('#modal').show();
        $('#blankout').show();
    });

    $('#blankout').click(function() {
        $('#modal').hide();
        $('#blankout').hide();
    });



    $('.saveMyConfig').click(function() {
    /*
        console.log('Config: '+$('#hullConfigID').val());
        console.log('name: '+$('#nameInput').val());
        console.log('email: '+$('#emailAddressField').val());
        console.log('options: '+getOptionsSelected());
        console.log('contact: '+$(this).attr('contact'));
        */
        if (document.cookie.indexOf('acceptCookies=') >= 0){
            gacategory = 'Enquiry';
            gaaction = 'Submit';

            if($(this).attr('contact')==1){
                galabel='Save & Discuss';            
            }else{
                galabel = 'Save Configuration';
            }

            ga('send', 'event', gacategory, gaaction, galabel);
        }



        $.ajax({
            url: url('/configure/save'),
            method: 'GET',
            data:{
                config_id:$('#hullConfigID').val(),
                name: $('#nameInput').val(),
                email: $('#emailAddressField').val(),
                options:getOptionsSelected(),
                contact:$(this).attr('contact'),
            },
            success: function(response) {
                $('#modal').html(response);
            },
            error: function(response) {
                console.log('There was an error - it was:');
                console.dir(response);
            }
        }); 

    });



    /* Optional Extras stuff */

    if($('#baseprice').attr('value')){
        $('#base-price-display').html('&pound;'+parseFloat($('#baseprice').attr('value')));
        $('#total-price-display-mobile').html('&pound;'+parseFloat($('#baseprice').attr('value')));

        livaboardPrice = Math.round(parseInt($('#baseprice').attr('value'))+1500);
        $('#total-price-display').html('&pound;'+livaboardPrice);
        $('#total-price-display-leisure').html('&pound;'+parseFloat(Math.round($('#baseprice').attr('value')*1.2)));
    }else{
        $('#total-price-display').html('&pound;');
        $('#base-price-display').html('&pound;');
    }


    $('.added-option').change(function() {
        calculatePrice();
        selectedOptions =getOptionsSelected();
    });


    $('.expand-option').click(function() {
        target = $(this).attr('target');
        $('#slideaway'+target).slideToggle(function() {
           setElementPositions(); 
        });
        
    });


    $('#clearOptions').click(function() {
         $('.added-option').each(function() { 
            $(this).prop('checked',false);  
            console.log($(this).prop('checked'));                                        
        });
        calculatePrice();
        selectedOptions =getOptionsSelected();
    });


//function to deal with smoothscroll for #anchors
    $('a[href*="#"]').on('click', function (e) {
        e.preventDefault();

        //remove the anchor from the url
        var uri = window.location.toString();
        if (uri.indexOf("#") > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("#"));
            window.history.replaceState({}, document.title, clean_uri);
        }

        // smooth scroll 
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500, 'linear');
    }); 




    $('#expand-nav-button').click(function(e) {
        e.preventDefault();
        $('#narrowNav').toggle();
    });


/* =================================================================================================================================*/
/* ====================================       End of CompleteJS()     ==============================================================*/
/* =================================================================================================================================*/

} //close of CompeteJS()

$(document).ready(completeJS);
$(document).ajaxComplete(completeJS);

