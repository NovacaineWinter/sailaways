@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-12 adminsection">
		<h4 class="text-center">Add New FAQ</h4>
		<form action="" method="get">

			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Question:</div>
				<div class="col-sm-8"><input class="dashboardTextbox" name="question" type="text"/></div>
			</div>
			<div class="row paddedrow">
				<div class="col-sm-4 text-right">Answer:</div>
				<div class="col-sm-8"><textarea class="dashboardTextbox" name="answer" rows="4"></textarea></div>
			</div>			

			<input type="submit" class="pull-right" value="Add Question">

		</form>
	</div>
	<div class="col-sm-12 adminsection">
 		@foreach($questions as $question)
 			@include('loops.faqLooped',['question',$question])
 		@endforeach
	</div>
</div>
@endsection