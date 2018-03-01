
@extends('layouts.masterTemplate')

@section('title')
    SAILAWAYS.NET
@endsection


@section('content')
<div id="ajax-target">
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token() }}'
                }
            });


            $.ajax({
                url: "{{url('/configure/ajax')}}",
                method: 'GET',
                data: {
                    ajaxmethod: 'getHomepage',  
                },
                success: function(response) {
                    $('#ajax-target').html(response);                                  

                },
                error: function(response) {
                    console.log('There was an error - it was:');
                    console.dir(response);
                }
            });              
         
        });
    </script>
</div>
@endsection