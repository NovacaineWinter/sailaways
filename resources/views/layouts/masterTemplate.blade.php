<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="siteurl" content="{{{url('/')}}}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,500,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{{ url('css/style.css') }}}" rel="stylesheet" type="text/css">


        <script src="{{{ url('js/ajax.js') }}}"></script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token() }}'
                }
            });
        </script>
        
    </head>

    <body>
    
        <img src="{{{ url('img/logo.png') }}}" id="logoimg" class="brandingimg" alt="logo"/>
    
        <div id="navbar">
            <div class="top-right links">
                <a href="{{{ url('/') }}}">Home</a>
                <a href="{{{ url('stock') }}}">Boats in Stock</a>
                <a href="{{{ url('configure') }}}">Configure My Sailaway</a>
                <a href="{{{ url('contact') }}}">Contact Us</a>
                <!--<a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a> -->
            </div>
        </div>
        <div style="width:100%;height:69px;">&nbsp;</div>


        @yield('content')


        <div id="footer">
            <div class="links">
                <a href="{{{ url('/') }}}">Home</a>
                <a href="{{{ url('privacy') }}}">Privacy Policy</a>
                <a href="{{{ url('/') }}}">&copy; Nottingham Boat Co LTD {{{ date('Y') }}}</a>
            </div>
             <img src="{{{ url('img/contact.png') }}}" style="position:absolute" id="footimg"  class="brandingimg" alt="logo"/>
        </div>

    </body>
</html>
