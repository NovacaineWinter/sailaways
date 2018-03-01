@extends('layouts.app')

@section('content')
<a href="{{{ url('home') }}}"><h3>Back</h3></a>
<h1 style="text-align: center;">Set Base prices</h1>
	<div class="container">

		<div id="base-price-table" class="divTable">
			<div class="divTableBody">
		

			<div class="divTableRow tableHeaderRow">
				<div class="divTableCell withborder">Hull Type</div>
				<div class="divTableCell withborder">Fitout Level</div>
				<div class="divTableCell withborder" style="width:10px;">Width</div>
				@foreach($info['lengths'] as $length)
					<div class="divTableCell withborder cellcentered">{{{ $length->ft }}}'</div>
				@endforeach
			</div>
		@foreach($info['hulls'] as $hull)

			<?php 
				$hull_row_count = 0;
				$num_fitouts = App\fitout_level::all()->count();
				$widthIDs = array_unique($hull->configurations->pluck('width_id')->toArray()); 
				$num_widths = count($widthIDs);
				$wids = App\width::whereIn('id',$widthIDs)->get();
				$rowsPerHull = $num_fitouts * $num_widths;
				$hullTagPosition = ceil($rowsPerHull/2);
				$fitoutTagPosition = ceil($num_widths/2);
			?>		

				@foreach($info['fitouts'] as $fitout)
					<?php $fitout_row_count=0; ?>
					@foreach($wids as $width)
					<?php $hull_row_count++;$fitout_row_count++ ?>
						<div class="divTableRow">
							<div class="divTableCell leftborder"> @if($hull_row_count == $hullTagPosition) {{{$hull->name}}} @endif</div>
							<div class="divTableCell leftborder">@if($fitoutTagPosition == $fitout_row_count) {{{$fitout->name}}} @endif</div>
							<div class="divTableCell withborder cellcentered">{{{$width->ft}}}'</div>
							@foreach($info['lengths'] as $length)

								<div class="divTableCell withborder">


										<?php
										$configs = App\configuration::where('hull_style_id','=',$hull->id)
										->where('fitout_level_id','=',$fitout->id)
										->where('width_id','=',$width->id)
										->where('length_id','=',$length->id); ?>
																			
										@if($configs->count()>0)

											&pound;
											<input type="number" 
											class="updateablenumber" 
											target="{{{ $configs->get()->first()->id }}}" 
											id="baseprice-for-id-{{{$configs->get()->first()->id}}}"
											value="{{{$configs->get()->first()->baseprice}}}"
											old="{{{$configs->get()->first()->baseprice}}}"
											method="updateBasePrice"
											readonly="readonly">

										@endif

								</div>

							@endforeach

						</div>	

					@endforeach
				@if(!$loop->last)
					<div class="divTableRow">
						<div class="divTableCell thinline"></div>
						<div class="divTableCell thinline blackout"></div>
						<div class="divTableCell thinline blackout"></div>
						@foreach($info['lengths'] as $length)
							<div class="divTableCell thinline blackout"></div>
						@endforeach
					</div>
				@endif

				@endforeach

				@if(!$loop->last)
					<div class="divTableRow">
						<div class="divTableCell fatline blackout"></div>
						<div class="divTableCell fatline blackout"></div>
						<div class="divTableCell fatline blackout"></div>
						@foreach($info['lengths'] as $length)
							<div class="divTableCell fatline blackout"></div>
						@endforeach
					</div>
				@endif
			<div class="divTableRow">
					<div class="divTableCell thinline blackout"></div>
					<div class="divTableCell thinline blackout"></div>
					<div class="divTableCell thinline blackout"></div>
					@foreach($info['lengths'] as $length)
						<div class="divTableCell thinline blackout"></div>
					@endforeach
				</div>
			</div>

		@endforeach

		</div>
	</div>
</div>
@endsection


