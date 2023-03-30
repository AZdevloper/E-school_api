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
        Role::create(['name' => 'admin'])
        ->givePermissionTo(['list books', 'filter books']);

        // give permission to librarian role
         Role::create(['name' => 'teacher'])
        ->givePermissionTo([
            'list books',
            'filter books',

            'add book',
            'edit book',
            'delete book'
        ]);
        // give permission to admin role    
       Role::create(['name' => 'student'])
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
