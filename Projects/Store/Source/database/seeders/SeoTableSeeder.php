<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //meta_title    meta_author meta_keyword    meta_description


            DB::table('seos')->insert([

            //Site Seo Informations
            [
                'meta_website' => 'https://www.storio.com',
                'meta_title' => 'Storio',
                'meta_author' => 'IA',
                'meta_keyword' => 'E-Commerce Website',
                'meta_icon' => 'icon.jpg',
                'meta_description' => 'Best Store Ever',
                'meta_email' => 'i.a@programmer.net',
                'meta_phone' => '+971508439504',
                'meta_address' => 'Dubai, United Arab Emirates',
                'meta_address_2' => 'Business Bay',
                'open_time' => 'Mon to Fri 9am to 6 pm',
                'Stripe_Publishable_Key' => 'pk_test_000',
                'Stripe_Secret_Key' => 'sk_test_000',
            ]

        ]);
    }
}           