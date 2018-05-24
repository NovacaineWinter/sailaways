
@section('title')
    {{{ env('SITE_NAME')}}} | Contact Us
@endsection

@extends('layouts.masterTemplate')

@section('content')

            <div class="content">
            	<div class="bannerimg" id="contactbanner">
                  	<div class="title m-b-md">
                        Contact Us
                   	</div>
	            </div>

                <div class="container">

                	<div class="row" style="margin-top:4vh;">
                		<div class="boatcard col-lg-5">
                			<h2>Address</h2>
                			<p>
                				Nottingham Boat Co LTD <br>
                				Red Hill Marina <br>
                				Ratcliffe-on-Soar<br>
                				Nottingham<br>
                				NG11 0EB<br>
                			</p>
                		</div>
                		<div class="boatcard col-lg-5">
                			<h2>Email And Phone</h2>
                			<p>
	                			info@NottinghamBoatCo.com
	                			<br><br>
	                			0115 972 8125
	                		</p>
                		</div>
                	</div>
                   	
                </div>
            </div>

@endsection