<?php

namespace App\Repositories;

use App\Models\Etudiants;

class EtudiantRepository
{

    protected $etudiant;

   public function __constructor(Etudiants $etudiant) {

    $this->etudiant = $etudiant;
	}




    private function save(Etudiants $etudiant ,Array $inputs){
 
        $etudiant->code_etudiant = $inputs['code_etudiant'];
	    $etudiant->Nom_etudiant = $inputs['Nom_etudiant'];
        $etudiant->prenom_etudiant = $inputs['prenom_etudiant'];
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
        $etudiant->boursier = $inputs['boursier'];
        $etudiant->ville_naissance = $inputs['ville_naissance'];
        $etudiant->tuteur = $inputs['tuteur'];
        $etudiant->telephone_tuteur = $inputs['telephone_tuteur'];

        $etudiant->Compte_bancaire = $inputs['Compte_bancaire'];
        $etudiant->etablissement_precedent = $inputs['etablissement_precedent'];
        $etudiant->Groupe_sanguin = $inputs['Groupe_sanguin'];
        $etudiant->Maladies_chronique = $inputs['Maladies_chronique'];

        $etudiant->handicape = $inputs['handicape'];
        $etudiant->religion = $inputs['religion'];
        $etudiant->photo_etudiant = $inputs['photo_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];

        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];
        $etudiant->cin_etudiant = $inputs['cin_etudiant'];


        $etudiant->save();

    }

    public function store(Array $inputs)
	{
		$etudiant = new $this->etudiant;

		$this->save($etudiant,$inputs);

        return $etudiant;


	}

}
