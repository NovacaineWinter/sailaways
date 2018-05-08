
@extends('layouts.masterTemplate',['suppressFooter'=>1])

@section('title')
    SAILAWAYS.NET
@endsection


@section('content')
    <div id="ajax-target">

        @include('configurator.startConfig',['info'=>$info])

    </div>
@endsection