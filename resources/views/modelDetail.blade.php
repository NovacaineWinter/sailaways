
@section('title')
    Nottingham Boat Co  | Stock
@endsection


@extends('layouts.masterTemplate')

@section('content')
		<a href="{{{ url('/model') }}}" class="btn btn-lg btn-info pull-left" style="position: relative;top: 110px;left: 20px;">Back</a>

            <div class="content">
                <div class="container">
                  	<div class="title m-b-md">
                        {{{$info['boat']->name}}}
                   	</div>


                   	<div class="row">

                      @if($info['boat']->images->count()>0)
                         <div class="col-sm-6 imagetile" target="{{ Storage::url($info['boat']->images->sortByDesc('primary')->first()->src) }}"></div>
                      @else
                        <div class="col-sm-6 imagetile" target="{{ url('/img/defaultBoat.png') }}"></div>
                      @endif    

                      <div class="col-sm-6"><p class="vertcenteredtext">{{{ $info['boat']->description }}}</p></div>

                   	</div>

                    Prices starting from &pound; {{{$info['boat']->startPrice}}}                    


                    <a href="{{ url(Storage::url($info['boat']->specsheet)) }}" class="btn btn-info btn-lg">Download Specsheet</a>
                   	<h2>&nbsp;</h2>
                   	<div class="row">

                      @if($info['boat']->images->where('primary','=',false)->count()>0)

                     		@foreach($info['boat']->images->where('primary','=',false) as $img)
                     			<div class="col-sm-4" style="padding:15px">
                     				<div class="imagetile" target="{{ Storage::url($img->src) }}"></div>
                     			</div>
                     		@endforeach

                      @endif

                   	</div>
                </div>
            </div>


@endsection