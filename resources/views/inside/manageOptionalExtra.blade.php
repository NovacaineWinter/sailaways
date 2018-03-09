@extends('layouts.app')

@section('content')

<a href="{{{ url('extras') }}}"><h3>Back</h3></a>
<h1 style="text-align: center;">Edit Optional Extra</h1>
	<div class="container" id="edit-optional-extra-container">



		<div class="col-sm-6">
			<h3>Extra Details</h3>
			
		<!-- Name -->
		<div class="row option-attribute">
			<div class="col-sm-6 text-right">
				<h4>Name:</h4>
				
			</div>
			<div class="col-sm-6">
				<input type="text" name="optionname" id="optionname" class="optiontext" method="updateOptionName" target="{{{$info['item']->id}}}" value="{{{ $info['item']->name }}}">
			</div>
			<div class="col-sm-12 text-center">
				<p>What NBC refer to this internally - the name is not shown to the customer</p>
			</div>
		</div>
		
		<!-- Title -->
		<div class="row option-attribute">
			<div class="col-sm-6 text-right">
				<h4>Item Title:</h4> 				
			</div>
			<div class="col-sm-6">
				<input type="text" id="optiontite" class="optiontext" method="updateOptionTitle" target="{{{$info['item']->id}}}" value="{{{ $info['item']->title }}}">
			</div>
			<div class="col-sm-12 text-center">
				<p>Publicly viewable title for what the option is</p>
			</div>
		</div>	

		<!-- Category -->
		<div class="row option-attribute">
			<div class="col-sm-6 text-right">
				<h4>Option Category:</h4>

			</div>
			<div class="col-sm-6">
				<select style="margin-top:10px;"  class="optiontext" target="{{{$info['item']->id}}}" method="changeOptionCategory">
					<option value="0">Select Category...</option>
					@foreach($info['categories']->sortBy('position') as $cat)
						<option value="{{{ $cat->id }}}" @if($info['item']->option_category_id == $cat->id) selected @endif >{{{ $cat->name }}}</option>
					@endforeach
				</select>				
			</div>
		</div>



		<!-- Standard Feature -->
		<div class="row option-attribute">
			<div class="col-sm-6 text-right">
				<h4>Standard feature:</h4> 
			</div>
			<div class="col-sm-6">
				<input type="checkbox" class="standardFeature" method="updateIsStandardFeature" target="{{{$info['item']->id}}}" >
			</div>	
		</div>



		<!-- Price -->
		<div class="row option-attribute">
			<div class="col-sm-6 text-right">
				<h4>Price:</h4> 
			</div>
			<div class="col-sm-6">
				&pound; <input type="number" step="0.01" class="optiontext" method="updateOptionPrice" target="{{{$info['item']->id}}}" value="{{{ $info['item']->price_ex_vat }}}">
			</div>	
		</div>


		<!-- Description -->
		<div class="row option-attribute">
			<div class="col-sm-6 text-right">
				<h4>Description: </h4>
			</div>
			<div class="col-sm-6">
				<textarea class="optiontext" method="updateOptionDescription" target="{{{$info['item']->id}}}">{{{ $info['item']->description }}}</textarea>
			</div>		
		</div>


		<!-- Bosun Catalogue ID -->		
		<div class="row option-attribute">	
			<div class="col-sm-6 text-right">
				<h4>Bosun Catalogue ID:</h4>
				
			</div>
			<div class="col-sm-6">
				<input type="number" id="bosunCategoryID" value="{{{ $info['item']->catalogue_id }}}" class="optiontext" method="updateBosunCatalogueID" 
				target="{{{$info['item']->id}}}">
			</div>
			<div class="col-sm-12 text-center">
				<p>(Optional)</p>
			</div>
		</div>

		<!-- Image -->		
		<div class="row option-attribute">	
			<div class="col-sm-6 text-right">
				<h4>Image</h4>				
			</div>
			<div class="col-sm-6 optionImageContainer">
				<img src="{{ $info['img'] }}">
			</div>
			<div class="col-sm-12" style="margin-top:10px;">
				<div class="col-sm-6 text-right">
					<p>Change</p>
				</div>
				<div class="col-sm-6">
					<form  id="imgform" method="post" action="{{{url('/adminAjax/imageupload/option')}}}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="targetextra" value="{{{ $info['item']->id }}}">
						<input type="hidden" name="target" value="{{{ $info['item']->id }}}">
						<input type="file" name="input_img" id="fileToUpload">
						<input type="submit" value="upload" style="display:none;" id="uploadbutton">
					</form>
				</div>
			</div>
		</div>


		</div>

		<div class="col-sm-6">
			<h3>Available On</h3>

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
											->where('length_id','=',$length->id);
											if($configs->count()==1){
												$config_id = $configs->first()->id;
												$config_option = App\configuration_options::where('configuration_id','=',$config_id)->where('option_id','=',$info['item']->id)->get();
												if($config_option->count()==1){
													$needsToBeChecked = true;
												}else{
													$needsToBeChecked = false;
												}
											}
											
											
										?>
										<label for="check{{{$config_id}}}" class="checklabel">
											<input type="checkbox" class="optionconfigcheck" id="check{{{$config_id}}}" config="{{{$config_id}}}" option="{{{ $info['item']->id }}}" @if($needsToBeChecked) checked @endif>
										</label>
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


