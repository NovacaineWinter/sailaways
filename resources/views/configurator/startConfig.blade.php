<div class="content">


    <div id="sidebar">
        
        @if($info['complete'])
    
            @include('configurator.baseprice', ['target' => $info['target']])                    

        @else
            <div class="container">
                <a href="#configurator-container"><h2 style="text-align: center; color:#636b6f; text-transform: uppercase;">Start your configuration</h2></a>
                <h4>How it works...</h4>
                <ol>
                    <li>Choose the type of Sailaway you want</li>
                    <li>Choose the level of fitout you want</li>
                    <div class="col-sm-12 liunpadded">
                        <ul>
                            <li>Hull only is a bare metal hull</li>
                            <li>Sailaway is delivered in primer with an engine and gearbox</li>
                            <li>Sailaway plus is fully lined out with veneered ply</li>
                        </ul>
                    </div>
                    <li>Choose your Dimensions</li>
                    <li>Choose your optional extras</li>
                    <div class="col-sm-12">
                        Add optional extras to your specification by clicking the slider to turn an option on
                    </div>
                </ol>
            </div>
        @endif
       
    </div>                    


    <div id="configurator-container">
        <div class="title m-b-md">
            Configure
        </div>
        <div class="col-sm-12" style="max-width:900px;margin:auto;">
            <div id="configurationselector">
                <div class="col-sm-12 configopt row" id="hull-selection">
                    <div class="col-sm-2">
                        <h3 class="vertcenteredtext">Boat Type</h3>
                    </div>
                    <div class="col-sm-10 row">
                        @foreach($info['hulls'] as $hull)
                            <input class="ajaxradios" type="radio" id="hull{{{ $hull->id }}}" name="hull" value="{{{ $hull->id }}}" @if($info['hull'] && $info['hull_selected']==$hull->id) checked @endif >
                            <label class="col-sm-6" for="hull{{{ $hull->id }}}">{{{ $hull->name }}}</label>
                        @endforeach              
                    </div>
                </div> 

                @if($info['hull']) 

                    <div class="col-sm-12 configopt row" id="fitout-selection"> 
                        <div class="col-sm-2">
                            <h3 class="vertcenteredtext">Fitout Level</h3>
                        </div>
                        <div class="col-sm-10 row">
                            @foreach($info['fitouts'] as $fit)
                                <input class="ajaxradios" type="radio" id="fit{{{ $fit->id }}}" name="fitout" value="{{{ $fit->id }}}" @if($info['fitout'] && $info['fitout_selected']==$fit->id) checked @endif >
                                <label class="col-sm-4" for="fit{{{ $fit->id }}}">{{{ $fit->name }}}</label>
                            @endforeach           
                        </div>   
                    </div> 

                    @if($info['fitout'])

                        @if($info['widths']->count()>1)
                        <div class="col-sm-12 configopt row" id="width-selection"> 
                            <div class="col-sm-2">
                                <h3 class="vertcenteredtext">Beam</h3>
                            </div>
                            <div class="col-sm-10 row">
                                @foreach($info['widths'] as $width)                                
                                    <input class="ajaxradios widthradio" type="radio" id="width{{{ $width->id }}}" name="width" value="{{{ $width->id }}}" 

                                    @if($info['width_selected']==$width->id) 
                                        checked
                                    @endif >
                                    <label class="col-sm-3" for="width{{{ $width->id }}}">{{{ $width->ft }}}'</label>
                                @endforeach
                            </div>
                        </div>      
                        @else
                            <input type="hidden" value="{{{ $info['widths']->first()->id }}}" name="width" checked="true">
                        @endif

                        <div class="col-sm-12 configopt row" id="length-selection"> 
                            <div class="col-sm-2">
                                <h3 class="vertcenteredtext">Length</h3>
                            </div>
                            <div class="col-sm-10 row">
                                <div class="col-sm-1">&nbsp;</div>
                                @foreach($info['lengths'] as $length)
                                    <input class="ajaxradios" type="radio" id="length{{{ $length->id }}}" name="length" value="{{{ $length->id }}}" 
                                    @if( $info['length_selected']==$length->id) 
                                        checked 
                                    @endif >
                                    <label class="col-sm-2" for="length{{{ $length->id }}}">{{{ $length->ft }}}'</label>
                                @endforeach
                            </div>
                        </div>

                  
                    @endif <!--fitout  -->


                @endif <!-- /Hull -->

                @if($info['complete'])
                
                    @include('configurator.optionalExtras', ['target' => $info['target']])                    

                @endif


               
            </div>
        </div>
    </div>

</div>


