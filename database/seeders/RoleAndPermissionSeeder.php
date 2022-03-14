<?php

namespace Database\Seeders;

use Illuminate\Database\QueryException;
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
        $roles = ['super_admin','admin','professeur','parent','etudiant'];


        foreach($roles as $role){

            try{
           $rolesList =   Role::create(['name' => $role]);
            }catch (QueryException $e){

            }

        }


         
    }
}
