
@extends('layouts.masterTemplate',['suppressFooter'=>1])

@section('title')
    {{{ env('SITE_NAME')}}}  
@endsection


@section('content')
    <div id="ajax-target">

        @include('configurator.startConfig',['info'=>$info])

    </div>
@endsection