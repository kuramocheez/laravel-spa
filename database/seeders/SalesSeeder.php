<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'customer_name' => 'Khairul Insan Karim',
                'product_name' => 'Laptop',
                'qty' => 1,
                'total_ammount' => 10000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_name' => 'Asep',
                'product_name' => 'Android TV',
                'qty' => 5,
                'total_ammount' => 8000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_name' => 'Ika',
                'product_name' => 'Iphone 12 Pro Max',
                'qty' => 1,
                'total_ammount' => 12500000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_name' => 'Marlo',
                'product_name' => 'Canon 500D',
                'qty' => 1,
                'total_ammount' => 15000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_name' => 'Rudi',
                'product_name' => 'Mouse Gaming',
                'qty' => 1,
                'total_ammount' => 200000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
