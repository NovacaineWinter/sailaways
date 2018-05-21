
@section('title')
    Nottingham Boat Co s | Data Protection
@endsection

@extends('layouts.masterTemplate')

@section('content')

    <div class="content">
    	<div class="bannerimg" id="faqbanner">
          	<div class="title m-b-md">
                FAQs
           	</div>
        </div>

        <div class="container">
        	<h2 style="margin:40px 0px;">These are a selection of the most frequently asked questions...</h2>    
           	<h4>If your question isn't answered here,<a href="{{{url('contact')}}}">Get In Touch</a></h4>
        
         	<div class="col-sm-12">

         		@foreach($questions as $question)
         			@include('loops.faqLooped',['question',$question])
         		@endforeach

         	</div>
        </div>
    </div>

@endsection