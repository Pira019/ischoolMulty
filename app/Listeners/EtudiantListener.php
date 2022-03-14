<?php

namespace App\Listeners;

use App\Events\ClassAnneeEvent;
use App\Events\EtudiantEvent;
use App\Interfaces\Etudiant\IEtudiantRepository;
use App\Models\AnneeEtudiantClass;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EtudiantListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    private  $repoEtudiant;


    public function __construct(IEtudiantRepository $repository)
    {
        $this->repoEtudiant = $repository;
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

       //  event(new ClassAnneeEvent);

        session(['photoIcone' => $this->repoEtudiant->getProfil()]);
         $this->repoEtudiant->saveEtudiantAsUser();

       //$getRole = DB::table('roles')->where('name', 'etudiant')->first();




    }
}
