<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Oppo Mobile',
                'price' => '12900',
                'category' => 'mobile',
                'description' => '16.25 cm (6.4 inch) 2340 x 1080 G-OLED FullVision display
                12 MP standard + 13 MP super wide angle dual primary camera',
                'gallery' => 'https://images-na.ssl-images-amazon.com/images/I/71QJyXZYPuL._SL1500_.jpg'
            ],
            [
                'name' => 'Samsung TV',
                'price' => '15490',
                'category' => 'TV',
                'description' => 'Samsung 80 cm (32 inches) Wondertainment Series HD Ready LED Smart TV UA32TE40AAKXXL (Titan Gray) (2020 model)',
                'gallery' => 'https://images-na.ssl-images-amazon.com/images/I/71hk35dbxoL._SL1500_.jpg'
            ],
            [
                'name' => 'OnePlus TV',
                'price' => '13990',
                'category' => 'TV',
                'description' => 'OnePlus Y Series 80 cm (32 inches) HD Ready LED Smart Android TV 32Y1 (Black) (2020 Model)',
                'gallery' => 'https://images-na.ssl-images-amazon.com/images/I/817gj7pfUzL._SL1500_.jpg'
            ],
            [
                'name' => 'Whirlpool Refrigerator',
                'price' => '18990',
                'category' => 'Refrigerator',
                'description' => 'Whirlpool 245 L 2 Star Frost-Free Double Door Refrigerator (NEOFRESH 258LH CLS PLUS 2S, German Steel)',
                'gallery' => 'https://images-na.ssl-images-amazon.com/images/I/71esczZ2%2BxL._SL1500_.jpg'
            ]
        ]);
    }
}
