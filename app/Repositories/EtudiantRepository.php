<?php

namespace App\Repositories;

use App\Models\Etudiants;
use App\Models\Modules;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;
use function PHPUnit\Framework\isEmpty;

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
            'Adresse_permanante' => $inputs['adresseActuelle'],
            'Date_naissance' => $inputs['dateNaissance'],
            'ville_naissance' => $inputs['ville_naissance'],
            'Ville' => $inputs['ville'],
            'Nationalité' => $inputs['nationalite'],
            'Sexe' => $inputs['Sexe'],
            'num_inscription' => $inputs['numInscription'],
          //  'actif' => $inputs['actif'],
           // 'boursier' => $inputs['Boursier'],
           // 'Situation_bloquee' => $inputs['blocage'],
            //'Lauréat' => $inputs['laureat'],
            'Nom_pere' => $inputs['nomPere'],
            'Telephone_pere' => $inputs['Telephone_pere'],
            'Nom_mere' => $inputs['Nom_mere'],
            'Telephone_mere' => $inputs['Telephone_mere'],
            'tuteur' => $inputs['tuteur'],
            'telephone_tuteur' => $inputs['telephone_tuteur'],
            'passport_etudiant' => $inputs['passport_etudiant'],
            'photo_etudiant' => $this->savePhoto($inputs,'photoStudent'),
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
                    ->update($data);
    }

    public function searchById(Array $inputs){

       $this->model = "etudiants";

       return $this->getByFilter($inputs['column'],$inputs['id'])->first();
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

    /*
     * Save student photo
     * */
    public function savePhoto($images,$nameInput){

        //rename image

        if (isset($images) && !isEmpty($images)){
            $nameImage = time().'.'.$images->file($nameInput)->getClientOriginalName();

            // Storage::disk('img')->put($nameImage, 'Contents');
            $images->$nameInput->move(public_path('img'), substr($nameImage,-150));

            return $nameImage;
        }

       return 'no_picture.jpg';

    }


}