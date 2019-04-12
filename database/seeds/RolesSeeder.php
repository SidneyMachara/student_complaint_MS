<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;

class RolesSeeder extends Seeder
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

   // this can be done as separate statements
   $role = Role::create(['name' => 'sys_admin']);
   $role = Role::create(['name' => 'lecturer']);
   $role = Role::create(['name' => 'student']);


   User::find(1)->assignRole('sys_admin');

    }
}
