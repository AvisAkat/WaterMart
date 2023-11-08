<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::create([
            'total_amount' => '120.00',
            'user_id' => '9a84a10a-dd22-4ad2-8f30-880f6cdd412e',
            
        ]);
    }
}
