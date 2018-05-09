
@section('title')
    Sailaways.net | Stock
@endsection


@extends('layouts.masterTemplate')

@section('content')

<div class="content">
    <div class="container">                  
        <div class="title m-b-md">
            Models
        </div>

        <div class="row">
            @foreach($info['boats'] as $boat)

                <!--  Boat {{{ $boat['id'] }}} -->

                <div class="boatcard col-lg-5">
                    @if($boat->sold)
                        <div class="soldBanner">SOLD</div>
                    @endif
                    <div class="cardtitle">
                        <h3>{{{ $boat->title }}}</h3>
                    </div>

                @if($boat->img->count()>0)
                    <div class="cardimage" style="background-image:url('{{ url(Storage::url($boat->img->sortByDesc('primary')->first()->src)) }}')"></div>
                @else
                    <div class="cardimage" style="background-image:url('{{ url('/img/defaultBoat.png') }}')"></div>
                @endif

                
                <div class="cardfooter">
                    <p>{{{ $boat->shortsummary }}}</p>

                    <a href="{{{ url('/stock/detail/?target='.$boat->id) }}}" class="btn btn-info btn-lg centerBottomButton">
                    	View more
                    </a>
                </div>

                </div>


                @if($boat['id']%2 ==0)
                </div>

                <div class="row">       	
                @endif

            @endforeach
        </div>	

    </div>
</div>

@endsection