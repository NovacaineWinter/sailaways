@extends('layouts.app')

@section('content')
<div class="container">

	<div class="col-sm-12 adminsection">
 		@foreach($data['boats'] as $boat)
			<div class="row paddedrow questionContainer questionHeader">
		 			@if($boat->img->count()>0)
		 				<div class="col-sm-2 img150pix"><img src="{{ url(Storage::url($boat->img->sortByDesc('primary')->first()->src)) }}"></div>
                  	@else
                  		<div class="col-sm-2 img150pix"><img src="{{ url('/img/defaultBoat.png') }}"></div>
                  	@endif    
				
				<div class="col-sm-2 text-right">{{{$boat->title}}}</div>
				<div class="col-sm-4">{{{$boat->shortsummary}}}</div>
				<div class="col-sm-2">&pound;{{{ number_format($boat->price)}}}</div>
				<div class="col-sm-2"><a class="btn btn-info btn-lg" href="{{{ url('edit-stock-boat?target='.$boat->id) }}}">Edit</a></div>
			</div>	
 		@endforeach
	</div>

	
	<div class="col-sm-12 adminsection">
		<h4 class="text-center">Add New Stock Boat</h4>
		<form action="" method="get">

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Boat Title:<br><p>N.B This is visible to Website visitors</p></div>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="title" placeholder="Boat Title">	
				</div>			
			</div>		

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Price<br><p>N.B This should be Ex VAT  -  Excluding Admin Fee</p></div>
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


			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Hull Type</div>
				<div class="col-sm-8">
					<select name="hull">
						@foreach($data['hulls'] as $hull)
							<option value="{{{ $hull->id }}}">{{{$hull->name}}}</option>
						@endforeach
					</select>
				</div>
			</div>	

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Width</div>
				<div class="col-sm-8">
					<select name="width">
						@foreach($data['widths'] as $width)
							<option value="{{{ $width->id }}}">{{{$width->ft}}}</option>
						@endforeach
					</select>ft
				</div>
			</div>	

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Length</div>
				<div class="col-sm-8">
					<select name="length">
						@foreach($data['lengths'] as $length)
							<option value="{{{ $length->id }}}">{{{$length->ft}}}</option>
						@endforeach
					</select>ft
				</div>
			</div>	

			
			<input type="hidden" value="{{{time()}}}" name="nonce">


			<input type="submit" class="pull-right" value="Add Boat">

		</form>
	</div>
	
</div>
@endsection