<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockBoats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockBoats', function (Blueprint $a) {
            $a->increments('id');
            $a->string('title');
            $a->string('description');
            $a->string('shortsummary');
            $a->integer('hull_style_id'); 
            $a->integer('length_id');
            $a->integer('width_id');
            $a->decimal('price',10,2);
            $a->boolean('sold')->default(0);
            $a->timestamps();
        }); 

        Schema::create('stockBoatPhotos', function (Blueprint $b) {
            $b->increments('id');
            $b->integer('stock_boat_id');
            $b->string('src');
            $b->timestamps();
        }); 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockBoats');
        Schema::dropIfExists('stockBoatPhotos');
    }
}
