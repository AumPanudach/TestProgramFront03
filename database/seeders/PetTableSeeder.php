<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pet')->insert( array(
            [
            'name_pet' => 'เสือหมอบ JAVA', 
            'animal_id' => 1,
            'price' => 11900,
            'stock_qty' => 2,
            'image_url' => '/upload/images/01.jpg'
            ],
            [
            'name_pet' => 'เสือหมอบ JAVA', 
            'animal_id' => 2,
            'price' => 11800,
            'stock_qty' => 1,
            'image_url' => '/upload/images/05.jpg'
            ]
            )
            );
    }
}
