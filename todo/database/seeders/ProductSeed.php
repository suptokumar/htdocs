<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
        	Product::create([
        'product_id' => Str::random(10),
        'product_name' => Str::random(10),
        'product_brand' => Str::random(10),
        'product_size' => Str::random(10),
        'product_color' => Str::random(10),
        'product_price' => rand(10,100),
        'product_discount' => rand(10,100),
        'product_quantity' => rand(10,100),
        'product_description' => Str::random(10),
        'product_image' => Str::random(10),
        'product_galary' => Str::random(10),
        'product_category' => Str::random(10),
        'product_buy' => rand(2,50),
        	]);
        }
    }
}
