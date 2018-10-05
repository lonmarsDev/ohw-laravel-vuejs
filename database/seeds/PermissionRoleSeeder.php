<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','admin')->firstOrFail();
        $permissions = Permission::all();
        $role->permissions()->sync($permissions->pluck('id')->all()); 

        $role_owner = Role::where('name','owner')->firstOrFail();
        $permissions_owner = Permission::where('key','NOT LIKE','%admin%')->get();
        $role_owner->permissions()->sync($permissions_owner->pluck('id')->all()); 
    }
}
