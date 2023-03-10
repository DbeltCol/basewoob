<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //first add fake roles

        $role1 =  Role::create([
            'name' => 'Admin'
        ]);

        $role2 = Role::create([
            'name' => 'User'
        ]);


        //create fake permissions to users and assign

        $permission1 = Permission::create([
            'name' => 'ver usuarios'
        ]);

        $permission1->roles()->sync([$role1->id, $role2->id]);


        $permission2 = Permission::create([
            'name' => 'crear usuarios'
        ]);

        $permission2->roles()->sync([$role1->id]);


        $permission3 = Permission::create([
            'name' => 'editar usuarios'
        ]);

        $permission3->roles()->sync([$role1->id]);

        $permission4 = Permission::create([
            'name' => 'eliminar usuarios'
        ]);

        $permission4->roles()->sync([$role1->id]);
    }
}
