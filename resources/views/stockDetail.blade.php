
@section('title')
    Sailaways.net | Stock
@endsection

<?php 

$boats = [];

$boats[] = array(
	'id'	=>1,
	'title'=>"60' x 12' Square Stern Cruiser",
	'img'=>url('/img/stock/1/img1.jpg'),
	'desc'=>'Finished in Oxford Blue, this striking widebeam could be your perfect project',
);

$boats[] = array(
	'id'	=>2,
	'title'=>"60' x 9' Square Stern Cruiser",
	'img'=>url('/img/stock/1/img4.jpg'),
	'desc'=>'A wonderful boat, currenlty in primer ready for your choice of paintwork, could this be your future home?',
);
?>

@extends('layouts.masterTemplate')

@section('content')

            <div class="content">
                <div class="container">
                  	<div class="title m-b-md">
                        Boat {{{$id}}}
                   	</div>

                </div>
            </div>


@endsection