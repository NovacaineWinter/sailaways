


function url(uri){

    cleanURI = (uri[0] == '/') ? uri.substr(1) : uri;

    return document.head.querySelector("[property=siteurl]").content+'/'+cleanURI;
}



function doStuff(){



	$('.dash-clickable').click(function() {
		target = $(this).attr('target');
		method = $(this).attr('method');
		value = $(this).attr('value');
		$.ajax({
            url: url('/adminAjax'),
            method: 'GET',
            data: {
                ajaxmethod: method,
                targetID:   target,
                value:      value,

            },
            success: function(response) {
            	console.log(response);
            	$('#baseprice-for-id-'+target).attr('old',response); 
                $('.updateablenumber').attr('readonly','readonly');
            },
            
            error: function(response) {
                console.log('There was an error - it was:');
                console.dir(response);
            }
        });
	});





	$('.updateablenumber').dblclick(function() {
	    if($(this).attr('readonly')=='readonly'){
	        $(this).removeAttr('readonly');
	        
	    }                                
	});


	$('.updateablenumber').keypress(function(event) {
	    if (event.keyCode == 13) {                                    
	        event.preventDefault();

	        newprice = $(this).val();
	        target = $(this).attr('target');

	        //detected enter on the input textbox
	            //send off an ajax request to update the model
	                //set input to readonly on success

	        $.ajax({
	            url: url('/adminAjax'),
	            method: 'GET',
	            data: {
	                ajaxmethod: $(this).attr('method'),
	                targetID:   target,
	                value:      newprice,

	            },
	            success: function(response) {
	            	console.log(response);
	            	$('#baseprice-for-id-'+target).attr('old',response); 
	                $('.updateablenumber').attr('readonly','readonly');
	            },
	            
	            error: function(response) {
	                console.log('There was an error - it was:');
	                console.dir(response);
	            }
	        });
	    }
	});

	$('.updateablenumber').blur(function() {
		$(this).val($(this).attr('old'));
	});

}


$(document).ready(doStuff);
$(document).ajaxComplete(doStuff);