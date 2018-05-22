@extends('layouts.app')

@section('content')
<div class="container">

	<div class="col-sm-12 adminsection">
 		@foreach($data['boats'] as $boat)
			<div class="row paddedrow questionContainer questionHeader">
		 			@if($boat->images->count()>0)
		 				<div class="col-sm-2 img150pix"><img src="{{ url(Storage::url($boat->img->sortByDesc('primary')->first()->src)) }}"></div>
                  	@else
                  		<div class="col-sm-2 img150pix"><img src="{{ url('/img/defaultBoat.png') }}"></div>
                  	@endif    
				
				<div class="col-sm-2 text-right">{{{$boat->name}}}</div>
				<div class="col-sm-4">{{{$boat->shortsummary}}}</div>
				<div class="col-sm-2">&pound;{{{ number_format($boat->startPrice)}}}</div>
				<div class="col-sm-2"><a class="btn btn-info btn-lg" href="{{{ url('edit-model?target='.$boat->id) }}}">Edit</a></div>
			</div>	
 		@endforeach
	</div>

	
	<div class="col-sm-12 adminsection">
		<h4 class="text-center">Add New Model</h4>
		<form action="" method="get">

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Model Name:<br><p>N.B This is visible to Website visitors</p></div>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="title" placeholder="Boat Title">	
				</div>			
			</div>		

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Starting Price<br><p>N.B This should be Ex VAT</p></div>
				<div class="col-sm-8">
					<input type="number" class="form-control" name="price" placeholder="Price">	
				</div>			
			</div>	


			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Short Description:</div>
				<div class="col-sm-8">
					<textarea class="dashboardTextbox" name="shortDescription" rows="4" placeholder="Short Description"></textarea>
				</div>
			</div>	

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Full Description:</div>
				<div class="col-sm-8">
					<textarea class="dashboardTextbox" name="fullDescription" rows="4" placeholder="Full Description"></textarea>
				</div>
			</div>						
		

			
			<input type="hidden" value="{{{time()}}}" name="nonce">


			<input type="submit" class="pull-right" value="Add Boat">

		</form>
	</div>
	
</div>
@endsection