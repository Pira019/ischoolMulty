<?php

namespace App\Repositories;

use App\Models\Etudiants;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class EtudiantRepository extends ResourceRepository
{

   public function __constructor(Etudiants $etudiant) {

    $this->model = $etudiant;


	}

    public function save(Array $inputs){

      //  $etudiant->code_etudiant = $inputs['code_etudiant'];

        $codeEtudiant = $inputs['code_etudiant'];

        $data = [

            'Filiere' => $inputs['Filiere'],
            'Nom_etudiant' => $inputs['Nom_etudiant'],
            'prenom_etudiant' => $inputs['prenom_etudiant'],
            'classe_actuelle' =>  explode(",",$inputs['classe_actuelle'])[0],
            'NomPrenom_Arabe' => $inputs['nameArabe'],
            'cin_etudiant' => $inputs['numCIN'],
            'Telephone_personnel' => $inputs['gsmEtudiant'],
            'groupe' => $inputs['grp'],
            'Email' => $inputs['emailPerso'],
            'email_ecole' => $inputs['email_ecole'],
            'Adresse_actuelle' => $inputs['adresseActuelle'],
            'Date_naissance' => $inputs['dateNaissance'],
            'ville_naissance' => $inputs['ville_naissance'],
            'Ville' => $inputs['ville'],
            'Nationalité' => $inputs['nationalite'],
            'Sexe' => $inputs['Sexe'],
            'num_inscription' => $inputs['numInscription'],
            'actif' =>  isset($inputs['actifStudent']) ? true : false,
            'boursier' => isset($inputs['Boursier']) ? $inputs['Boursier'] : false,
            'Situation_bloquee' => isset($inputs['blocage']) ? $inputs['blocage'] : false,
            'Lauréat' => isset($inputs['laureat']) ? $inputs['laureat'] : false,
            'Nom_pere' => $inputs['nomPere'],
            'Telephone_pere' => $inputs['Telephone_pere'],
            'Nom_mere' => $inputs['Nom_mere'],
            'Telephone_mere' => $inputs['Telephone_mere'],
            'tuteur' => $inputs['tuteur'],
            'telephone_tuteur' => $inputs['telephone_tuteur'],
            'passport_etudiant' => $inputs['passport_etudiant'],
            'photo_etudiant' => $this->savePhoto($inputs),
            'Adresse_permanante' => $inputs['Adresse_permanante'],
            'Maladies_chronique' => $inputs['maladChronique'],
            'Groupe_sanguin' => $inputs['grpSanguin'],
            'remarques' => $inputs['remarques'],
            'etablissement_precedent' => $inputs['etatprecedent'],
            'religion' => $inputs['religion'],
          //  'handicape' => $inputs['Handicape'],
            'Compte_bancaire' => $inputs['compBanque'],
            'swift_etudiant' => $inputs['switf'],
        ];



        $etudiant = Etudiants::where('code_etudiant',$codeEtudiant)
                    ->update(array_filter($data));


    }

    public function searchById(Array $inputs){

       $this->model = "etudiants";

       return $this->getByFilter(['code_etudiant' => $inputs['id']])->first();
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
        $rsl = null;
       try{

           if (isset($inputs) and !empty($inputs['rechechePar'])){

           switch ($inputs['rechechePar']){

               case 'matricule' :
                   $rsl = $this->getByFilter([
                       'code_etudiant' => $inputs['matricule']
                   ]); break;

               case 'nom' :
                   $rsl = $this->getByFilter(['Nom_etudiant' => $inputs['nom']]); break;

               case 'prenom' :
                   $rsl = $this->getByFilter(['prenom_etudiant' => $inputs['prenom']]); break;

               case 'filiere' :
                   $rsl = $this->getByFilter(['filiere' => $inputs['filiere']]); break;

               case 'classe' :

                   $classe = explode(',','1,5');

                   $rsl = $this->getByFilter([
                       //'Filiere' => explode(',',$inputs['classe'])[1],
                       'classe_actuelle' => 1,
                         ]); break;

               case 'blocage' :
                   $rsl = $this->getByFilter([
                       'Situation_bloquee' => true,
                       'Filiere'  => $inputs['blocage']
                   ]); break;

               case 'laureat' :
                   $rsl = $this->getByFilter([
                       'Lauréat' => true
                   ]);

                   break;



               default :
                   $rsl = $this->getByFilter([]);


           }

           }else{

           }


           return   $rsl->orderBy('Nom_etudiant', 'asc')->get()  ;

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

    /*
     * Save student photo
     * */
    public function savePhoto(Array $images)
    {



        if (isset($images['photoStudent']))
        {
            $nameImage = time().'.'.$images['photoStudent']->extension();

            $images['photoStudent']->move(public_path('img'), $nameImage);

           $getExistImage = Etudiants::find($images['code_etudiant']);

            $file_path = public_path('img/'.$getExistImage->photo_etudiant);

           if (File::exists($file_path)){
              File::delete($file_path);
           }

            return $nameImage;
        }else{

            return '';
        }



    }
    }




