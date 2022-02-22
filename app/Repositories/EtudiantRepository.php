<?php

namespace App\Repositories;

use App\Models\Etudiants;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class EtudiantRepository extends ResourceRepository
{

   public function __constructor(Etudiants $etudiant) {

    $this->model = $etudiant;


	}

    private function save(Etudiants $etudiant ,Array $inputs){

      //  $etudiant->code_etudiant = $inputs['code_etudiant'];


        $etudiant->code_etudiant =25;
        $etudiant->actif =true;
        $etudiant->Situation_bloquee=false;

        $etudiant->prenom_etudiant = $inputs['prenom_etudiant'];
        $etudiant->Nom_etudiant = $inputs['Nom_etudiant'];
        $etudiant->Nom_pere = $inputs['Nom_pere'];
        $etudiant->Nom_mere = $inputs['Nom_mere'];
        $etudiant->Adresse_permanante = $inputs['Adresse_permanante'];
        $etudiant->Adresse_actuelle = $inputs['Adresse_actuelle'];
        $etudiant->Nationalité = $inputs['Nationalité'];
        $etudiant->Ville = $inputs['Ville'];
        $etudiant->Sexe = $inputs['Sexe'];
        $etudiant->Telephone_personnel = $inputs['Telephone_personnel'];
        $etudiant->Telephone_pere = $inputs['Telephone_pere'];
        $etudiant->Telephone_mere = $inputs['Telephone_mere'];
        $etudiant->Email = $inputs['Email'];
        $etudiant->Date_naissance = $inputs['Date_naissance'];
        $etudiant->remarques = $inputs['remarques'];
        $etudiant->Filiere = $inputs['Filiere'];
        $etudiant->classe_actuelle = $inputs['classe_actuelle'];
       // $etudiant->boursier = $inputs['boursier'];
        $etudiant->ville_naissance = $inputs['ville_naissance'];
        $etudiant->tuteur = $inputs['tuteur'];
        $etudiant->telephone_tuteur = $inputs['telephone_tuteur'];

        $etudiant->Compte_bancaire = $inputs['Compte_bancaire'];
        $etudiant->etablissement_precedent = $inputs['etablissement_precedent'];
        //$etudiant->Groupe_sanguin = $inputs['Groupe_sanguin'];
        //$etudiant->Maladies_chronique = $inputs['Maladies_chronique'];

        $etudiant->handicape = $inputs['handicape'];
        $etudiant->religion = $inputs['religion'];
       // $etudiant->photo_etudiant = $inputs['photo_etudiant'];
       // $etudiant->cin_etudiant = $inputs['cin_etudiant'];

        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
       /* $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];*/



        $etudiant->save();

    }

    public function store(Array $inputs)
	{

        $etudiant = new Etudiants;

		$this->save($etudiant ,$inputs);

        return $etudiant;


	}

	public  function searchByFilter(Array $inputs){

       //Table name
       $this->model = "etudiants";
        $rsl =  array();
       try{

           if (isset($inputs) and !empty($inputs['rechechePar'])){

           switch ($inputs['rechechePar']){

               case 'matricule' :
                   $rsl = $this->getByFilter('code_etudiant',$inputs['matricule']); break;

               case 'nom' :
                   $rsl = $this->getByFilter('Nom_etudiant',$inputs['nom']); break;

               case 'prenom' :
                   $rsl = $this->getByFilter('prenom_etudiant',$inputs['prenom']); break;

               case 'filiere' :
                   $rsl = $this->getByFilter('filiere',$inputs['filiere']); break;

               case 'classe' :
                   $rsl = $this->getByFilter('filiere',$inputs['filiere']); break;

               default :  $rsl = $rsl;

           }

           }


           return $rsl;

       }catch (QueryException  $e){

       }



    }



    public function getClassFillière(){

        /*get data
        fillière
        classe
        niveau*/

        $classModuleProf = DB::table('class_mod_prof')
            ->orderBy('filiere.Nom_filiere', 'asc')
            ->groupBy('filiere.code_filiere','classe.niveauClasse','classe.code_classe')
            ->Join('classe', 'class_mod_prof.codeClasse','=','classe.code_classe')
            ->Join('filiere','class_mod_prof.codeFiliere','=','filiere.code_filiere' )
            ->select('filiere.Nom_filiere','filiere.code_filiere','classe.niveauClasse','classe.code_classe')
            ->get();

        return $classModuleProf;
    }



}