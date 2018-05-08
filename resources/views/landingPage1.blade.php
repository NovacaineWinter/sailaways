
@section('title')
    Sailaways.net | Home
@endsection

@extends('layouts.masterTemplate')

@section('content')

            <div class="content">
                <div class="bannerimg" id="homebanner">
                	<a href="#info">
	                	<div id="cta">
	                		<h1>A Sailaway is more than<br>just a boat <br>.<br> It's your home</h1>
	                		<h4>Discover</h4>
	                		<h1>v</h1>
	                	</div>
                	</a>
                </div>
                <section id="info">
	                


                        <div class="taglineholder">
    	                    <p class="tagline">
                                Life on the water provides freedom, luxury and a new way of living. Building your very own sailaway gets you way more for your money, and allows you to get things exactly how you want them. 
                            </p>
                        </div>


	                    <div class="row">

		                    <div class="col-sm-6 homecard" style="background-image:url('/img/img12.jpg');">
		                    	
		                    </div>


		                    <div class="col-sm-6 textcontainer" style="display:inline-block;">
                                <h4>A BLANK CANVAS</h4>	                    	
		                    	<p class="vertcenteredtext">
			                    	When you buy your sailaway from us, you enjoy support and advice from our experts, in specifying and customising your perfect narrowboat or widebeam. <br>

                                    You can have your sailaway built to any level of completion; hull only, primed hull with windows, doors, ballast, floor along with an engine and gearbox, Or have the boat ply lined with electrics and plumbing or even through to a fully fitted boat.<br>

                                    Size options range from 50ft-70ft.
			                    </p>
		                    </div>


	                    </div>
                      

                        <div class="taglineholder">
                            <p class="tagline">
                                Your project. Your design. Your pace.
                            </p>
                        </div>


                        <div class="row">


                            <div class="col-sm-6 textcontainer" style="display:inline-block;">
                                <h4>YOUR IDEAL PLACE TO WORK</h4>                         
                                <p class="vertcenteredtext">
                                    In addition, we have combined DIY fitout packages avialable (i.e. electric/ joinery/plumbing), by room and also supply the individual products via our chandlery. <br>

                                    Storage and workspace is provided at our expansive, well located site at Red Hill Marina in Nottingham, Close to the M1. We encourage you to come and visit us to see first class craftsmanship at work, and ask any questions you have. We have the optimum location, expertise and equipment to help you build your ideal home.<br>

                                    What’s more, there are finance options available via our finance partners.
                                </p>
                            </div>

                            <div class="col-sm-6 homecard" style="background-image:url('/img/map.jpg');"></div>


                        </div>

                        <div class="taglineholder">
                            <p class="tagline">
                                Expert advice and a world class location for your project.
                            </p>
                        </div>    


                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h1>BUILD MY BOAT</h1>
                            </div>
                            <div class="col-sm-6 textcontainer optioncard" style="display:inline-block;">                          
                               <h4>Option 1</h4>
                                <h2>View Boats In Stock</h2>
                                <img src="{{{url('/img/img1.jpg')}}}" alt="stockboats">
                                <p>These boats are on site and ready to go. Come down and have a look, your new home could be yours sooner than you expected.</p>
                                <br>
                                <a href="{{{ url('stock') }}}" class="btn btn-info btn-lg">View Boats In Stock</a>
                            </div>


                            <div class="col-sm-6 textcontainer optioncard">
                                <h4>Option 2</h4>
                                <h2>Configure My Perfect Boat</h2>
                                <img src="{{{url('/img/config.jpg')}}}" alt="configure">
                                <p>Get exactly what you want from your boat. Choose style, length, width and fitout level. Choose from many optional extras and upgrades.</p>
                                <br>
                                <a href="{{{ url('configure') }}}" class="btn btn-info btn-lg">Configure My Boat</a>
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


	                    	<div class="col-sm-6 textcontainer" style="display:inline-block;">	                    	
		                    	<p class="vertcenteredtext">
			                    	Provided through Nottingham Boat Co, Sailaways.net can provide an amazing range of sailaway craft from various manufacturers for whatever you have in mind. 
			                    </p>
		                    </div>


		                    <div class="col-sm-6 homecard">
		                    	<img class="vertcenteredtext" id="nbclogoimg" src="{{{url('/img/nbclogo.png')}}}"/>
		                    </div>		                    


	                    </div>

                        
                        <div class="taglineholder">
                            <p class="tagline">
                                &nbsp;
                            </p>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h1 style="margin:75px 0px">Want A fully Fitted Boat?</h1>
                                <a href="http://www.nottinghamboatco.com" class="btn btn-info btn-lg" style="margin:50px 0px">Visit Nottingham Boat Co</a>
                            </div>
                        </div>



                       
	            </section>
            </div>





@endsection

@section('cookiebar')
    <div id="cookiebar">
        <div id="cookieinfo">
            <p>
                This website uses cookies. Find out this affects you <a href="{{{url('/dataprotection')}}}">HERE.</a>
                <button class="cookiebuttons" id="rejectCookies">Reject</button>
                <button class="cookiebuttons" id="acceptCookies">Accept Cookies</button>
            </p>
        </div>            
    </div>   
@endsection