<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::create([
            'user_id' => '9a84a10a-dd22-4ad2-8f30-880f6cdd412e',
            'product_id' => '9a84a11b-5695-4c67-b08f-8225509f83e4',
        ]);

        Cart::create([
            'user_id' => '9a84a10a-dd22-4ad2-8f30-880f6cdd412e',
            'product_id' => '9a84a11b-8dea-41f2-97a7-7ab7121184a3',
        ]);

        Cart::create([
            'user_id' => '9a84a10a-dd22-4ad2-8f30-880f6cdd412e',
            'product_id' => '9a84a11b-9aad-4acb-a4b8-f2f2f01a5ab6',
        ]);
    }
}
