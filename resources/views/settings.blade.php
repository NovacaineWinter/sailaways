@extends('layouts.masterTemplate')


@section('title')
    {{{ env('SITE_NAME')}}} | Settings
@endsection
@section('content')
    <div class="container">
        <div class="col-sm-12">
            <h3>Manage your Privacy</h3>
            <p> If you no longer give {{{ env('SITE_NAME') }}} permission to set cookies, click the button below</p>
            <button id="removeCookies">Remove My Cookies</button>
        </div>
    </div>

@endsection

