<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// DB
// Hash : pass-> incode Protected 111 -> $asdjkdsha122
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        DB::table('users')->insert([

            //Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'), //Encode Password, base46. Example = "$421asdasd"
                'role' => 'admin',
                'status' => 'active',
                'token' => base64_encode(random_bytes(32)), //random 32 word, encrypted by base46
            ],


            //Vendor
            [
                'name' => 'Vendor',
                'username' => 'vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('111'), //Encode Password, base46. Example = "$421asdasd"
                'role' => 'vendor',
                'status' => 'active',
                'token' => base64_encode(random_bytes(32)), //random 32 word, encrypted by base46
            ],

            //Delivery
            [
                'name' => 'Delivery',
                'username' => 'delivery',
                'email' => 'delivery@gmail.com',
                'password' => Hash::make('111'), //Encode Password, base46. Example = "$421asdasd"
                'role' => 'delivery',
                'status' => 'active',
                'token' => base64_encode(random_bytes(32)), //random 32 word, encrypted by base46
            ],


            //User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'), //Encode Password, base46. Example = "$421asdasd"
                'role' => 'user',
                'status' => 'active',
                'token' => base64_encode(random_bytes(32)), //random 32 word, encrypted by base46
            ],


        ]);

    }
}

