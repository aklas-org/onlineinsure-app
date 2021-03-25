<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MockSalesRepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SalesRep::factory()->count(100)->create();
    }
}
