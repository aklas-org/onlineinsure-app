<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MockClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Client::factory()->count(100)->create();
    }
}
