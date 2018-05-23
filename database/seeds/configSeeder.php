<?php

use Illuminate\Database\Seeder;

class configSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\config::create(['setting'=>'site_name','string'=>'Nottingham Boat Co LTD']);
        \App\config::create(['setting'=>'has_configurator','boolean'=>false]);
    }
}
