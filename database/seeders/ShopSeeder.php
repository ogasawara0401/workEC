<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => 'お店1',
                'information' => 'お店1の情報が入ります',
                'filename' => 'sample1.jpg',
                'is_selling' => true
            ],
            [
                'owner_id' => 1,
                'name' => 'お店2',
                'information' => 'お店2の情報が入ります',
                'filename' => 'sample2.jpg',
                'is_selling' => true
            ],
            [
                'owner_id' => 1,
                'name' => 'お店3',
                'information' => 'お店3の情報が入ります',
                'filename' => 'sample3.jpg',
                'is_selling' => false
            ],
            [
                'owner_id' => 1,
                'name' => 'お店4',
                'information' => 'お店4の情報が入ります',
                'filename' => 'sample4.jpg',
                'is_selling' => true
            ],
            [
                'owner_id' => 2,
                'name' => 'お店5',
                'information' => 'お店5の情報が入ります',
                'filename' => 'sample5.jpg',
                'is_selling' => true
            ],
            [
                'owner_id' => 2,
                'name' => 'お店6',
                'information' => 'お店6の情報が入ります',
                'filename' => 'sample6.jpg',
                'is_selling' => true
            ],
        ]);
    }
}
