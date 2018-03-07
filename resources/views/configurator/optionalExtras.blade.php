<div style="margin-left: -15px;margin-right: 15px;">
    <input type="hidden" id="baseprice" value="{{{$target->baseprice}}}">

    <?php $n=0; ?>
    <h1>Extras</h1>
    @foreach($target->options as $option)


        <div class="checkboxRow">

            <table class="featureRowHeaderTable">
                <tr>
                    <td class="configurator-title">{{{ $option->title }}}</td>
                    <td class="configurator-price">&pound;{{{ $option->price_ex_vat }}}<td>
                    <td>
                        <div class="slideCheckbox">                      
                            <input type="checkbox"  title="{{{ $option->title }}}" class="added-option" price="{{{ $option->price_ex_vat }}}" value="None" id="slide{{{$n}}}" name="{{{ /*$option->ref*/ $option->id }}}" />
                            <label for="slide{{{$n}}}" style="padding:0px"></label>
                        </div>
                    </td>
                    <td class="expand-option" target="{{$n}}"><p>DETAILS</p></td>
                </tr>
            </table>
        </div>

        <div class="slideaway col-sm-12" id="slideaway{{{$n}}}">
            <div class="imagecontainer">
                <img src="{{ $option->img }}">
            </div>
            <div class="descriptioncontainer">
                <p>{{{ $option->description }}}</p>
            </div>
        </div>

        <?php $n++; ?>
    @endforeach
</div>