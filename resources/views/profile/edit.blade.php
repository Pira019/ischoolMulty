@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

<script>
    $(document).ready(function () {
        @if(  in_array('dossier',$_GET))
        $('html, body').animate({
            scrollTop: $('#dossier').offset().top
        }, 'slow');
        @endif
    });
</script>
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __(''.$title) }}</h5>
                    <a class="float-right" href="{{route('etudiant.index',['inputs' => isset($inputs) ? $inputs : ''])}}">{{ __(''.$title) }}</a>
                </div>
                <form method="post" action="{{ route('etudiant.store') }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('post')

                        @include('alerts.success')

                     @isset($edit)   <div class="row">
                            <div class="col-md-4">
                                <fieldset class="form-group border p-3 " >

                                    <legend class="title col-form-label pt-0   float-none w-auto"> {{ __('Information de base') }}</legend>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="Nom_etudiant">{{ __('Nom de l\'étudiant') }}</label>
                                            <input type="text" name="Nom_etudiant" id="Nom_etudiant"
                                                class="form-control{{ $errors->has('Nom_etudiant') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Nom etudiant') }}"
                                                value="{{ old('Nom_etudiant', isset($data) && !empty($data)? $data->Nom_etudiant : '') }}">
                                            @include('alerts.feedback', ['field' => 'Nom_etudiant'])
                                        </div>

                                        <div
                                                class="form-group{{ $errors->has('Filiere') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="filliere">{{ __('Fillière') }}</label>
                                            <select name="Filiere" id="filliere"
                                                    class="form-control{{ $errors->has('Filiere') ? ' is-invalid' : '' }}">
                                                @isset($filliere)
                                                    @foreach($filliere as $fill)
                                                        <option value="{{$fill->code_filiere}}" {{ old('Filiere', isset($data) && !empty($data) ? $data->Filiere : $fill->code_filiere) ==$fill->code_filiere? 'selected': '' }}>{{$fill->Nom_filiere}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                            @include('alerts.feedback', ['field' => 'Filiere'])
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div
                                                class="form-group{{ $errors->has('prenom_etudiant') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="prenom_etudiant">{{ __('Prénom de l\'étudiant') }}</label>
                                            <input type="text" name="prenom_etudiant"  id="prenom_etudiant"
                                                   class="form-control{{ $errors->has('prenom_etudiant') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('prenom_etudiant') }}"
                                                   value="{{ old('prenom_etudiant', isset($data) && !empty($data)? $data->prenom_etudiant : '') }}">
                                            @include('alerts.feedback', ['field' => 'prenom_etudiant'])
                                        </div>

                                        <div
                                                class="form-group{{ $errors->has('classe_actuelle') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="classe_actuelle">{{ __('Classe') }}</label>
                                            <select name="classe_actuelle" id="classe_actuelle"
                                                    class="form-control{{ $errors->has('classe_actuelle') ? ' is-invalid' : '' }}">
                                                @isset($filliere)
                                                    @foreach($filliere as $fill)
                                                        <option value="{{$fill->niveauClasse}},{{$fill->code_filiere}}" {{ old('Filiere', isset($data) && !empty($data) || $data->classe_actuelle == $fill->niveauClasse? $data->Filiere : $fill->code_filiere) ==$fill->code_filiere ? 'selected': '' }}>{{$fill->niveauClasse}} {{$fill->Nom_filiere}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                            @include('alerts.feedback', ['field' => 'classe_actuelle'])
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('classe_actuelle') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="nameArabe">{{ __('Noms en arabe') }}</label>

                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('nameArabe') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <input type="text" name="nameArabe" id="nameArabe"
                                                class="form-control{{ $errors->has('nameArabe') ? ' is-invalid' : '' }} "
                                                placeholder="{{ __('Nom et prénom en arable') }}"
                                                value="{{ old('nameArabe', isset($data) && !empty($data)? $data->NomPrenom_Arabe : '') }}">
                                            @include('alerts.feedback', ['field' => 'nameArabe'])
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <input name="code_etudiant" type="hidden" value="{{isset($data) && !empty($data)? $data->code_etudiant : ''}}">

                                        <div
                                                class="form-group{{ $errors->has('numCIN') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="numCIN">{{ __('N°CIN') }}</label>
                                            <input type="text" name="numCIN" id="numCIN"
                                                   class="form-control{{ $errors->has('numCIN') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('N°CIN') }}"
                                                   value="{{ old('numCIN', isset($data) && !empty($data)? $data->cin_etudiant : '') }}">
                                            @include('alerts.feedback', ['field' => 'numCIN'])
                                        </div>

                                        <div
                                                class="form-group{{ $errors->has('gsmEtudiant') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="gsmEtudiant">{{ __('Gsm étudiant') }}</label>
                                            <input type="text" name="gsmEtudiant" id="gsmEtudiant" title="{{ old('gsmEtudiant', isset($data) && !empty($data)? $data->Telephone_personnel : 'Gsm personnel') }}"
                                                   class="form-control{{ $errors->has('gsmEtudiant') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Gsm étudiant') }}"
                                                   value="{{ old('gsmEtudiant', isset($data) && !empty($data)? $data->Telephone_personnel : '') }}">
                                            @include('alerts.feedback', ['field' => 'gsmEtudiant'])
                                        </div>

                                        <div
                                                class="form-group{{ $errors->has('grp') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="grp">{{ __('Groupe') }}</label>
                                            <select name="grp" id="grp"
                                                    class="form-control{{ $errors->has('grp') ? ' is-invalid' : '' }}">
                                                <option value="{{$data->groupe}}" {{ old('grp', isset($data) && !empty($data) ? $data->groupe : '') ==  $data->groupe ? 'selected': '' }}>{{ $data->groupe}}  </option>

                                            </select>
                                            @include('alerts.feedback', ['field' => 'grp'])
                                        </div>
                                    </div>



                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('emailPerso') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="emailPerso">{{ __('Email personnel') }}</label>
                                            <input type="text" name="emailPerso" id="emailPerso"
                                                class="form-control{{ $errors->has('emailPerso') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Email personnel') }}"
                                               value="{{ old('emailPerso', isset($data) && !empty($data)? $data->Email : '') }}">
                                            @include('alerts.feedback', ['field' => 'emailPerso'])
                                        </div>
                                        <div
                                            class="form-group{{ $errors->has('email_ecole') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="email_ecole">{{ __('Email école') }}</label>
                                            <input type="text" id="email_ecole" name="email_ecole"
                                                class="form-control{{ $errors->has('email_ecole') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Email école') }}"
                                                value="{{ old('email_ecole', isset($data) && !empty($data)? $data->email_ecole : '') }}">
                                            @include('alerts.feedback', ['field' => 'email_ecole'])
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('adresseActuelle') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="adresseActuelle">{{ __('Adresse étudiant') }}</label>
                                            <textarea id="adresseActuelle" type="text" name="adresseActuelle" autocomplete="address"
                                                class="form-control{{ $errors->has('adresseActuelle') ? ' is-invalid' : '' }}" >
                                               {{ old('adresseActuelle', isset($data) && !empty($data)? $data->Adresse_permanante : '') }}
                                            </textarea>
                                            @include('alerts.feedback', ['field' => 'adresseActuelle'])
                                        </div>


                                        <div
                                            class="form-group{{ $errors->has('dateNaissance') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="dateNaissance">{{ __('Date de naissance') }}</label>
                                            <input type="date" id="dateNaissance"  name="dateNaissance" title=" {{ old('dateNaissance', isset($data) && !empty($data)? $data->Date_naissance : 'Date de naissance') }}"
                                                class="form-control{{ $errors->has('dateNaissance') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Date de naissance') }}"
                                                value="<?php echo e( old('Date_naissance',isset($data) && !empty($data)? date('d-m-Y',strtotime($data->Date_naissance)) : '') )?> ">
                                            @include('alerts.feedback', ['field' => 'dateNaissance'])
                                        </div>
                                        <div
                                            class="form-group{{ $errors->has('ville_naissance') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="ville_naissance">{{ __('Ville de naissance') }}</label>
                                            <input type="text" id="ville_naissance" name="ville_naissance"
                                                class="form-control{{ $errors->has('ville_naissance') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('ville_naissance') }}"
                                                value=" {{ old('ville_naissance', isset($data) && !empty($data)? $data->ville_naissance : '') }}">
                                            @include('alerts.feedback', ['field' => 'ville_naissance'])
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('ville') ? ' has-danger' : '' }} col-md-3 mb-3 " title="{{ old('ville', isset($data) && !empty($data)? $data->Ville : 'Ville') }}">
                                            <label>{{ __('Ville') }}</label>
                                            <input type="text" id="ville" name="ville" title="{{ old('ville', isset($data) && !empty($data)? $data->Ville : 'Ville') }}"
                                                class="form-control{{ $errors->has('ville') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Ville') }}"
                                                value=" {{ old('ville', isset($data) && !empty($data)? $data->Ville : '') }}">
                                            @include('alerts.feedback', ['field' => 'ville'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('nationalite') ? ' has-danger' : '' }} col-md-3 mb-3 "
                                        title="{{ old('nationalite', isset($data) && !empty($data)? $data->Nationalité : '') }}">
                                            <label for="nationalite">{{ __('Nationalité') }}</label>
                                            <input type="text" id="nationalite" name="nationalite"
                                                class="form-control{{ $errors->has('nationalite') ? ' is-invalid' : '' }}"
                                                   title="{{ old('nationalite', isset($data) && !empty($data)? $data->Nationalité : '') }}"
                                                placeholder="{{ __('Nationalité') }}"
                                                value=" {{ old('nationalite', isset($data) && !empty($data)? $data->Nationalité : '') }}">
                                            @include('alerts.feedback', ['field' => 'nationalite'])
                                        </div>
                                        <div
                                            class="form-group{{ $errors->has('Sexe') ? ' has-danger' : '' }} col-md-3 mb-3 ">
                                            <label for="sexe">{{ __('Sexe') }}</label>
                                            <select name="Sexe" id="sexe"
                                                class="form-control{{ $errors->has('sexe') ? ' is-invalid' : '' }}">
                                                <option value="Masculin" {{ old('Sexe', isset($data) && !empty($data) ? substr($data->Sexe,0,1)  : '') ==  'M' ? 'selected': '' }} >{{ __('M') }}
                                                      </option>
                                                </option>
                                                <option value="Fémin" {{ old('Sexe', isset($data) && !empty($data) ? substr($data->Sexe,0,1) : '') ==  'F' ? 'selected': '' }}>{{ __('F') }}</option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'Sexe'])
                                        </div>
                                        <div
                                                class="form-group{{ $errors->has('numInscription') ? ' has-danger' : '' }} col-md-3 mb-3 ">
                                            <label for="numInscription" title="{{__('Num inscription')}}">{{ __('N° insc.') }}</label>
                                            <input type="text" id="numInscription" name="numInscription"
                                                   class="form-control{{ $errors->has('numInscription') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Num inscription') }}"
                                                   value="{{ old('numInscription', isset($data) && !empty($data)? $data->num_inscription : '') }}">
                                            @include('alerts.feedback', ['field' => 'numInscription'])
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group border p-3 ">

                                    <legend class="title col-form-label pt-0   float-none w-auto"> {{ __('Autres') }}</legend>


                                        <div class="form-row">

                                            <div class="form-check{{ $errors->has('actif') ? ' has-danger' : '' }} col-md-3 mb-3 ">

                                                <div class="mt-4">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"  name="actif"
                                                               value="{{ old('actif', isset($data) && !empty($data)? $data->actif : '') }}"
                                                                {{ old('actif', isset($data) && !empty($data) && $data->actif==true ? $data->actif : '') == true ? 'checked' : '' }}
                                                                >

                                                        <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Active')}}
                                                 </span>

                                                    </label>

                                                </div>
                                                @include('alerts.feedback', ['field' => 'actif'])
                                            </div>

                                            <div class="form-check{{ $errors->has('Boursier') ? ' has-danger' : '' }} col-md-3 mb-3 ">

                                                <div class="mt-4">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{ old('Boursier', isset($data) && !empty($data)? $data->boursier : '') }}"
                                                               name="Boursier"
                                                               {{ old('Boursier', isset($data) && !empty($data) && $data->boursier==true ? $data->boursier : '') == true ? 'checked' : '' }} >
                                                        <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Boursier')}}
                                                 </span>

                                                    </label>

                                                </div>
                                                @include('alerts.feedback', ['field' => 'Boursier'])
                                            </div>

                                            <div class="form-check{{ $errors->has('blocage') ? ' has-danger' : '' }} col-md-3 mb-3 ">

                                                <div class="mt-4">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="{{ old('blocage', isset($data) && !empty($data)? $data->Situation_bloquee : '') }}"
                                                                {{ old('blocage', isset($data) && !empty($data) && $data->Situation_bloquee==true ? $data->Situation_bloquee : '') == true ? 'checked' : '' }}
                                                        name="blocage">
                                                        <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Blocage')}}
                                                 </span>

                                                    </label>

                                                </div>
                                                @include('alerts.feedback', ['field' => 'blocage'])
                                            </div>

                                            <div class="form-check{{ $errors->has('laureat') ? ' has-danger' : '' }} col-md-3 mb-3 ">

                                                <div class="mt-4">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="{{ old('laureat', isset($data) && !empty($data)? $data->Lauréat : '') }}"
                                                               name="laureat"
                                                                {{ old('laureat', isset($data) && !empty($data) && $data->Lauréat==true ? $data->Lauréat : '') == true ? 'checked' : '' }} >
                                                        <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Lauréat')}}
                                                 </span>

                                                    </label>

                                                </div>
                                                @include('alerts.feedback', ['field' => 'laureat'])
                                            </div>

                                        </div>

                                </fieldset>
                            </div>


                            <div class="col-md-4 ">
                                <fieldset class="form-group border p-3 ">

                                    <legend class="title float-none w-auto  col-form-label pt-0"> {{ __('Informations supplementaires') }}</legend>

                                <!--    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <a href="#">
                                                    <img class="avatar"
                                                        src="{{ asset('black') }}/img/emilyz.jpg" alt="">
                                                </a>

                                            </div>
                                        </div>
                                    </div> -->
                                    <script>
                                        function preview() {
                                            frame.src = URL.createObjectURL(event.target.files[0]);
                                        }
                                        function clearImage() {
                                            document.getElementById('formFile').value = null;
                                            frame.src = "";
                                        }
                                    </script>

                                    <div class="form-row">

                                    </div>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('nomPere') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="nomPere">{{ __('Prénom du père') }}</label>
                                            <input type="text" id="nomPere" name="nomPere"
                                                class="form-control{{ $errors->has('nomPere') ? ' is-invalid' : '' }}"
                                                title="{{ old('nomPere', isset($data) && !empty($data)? $data->Nom_pere : '') }}"
                                                placeholder="{{ __('Prénom du père') }}"
                                                value="{{ old('nomPere', isset($data) && !empty($data)? $data->Nom_pere : '') }}">
                                            @include('alerts.feedback', ['field' => 'nomPere'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('Telephone_pere') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="Telephone_pere">{{ __('Tél père') }}</label>
                                            <input type="text" name="Telephone_pere" id="Telephone_pere"
                                                title="{{ old('Telephone_pere', isset($data) && !empty($data)? $data->Telephone_pere : '') }}"
                                                class="form-control{{ $errors->has('Telephone_pere') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Tél père') }}"
                                                 value="{{ old('Telephone_pere', isset($data) && !empty($data)? $data->Telephone_pere : '') }}">
                                            @include('alerts.feedback', ['field' => 'Telephone_pere'])
                                        </div>

                                        <div class="text-center col-md-4 mb-3">
                                            <img id="frame" src="{{old('photoStudent', isset($data) && !empty($data)? asset('img/'.$data->photo_etudiant) : asset('img/student.png'))}}" class="rounded mx-auto d-block" alt="photo étudiant" width="70%" height="50%"/>
                                            <input  type="file" id="formFile" onchange="preview()" name="photoStudent"
                                                    accept=image/x-png,image/jpg,image/jpeg">
                                            <button onclick="clearImage()" class="btn shadow-none"><i class="tim-icons icon-upload"></i></button>
                                        </div>


                                    </div>

                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('Nom_mere') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="Nom_mere">{{ __('Nom de la mère') }}</label>
                                            <input type="text" id="Nom_mere" name="Nom_mere"
                                                   title="{{ old('Nom_mere', isset($data) && !empty($data)? $data->Nom_mere : '') }}"
                                                class="form-control{{ $errors->has('Nom_mere') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Nom de la mère') }}"
                                                value="{{ old('Nom_mere', isset($data) && !empty($data)? $data->Nom_mere : '') }}">
                                            @include('alerts.feedback', ['field' => 'Nom_mere'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('Telephone_mere') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label>{{ __('Tél de la mère') }}</label>
                                            <input type="text" name="Telephone_mere"
                                                class="form-control{{ $errors->has('Telephone_mere') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Tél de la mère') }}"
                                                value="{{ old('Telephone_mere', isset($data) && !empty($data)? $data->Telephone_mere : '') }}">
                                            @include('alerts.feedback', ['field' => 'Telephone_mere'])
                                        </div>

                                    </div>


                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('tuteur') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="tuteur">{{ __('Tuteur') }}</label>
                                            <input type="text" id="tuteur" name="tuteur"
                                                 title="{{ old('tuteur', isset($data) && !empty($data)? $data->tuteur : '') }}"
                                                class="form-control{{ $errors->has('tuteur') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Tuteur') }}"
                                                value="{{ old('tuteur', isset($data) && !empty($data)? $data->tuteur : '') }}">
                                            @include('alerts.feedback', ['field' => 'tuteur'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('telephone_tuteur') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="telephone_tuteur">{{ __('Tél tuteur') }}</label>
                                            <input type="text" id="telephone_tuteur" name="telephone_tuteur"
                                                 title="{{ old('telephone_tuteur', isset($data) && !empty($data)? $data->telephone_tuteur : '') }}"
                                                class="form-control{{ $errors->has('telephone_tuteur') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Tél tuteur') }}"
                                                value="{{ old('telephone_tuteur', isset($data) && !empty($data)? $data->telephone_tuteur : '') }}">
                                            @include('alerts.feedback', ['field' => 'telephone_tuteur'])
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('passport_etudiant') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="passport_etudiant" >{{ __('N° passeport') }}</label>
                                            <input type="text" id="passport_etudiant" name="passport_etudiant" maxlength="10"
                                                title="{{ old('passport_etudiant', isset($data) && !empty($data)? $data->passport_etudiant : '') }}"
                                                class="form-control{{ $errors->has('passport_etudiant') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('N° passeport') }}"
                                               value="{{ old('passport_etudiant', isset($data) && !empty($data)? $data->passport_etudiant : '') }}">
                                            @include('alerts.feedback', ['field' => 'passport_etudiant'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('Adresse_permanante') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="Adresse_permanante">{{ __('Adresse permanante') }}</label>

                                            <textarea id="Adresse_permanante" name="Adresse_permanante"
                                                class="form-control{{ $errors->has('Adresse_permanante') ? ' is-invalid' : '' }}">
                                               {{ old('Adresse_permanante', isset($data) && !empty($data)? $data->Adresse_permanante : '') }}
                                            </textarea>
                                            @include('alerts.feedback', ['field' => 'Adresse_permanante'])

                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div
                                                class="form-group{{ $errors->has('maladChronique') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="maladChronique" >{{ __('Maladie chronique') }}</label>
                                            <input type="text" id="maladChronique" name="maladChronique"
                                                   class="form-control{{ $errors->has('maladChronique') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Maladie chronique') }}"
                                                   title="{{ old('maladChronique', isset($data) && !empty($data)? $data->Maladies_chronique : '') }}"
                                                   value="{{ old('maladChronique', isset($data) && !empty($data)? $data->Maladies_chronique : '') }}">
                                            @include('alerts.feedback', ['field' => 'maladChronique'])
                                        </div>

                                        <div
                                                class="form-group{{ $errors->has('grpSanguin') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="grpSanguin">{{ __('Grp sanguin') }}</label>
                                            <input type="text" id="grpSanguin" name="grpSanguin"
                                                   class="form-control{{ $errors->has('grpSanguin') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Grp Sanguin') }}"
                                                   title="{{ old('grpSanguin', isset($data) && !empty($data)? $data->Groupe_sanguin : '') }}"
                                                   value="{{ old('grpSanguin', isset($data) && !empty($data)? $data->Groupe_sanguin : '') }}">
                                            @include('alerts.feedback', ['field' => 'grpSanguin'])
                                        </div>

                                        <div
                                                class="form-group{{ $errors->has('remarques') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="remarques">{{ __('Remarques') }}</label>

                                            <textarea id="remarques" name="remarques"
                                                      class="form-control{{ $errors->has('remarques') ? ' is-invalid' : '' }}">
                                              {{ old('remarques', isset($data) && !empty($data)? $data->remarques : '') }}
                                            </textarea>
                                            @include('alerts.feedback', ['field' => 'remarques'])

                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div
                                                class="form-group{{ $errors->has('etatprecedent') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="etatprecedent" >{{ __('Et. précedent') }}</label>
                                            <input type="text" id="etatprecedent" name="etatprecedent" title="Etablissement précedent"
                                                   class="form-control{{ $errors->has('etatprecedent') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Etablissement précedent') }}"
                                                   value="{{ old('etatprecedent', isset($data) && !empty($data)? $data->etablissement_precedent : '') }}">
                                            @include('alerts.feedback', ['field' => 'etatprecedent'])
                                        </div>

                                        <div
                                                class="form-group{{ $errors->has('religion') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="religion">{{ __('Réligion') }}</label>
                                            <input type="text" id="religion" name="religion" title="Réligion"
                                            class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Réligion') }}"
                                            value="{{ old('religion', isset($data) && !empty($data)? $data->religion : '') }}">
                                            @include('alerts.feedback', ['field' => 'religion'])
                                        </div>

                                        <div class="form-check{{ $errors->has('Handicape') ? ' has-danger' : '' }} col-md-4 mb-3 ">

                                            <div class="mt-4">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="Handicape"
                                                           value="{{old('Handicape', isset($data) && !empty($data)? $data->handicape : '') }}"

                                                            {{ old('Handicape', isset($data) && !empty($data) && $data->handicape==true ? $data->handicape : '') == true ? 'checked' : '' }}>
                                                    <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Handicapé')}}
                                          </span>

                                                </label>

                                            </div>
                                            @include('alerts.feedback', ['field' => 'Handicape'])
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div
                                                class="form-group{{ $errors->has('compBanque') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="compBanque" >{{ __('C. bancaire') }}</label>
                                            <input type="text" id="compBanque" name="compBanque"
                                                   class="form-control{{ $errors->has('compBanque') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Compte bancaire') }}"
                                                   value="{{old('compBanque', isset($data) && !empty($data)? $data->Compte_bancaire : '') }}">
                                            @include('alerts.feedback', ['field' => 'compBanque'])
                                        </div>

                                        <div
                                                class="form-group{{ $errors->has('switf') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label for="switf" >{{ __('Swift') }}</label>
                                            <input type="text" id="switf" name="switf"
                                                   class="form-control{{ $errors->has('switf') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('code swift') }}"
                                                   value="{{old('switf', isset($data) && !empty($data)? $data->swift_etudiant : '') }}">
                                            @include('alerts.feedback', ['field' => 'switf'])
                                        </div>
                                    </div>

                                </fieldset>

                            </div>
                            <!--  <div class="card-footer">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <div class="button-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     </div>!-->
                            <div  class="col-md-4">

                              <fieldset class="form-group border p-3" >
                                <div class="form-row">

                                        <button type="reset"
                                                class="btn btn-fill btn-secondary col-md-3">{{ __('vider') }}</button>

                                        <button type="submit"
                                                class="btn btn-fill btn-success col-md-3">{{ __('Enregister') }}</button>

                                        <button type="submit"
                                                class="btn btn-fill btn-primary col-md-3">{{ __('Modifier') }}</button>

                                </div>

                                <div class="form-row">

                                        <button type="reset"
                                                class="btn btn-fill btn-danger col-md-3">{{ __('Supprimer') }}</button>

                                        <button type="submit"
                                                class="btn btn-fill btn-warning col-md-3">{{ __('Imprimer') }}</button>

                                        <button type="submit"
                                                class="btn btn-fill btn-info col-md-3">{{ __('Dossier') }}</button>

                                </div>
                                <div class="form-row">
                                    <div
                                            class="form-group{{ $errors->has('courbe') ? ' has-danger' : '' }} col-md-6 mt-5 ">
                                        <label for="courbe">{{ __('Courbe d\'abscences') }}</label>

                                        <textarea name="courbe" cols="50" rows="10">

                                        </textarea>

                                        @include('alerts.feedback', ['field' => 'courbe'])
                                    </div>

                                    <div class="form-row">

                                    <div
                                            class="form-group{{ $errors->has('notes') ? ' has-danger' : '' }} col-md-6 mt-5 ">
                                        <label for="notes">{{ __('Notes') }}</label>

                                        <textarea name="notes" cols="50" rows="10">

                                        </textarea>

                                        @include('alerts.feedback', ['field' => 'nomPere'])
                                    </div>
                                    </div>

                                </div>
                              </fieldset>
                            </div>


                        </div> @endisset
                        </div>

                </form>
            </div>

            <div id="dossier"  >

                <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h4 class="card-title">Recherche étudiant</h4>
                        </div>

                    </div>

                    <form method="post" action="{{ route('etudiant.search') }}" autocomplete="on">
                        @csrf
                        @method('post')

                        @include('alerts.success')

                       <fieldset class="form-group border p-3 ">


                            <div class="form-row">

                                <div class="form-group form-check-radio {{ $errors->has('rParMatricule') ? ' has-danger' : '' }} col-md-2  ">

                                    <div class="{{ $errors->has('rechechePar') ? ' has-danger' : '' }}">
                                        <label for="rParMatricule" class="form-check-label">
                                            <input class="form-check-radio ml-1" type="radio" id="rParMatricule" value="matricule"
                                                   {{ old('rechechePar',isset($input) ? $input['rechechePar'] : 'matricule') == 'matricule'  ? 'checked' : ''}} name="rechechePar">
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Matricule')}}
                                                 </span>
                                        </label>
                                        <input type="text" name="matricule" id="rParMatricule"
                                               class="form-control{{ $errors->has('matricule') ? ' is-invalid' : '' }} mt-2"
                                               placeholder="{{ __('MA xxx') }}"
                                               value="{{ old('matricule', isset($input) ? $input->matricule : '' ) }}" >
                                        @include('alerts.feedback', ['field' => 'matricule'])

                                    </div>
                                    @include('alerts.feedback', ['field' => 'matricule'])

                                </div>

                                <div class="form-group  form-check-radio {{ $errors->has('rParNom') ? ' has-danger' : '' }} col-md-2  ">

                                    <div class="">
                                        <label for="rParNom" class="form-check-label">
                                            <input class="form-check-radio ml-1" type="radio" id="rParNom" value="nom" name="rechechePar"
                                                    {{ old('rechechePar',isset($input) ? $input['rechechePar'] : 'nom') == 'nom'  ? 'checked' : ''}}>
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Nom')}}
                                                 </span>

                                        </label>
                                        <input type="text" name="nom" id="nom"
                                               class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }} mt-2"
                                               placeholder="{{ __('Nom ...') }}"
                                               value="{{ old('nom', isset($input) ? $input->nom : '' ) }}" >
                                        @include('alerts.feedback', ['field' => 'nom'])

                                    </div>
                                    @include('alerts.feedback', ['field' => 'nom'])

                                </div>

                                <div class="form-group form-check-radio{{ $errors->has('rParPrenom') ? ' has-danger' : '' }} col-md-2  ">

                                    <div class="">
                                        <label for="rParPrenom" class="form-check-label">
                                            <input class="form-check-radio" type="radio" id="rParPrenom" value="prenom" name="rechechePar"
                                                    {{ old('rechechePar',isset($input) ? $input['rechechePar'] : 'prenom') == 'prenom'  ? 'checked' : ''}} >
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Prénom')}}
                                                 </span>

                                        </label>
                                        <input type="text" name="prenom" id="rParPrenom"
                                               class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }} mt-2"
                                               placeholder="{{ __('Ex ... Hamza') }}" value="{{ old('prenom', isset($input) ? $input->prenom : '' ) }}" >
                                        @include('alerts.feedback', ['field' => 'prenom'])

                                    </div>
                                    @include('alerts.feedback', ['field' => 'prenom'])

                                </div>


                                <div class="form-group form-check-radio{{ $errors->has('rechechePar') ? ' has-danger' : '' }} col-md-2  ">
                                    <div class=" ">
                                        <label for="rParfilliere" class="form-check-label">
                                            <input class="form-check-radio ml-1" type="radio" id="rParfilliere" value="filiere" name="rechechePar"
                                                    {{ old('rechechePar',isset($input) ? $input['rechechePar'] : 'filiere') == 'filiere'  ? 'checked' : ''}} >
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Filière')}}
                                                 </span>

                                        </label>
                                            <select name="filiere"   id="rParfilliere"
                                                    class="form-control{{ $errors->has('filiere') ? ' is-invalid' : '' }} mt-2">
                                                <option selected>{{__('--Filière--')}}</option>
                                                @isset($filliere)
                                                    @foreach($filliere as $fill)
                                                        <option value="{{$fill->code_filiere}}"   {{ old('filiere', isset($input) && !empty($input) ? $input['filiere'] : $fill->code_filiere) ==$fill->code_filiere? 'selected': '' }}>{{$fill->Nom_filiere}}</option>
                                                    @endforeach

                                                 @endisset


                                            </select>
                                            @include('alerts.feedback', ['field' => 'filiere'])
                                    </div>
                                    @include('alerts.feedback', ['field' => 'filiere'])

                                </div>


                                <div class="form-group form-check-radio{{ $errors->has('rechechePar') ? ' has-danger' : '' }} col-md-2  ">
                                    <div class=" ">
                                        <label for="rParclasse" class="form-check-label">
                                            <input class="form-check-radio ml-1" type="radio" id="rParclasse" value="classe" name="rechechePar">
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Classe actuelle')}}
                                                 </span>

                                        </label>
                                        <select name="classe" id="rParclasse"
                                                class="form-control{{ $errors->has('classe') ? ' is-invalid' : '' }} mt-2">
                                            <option selected>{{__('-- Classe --')}}</option>

                                            @isset($filliere)
                                                @foreach($filliere as $fill)
                                                    <option value="{{$fill->code_classe}}"
                                                            {{ old('classe', isset($input) && !empty($input) ? $input['classe'] : $fill->code_classe) ==$fill->code_classe? 'selected': '' }}>
                                                        {{$fill->niveauClasse}} {{$fill->Nom_filiere}}
                                                    </option>
                                                @endforeach

                                            @endisset

                                        </select>
                                        @include('alerts.feedback', ['field' => 'classe'])
                                    </div>
                                    @include('alerts.feedback', ['field' => 'classe'])

                                </div>

                                <div class="form-group form-check-radio{{ $errors->has('rechechePar') ? ' has-danger' : '' }} col-md-2  ">
                                    <div class=" ">
                                        <label for="rGrp" class="form-check-label">
                                            <input class="form-check-radio ml-1" type="radio" id="rGrp" value="rParfilliere" name="rechechePar">
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Groupe')}}
                                                 </span>

                                        </label>
                                        <select name="classe" id="rParclasse"
                                                class="form-control{{ $errors->has('rGrp') ? ' is-invalid' : '' }} mt-2">
                                            <option value="volvo">Info</option>
                                            <option value="saab">Manag</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'rGrp'])
                                    </div>
                                    @include('alerts.feedback', ['field' => 'rGrp'])

                                </div>




                            </div>

                            <div class="form-row">
                                <div class="form-group form-check-radio{{ $errors->has('rechechePar') ? ' has-danger' : '' }} col-md-3  ">
                                    <div class=" ">
                                        <label for="rBlocage" class="form-check-label">
                                            <input class="form-check-radio ml-1" type="radio" id="rBlocage" value="rParfilliere" name="rechechePar">
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Blocage')}}
                                                 </span>

                                        </label>
                                        <select name="blocage"   id="rParfilliere"
                                                class="form-control{{ $errors->has('blocage') ? ' is-invalid' : '' }} mt-2">
                                            <option value="volvo">Info</option>
                                            <option value="saab">Manag</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'blocage'])
                                    </div>
                                    @include('alerts.feedback', ['field' => 'blocage'])

                                </div>

                                <div class="form-group form-check-radio{{ $errors->has('laureats') ? ' has-danger' : '' }} col-md-3">

                                    <div class="">
                                        <label class="form-check-label">
                                            <input class="form-check-radio " type="radio" value="" name="rechechePar">
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Lauréats uniquement')}}
                                          </span>

                                        </label>

                                    </div>
                                    @include('alerts.feedback', ['field' => 'laureats'])
                                </div>

                                <div class="form-group form-check-radio{{ $errors->has('Tous') ? ' has-danger' : '' }} col-md-3  ">

                                    <div class="">
                                        <label class="form-check-label">
                                            <input class="form-check-radio " type="radio" value="" name="rechechePar">
                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__('Tous')}}
                                          </span>

                                        </label>

                                    </div>
                                    @include('alerts.feedback', ['field' => 'Tous'])
                                </div>

                                <div class="form-group form-check-radio{{ $errors->has('Tous') ? ' has-danger' : '' }} col-md-3">

                                    <button class="btn btn-info">
                                        <i class="tim-icons icon-refresh-02"></i>
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>




                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">


                                <tr>
                                    <th scope="col">{{ __('Noms') }}</th>
                                    <th scope="col">{{ __('Adresse Act.') }}</th>
                                    <th scope="col">{{ __('Nationalité') }}</th>
                                    <th scope="col">{{ __('Ville') }}</th>
                                    <th scope="col">{{ __('Date de nais.') }}</th>
                                    <th scope="col">{{ __('Tél personel') }}</th>

                                    <th scope="col">{{ __('Action') }}</th>

                                </tr>



                            </thead>
                            <tbody>

                                @isset($students)

                                @foreach ($students as  $student)
                                    <tr>
                                        <td>{!! $student->Nom_etudiant !!} {!! $student->prenom_etudiant !!} </td>
                                        <td>{!! $student->Adresse_actuelle !!}</td>
                                        <td>{!! $student->Nationalité !!}</td>
                                        <td>{!! $student->Ville !!}</td>
                                        <td>{!! $student->Date_naissance !!}</td>
                                        <td>{!! $student->Telephone_personnel !!}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" type="button" href="{{route('etudiant.show', [$student->code_etudiant] )}}">{{__('Voir')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Voir')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Voir')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Voir')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Voir')}}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                                    @endisset

                                @if(isset($students) && empty($students))
                                    <tr>
                                        <td colspan="7">
                                            <p class="text-center">{{__('Aucune donnée trouvée')}}</p>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
                </div> </div>
            <!-- <div class="card">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="card-header">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h5 class="title">{{ __('Password') }}</h5>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="card-body">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @csrf
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @method('put')

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @include('alerts.success', ['key' => 'password_status'])

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <label>{{ __('Current Password') }}</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @include('alerts.feedback', ['field' => 'old_password'])
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <label>{{ __('New Password') }}</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @include('alerts.feedback', ['field' => 'password'])
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <label>{{ __('Confirm New Password') }}</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="card-footer">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Change password') }}</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </form>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>--!>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
@endsection
