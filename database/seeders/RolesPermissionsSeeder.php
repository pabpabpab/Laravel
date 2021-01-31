<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create news']);
        Permission::create(['name' => 'edit news']);
        Permission::create(['name' => 'delete news']);
        Permission::create(['name' => 'publish news']);
        Permission::create(['name' => 'unpublish news']);
        Permission::create(['name' => 'load xml news']);

        // create roles and assign existing permissions
        $writerRole = Role::create(['name' => 'writer']);
        $writerRole->givePermissionTo('create news');
        $writerRole->givePermissionTo('edit news');
        $writerRole->givePermissionTo('delete news');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('edit news');
        $adminRole->givePermissionTo('delete news');
        $adminRole->givePermissionTo('publish news');
        $adminRole->givePermissionTo('unpublish news');
        $adminRole->givePermissionTo('load xml news');

        $superAdminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider



        $domen = explode('//', env('APP_URL'))[1];

        $user = User::getByEmail('super-admin@'.$domen);
        if ($user) {
            $user->assignRole($superAdminRole);
        }

        $user = User::getByEmail('admin@'.$domen);
        if ($user) {
            $user->assignRole($adminRole);
        }

        $user = User::getByEmail('123@123.ru');
        if ($user) {
            $user->assignRole($writerRole);
        }

    }
}
