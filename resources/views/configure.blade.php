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
    "description" => 'Solid wood glazed doors for easy access to your welldeck',
    "image" => url('/img/img7.jpg'),  
    "ref"   => 'swfdsap',  
);

$options[] = array(
    "title" => 'Victron Inverter',
    "price" => 500,
    "description" => 'More powerful inverter blah',
    "image" => 'https://www.victronenergy.com/upload/products/145_628_20170712115015.png',  
    "ref"   =>'dgowe'
  );
?>

@section('title')
    SAILAWAYS.NET
@endsection

@extends('layouts.masterTemplate')

@section('content')

        <div class="">


            <div class="content">
                <div class="container" id="configurator-container">
                    <div class="title m-b-md">
                        Configure
                    </div>
                    <div class="col-sm-12">
                        <div class="imagecontainer">
                            <img src="{{{  url('img/img1.jpg') }}}" alt="boat">
                        </div>
                        <div class="descriptioncontainer">
                            <div class="descriptioncontainer">
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
                            </div>
                            <div class="descriptioncontainer">
                                <ul id="optionslist">
                                    
                                </ul>
                            </div>
                        </div>
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
                                            <input type="checkbox"  title="{{{ $option['title'] }}}" class="added-option" price="{{{ $option['price'] }}}" value="None" id="slide{{{$n}}}" name="{{{ $option['ref'] }}}" />
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

                    <script>
                        $(document).ready(function() {


                            $('#base-price-display').html('&pound;'+parseFloat($('#baseprice').attr('value')));
                            $('#total-price-display').html('&pound;'+parseFloat($('#baseprice').attr('value')));

                            $('.added-option').change(function() {
                                extras = 0;
                                opts = [];
                                $('.added-option').each(function() {
                                    if($(this).is(':checked')){
                                        extras = extras + parseFloat($(this).attr('price'));
                                        opts.push($(this).attr('title'));
                                    }                                
                                });
                                total = extras + parseFloat($('#baseprice').attr('value'));
                                $('#total-price-display').html('&pound;'+total);
                                $('#extra-price-display').html('&pound;'+extras);
                                
                              
                                    parseOptions(opts);
                             
                            });


                            $('.expand-option').click(function() {
                                target = $(this).attr('target');
                                $('#slideaway'+target).slideToggle();
                            });

                            function parseOptions(options){
                                optionsString = '';
                                options.forEach(function(item,index) {
                                    optionsString = optionsString + '<li>'+item+'</li>';
                                });
                                $('#optionslist').html(optionsString);
                            }
                        });
                    </script>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>

@endsection