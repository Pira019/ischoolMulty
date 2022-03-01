<?php

namespace App\Listeners;

use App\Events\PersonnelEvent;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class PersonnelListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PersonnelEvent $event)
    {


            //save prof user
            $getProf = DB::table('personnel')->where('Professeur', true)->get();
            $getRole = DB::table('roles')->where('name', 'professeur')->first();

            foreach ($getProf as $listProf){

                try{
                $user = User::create([
                    'name' => $listProf->NomPersonnel ,
                    'email' => $listProf->emailPersonnel,
                    'password' => bcrypt('secret')
                ]);

                $user->assignRole([$getRole->id]);

                }catch (QueryException $e){

                }
            }


    }
}
