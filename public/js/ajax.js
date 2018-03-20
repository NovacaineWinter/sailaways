

function url(uri){

    cleanURI = (uri[0] == '/') ? uri.substr(1) : uri;

    return document.head.querySelector("[property=siteurl]").content+'/'+cleanURI;
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



/* =================================================================================================================================*/
/* ====================================       Start CompleteJS()     ===============================================================*/
/* =================================================================================================================================*/




function completeJS(){
    
    lazyloadimages();
    setElementPositions();

    $(window).resize(setElementPositions);


    $('#logoimg').click(function() {
        window.location.href = url('/');
    });

    $('#footimg').click(function() {
        window.location.href = url('/contact');
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
        $('#total-price-display').html('&pound;'+parseFloat($('#baseprice').attr('value')));
    }else{
        $('#total-price-display').html('&pound;');
        $('#base-price-display').html('&pound;');
    }


    $('.added-option').change(function() {
        extras = 0;
        opts = [];
        $('.added-option').each(function() {
            if($(this).is(':checked')){
                extras = extras + parseFloat($(this).attr('price'));
                opts.push($(this).attr('title'));
            }                                
        });
        total = extras + parseFloat($('#baseprice').attr('value'));
        $('#total-price-display').html('&pound;'+total);
        $('#extra-price-display').html('&pound;'+extras);
        
      
            parseOptions(opts);
     
    });


    $('.expand-option').click(function() {
        target = $(this).attr('target');
        $('#slideaway'+target).slideToggle(function() {
           setElementPositions(); 
        });
        
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

