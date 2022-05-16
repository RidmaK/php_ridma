<?php

namespace Database\Seeders;

use App\Models\SalesRepresentative;
use Illuminate\Database\Seeder;

class SalesRepresentativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalesRepresentative::factory(50)->create();
    }
}
