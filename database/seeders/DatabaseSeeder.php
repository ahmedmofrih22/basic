<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create([
        //     'name' => 'AhmedMofrih',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('123456789'),
        //  ]);
        $this->call(UsersTableSeeder::class);
    }
}
