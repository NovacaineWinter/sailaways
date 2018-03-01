

function url(uri){

    cleanURI = (uri[0] == '/') ? uri.substr(1) : uri;

    return document.head.querySelector("[property=siteurl]").content+'/'+cleanURI;
}


function completeJS(){

    setElementPositions();
    $(window).resize(setElementPositions);


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
        $('#slideaway'+target).slideToggle();
    });


/* =================================================================================================================================*/
/* ====================================       End of CompleteJS()     ==============================================================*/
/* =================================================================================================================================*/

} //close of CompeteJS()

$(document).ready(completeJS);
$(document).ajaxComplete(completeJS);



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

        size=(($(this).parent().height() - $(this).height())/2);
        $(this).css('padding-top',size);
        $(this).css('padding-bottom',size); 

    });                 
}   




function setFooterPosition(){
    footmargin = $('#footimg').height() - $('#footer').height();
    $('#footer').css('top',$(document).height()-$('#footer').height()-20 +69 -footmargin);

    $('#footer').css('margin-top',footmargin);
    $('#footimg').css('right',0);
    $('#footimg').css('bottom',0);                  

} 

function parseOptions(options){
    optionsString = '';
    options.forEach(function(item,index) {
        optionsString = optionsString + '<li>'+item+'</li>';
    });
    $('#optionslist').html(optionsString);
}