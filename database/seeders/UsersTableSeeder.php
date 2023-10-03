<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name'=>'munna','email'=>'munna@gmail.com','password'=>'12345678'],
            ['name'=>'sohan','email'=>'sohan@gmail.com','password'=>'12345678'],
            ['name'=>'mizan','email'=>'mizan@gmail.com','password'=>'12345678'],
            ['name'=>'robi-awal','email'=>'robi_awal@gmail.com','password'=>'12345678'],
            ['name'=>'hasan','email'=>'hasan@gmail.com','password'=>'12345678'],
        ];
        User::insert($users);
    }
}
