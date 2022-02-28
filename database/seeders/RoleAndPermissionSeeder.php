<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin','professeur','parent','etudiant'];


        foreach($roles as $key => $role){

           Role::create(['name' => $role]);
        }


         
    }
}
