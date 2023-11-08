<?php

namespace Database\Seeders;

use App\Models\SaleItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SaleItem::create([
            'quantity' => '2',
            'price' => '240.00',
            'sale_id' => '9a84a4f2-9bb4-4b46-8621-6aae32e2940d',
            'product_id' => '9a84a11b-8dea-41f2-97a7-7ab7121184a3',
        ]);

        SaleItem::create([
            'quantity' => '1',
            'price' => '28.00',
            'sale_id' => '9a84a4f2-9bb4-4b46-8621-6aae32e2940d',
            'product_id' => '9a84a11b-9aad-4acb-a4b8-f2f2f01a5ab6',
        ]);
    }
}
