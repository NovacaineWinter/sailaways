<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\option_category;

class StandardFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('option_categories', function (Blueprint $table) {
            $table->integer('position')->default(10);
        });
        

        Schema::table('options', function (Blueprint $table) {
            $table->boolean('is_standard')->default(false);
        });        

        $documentation = new option_category;
        $documentation->name = 'Documentation';
        $documentation->save();

        $std = new option_category;
        $std->name = 'Standard Equipment';
        $std->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('option_categories', function (Blueprint $table) {
            $table->dropColumn('position');
        });
        

        Schema::table('options', function (Blueprint $table) {
            $table->dropColumn('is_standard');
        });

        $doc = option_category::where('name','=','Documentation')->first();
        $doc->delete();

        $std = option_category::where('name','=','Standard Equipment')->first();
        $std->delete();    
    }
}
