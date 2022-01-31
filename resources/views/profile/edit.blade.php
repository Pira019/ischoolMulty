@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Edit Profile') }}</h5>
                </div>
                <form method="post" action="{{ route('etudiant.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('post')

                        @include('alerts.success')

                        <div class="row">
                            <div class="col-md-8">
                                <fieldset>

                                    <legend class="title"> {{ __('Information de base') }}</legend>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Nom de l\'étudiant') }}</label>
                                            <input type="text" name="Nom_etudiant"
                                                class="form-control{{ $errors->has('Nom_etudiant') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Nom etudiant') }}"
                                                value="{{ old('Nom_etudiant', '') }}">
                                            @include('alerts.feedback', ['field' => 'Nom_etudiant'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('prenom_etudiant') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Prénom') }}</label>
                                            <input type="text" name="prenom_etudiant"
                                                class="form-control{{ $errors->has('prenom_etudiant') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('prenom_etudiant') }}"
                                                value="{{ old('prenom_etudiant', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'prenom_etudiant'])
                                        </div>
                                        <div
                                            class="form-group{{ $errors->has('Filiere') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="filliere">{{ __('Fillière') }}</label>
                                            <select name="Filiere" id="filliere"
                                                class="form-control{{ $errors->has('Filiere') ? ' is-invalid' : '' }}">
                                                <option value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option value="mercedes">Mercedes</option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'Filiere'])
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('classe_actuelle') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="classe_actuelle">{{ __('Classe') }}</label>
                                            <select name="classe_actuelle" id="classe_actuelle"
                                                class="form-control{{ $errors->has('classe_actuelle') ? ' is-invalid' : '' }}">
                                                <option value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option value="mercedes">Mercedes</option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'classe_actuelle'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('cin_etudiant') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('CIN') }}</label>
                                            <input type="text" name="cin_etudiant"
                                                class="form-control{{ $errors->has('cin_etudiant') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('cin_etudiant', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'cin_etudiant'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('Telephone_personnel') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Gsm étudiant') }}</label>
                                            <input type="text" name="Telephone_personnel"
                                                class="form-control{{ $errors->has('Telephone_personnel') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Gsm étudiant') }}"
                                                value="{{ old('Telephone_personnel', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'Telephone_personnel'])
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('groupe') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Groupe') }}</label>
                                            <input type="text" name="groupe"
                                                class="form-control{{ $errors->has('groupe') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Groupe') }}"
                                                value="{{ old('groupe', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'groupe'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('email_ecole') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Email personnel') }}</label>
                                            <input type="text" name="email_ecole"
                                                class="form-control{{ $errors->has('email_ecole') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Email personnel') }}"
                                                value="{{ old('email_ecole', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'email_ecole'])
                                        </div>
                                        <div
                                            class="form-group{{ $errors->has('Email école') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Email école') }}</label>
                                            <input type="text" name="email_ecole"
                                                class="form-control{{ $errors->has('Email école') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Email école') }}"
                                                value="{{ old('email_ecole', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'email_ecole'])
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('Adresse_actuelle') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Adresse étudiant') }}</label>
                                            <textarea type="text" name="Adresse_actuelle"
                                                class="form-control{{ $errors->has('Adresse_actuelle') ? ' is-invalid' : '' }}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </textarea>
                                            @include('alerts.feedback', ['field' => 'Adresse_actuelle'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Date de naissance') }}</label>
                                            <input type="date" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                        <div
                                            class="form-group{{ $errors->has('Date_naissance') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Ville de naissance') }}</label>
                                            <input type="text" name="Date_naissance"
                                                class="form-control{{ $errors->has('Date_naissance') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Date_naissance') }}"
                                                value="{{ old('Date_naissance', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'Date_naissance'])
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('Ville') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Ville') }}</label>
                                            <input type="text" name="Ville"
                                                class="form-control{{ $errors->has('Ville') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Ville') }}"
                                                value="{{ old('Ville', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'Ville'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('Nationalité') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Nationalité') }}</label>
                                            <input type="text" name="Nationalité"
                                                class="form-control{{ $errors->has('Nationalité') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Nationalité') }}"
                                                value="{{ old('Nationalité', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'Nationalité'])
                                        </div>
                                        <div
                                            class="form-group{{ $errors->has('Sexe') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="Sexe">{{ __('Sexe') }}</label>
                                            <select name="Sexe" id="Sexe"
                                                class="form-control{{ $errors->has('Sexe') ? ' is-invalid' : '' }}">
                                                <option value="Masculin">{{ __('Masculin') }}</option>
                                                <option value="Féminn">{{ __('Féminn') }}</option>
                                                <option value="Autre">{{ __('Autre') }}</option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'Sexe'])
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>

                                    <legend class="title"> {{ __('Autres') }}</legend>
                                    <div class="form-row">
                                        <div
                                            class="form-group {{ $errors->has('actif') ? ' has-danger' : '' }} col-md-4 mb-3 ">

                                            <label class="form-check-label">{{ __('Actif') }}</label>
                                            <input type="checkbox" name="actif"
                                                class="form-check-input p-3 {{ $errors->has('actif') ? ' is-invalid' : '' }}">
                                            @include('alerts.feedback', ['field' => 'actif'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>

                                </fieldset>
                            </div>




                            <div class="col-md-4">
                                <fieldset>

                                    <legend class="title"> {{ __('Informations supplementaires') }}</legend>

                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <a href="#">
                                                    <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg"
                                                        alt="">
                                                </a>

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                    </div>


                                    <div class="form-row">
                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                    </div>



                                </fieldset>

                            </div>
                            <!--  <div class="card-footer">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="button-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <button class="btn btn-icon btn-round btn-facebook">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <i class="fab fa-facebook"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <button class="btn btn-icon btn-round btn-twitter">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <i class="fab fa-twitter"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <button class="btn btn-icon btn-round btn-google">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <i class="fab fa-google-plus"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>!-->


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Vider') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Enregistrer') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Modifier') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Supprimer') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Imprimer') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Dossier') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Att scolarité') }}</button>
                            <button type="submit"
                                class="btn btn-fill btn-primary">{{ __('Attest d inscription') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Att de reussite') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Aut de tournage') }}</button>
                            <button type="submit" class="btn btn-fill btn-primary">{{ __('Fiche etudiant') }}</button>
                            <button type="submit"
                                class="btn btn-fill btn-primary">{{ __('Fiches d abscences') }}</button>


                        </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Recherche étudiant</h4>
                        </div>
                        <div class="col-4 text-right">

                            <a href="#" class="btn btn-sm btn-primary">Add user</a>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>




                    </div>

                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">


                                <tr>
                                    <th scope="col">{{ __('Noms') }}</th>
                                    <th scope="col">{{ __('Nationalité') }}</th>

                                    <th scope="col">{{ __('Ville') }}</th>
                                    <th scope="col">{{ __('Date de naissance') }}</th>
                                    <th scope="col">{{ __('Tél') }}</th>

                                    <th scope="col">{{ __('Tél parent') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>

                                    <th scope="col"></th>
                                </tr>



                            </thead>
                            <tbody>

                                @foreach ($students as $student)
                                    <tr>
                                        <td>{!! $student->Nom_etudiant !!} {!! $student->prenom_etudiant !!} </td>
                                        <td>{!! $student->Nationalité !!}</td>
                                        <td>{!! $student->ville !!}</td>
                                        <td>{!! $student->Date_naissance !!}</td>
                                        <td>{!! $student->Telephone_personnel !!}</td>
                                        <td>{!! $student->Telephone_pere !!}</td>
                                        <td>
                                            <a href="mailto:admin@black.com">{!! $student->email_ecole !!}</a>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
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
