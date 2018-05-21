
@extends('layouts.masterTemplate',['suppressFooter'=>1])

@section('title')
    Nottingham Boat Co 
@endsection


@section('content')
    <div id="ajax-target">

        @include('configurator.startConfig',['info'=>$info])

    </div>
@endsection