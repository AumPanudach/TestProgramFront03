<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal')->insert( array(
            ['name'=>'แมว'],
            ['name'=>'หมา'],
            ['name'=>'หนู'],
        ));
   }
}