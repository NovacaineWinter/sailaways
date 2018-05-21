
@section('title')
    Nottingham Boat Co  | Stock
@endsection


@extends('layouts.masterTemplate')

@section('content')
		<a href="{{{ url('/stock') }}}" class="btn btn-lg btn-info pull-left" style="position: relative;top: 110px;left: 20px;">Back</a>

            <div class="content">
                <div class="container">
                  	<div class="title m-b-md">
                        {{{$info['boat']->title}}}
                   	</div>


                   	<div class="row">

                      @if($info['boat']->img->count()>0)
                         <div class="col-sm-6 imagetile" target="{{ Storage::url($info['boat']->img->sortByDesc('primary')->first()->src) }}"></div>
                      @else
                        <div class="col-sm-6 imagetile" target="{{ url('/img/defaultBoat.png') }}"></div>
                      @endif    

                      <div class="col-sm-6"><p class="vertcenteredtext">{{{ $info['boat']->description }}}</p></div>

                   	</div>

                      <div class="col-sm-12">
                        <table style="width:100%;text-align:center; margin:40px 0px">
                          <thead>
                            <tr>
                              <th>Length</th>
                              <th>Width</th>
                              <th>Price</th>
     
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{{{ $info['boat']->configuration->length->ft }}}ft</td>
                              <td>{{{ $info['boat']->configuration->width->ft }}}ft</td>

                              <td>&pound;{{{ number_format($info['boat']->price ) }}}</td>
                                             
                            </tr>
                          </tbody>
                        </table>
                      </div>



                    <a href="{{ url(Storage::url($info['boat']->specsheet)) }}" class="btn btn-info btn-lg">Download Specsheet</a>
                   	<h2>&nbsp;</h2>
                   	<div class="row">

                      @if($info['boat']->img->where('primary','=',false)->count()>0)

                     		@foreach($info['boat']->img->where('primary','=',false) as $img)
                     			<div class="col-sm-4" style="padding:15px">
                     				<div class="imagetile" target="{{ Storage::url($img->src) }}"></div>
                     			</div>
                     		@endforeach

                      @endif

                   	</div>
                </div>
            </div>


@endsection