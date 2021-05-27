<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::pluck('id')->toArray();

        // discount: 5%, 10%, 20%, ...
        $sizes = [
            "S",
            "M",
            'L',
            "XL",
            "XXL",
          
        ];
        foreach ($products as $productId) {
            $size = [
                'size' => $sizes[array_rand($sizes)],
                'product_id' => $productId,
                
            ];
            Size::create($size);
    }
    }
}
