<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Admin::factory(10)->create();
        // $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(PriceSeeder::class);
        
        // $this->call(ColorSeeder::class);
        // $this->call(SizeSeeder::class);
        // $this->call(ImageSeeder::class);
        $this->call(PromotionSeeder::class);
    }
}
