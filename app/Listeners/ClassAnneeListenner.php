<?php

namespace App\Listeners;

use App\Events\ClassAnneeEvent;
use App\Models\AnneeEtudiantClass;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class ClassAnneeListenner
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
    public function handle(ClassAnneeEvent $event)
    {



        $listEtudiant = DB::table('etudiants')
            ->select('code_etudiant','annee_encours','Nom_etudiant','Email','classe_actuelle')->get();

        foreach ($listEtudiant as $list ){

            try{
                AnneeEtudiantClass::create([
                    'code_etudiant' => $list->code_etudiant,
                    'code_classe' => $list->classe_actuelle ,
                    'annee_scolaire' => $list->annee_encours ,
                ]);

            } catch (QueryException $e){

            }
        }
    }
}
