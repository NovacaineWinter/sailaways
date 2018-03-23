
<div class="">
    <div id="boatsummary">
<img class="configuratorImg" src="{{{ $target->hull_style->img }}}" alt="boat"/>
<h2 class="text-center">{{{ $target->hull_style->name }}}</h2>

    

        <div class="tblrow clearfix">
            <div class="halfcell leftcell">Basic</div>

            <div class="halfcell rightcell" id="base-price-display"></div>
        </div>

        <div class="tblrow clearfix">
            <div class="halfcell leftcell"><h4>Liveaboard Price*</h4></div>
            <div class="halfcell rightcell"><h4 id="total-price-display"></h4></div>
            <div class="tblrow text-center"><h4>Ex VAT</h4></div>
        </div>

        <div class="tblrow clearfix">
            <div class="halfcell leftcell"><h4>Leisure Price</h4></div>
            <div class="halfcell rightcell"><h4 id="total-price-display-leisure"></h4></div>
            <div class="tblrow text-center"><h4>Inc VAT</h4></div>
        </div>
    </div>
    <a href="#sidebar">
        <div id="mobilePriceSummary">
            <div class="tblrow clearfix">
                <div class="halfcell leftcell"><h4>Price</h4></div>
                <div class="halfcell rightcell"><h4 id="total-price-display-mobile"></h4></div>
                <div class="tblrow"><p id="viewSummaryButton">View Summary</p></div>
            </div>
        </div>
    </a>

   <div id="extras">

    <div class="col-xs-6 configButtons">
        <div id="clearOptions" class="btn btn-info">Clear <br> Options</div>
    </div>

    <div class="col-xs-6 configButtons">
        <div id="SaveConfig" class="btn btn-info">Save <br> Configuration</div>
    </div>    
        
        
        <div class="tblrow clearfix">
            <div class="halfcell leftcell">Extras</div>
            <div class="halfcell rightcell" id="extra-price-display">&pound;0</div>
        </div>

        <ul id="optionslist">
            
        </ul>
    </div>
</div>