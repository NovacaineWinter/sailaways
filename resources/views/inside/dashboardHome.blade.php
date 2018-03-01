@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{{ url('baseprice') }}}"><div class="col-sm-6 dashbutton">Edit Base Prices</div></a>
		<a href="{{{ url('extras') }}}"><div class="col-sm-6 dashbutton">View Optional Extras</div></a>
	</div>
@endsection