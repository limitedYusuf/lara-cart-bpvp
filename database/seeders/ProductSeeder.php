<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Produk 1',
            'price' => 65000,
            'description' => 'Deskripsi Produk 1',
        ]);

        DB::table('products')->insert([
            'name' => 'Produk 2',
            'price' => 23000,
            'description' => 'Deskripsi Produk 2',
        ]);

        DB::table('products')->insert([
            'name' => 'Produk 3',
            'price' => 44000,
            'description' => 'Deskripsi Produk 3',
        ]);

        DB::table('products')->insert([
            'name' => 'Produk 4',
            'price' => 799000,
            'description' => 'Deskripsi Produk 4',
        ]);

        DB::table('products')->insert([
            'name' => 'Produk 5',
            'price' => 3400,
            'description' => 'Deskripsi Produk 5',
        ]);
    }
}
