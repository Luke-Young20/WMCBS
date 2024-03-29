<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Eloquent::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(EventTableSeeder::class);
    }
}
