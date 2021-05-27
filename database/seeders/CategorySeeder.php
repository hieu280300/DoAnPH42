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
        $date = date('Y-m-d H:i:s');
        $data = [
            ['name' => 'Tshirt', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Jacket', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Sweater', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Pants', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Short', 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('categories')->insert($data);
    }
}
