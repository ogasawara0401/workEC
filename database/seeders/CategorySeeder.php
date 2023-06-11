<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => '車用品',
                'sort_order' => 1,
            ],
            [
                'name' => 'バイク用品',
                'sort_order' => 2,
            ],
            [
                'name' => 'その他',
                'sort_order' => 3,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'カーナビ・カーエレクトロニクス',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => 'カーアクセサリー',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'カーパーツ',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],
            [
                'name' => 'カータイヤ・ホイール',
                'sort_order' => 4,
                'primary_category_id' => 1
            ],
            [
                'name' => 'ヘルメット',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'バイクパーツ',
                'sort_order' => 6,
                'primary_category_id' => 2
            ],
            [
                'name' => 'バイクアクセサリー',
                'sort_order' => 7,
                'primary_category_id' => 2
            ],
            [
                'name' => 'バイクタイヤ・ホイール',
                'sort_order' => 8,
                'primary_category_id' => 2
            ],
            [
                'name' => 'その他',
                'sort_order' => 9,
                'primary_category_id' => 3
            ],
        ]);
    }
}
