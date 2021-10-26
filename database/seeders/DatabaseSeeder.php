<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'email' => 'abdelkader@talabatonline.com',
             'name' => 'Abdelkader Mheiham',
             'password' => bcrypt('demo1234')
         ]);

         \App\Models\User::factory()->create([
             'email' => 'mohamed@talabatonline.com',
             'name' => 'Mohamed Taleb',
             'password' => bcrypt('demo1234')
         ]);

        
         \App\Models\User::factory()->create([
            'email' => 'mouradi@talabatonline.com',
            'name' => 'mouradi',
            ‘password’ => Hash::make(‘123456’)
        ]);
    }
}
