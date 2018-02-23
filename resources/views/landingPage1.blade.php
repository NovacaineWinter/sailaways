
@section('title')
    Sailaways.net
@endsection

@extends('layouts.masterTemplate')

@section('content')

            <div class="content">
                <div class="bannerimg" id="homebanner">
                	<a href="#info">
	                	<div id="cta">
	                		<h3>Beautiful Sailaways</h3>
	                		<h4>Find out more</h4>
	                		<h1>v</h1>
	                	</div>
                	</a>
                </div>
                <section id="info">
	                <div class="container">
	                    <h1>A blank canvas to create your dream home</h1>
	                    <div class="row">


		                    <div class="col-sm-6 homecard" style="background-image:url('/img/img12.jpg');">
		                    	
		                    </div>


		                    <div class="col-sm-6" style="display:inline-block;">	                    	
		                    	<p class="vertcenteredtext">
			                    	Sailaways provide an amazing opportunity to build your dream home exactly how you want it. You have complete control over every aspect of the fitout of your boat. 
			                    </p>
		                    </div>


	                    </div>


	                    <div class="row">


	                    	<div class="col-sm-6" style="display:inline-block;">	                    	
		                    	<p class="vertcenteredtext">
			                    	Working in partnership with Nottingham Boat Co, we can provide an amazing range of sailaway craft for whatever you have in mind. 
			                    </p>
		                    </div>


		                    <div class="col-sm-6 homecard">
		                    	<img class="vertcenteredtext" style="max-width:20vw;" src="{{{url('/img/nbclogo.png')}}}"/>
		                    </div>		                    


	                    </div>
	              
	                </div>
	            </section>
            </div>



            <script>

            	$(window).resize(setElementPositions);
            	$(document).ready(function() {

 					setElementPositions();

            	});

            	function setElementPositions(){
            		$('#cta').css('padding-top',($('#homebanner').height()-$('#cta').height()-50));

            		size=(($('.vertcenteredtext').parent().height() - $('.vertcenteredtext').height())/2);
            		$('.vertcenteredtext').css('padding-top',size);
            		$('.vertcenteredtext').css('padding-bottom',size);
            	}	


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

            </script>

@endsection