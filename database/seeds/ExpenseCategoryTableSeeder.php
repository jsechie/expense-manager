<?php

namespace Database\Seeders;

use App\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
