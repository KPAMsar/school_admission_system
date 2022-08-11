<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'test',
            'email'=>'superadmin@test.com',
            'Role'=>'SuperAdmin',
            'password'=>'$2y$10$41L7BxB./V/bemt1siWwx.kjZC/AQNoVh6jTf6OkQT0iSjTkoT7pm'
        ]);
    }
}
