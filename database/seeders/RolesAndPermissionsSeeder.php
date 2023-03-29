<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // permissions for library member

        $permissions = [
            'list books',
            'filter books',

            'add book',
            'edit book',
            'delete book',


            'list categories',

            'add category',
            'edit category',
            'delete category',

        ];
        // create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // give permissions to member role
        $role = Role::create(['name' => 'member'])
        ->givePermissionTo(['list books', 'filter books']);

        // give permission to librarian role
        $role = Role::create(['name' => 'librarian'])
        ->givePermissionTo([
            'list books',
            'filter books',

            'add book',
            'edit book',
            'delete book'
        ]);
        // give permission to admin role    
        $role = Role::create(['name' => 'admin'])
        ->givePermissionTo([
            'list books',
            'filter books',

            'add book',
            'edit book',
            'delete book',

            'list categories',
            'add category',
            'edit category',
            'delete category',
        ]);
    }
}
