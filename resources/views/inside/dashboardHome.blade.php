@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{{ url('baseprice') }}}"><div class="col-sm-3 dashbutton">Edit Base Prices</div></a>
		<a href="{{{ url('extras') }}}"><div class="col-sm-3 dashbutton">View Optional Extras</div></a>
		<a href="{{{ url('faq-admin') }}}"><div class="col-sm-3 dashbutton">Manage FAQ</div></a>
		<a href="{{{ url('stock-boat-admin') }}}"><div class="col-sm-3 dashbutton">Manage Stock Boats</div></a>
	</div>
@endsection