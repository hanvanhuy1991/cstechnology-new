<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'View Users']);
        Permission::create(['name' => 'Create Users']);
        Permission::create(['name' => 'Update Users']);
        Permission::create(['name' => 'Delete Users']);

        Permission::create(['name' => 'View Roles']);
        Permission::create(['name' => 'Create Roles']);
        Permission::create(['name' => 'Update Roles']);
        Permission::create(['name' => 'Delete Roles']);
        Permission::create(['name' => 'Assign Roles']);

        Permission::create(['name' => 'View Catalogs']);
        Permission::create(['name' => 'Create Catalogs']);
        Permission::create(['name' => 'Update Catalogs']);
        Permission::create(['name' => 'Delete Catalogs']);

        Permission::create(['name' => 'View Option Types']);
        Permission::create(['name' => 'Create Option Types']);
        Permission::create(['name' => 'Update Option Types']);
        Permission::create(['name' => 'Delete Option Types']);

        Permission::create(['name' => 'View Prototypes']);
        Permission::create(['name' => 'Create Prototypes']);
        Permission::create(['name' => 'Update Prototypes']);
        Permission::create(['name' => 'Delete Prototypes']);

        Permission::create(['name' => 'View Taxonomies']);
        Permission::create(['name' => 'Create Taxonomies']);
        Permission::create(['name' => 'Update Taxonomies']);
        Permission::create(['name' => 'Delete Taxonomies']);

        $role = Role::create(['name' => 'Super Admin']);

        $adminUser = factory(\App\User::class)->create([
            'email' => 'admin@gmail.com',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'password' => bcrypt('12344321'),
        ]);

        $adminUser->assignRole($role);
    }
}
