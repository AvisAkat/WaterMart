<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Voltic Bootle',
            'description' => '1.5l',
            'quantity_in_stock' => '10',
            'price' => '25.00',
            'image' => 'https://shorturl.at/bOWX1',
        ]);

        Product::create([
            'name' => 'Bel-Aqua Bootle',
            'description' => '500ml',
            'quantity_in_stock' => '15',
            'price' => '28.00',
            'image' => 'https://shorturl.at/klsD9',
        ]);

        Product::create([
            'name' => 'Special Ice Scchet',
            'description' => '500ml',
            'quantity_in_stock' => '30',
            'price' => '8.00',
            'image' => 'https://shorturl.at/pyLZ2',
        ]);
    }
}
