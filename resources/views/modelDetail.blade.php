
@section('title')
    {{{ env('SITE_NAME')}}} | Stock
@endsection


@extends('layouts.masterTemplate')

@section('content')
		<a href="{{{ url('/model') }}}" class="btn btn-lg btn-info pull-left" style="position: relative;top: 110px;left: 20px;">Back</a>

            <div class="content">
                <div class="container">
                  	<div class="title m-b-md">
                        {{{$info['boat']->name}}}
                   	</div>
                    Prices starting from &pound; {{{$info['boat']->startPrice}}} 

                   	<div class="row">

                  

                      @if($info['boat']->images->count()>0)
                          <div class="col-sm-6">
                            @foreach($info['boat']->images->sortByDesc('primary') as $img)                            
                              <div class="imagetile" style="padding:15px" target="{{ Storage::url($img->src) }}"></div>
                            @endforeach
                          </div>   
                      @else
                        <div class="col-sm-6 imagetile" target="{{ url('/img/defaultBoat.png') }}"></div>
                      @endif    



                      <div class="col-sm-6">
                        <p>{!! $info['boat']->description !!}</p>
                      </div>

                   	</div>

                                       
                    <br><br>

<!--                     <a href="{{ url(Storage::url($info['boat']->specsheet)) }}" class="btn btn-info btn-lg">Download Specsheet</a>
                   	<h2>&nbsp;</h2> -->
                   	
                </div>
            </div>


@endsection