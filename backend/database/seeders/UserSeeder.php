<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => "Administrator",
            'api_token' => Str::random(32),
            'is_admin' => 1,
            'password' => app('hash')->make('12345678'),
        ]);

        User::create([
            'username' => "User 1",
            'api_token' => Str::random(32),
            'is_admin' => 0,
            'password' => app('hash')->make('12345678'),
        ]);

        User::create([
            'username' => "User 2",
            'api_token' => Str::random(32),
            'is_admin' => 0,
            'password' => app('hash')->make('12345678'),
        ]);
    }
}
