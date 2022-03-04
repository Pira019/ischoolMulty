<?php

namespace App\Listeners;

use App\Events\ClassAnneeEvent;
use App\Events\EtudiantEvent;
use App\Models\AnneeEtudiantClass;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class EtudiantListener
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
    public function handle(EtudiantEvent $event)
    {
        //

         event(new ClassAnneeEvent);

        $listEtudiant = DB::table('etudiants')->whereNotNull('Email')->select('code_etudiant','annee_encours','Nom_etudiant','Email','classe_actuelle')->get();
        $getRole = DB::table('roles')->where('name', 'etudiant')->first();


        foreach ($listEtudiant as $list){


            try{

                $user = User::create([
                    'name' => $list->Nom_etudiant ,
                    'email' => $list->Email,
                    'password' => bcrypt('secret')
                ]);

                $user->assignRole([$getRole->id]);




            }catch (QueryException $e){

            }


        }

    }
}
