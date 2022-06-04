<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([

            'name' => 'AhmedMofrih',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
            'image' => 'image/User/avatar5.png',


        ]);
    }
}
