<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'firstName' => 'Hridayika',
            'lastName' => 'Gurung',
            'phoneNumber' => '9869385119',
            'email' => 'hridayikagurung123@gmail.com',
            'password' => bcrypt('Hellohi1@')

        ]);
    }
}
