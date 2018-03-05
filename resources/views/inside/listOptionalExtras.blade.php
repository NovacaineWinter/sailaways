@extends('layouts.app')

@section('content')
<a href="{{{ url('home') }}}"><h3>Back</h3></a>
	<div class="container">
		<div class="dashbutton dash-clickable" method="createNewOptionalExtra">+ New Optional Extra</div>
		<div id="optionalExtrasList">
			@if($extras->count()>0)
					<div class="row">
						<div class="col-sm-3">Name</div>
						<div class="col-sm-3">For</div>
						<div class="col-sm-2">Used In</div>
						<div class="col-sm-2">Price</div>
						<div class="col-sm-2"></div>
					</div>
				@foreach($extras->sortBy('name')->sortByDesc('highlighted') as $extra)
					<div class="row unpaddedrow @if($extra->highlighted) dash-highlighted @endif" style="border: 1px solid #e8e8e8;">
						<div class="col-sm-3">{{{$extra->name}}}</div>
						<div class="col-sm-3">
							@if($extra->configurations->count()>0) 
								@foreach($extra->configurations->pluck('hull_style_id')->unique() as $hull )
								{{{ App\hull_style::find($hull)->name}}},
								@endforeach 
							@endif
						</div>
						<div class="col-sm-2"> {{{ $extra->configurations->count() }}} Configurations</div>
						<div class="col-sm-2">&pound;{{{$extra->price_ex_vat}}}</div>
						<div class="col-sm-2"><a href="{{{ url('optionalextra?targetextra='.$extra->id) }}}">EDIT</a></div>
					</div>
				@endforeach
			@else
				There are no optional extras in the database
			@endif
		</div>
	</div>
@endsection