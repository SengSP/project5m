<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // create permissions
        Permission::create(['name' => 'addproduct']);
        Permission::create(['name' => 'editproduct']);
        Permission::create(['name' => 'delproduct']);
        Permission::create(['name' => 'manageuser']);

        // create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'account']);
        Role::create(['name' => 'manager']);
    }
}
