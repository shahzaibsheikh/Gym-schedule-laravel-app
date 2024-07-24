<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
         'name'=>'Shruti',
         'email'=>'shruti@example.com'
        ]);

        User::factory()->create([
            'name'=>'Taylor',
            'email'=>'taylor@example.com'
           ]);

           User::factory()->create([
            'name'=>'John',
            'email'=>'john@instructor.com',
            'role'=>'instructor'
           ]);   

           User::factory()->create([
            'name'=>'Admin',
            'email'=>'admin@naseebnetworks.com',
            'role'=>'admin'
           ]);   

        User::factory()->count(10)->create();

        User::factory()->count(10)->create([
            'role'=>'instructor'
        ]);
    }
}
