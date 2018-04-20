@extends('layouts.app')

@section('content')


	<div class="container">
		<table class="dashboardtable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Can Contact</th>
					<th>Date</th>
					<th>Summary</th>
					<th>Made Contact</th>
				</tr>
			</thead>
			<tbody>
				@foreach($info['enquiries'] as $enquiry)
					<tr @if($enquiry->can_contact) 
							@if($enquiry->started_discussion) 
								class="green" 
							@else 
								class="orange" 
							@endif
						@endif
					>
						<td>{{{ $enquiry->name }}}</td>
						<td>{{{ $enquiry->email }}}</td>
						<td>@if($enquiry->can_contact) Yes @else No @endif</td>
						<td>{{{ substr($enquiry->created_at,0,16) }}}</td>
						<td><a href="{{{ url('/configure?code=').$enquiry->code }}}">Link</a></td>
						<td style="text-align:center;">
							@if($enquiry->can_contact)
								<input 
									type="checkbox" 
									class="discussionStartedCheckbox" 
									target="{{{ $enquiry->id }}}"
									@if($enquiry->started_discussion)
										checked
									@endif
									>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>	
	</div>
@endsection