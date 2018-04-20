


function url(uri){

    cleanURI = (uri[0] == '/') ? uri.substr(1) : uri;

    return document.head.querySelector("[property=siteurl]").content+'/'+cleanURI;
}



function doStuff(){

	setElementPositions();

	$('#fileToUpload').change(function() {
		$('#uploadbutton').show(500); 
	});


	/*$('#imgform').submit( function(event) {   
		event.preventDefault();         

		var file = document.getElementById('fileToUpload').files[0];
	    if (file) {
	        // create reader
	        var reader = new FileReader();
	        reader.readAsText(file);
	        reader.onload = function(e) {
	            // browser completed reading file - display it

	            alert(e.target.result);
	            

	        };
	    }
       
    });*/



	$('.optionconfigcheck').change(function() {
		
		config = $(this).attr('config');
		option = $(this).attr('option');

		if($(this).prop('checked')){
			value=1;
		}else{
			value=0;
		}
			
		$.ajax({
            url: url('/adminAjax'),
            method: 'GET',
            data: {
                ajaxmethod: 'setOptionConfigPivot',
                config:   	config,
                option: 	option,
                value:      value,

            },
            success: function(response) {
            	
            },
            
            error: function(response) {
                console.log('There was an error - it was:');
                console.dir(response);
            }
        });		
	});


	$('.standardFeature').change(function() {
		
		target = $(this).attr('target');

		if($(this).prop('checked')){
			value=1;
		}else{
			value=0;
		}
			
		$.ajax({
            url: url('/adminAjax'),
            method: 'GET',
            data: {
                ajaxmethod: 'setStandardFeature',
                target:   	target,
                value:      value,

            },
            success: function(response) {
            	
            },
            
            error: function(response) {
                console.log('There was an error - it was:');
                console.dir(response);
            }
        });		
	});

	$('.optiontext').change(function() {
		target = $(this).attr('target');
		method = $(this).attr('method');
		value = $(this).val();
		$.ajax({
            url: url('/adminAjax'),
            method: 'GET',
            data: {
                ajaxmethod: method,
                targetID:   target,
                value:      value,

            },
            success: function(response) {
            	
            },
            
            error: function(response) {
                console.log('There was an error - it was:');
                console.dir(response);
            }
        });
	});


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
            	if(method == 'createNewOptionalExtra'){
            		window.location.href = url('/optionalextra?targetextra='+response);
            	}else{
	            	$('#baseprice-for-id-'+target).attr('old',response); 
	                $('.updateablenumber').attr('readonly','readonly');            		
	            }
            },
            
            error: function(response) {
                console.log('There was an error - it was:');
                console.dir(response);
            }
        });
	});

	$('.imageButton').click(function() {
		targetBoat = $(this).attr('boat');
		targetImage = $(this).attr('image');
		ajaxmethod	= $(this).attr('method');
		$.ajax({
            url: url('/adminAjax'),
            method: 'GET',
            data: {
                ajaxmethod: ajaxmethod,
                targetBoat:   targetBoat,
                targetImage:      targetImage,

            },
            success: function(response) {
            	window.location.reload();
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




	$('.discussionStartedCheckbox').change(function() {
		
		target = $(this).attr('target');

		if($(this).prop('checked')){
			value=1;
		}else{
			value=0;
		}
			
		$.ajax({
            url: url('/adminAjax'),
            method: 'GET',
            data: {
                ajaxmethod: 'setDiscussionStarted',
                target:   	target,
                value:      value,

            },
            success: function(response) {
            	if(response){
	            	window.location.reload();
	            }else{
	            	alert('there was a problem, please refresh the page and try again');
	            }
            },
            
            error: function(response) {
                console.log('There was an error - it was:');
                console.dir(response);
            }
        });		
	});




}



function setElementPositions(){
    

    $('.vertcenteredtext').each(function() {
        $(this).css('padding-top','0px');
        $(this).css('padding-bottom','0px');
    });

    $('.vertcenteredtext').each(function() { 
        size=(($(this).parent().height() - $(this).height())/2);
        $(this).css('padding-top',size);
        $(this).css('padding-bottom',size); 
    });                 
}  



$(document).ready(doStuff);
$(document).ajaxComplete(doStuff);