<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-04-29 05:18:44',
            'updated_at' => '2019-04-29 05:18:44',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '17',
                'title'      => 'country_create',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '18',
                'title'      => 'country_edit',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '19',
                'title'      => 'country_show',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '20',
                'title'      => 'country_delete',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '21',
                'title'      => 'country_access',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '22',
                'title'      => 'job_create',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '23',
                'title'      => 'job_edit',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '24',
                'title'      => 'job_show',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '25',
                'title'      => 'job_delete',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '26',
                'title'      => 'job_access',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '27',
                'title'      => 'proposal_create',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '28',
                'title'      => 'proposal_edit',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '29',
                'title'      => 'proposal_show',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '30',
                'title'      => 'proposal_delete',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ],
            [
                'id'         => '31',
                'title'      => 'proposal_access',
                'created_at' => '2019-04-29 05:18:44',
                'updated_at' => '2019-04-29 05:18:44',
            ]];

        Permission::insert($permissions);
    }
}
