<?php

namespace Database\Seeders;

use App\Models\VersionOne\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            ['name' => 'Mpunga'],
            ['name' => 'Mahindi'],
            ['name' => 'Mtama'],
            ['name' => 'Alizeti'],
        ]);
    }
}
