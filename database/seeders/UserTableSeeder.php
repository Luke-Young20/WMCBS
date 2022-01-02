<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User;
        $user1->name = 'Luke no Admin';
        $user1->type = 'normal';
        $user1->email = 'test@gmail.com';
        $user1->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user1->save();


        $user2 = new User;
        $user2->name = 'Luke Admin';
        $user2->type = 'admin';
        $user2->email = 'test1@gmail.com';
        $user2->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user2->save();

    }
}
