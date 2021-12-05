<?php

Route::redirect('/', '/login');
Route::redirect('/register', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false,]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::redirect('/', '/admin/petty-cash');
    // // Permissions
    // Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    // Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Expensecategories
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Incomecategories
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expensereports
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    //Dashborad


    //Petty Cash
    Route::get('petty-cash/process/archive', 'PettyCashController@archive')->name('petty-cash.archive');
    Route::get('petty-cash/process/reimburse', 'PettyCashController@reimburse')->name('petty-cash.reimburse');
    Route::get('petty-cash/process/receive', 'PettyCashController@processReceive')->name('petty-cash.processReceive');
    Route::get('petty-cash/process/approve', 'PettyCashController@processApprove')->name('petty-cash.processApprove');
    Route::resource('petty-cash', 'PettyCashController');
    Route::get('petty-cash/{pettyCash}/withdraw', 'PettyCashController@withdraw')->name('petty-cash.withdraw');
    Route::get('petty-cash/{pettyCash}/approve', 'PettyCashController@approve')->name('petty-cash.approve');
    Route::get('petty-cash/{pettyCash}/receive', 'PettyCashController@receive')->name('petty-cash.receive');
    Route::get('petty-cash/{pettyCash}/pay', 'PettyCashController@pay')->name('petty-cash.pay');
    Route::get('petty-cash/{pettyCash}/reject', 'PettyCashController@reject')->name('petty-cash.reject');

    //Dashboard
    // Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    //profile
    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::post('profile/password', 'ProfileController@password')->name('profile.password');
});
