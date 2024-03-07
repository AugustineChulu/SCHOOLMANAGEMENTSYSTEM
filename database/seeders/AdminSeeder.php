<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * The current password being used by the seeder.
     */
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('admin'),

        ])->assignRole('admin');
    }
}
