<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'Vijay',
            'lname' => 'Amule',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'mobile'=>'1234567890',
            'is_admin'=>1
        ]);
    }
}
