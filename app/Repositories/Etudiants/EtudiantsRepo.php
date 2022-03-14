<?php
/**
 * Created by PhpStorm.
 * User: EPAG
 * Date: 14/03/2022
 * Time: 13:04
 */

namespace App\Repositories\Etudiants;


use App\Interfaces\Etudiant\IEtudiantRepository;
use App\Models\Etudiants;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EtudiantsRepo implements IEtudiantRepository
{

    protected  $etudiants;

    protected $role = 'etudiant';


    public function __construct(Etudiants $etudiants)
    {
        $this->etudiants = $etudiants;
    }

    public function save()
    {

    }

    public function saveEtudiantAsUser()
    {
        $getRoleName = DB::table('roles')->where('name',$this->role)->first();
        $listEtudiants = DB::table('etudiants')->whereNotNull('Email')->select('Nom_etudiant','Email')->get();

        foreach ($listEtudiants as $list){
            try{
                $user = User::updateOrCreate(
                    [  'email' => $list->Email,],
                    [
                    'name' =>'ETU_'. $list->Nom_etudiant ,
                    'email' => $list->Email,
                    'password' => bcrypt('secret')
                ]);

                $user->assignRole([$getRoleName->id]);

            }catch (QueryException $e){

            }
        }
        // TODO: Implement save() method.
    }

    public function getProfil()
    {
        $user =DB::table('users')->where('id',Auth::id())->first();

        if ($user)
        {
            $etudiant = DB::table('etudiants')->where('Email',$user->email)->select('photo_etudiant')->first();

            return $etudiant->photo_etudiant;
        }
    }
}