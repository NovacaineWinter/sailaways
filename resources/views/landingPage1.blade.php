@extends('layouts.masterTemplate')


@section('title')
    {{{ env('SITE_NAME')}}} | Home
@endsection



@section('content')

            <div class="content">
                <div class="bannerimg" id="homebanner">
                	<a href="#info">
	                	<div id="cta">
	                		<h1>Quality.<br>Without Compromise</h1>
	                		<h4>Discover</h4>
	                		<h1>v</h1>
	                	</div>
                	</a>
                </div>
                <section id="info">
	                


                        <div class="taglineholder">
    	                    <p class="tagline">
                                The quality of life on the water is second to none, it provides freedom, luxury and a new way of living. Buying a new boat is an investment in your future. Built to exacting standards, we provide nothing but the very best. We look forward to welcoming you into the Nottingham Boat Co family when you choose us to build your home. 
                            </p>
                        </div>


	                    <div class="row">

		                    <div class="col-sm-6 homecard" style="background-image:url('/img/home2.jpg');">
		                    	
		                    </div>


		                    <div class="col-sm-6 textcontainer" style="display:inline-block;">
                   	
		                    	<p class="vertcenteredtext">
			                    	Our relentless focus on <strong>quality</strong> and <strong>durability</strong> has led us to produce some of the <strong>very best boats</strong> on the inland waterways. Here at Nottingham Boat Co we pride ourselves on our friendly <strong>expert advice</strong>. We know that buying a boat is often the biggest purchasing descision of your life. Rest asured that a boat from Nottingham Boat Co, using nothing but the <strong>very best</strong> in <strong>materials, technology and craftsmanship</strong>, will stand the test of time. 
			                    </p>
		                    </div>


	                    </div>
                      

                        <div class="taglineholder">
                            <p class="tagline">
                                Made for living, Built for cruising.
                            </p>
                        </div>


                        <div class="row">


                            <div class="col-sm-6 textcontainer" style="display:inline-block;">                                                       
                                <div class="vertcenteredtext"> 
                                    <h4>Our Mission</h4><br><br>
                                    <p style="text-align:left;">
                                        To manufacture the absolute highest quality inland waterways craft, suitable for living aboard and holidaying.
                                        Offering the best guarantees in the industry, due to the confidence we have in the build quality of our boats.
                                        Apply the very latest modern manufacturing techniques, driven by skilled technicians, using the very best materials available to create boats with uncompromising attention to detail and quality.<br><br>
                                        Give unrivalled customer service, offered by knowledgeable friendly staff ready to answer your questions and help you, our customers get the most from their brand-new boat from day one.<br><br>
                                        To offer all of the above at a competitive price, to customers that wish to enjoy life on the water. 
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-6 homecard" style="background-image:url('/img/map.jpg');"></div>


                        </div>

                        <div class="taglineholder">
                            <p class="tagline">
                                Ultimate Boating Pleasure. Craftsmanship and Precision Engineering.
                            </p>
                        </div>    


                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h1>GET STARTED</h1>
                            </div>
                            <div class="col-sm-6 textcontainer optioncard" style="display:inline-block;">                          
                               <h4>Option 1</h4>
                                <h2>View Boats In Stock</h2>
                                <img src="{{{url('/img/stock1.jpg')}}}" alt="stockboats">
                                <p>These boats are on site and ready to go. Come down and have a look, your new home could be yours sooner than you expected.</p>
                                <br>
                                <a href="{{{ url('stock') }}}" class="btn btn-info btn-lg">View Boats In Stock</a>
                            </div>


                            <div class="col-sm-6 textcontainer optioncard">
                                <h4>Option 2</h4>
                                <h2>Choose a boat from our range</h2>
                                <img src="{{{url('/img/spec.jpg')}}}" alt="configure">
                                <p>Get exactly what you want from your boat. Choose style, length, width and fitout level. Choose from many optional extras and upgrades. Get your build slot booked now</p>
                                <br>
                                <a href="{{{ url('model') }}}" class="btn btn-info btn-lg">View Range</a>
                            </div>

                        </div>

                        <div class="taglineholder">
                            <p class="tagline">
                                &nbsp;
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h1 style="margin:75px 0px">Want To Know More?</h1>
                                <a href="{{{url('faq')}}}" class="btn btn-info btn-lg" style="margin:50px 0px">View Our FAQs</a>
                            </div>
                        </div>

                        <div class="taglineholder">
                            <p class="tagline">
                                &nbsp;
                            </p>
                        </div>


	                    
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h1 style="margin:75px 0px">Want A Sailaway Boat?</h1>
                                <a href="http://sailaways.net" class="btn btn-info btn-lg" style="margin:50px 0px">Visit sailaways.net</a>
                            </div>
                        </div>



                       
	            </section>
            </div>





@endsection

@section('cookiebar')
    @include('cookiebar')   
@endsection
