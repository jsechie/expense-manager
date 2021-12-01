<?php

    // Permissions
    Route::apiResource('permissions', 'Api\V1\Admin\PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'Api\V1\Admin\RolesApiController');

    // Users
    Route::apiResource('users', 'Api\V1\Admin\UsersApiController');

    // Expensecategories
    Route::apiResource('expense-categories', 'Api\V1\Admin\ExpenseCategoryApiController');

    // Incomecategories
    Route::apiResource('income-categories', 'Api\V1\Admin\IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'Api\V1\Admin\ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'Api\V1\Admin\IncomeApiController');

    // Expensereports
    Route::apiResource('expense-reports', 'Api\V1\Admin\ExpenseReportApiController');
