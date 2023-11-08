<?php

namespace Database\Seeders;

use App\Models\Manufacture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manufacture::create([
            'maufacture_name' => 'Awake',
        ]);

        Manufacture::create([
            'maufacture_name' => 'Bel-Aqua',
        ]);

        Manufacture::create([
            'maufacture_name' => 'Special Ice',
        ]);
    }
}
