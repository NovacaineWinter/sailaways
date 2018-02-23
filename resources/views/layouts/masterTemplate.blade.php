<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{{ url('css/style.css') }}}" rel="stylesheet" type="text/css">

        
    </head>

    <body>


            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{{ url('/') }}}">Home</a>
                        <a href="{{{ url('/stock') }}}">Boats in Stock</a>
                        <a href="{{{ url('configure') }}}">Configure My Sailaway</a>
                        <a href="{{{ url('contact') }}}">Contact Us</a>
                        <!--<a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a> -->
                    @endauth
                </div>
            @endif
        <div id="navbar">
            <img src="{{{ url('img/logo.png') }}}" id="logoimg" alt="logo"/>
        </div>


        @yield('content')


        <div id="footer">
            <div class="links">
                <a href="{{{ url('/') }}}">Home</a>
                <a href="{{{ url('privacy') }}}">Privacy Policy</a>
                <a href="{{{ url('/') }}}">&copy; Nottingham Boat Co LTD {{{ date('Y') }}}</a>
            </div>
             <img src="{{{ url('img/contact.png') }}}" style="position:absolute" id="footimg" alt="logo"/>
        </div>






        <script>

                



                function setFooterPosition(){
                    footmargin = $('#footimg').height() - $('#footer').height();
                    $('#footer').css('top',$(document).height()-$('#footer').height()-20 -footmargin);

                    $('#footer').css('margin-top',footmargin);
                    $('#footimg').css('right',0);
                    $('#footimg').css('bottom',0);                  

                }  

                $(document).ready(function() {

                    setFooterPosition();
                    $('#footimg').click(function() {
                        window.location.href = '{{{ url('/contact') }}}';
                    });

                });


                $(window).resize(function() {
                   
                    setFooterPosition();
                });

            </script>
    </body>
</html>
