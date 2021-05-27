<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
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
        $urls = [
            "https://product.hstatic.net/1000281824/product/896c8427-e613-4f0a-b05e-c1efc8888cf5_ffdf931f34504beab6c672b706d85fa0_grande.jpeg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            'https://product.hstatic.net/1000281824/product/3db8bf3c-f95d-44b3-b350-2d90315524f4_baf98af3c7e74bf895f26745ca3758cd_grande.jpeg',
            "https://product.hstatic.net/1000281824/product/3db8bf3c-f95d-44b3-b350-2d90315524f4_baf98af3c7e74bf895f26745ca3758cd_grande.jpeg",
            "https://product.hstatic.net/1000281824/product/3db8bf3c-f95d-44b3-b350-2d90315524f4_baf98af3c7e74bf895f26745ca3758cd_grande.jpeg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
          
        ];
        foreach ($products as $productId) {
            $url = [
                'url' => $urls[array_rand($urls)],
                'product_id' => $productId,
                
            ];
            Image::create($url);
    }
    }
}
