<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = User::count();
        if ($total > 0) {
            dd('Data already loaded');
        } else {
            User::create([
                "name" => "demo",
                "email" => "e@mail.com",
                "password" => "12345678",
            ]);

            User::create([
                "name" => "Kostis Salamanis",
                "email" => "user@test.com",
                "password" => "12345678",
            ]);

            User::create([
                "name" => "Alexandros Zerzelidis",
                "email" => "alex@mail.com",
                "password" => "12345678",
            ]);
        }
    }
}
