<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class documents extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docs = ['Attestation de scolarité','Attestaion d\'inscription'];
        //

        foreach ($docs as $list){
            try{

                DB::table('documents')->insert([
                   'name' => $list
                ]);
            }catch (QueryException $e){

            }
        }
    }
}
