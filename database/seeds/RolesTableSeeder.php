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
                'title'      => 'Super Admin',
                'created_at' => '2021-09-13 19:15:46',
                'updated_at' => '2021-09-13 19:15:46',
            ],
            [
                'id'         => 2,
                'title'      => 'Admin',
                'created_at' => '2021-09-13 19:15:46',
                'updated_at' => '2021-09-13 19:15:46',
            ],

            [
                'id'         => 3,
                'title'      => 'User',
                'created_at' => '2021-09-13 19:15:46',
                'updated_at' => '2021-09-13 19:15:46',
            ],
        ];

        Role::insert($roles);
    }
}
