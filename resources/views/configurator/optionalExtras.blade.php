<div style="margin-left: -15px;margin-right: 15px; padding-bottom:100px">
    <input type="hidden" id="baseprice" value="{{{$target->baseprice}}}">

    <?php 
    $n=0; 
    use Illuminate\Support\Facades\Storage;
    ?>
    <h1>Extras</h1>


    @foreach(\App\option_category::all()->sortBy('position')->pluck('id')->toArray() as $category)
        
        @if($target->options->where('option_category_id','=',$category)->count()>0)
            <h4>{{{\App\option_category::find($category)->name}}}</h4>
        @endif
        
        @foreach($target->options->where('option_category_id','=',$category) as $option)

        


            

                <div class="checkboxRow">

                    <table class="featureRowHeaderTable">
                        <tr>
                            <td class="configurator-title">
                                <div class="conf-title rowitem"> {{{ $option->title }}} </div>

                                <div class="conf-price rowitemright">@if(!$option->is_standard) &pound;{{{ substr($option->price_ex_vat,0,-3) }}} @endif</div>
                            </td>                        
                            <td class="config-slider-container">
                                 @if(!$option->is_standard) 
                                <div class="slideCheckbox rowitem">                                                        
                                    <input type="checkbox"  title="{{{ $option->title }}}" class="added-option" price="{{{ $option->price_ex_vat }}}" value="None" id="slide{{{$n}}}" name="{{{ /*$option->ref*/ $option->id }}}" />
                                    <label for="slide{{{$n}}}" style="padding:0px"></label>                                 
                                </div>
                               @else
                                    <div class="rowitem">Included in Price</div>
                                @endif
                                <div class="expand-option rowitemright" target="{{$n}}"><p>DETAILS</p></div>
                            </td>
                            
                        </tr>
                    </table>
                </div>

                <div class="slideaway col-sm-12" id="slideaway{{{$n}}}">
                    <div class="imagecontainer">
                        @if($option->img != null)
                            <img src="{{ url(Storage::url($option->img)) }}">
                        @endif
                    </div>
                    <div class="descriptioncontainer">
                        <p>{{{ $option->description }}}</p>
                    </div>
                </div>

                <?php $n++; ?>


            

        @endforeach
    @endforeach


<p>*Liveaboard price subject to boat qualifying as a VAT-free vessel. Liveaboard price include a £1500 administration charge levied by the boat manufacturer</p>
        

</div>