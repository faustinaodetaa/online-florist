<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'phone' => '081234567890',
                'gender' => 'female',
                'address' => 'Jl. Admin No. 1',
                'password' => bcrypt('admin'),
                'image' => '',
                'role' => 'admin'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Faustina',
                'email' => 'faustin@mail.com',
                'phone' => '080987654321',
                'gender' => 'female',
                'address' => 'Jl. Mawar No. 1',
                'password' => bcrypt('fos22'),
                'image' => '',
                'role' => 'user'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Odeta',
                'email' => 'odeta@mail.com',
                'phone' => '0898362738',
                'gender' => 'male',
                'address' => 'Jl. Melati No. 3',
                'password' => bcrypt('odetaa_'),
                'image' => '',
                'role' => 'user'
            ]
        );
    }
}
