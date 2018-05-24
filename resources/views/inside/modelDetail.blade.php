@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-12 adminsection">
		<h4 class="text-center">Edit Model</h4>



		<form action="" method="get">

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Model Name:<br><p>N.B This is visible to Website visitors</p></div>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="title" value="{{{$data['target']->name}}}">	
				</div>			
			</div>		

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Starting Price<br><p>N.B This should be Ex VAT</p></div>
				<div class="col-sm-8">
					<input type="number" class="form-control" name="price" value="{{{$data['target']->startPrice}}}">	
				</div>			
			</div>	


			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Short Description:</div>
				<div class="col-sm-8">
					<textarea class="dashboardTextbox" name="shortDescription" rows="4">{{{$data['target']->shortsummary}}}</textarea>
				</div>
			</div>	

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Full Description:</div>
				<div class="col-sm-8">
					<textarea class="dashboardTextbox" name="fullDescription" rows="4">{{{$data['target']->description}}}</textarea>
				</div>
			</div>				


			
       		<input type="hidden" value="{{{ $data['target']->nonce }}}" name="nonce">
			
			<input type="hidden" value="{{{ $data['target']->id }}}" name="target">


			<input type="submit" class="pull-right" value="Save">

		</form>

<br><br><br><br>
		

		<form action="{{{ url('/edit-model/specsheet') }}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" value="{{{ $data['target']->id }}}" name="target">



			<div class="row paddedrow">

				<div class="col-sm-4 text-right">Spec Sheet</div>
				<div class="col-sm-4">			

        			<input type="file" name="specsheet">
				</div>
				<div class="col-sm-3"><input type="submit" class="pull-right" value="Upload Spec Sheet"></div>
			</div>

			@if($data['target']->specsheet!='')
				<a href="{{ url(Storage::url($data['target']->specsheet)) }}" class="btn btn-info btn-lg">Download Current Specsheet</a>
			@endif
			
		</form>


<br><br><br><br>

		<form action="{{{ url('/edit-model/photo') }}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" value="{{{ $data['target']->id }}}" name="target">



			<div class="row paddedrow">

				<div class="col-sm-4 text-right">Images</div>
				<div class="col-sm-4">			

        			<input type="file" name="photo">
				</div>
				<div class="col-sm-3"><input type="submit" class="pull-right" value="Upload Image"></div>
			</div>

			
		</form>

<br><br><br><br>


	@foreach($data['target']->images->sortByDesc('primary') as $image)
		<div class="row paddedrow questionContainer questionHeader">
			<div class="col-sm-4 col-offset-sm-2 imageselector" style="background-image:url({{ url(Storage::url($image->src)) }});">
				
			</div>
			@if(!$image->primary)
				<div class="col-sm-3 vertcenteredtext" style="text-align: center;">
					<div class="btn btn-lg btn-red imageButton" method="deleteModelImage" image="{{{ $image->id }}}" boat="{{{ $data['target']->id }}}">Delete</div>
				</div>
				<div class="col-sm-3 vertcenteredtext" style="text-align: center;">
					<div class="btn btn-lg btn-info imageButton" method="updateModelPrimaryImage" image="{{{ $image->id }}}" boat="{{{ $data['target']->id }}}">Set As Primary</div>
				</div>
			@else
				<div class="col-sm-6 vertcenteredtext" style="text-align: center;">
					Primary Image
				</div>
			@endif
		</div>
	@endforeach

	</div>
</div>
@endsection