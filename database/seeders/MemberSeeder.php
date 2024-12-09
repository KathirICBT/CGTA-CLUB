<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create multiple dummy members
        Member::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'date_of_birth' => '1990-01-01',
            'join_date' => '2024-01-01',
            'photo' => null,
            'bio' => 'A passionate developer and community leader.',
            'status' => 'active',
            'membership_level' => 'Premium',
            'password' => bcrypt('password123'),
            'renewal_date' => '2024-12-31',
        ]);

        Member::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '9876543210',
            'date_of_birth' => '1985-05-15',
            'join_date' => '2023-06-15',
            'photo' => null,
            'bio' => 'A creative designer and artist.',
            'status' => 'waiting',
            'membership_level' => 'Basic',
            'password' => bcrypt('securepassword'),
            'renewal_date' => '2024-06-14',
        ]);

        
    }
}
