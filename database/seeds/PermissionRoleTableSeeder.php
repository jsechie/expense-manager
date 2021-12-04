<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $super_admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($super_admin_permissions->pluck('id'));
        $manager_permissions = $super_admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($manager_permissions);
        $user_permissions = Permission::whereIn('title',['petty_cash_access','petty_cash_show','petty_cash_create'])->get();
        Role::findOrFail(3)->permissions()->sync($user_permissions);
    }
}
