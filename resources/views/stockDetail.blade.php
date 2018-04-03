
@section('title')
    Sailaways.net | Stock
@endsection


@extends('layouts.masterTemplate')

@section('content')
		<a href="{{{ url('/stock') }}}" class="btn btn-lg btn-info pull-left" style="position: relative;top: 110px;left: 20px;">Back</a>

            <div class="content">
                <div class="container">
                  	<div class="title m-b-md">
                        Boat {{{$info['boat']->id}}}
                   	</div>


                   	<div class="row">
                   		<div class="col-sm-6 imagetile" target="{{{ $info['boat']->img->first()->src }}}"></div>
                   		<div class="col-sm-6">{{{ $info['boat']->description }}}</div>
                   	</div>
                    <a href="{{ url(Storage::url($info['boat']->specsheet)) }}" class="btn btn-info btn-lg">Download Specsheet</a>
                   	<h2>Images</h2>
                   	<div class="row">
                   		@foreach($info['boat']->img as $img)
                   			<div class="col-sm-4" style="padding:15px">
                   				<div class="imagetile" target="{{{ $img->src }}}"></div>
                   			</div>
                   		@endforeach
                   	</div>
                </div>
            </div>


@endsection