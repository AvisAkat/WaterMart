<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'brand_name' => 'Awake',
        ]);

        Brand::create([
            'brand_name' => 'Bel-Aqua',
        ]);

        Brand::create([
            'brand_name' => 'Special Ice',
        ]);

        Brand::create([
            'brand_name' => 'Voltic',
        ]);
    }
}
