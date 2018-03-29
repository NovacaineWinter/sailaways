
<div class="questionContainer">
	<div class="questionHeader row">
		<div class="col-sm-10">Question: {{{$question->question}}}</div>
		<div class="col-sm-2 expandFaq" target="contentForQuestion{{{$question->id}}}">Answer</div>
	</div>
	<div class="questionContent" id="contentForQuestion{{{$question->id}}}">
		<div class="col-sm-12">
			Answer:{{{ $question->answer }}}
		</div>
	</div>
</div>