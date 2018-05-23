<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

        @if($cookiesOk)
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116600911-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-116600911-1');
            </script>

            <!-- Facebook Pixel Code -->
            <script>
              !function(f,b,e,v,n,t,s)
              {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
              n.callMethod.apply(n,arguments):n.queue.push(arguments)};
              if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
              n.queue=[];t=b.createElement(e);t.async=!0;
              t.src=v;s=b.getElementsByTagName(e)[0];
              s.parentNode.insertBefore(t,s)}(window, document,'script',
              'https://connect.facebook.net/en_US/fbevents.js');
              fbq('init', '102414300625411');
              fbq('track', 'PageView');
            </script>
            <noscript><img height="1" width="1" style="display:none"
              src="https://www.facebook.com/tr?id=102414300625411&ev=PageView&noscript=1"
            /></noscript>
            <!-- End Facebook Pixel Code -->
        @endif


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="siteurl" content="{{{url('/')}}}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        



        <title>@yield('title')</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,500,600" rel="stylesheet" type="text/css">-->
        <link href="{{{url('/css/fonts.css')}}}" rel="stylesheet" type="text/css">



        <!-- jQuery -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <script src="{{{url('/js/jquery.min.js')}}}"></script>



        <!-- Bootstrap -->
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
        <link href="{{{url('/css/bootstrap.css')}}}" rel="stylesheet" type="text/css">
        
        <!-- Application styles -->
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
            <div class="top-right links pcdevice" id="fullwidth">
                <a href="http://sailaways.net">Sailaways</a>
                <a>&nbsp;</a>
                <a href="{{{ url('/') }}}">Home</a>
                <a href="{{{ url('stock') }}}" class="navborder">Boats in Stock</a>                
                <a href="{{{ url('model') }}}" class="navborder">Explore Range</a>
                @if(env('HAS_CONFIGURATOR')) <a href="{{{ url('configure') }}}" class="navborder">Build My Boat</a> @endif
                <a href="{{{ url('contact') }}}">Contact Us</a>
                <!--<a href="" id="cookieExpandArrow">&#8681;</a>-->
            </div>



            <div class="top-right links mobiledevice" id="expand-nav-button">
                <a href="">Menu</a>             
            </div>



            <div class="top-right links mobiledevice" id="narrowNav">
                <ul>
                    <li><a href="{{{ url('/') }}}">Home</a></li>
                    <li><a href="{{{ url('stock') }}}">Boats in Stock</a></li>
                    <li><a href="{{{ url('configure') }}}">Configure My Sailaway</a></li>
                    <li><a href="{{{ url('contact') }}}">Contact Us</a></li>
                </ul>
            </div>

        </div> 
        @yield('cookiebar')   

        <div id="content-holder">

            @yield('content')
        </div>

        @if(!isset($suppressFooter))
            <div id="footer">
                <div class="links">
                    <a href="{{{ url('/') }}}">Home</a>
                    <a href="{{{ url('/dataprotection') }}}">Data Protection</a>
                    <a href="{{{ url('/cookiePolicy') }}}">Cookie Policy</a>
                    <a href="{{{ url('/') }}}">&copy; Nottingham Boat Co LTD {{{ date('Y') }}}</a>                
                </div>
                 <img src="{{{ url('img/contact.png') }}}" style="position:absolute" id="footimg"  class="brandingimg" alt="logo"/>
            </div>
        @endif
    </body>
</html>
