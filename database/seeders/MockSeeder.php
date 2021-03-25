<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MockSalesRepSeeder::class);
        $this->call(MockClientSeeder::class);
    }
}
