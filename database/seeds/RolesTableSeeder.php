<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2019-04-29 05:12:11',
                'updated_at' => '2019-04-29 05:12:11',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'title'      => 'Employee',
                'created_at' => '2019-04-29 05:12:11',
                'updated_at' => '2019-04-29 05:12:11',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'title'      => 'Candidate',
                'created_at' => '2019-04-29 05:12:11',
                'updated_at' => '2019-04-29 05:12:11',
                'deleted_at' => null,
            ],
        ];

        Role::insert($roles);
    }
}
