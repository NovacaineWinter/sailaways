<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CaptureUserConfigs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        Schema::create('UserConfigs', function (Blueprint $a) {
            $a->increments('id');
            $a->string('name');
            $a->string('email',500);
            $a->string('code');
            $a->integer('configuration_id');    //of the hull / fitout combo
            $a->boolean('can_contact');
            $a->timestamps();
        });     


        Schema::create('UserConfigOptions', function (Blueprint $b) {
            $b->increments('id');
            $b->integer('user_config_id');
            $b->integer('option_id');
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
        Schema::dropIfExists('UserConfigs');
        Schema::dropIfExists('UserConfigOptions');
    }
}
