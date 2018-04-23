<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveLengthWidthAndFitoutFieldsFromStockBoats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $stock=\App\stock_boats::all();

        foreach($stock as $b){
            $config = \App\configuration::where('hull_style_id','=',$b->hull_style_id)
                            ->where('fitout_level_id','=',2)
                            ->where('length_id','=',$b->length_id)
                            ->where('width_id','=',$b->width_id)
                            ->get();
            if($config->count() > 0){
                $b->configuration_id = $config->first()->id;
                $b->save();
            }
        }

        Schema::table('stockBoats', function (Blueprint $table) {
            $table->dropColumn('length_id');
            $table->dropColumn('width_id');
            $table->dropColumn('hull_style_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stockBoats', function (Blueprint $table) {
            $table->integer('length_id')->default(0);
            $table->integer('width_id')->default(0);
            $table->integer('hull_style_id')->default(0);
        });       
    }
}
