<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\fitout_level;
use App\hull_style;
use App\configuration;
use App\length;
use App\width;
use App\option_category;

class InitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitout_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');            
            $table->timestamps();
        });

        Schema::create('hull_styles', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('name');
            $tbl->string('description');  
            $tbl->string('img');          
            $tbl->timestamps();
        });   

        Schema::create('configurations', function (Blueprint $a) {
            $a->increments('id');
            $a->string('description');
            $a->integer('fitout_level_id');
            $a->integer('hull_style_id'); 
            $a->integer('length_id');
            $a->integer('width_id');
            $a->decimal('baseprice',10,2);
            $a->boolean('active')->default(1);
            $a->timestamps();
        });   

        Schema::create('options', function (Blueprint $b) {
            $b->increments('id');
            $b->string('name');
            $b->string('title'); 
            $b->string('description');
            $b->decimal('price_ex_vat');
            $b->string('img')->nullable();    
            $b->boolean('highlighted');
            $b->integer('catalogue_id')->nullable();  
            $b->integer('option_category_id')->nullable();    
            $b->timestamps();
        });

        Schema::create('configurations_options', function (Blueprint $c) {
            $c->increments('id');
            $c->integer('option_id');
            $c->integer('configuration_id');
            $c->timestamps();
        });  

        Schema::create('lengths', function (Blueprint $d) {
            $d->increments('id');
            $d->integer('ft');      
            $d->timestamps();
        });

        Schema::create('widths', function (Blueprint $e) {
            $e->increments('id');
            $e->integer('ft');      
            $e->timestamps();
        });

        Schema::create('option_categories', function (Blueprint $f) {
            $f->increments('id');
            $f->string('name');      
            $f->timestamps();
        });        


        //seed with the default data

        $fitoutLevels = [
            ['name'=>'Hull Only','description'=>'Bare metal hull - All steelwork in place but no Battens'],
            ['name'=>'Sailaway','description'=>'Engine fitted. Interior sprayfoamed and Battened. Ballasted and ply floor fitted'],
            ['name'=>'Sailaway Plus','description'=>'As per standard Sailaway plus interior fully lined out']
        ];

        $hullStyles = [
            ['name'=>'Narrowboat','description'=>'Narrowboats','img'=>'img/nb.jpg'],
            ['name'=>'Widebeam','description'=>'Widebeams from 9-12ft wide','img'=>'img/img1.jpg'],
        ];

        $optionCategories = ['Paintwork','External','Engine & Systems','Glazing','Electrical','Internal'];

        foreach($optionCategories as $opt){
            $optionCategoryToCreate = new option_category;
            $optionCategoryToCreate->name = $opt;
            $optionCategoryToCreate->save();
        }

        $wideWidths =[9,10,11,12];
        $narrowWidths= [6];
        $lengths = [50,57,60,65,70];

        foreach($lengths as $length){
            $lengthToMake = new length;
            $lengthToMake->ft = $length;
            $lengthToMake->save();
            unset($lengthToMake);
        }

        foreach($wideWidths as $width){
            $widthToMake = new width;
            $widthToMake->ft = $width;
            $widthToMake->save();
            unset($widthToMake);
        }
        
        foreach($narrowWidths as $width){
            $widthToMake = new width;
            $widthToMake->ft = $width;
            $widthToMake->save();
            unset($widthToMake);
        }
        foreach($fitoutLevels as $fit){
            $toMake = new fitout_level;
            $toMake->name = $fit['name'];
            $toMake->description = $fit['description']; 
            $toMake ->save();
            unset($toMake); 
        }

        $fitouts = fitout_level::all();
        $lens = length::all();
        $widewid = width::where('ft','>',8)->get();
        $narrowWid = width::where('ft','=',6)->get();

        foreach($hullStyles as $hull){
            $toMake = new hull_style;
            $toMake->name = $hull['name'];
            $toMake->description = $hull['description']; 
            $toMake->img = $hull['img']; 
            $toMake ->save();
            unset($toMake); 
        }

        foreach($widewid as $width){
            foreach($lens as $length){
                foreach($fitouts as $fit){
                    $configToMake = new configuration;

                    $configToMake->fitout_level_id =$fit->id;
                    $configToMake->hull_style_id =2;
                    $configToMake->length_id=$length->id;
                    $configToMake->width_id=$width->id;
                    $configToMake->active  =1;
                    $configToMake->description= $length->ft.'ft x '.$width->ft.'ft Widebeam '.$fit->name;
                    $configToMake->baseprice =0;

                    $configToMake->save();
                    unset($configToMake);
                }
            }
        }

        foreach($narrowWid as $width){
            foreach($lens as $length){
                foreach($fitouts as $fit){
                    $configToMake = new configuration;

                    $configToMake->fitout_level_id =$fit->id;
                    $configToMake->hull_style_id =1;
                    $configToMake->length_id=$length->id;
                    $configToMake->width_id=$width->id;
                    $configToMake->active  =1;
                    $configToMake->description= $length->ft.'ft x '.$width->ft.'ft Narrowboat '.$fit->name;
                    $configToMake->baseprice =0;

                    $configToMake->save();
                    unset($configToMake);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fitout_levels');
        Schema::dropIfExists('hull_styles');
        Schema::dropIfExists('configurations');
        Schema::dropIfExists('options');
        Schema::dropIfExists('configurations_options');        
        Schema::dropIfExists('lengths');
        Schema::dropIfExists('widths');
    }
}
