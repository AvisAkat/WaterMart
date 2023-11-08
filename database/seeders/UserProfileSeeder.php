<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserProfile::create([
            'address' => 'Accra',
            'user_id' => '9a84a10a-0d61-4e1a-9650-6271f556d96b',
            'phone' => '0592112776',
        ]);

        UserProfile::create([
            'address' => 'Nungua',
            'user_id' => '9a84a10a-dd22-4ad2-8f30-880f6cdd412e',
            'phone' => '0270504253',
        ]);
    }
}
