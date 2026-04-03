<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('1234'),
            'role'=>'admin',
            'city'=>'fes',
            'adress'=>'fes',
            'tel_number'=>'0645362758'
        ],
        [
            'name'=>'Customer',
            'email'=>'customer@gmail.com',
            'password'=>bcrypt('1234'),
            'role'=>'customer',
            'city'=>'rabat',
            'adress'=>'rabat',
            'tel_number'=>'0676859432'
        ],
        [
            'name'=>'Server',
            'email'=>'server@gmail.com',
            'password'=>bcrypt('1234'),
            'role'=>'server',
            'city'=>'casa',
            'adress'=>'casa',
            'tel_number'=>'0656986745'
        ],
        [
            'name'=>'Chef',
            'email'=>'chef@gmail.com',
            'password'=>bcrypt('1234'),
            'role'=>'chef',
            'city'=>'tanger',
            'adress'=>'tanger',
            'tel_number'=>'0634254657'
        ]
    ]);
    }
}
