<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::pluck('id')->toArray();

        $prices = [
            100000,
            200000,
            300000,
            400000,
            500000,
            600000,
            800000,
            900000,
            1000000,
            1100000,
            1200000,
            1300000,
            1500000,
            1600000,
            1700000,
            1800000,
            1900000,
            2000000,
            3000000,
            4000000,
            5000000,
            6000000,
            7000000,
            8000000,
            9000000,
        ];

        $beginDates = [
            '2021-03-25 00:00:00',
            '2021-03-26 00:00:00',
            '2021-03-27 00:00:00',
            '2021-03-28 00:00:00',
            '2021-03-29 00:00:00',
            '2021-03-30 00:00:00',
        ];

        $endDates = [
            '2022-05-02 23:59:59',
            '2022-05-03 23:59:59',
            '2022-05-04 23:59:59',
            '2022-05-05 23:59:59',
            '2022-05-06 23:59:59',
            '2022-05-07 23:59:59',
            '2022-05-08 23:59:59',
        ];

        foreach ($products as $productId) {
            $price = [
                'price' => $prices[array_rand($prices)],
                'product_id' => $productId,
                'begin_date' => $beginDates[array_rand($beginDates)],
                'end_date' => $endDates[array_rand($endDates)],
            ];
            Price::create($price);
    }
    }
}
