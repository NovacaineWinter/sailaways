<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartPriceToModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hull_styles', function (Blueprint $table) {
            $table->integer('startPrice')->default(0);
            $table->boolean('primary')->default(0);
            $table->string('shortsummary',1000)->default('');
            $table->string('nonce')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hull_styles', function (Blueprint $table) {
            $table->dropColumn('startPrice');
            $table->dropColumn('primary');
            $table->dropColumn('shortsummary');
            $table->dropColumn('nonce');
        });
    }
}
