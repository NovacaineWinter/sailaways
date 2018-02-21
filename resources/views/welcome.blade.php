<?php
$options =[];

$options[] = array(
    "title" => 'Vetus Engine Upgrade',
    "price" => 1154,
    "description" => 'A more powerful engine upgrade to allow even easier docking of the boat',
    "image" => 'http://www.vetusdirect.com/image/cache/data/Vetus/m2_02%20jan14-399x399.jpg',  
    "ref"   => 'vetupg1',  
);

$options[] = array(
    "title" => 'Sapele doors',
    "price" => 800,
    "description" => 'A more powerful engine upgrade to allow even easier docking of the boat',
    "image" => 'http://www.google.com/images',  
    "ref"   => 'vetupg1',  
);
?>



<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            input[type=checkbox] {
                visibility: hidden;
            }

            #configurator-container{max-width:900px;}


            .configurator-title{
                font-weight: 300;
                color: #fafafa;
                line-height: 55px;
                font-size: 26px;
                width:70%;
            }
            .configurator-price{
                font-weight: 300;
                color: #fafafa;
                line-height: 55px;
                font-size: 18px;
            }

            /* SLIDE THREE */
            .slideCheckbox {
                width: 80px;
                height: 26px;
                background: #333;
                margin: 4px;

                -webkit-border-radius: 50px;
                -moz-border-radius: 50px;
                border-radius: 50px;
                position: relative;

                -webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
                -moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
                box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
            }

            .slideCheckbox:after {
                content: 'NO';
                font: 12px/26px Arial, sans-serif;
                color: #000;
                position: absolute;
                right: 10px;
                z-index: 0;
                font-weight: bold;
                text-shadow: 1px 1px 0px rgba(255,255,255,.15);
            }

            .slideCheckbox:before {
                content: 'YES';
                font: 12px/26px Arial, sans-serif;
                color: #00bf00;
                position: absolute;
                left: 10px;
                z-index: 0;
                font-weight: bold;
            }

            .slideCheckbox label {
                display: block;
                width: 34px;
                height: 20px;

                -webkit-border-radius: 50px;
                -moz-border-radius: 50px;
                border-radius: 50px;

                -webkit-transition: all .4s ease;
                -moz-transition: all .4s ease;
                -o-transition: all .4s ease;
                -ms-transition: all .4s ease;
                transition: all .4s ease;
                cursor: pointer;
                position: absolute;
                top: 3px;
                left: 3px;
                z-index: 1;

                -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
                -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
                box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
                background: #fcfff4;

                background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
                background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
                background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
                background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
                background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
            }

            .slideCheckbox input[type=checkbox]:checked + label {
                left: 43px;
            }

            .checkboxRow{
                background-color:#a8a8a8;
                margin:10px;
            }

            .featureRowHeaderTable{
                width:100%;
                text-align: left;
            }

            #pricing-table{
                margin:auto;
                color:#353535;
            }

            .slideaway{
                display:none;
                margin: 0px 10px;
                margin-top: -10px;
                border: 1px solid #a8a8a8;
            }
            .descriptioncontainer{
                width:49%;
                display:inline-block;
            }
            .imagecontainer{
                width:49%;
                display:inline-block;
            }
            .expand-option p{
                border:3px solid #fafafa;
                font-size:16px;
                font-weight:900;
                text-align: center;
                margin-top: 16px;
                padding: 5px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="container" id="configurator-container">
                    <div class="title m-b-md">
                        Sailaways
                    </div>

                    <input type="hidden" id="baseprice" value="54998">
                    <?php $n=0; ?>
                    @foreach($options as $option)
                    

                        <div class="checkboxRow col-sm-12 row">
                            <table class="featureRowHeaderTable">
                                <tr>
                                    <td class="configurator-title">{{{ $option['title'] }}}</td>
                                    <td class="configurator-price">&pound;{{{ $option['price'] }}}<td>
                                    <td>
                                        <div class="slideCheckbox">                      
                                            <input type="checkbox" class="added-option" price="{{{ $option['price'] }}}" value="None" id="slide{{{$n}}}" name="{{{ $option['ref'] }}}" />
                                            <label for="slide{{{$n}}}"></label>
                                        </div>
                                    </td>
                                    <td class="expand-option" target="{{$n}}"><p>DETAILS</p></td>
                                </tr>
                            </table>
                            <div class="col-sm-6">
                                <p class="pull-right"><span></span></p>
                                
                            </div>
                        </div>
                        <div class="slideaway col-sm-12" id="slideaway{{{$n}}}">
                            <div class="imagecontainer">
                                <img src="{{ $option['image'] }}">
                            </div>
                            <div class="descriptioncontainer">
                                <p>{{{ $option['description'] }}}</p>
                            </div>
                        </div>

                        <?php $n++; ?>
                    @endforeach



                    <table id="pricing-table">

                        <tr>
                            <td>Base</td>
                            <td><div id="base-price-display"></div></td>
                        </tr>

                        <tr>
                            <td>Extras</td>
                            <td><div id="extra-price-display">&pound;0</div></td>
                        </tr>

                        <tr>
                            <td>Total</td>
                            <td><div id="total-price-display"></div></td>
                        </tr>
                    </table>

                    <script>
                        $(document).ready(function() {


                            $('#base-price-display').html('&pound;'+parseFloat($('#baseprice').attr('value')));
                            $('#total-price-display').html('&pound;'+parseFloat($('#baseprice').attr('value')));

                            $('.added-option').change(function() {
                                extras = 0;
                                $('.added-option').each(function() {
                                    if($(this).is(':checked')){
                                        extras = extras + parseFloat($(this).attr('price'));
                                    }                                
                                });
                                total = extras + parseFloat($('#baseprice').attr('value'));
                                $('#total-price-display').html('&pound;'+total);
                                $('#extra-price-display').html('&pound;'+extras);
                                
                            });


                            $('.expand-option').click(function() {
                                target = $(this).attr('target');
                                $('#slideaway'+target).slideToggle();
                            });
                        });
                    </script>
                    <div class="links">
                        <a href="https://laravel.com/docs">Documentation</a>
                        <a href="https://laracasts.com">Laracasts</a>
                        <a href="https://laravel-news.com">News</a>
                        <a href="https://forge.laravel.com">Forge</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
