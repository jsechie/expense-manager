<?php

use App\User;
use App\ExpenseCategory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Super Admin',
                'email'          => 'superadmin@admin.com',
                'password'       => '$2y$10$iz6WtVj69p/5JonFfuBRVO2LwrEGTJw3I6BqliWCbSmSF.5X9RPcu',//password
                'remember_token' => null,
                'created_at'     => '2019-09-13 19:21:30',
                'updated_at'     => '2019-09-13 19:21:30',
            ],
            [
                'id'             => 2,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$iz6WtVj69p/5JonFfuBRVO2LwrEGTJw3I6BqliWCbSmSF.5X9RPcu',
                'remember_token' => null,
                'created_at'     => '2019-09-13 19:21:30',
                'updated_at'     => '2019-09-13 19:21:30',
            ],
            [
                'id'             => 3,
                'name'           => 'User',
                'email'          => 'user@admin.com',
                'password'       => '$2y$10$iz6WtVj69p/5JonFfuBRVO2LwrEGTJw3I6BqliWCbSmSF.5X9RPcu',
                'remember_token' => null,
                'created_at'     => '2019-09-13 19:21:30',
                'updated_at'     => '2019-09-13 19:21:30',
            ],
        ];

        User::insert($users);

        $expenseCategory = [
            [
                'id'             => 1,
                'name'           => 'Petty Cash',
                'created_at'     => '2019-09-13 19:21:30',
                'updated_at'     => '2019-09-13 19:21:30',
                'created_by_id'  => 2,
            ],
        ];

        ExpenseCategory::insert($expenseCategory);
    }
}
