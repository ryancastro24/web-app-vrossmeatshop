<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'SuperAdmin',
        //     'email' => 'SuperAdmin@example.com',
        //     'password' => 'hellowworld24',
        //     'masteruser_id' => 1
        // ]);

            $this->call([masteruserseeder::class]);
    }
}
