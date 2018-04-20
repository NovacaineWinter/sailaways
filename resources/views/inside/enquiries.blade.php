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
				</tr>
			</thead>
			<tbody>
				@foreach($info['enquiries'] as $enquiry)
					<tr>
						<td>{{{ $enquiry->name }}}</td>
						<td>{{{ $enquiry->email }}}</td>
						<td>@if($enquiry->can_contact) Yes @else No @endif</td>
						<td>{{{ substr($enquiry->created_at,0,16) }}}</td>
						<td><a href="{{{ url('/configure?code=').$enquiry->code }}}">Link</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>	
	</div>
@endsection