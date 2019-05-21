<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$LMzZc4GPRnhpP/rzQDEOC.60ayJ9lWagbFM.U8cFm6AhyQ7XFR1iO',
            'remember_token' => null,
            'created_at'     => '2019-04-29 05:18:44',
            'updated_at'     => '2019-04-29 05:18:44',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
