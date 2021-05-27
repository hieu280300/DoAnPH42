<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::pluck('id')->toArray();

        $colors = [
            'red',
            'blue',
            'black',
            'red',
            'white',
            'yellow',
            'green',
           
        ];


        foreach ($products as $productId) {
            $color = [
                'color' => $colors[array_rand($colors)],
                'product_id' => $productId,
                
            ];
            Color::create($color);
    }
    }
        
}