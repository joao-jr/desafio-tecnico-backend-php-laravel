<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit quotations']);
        Permission::create(['name' => 'delete quotations']);
        Permission::create(['name' => 'publish quotations']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // this can be done as separate statements
        $role = Role::create(['name' => 'publisher']);
        $role->givePermissionTo('edit quotations');

    }
}
