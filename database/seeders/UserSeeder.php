<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Parker', 'email' => 'parker@sales.com', 'password' => bcrypt('parker@sales@'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        User::insert($users);
    }
}
