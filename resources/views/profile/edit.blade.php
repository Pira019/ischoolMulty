@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Edit Profile') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')

                            <div class="row">
                                <div class="col-md-8">
                                    <fieldset>

                                        <legend class="title">  {{ __('Information de base') }}</legend>
                                     <div class="form-row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Nom de l\'étudiant') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Prénom') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="filliere">{{ __('Fillière') }}</label>
                                            <select name="name" id="filliere" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}"  >
                                                <option value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option value="mercedes">Mercedes</option>
                                            </select>
                                              @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                     </div>
                                     <div class="form-row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="filliere">{{ __('Classe') }}</label>
                                            <select name="name" id="filliere" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}"  >
                                                <option value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option value="mercedes">Mercedes</option>
                                            </select>
                                              @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('CIN') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Gsm étudiant') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                     </div>
                                     <div class="form-row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Groupe') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Email personnel') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Email école') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                     </div>

                                     <div class="form-row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Adresse étudiant') }}</label>
                                            <textarea type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                            </textarea>
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Date de naissance') }}</label>
                                            <input type="date" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Ville de naissance') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                     </div>
                                     <div class="form-row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Ville') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Nationalité') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label for="Sexe">{{ __('Sexe') }}</label>
                                            <select name="name" id="Sexe" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}"  >
                                                <option value="Masculin">{{ __('Masculin') }}</option>
                                                <option value="Féminn">{{ __('Féminn') }}</option>
                                                <option value="Autre">{{ __('Autre') }}</option>
                                            </select>
                                              @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                     </div>
                                    </fieldset>

                                    <fieldset>

                                        <legend class="title">  {{ __('Autres') }}</legend>
                                        <div class="form-row">
                                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">

                                            <label class="form-check-label">{{ __('Actif') }}</label>
                                            <input type="checkbox" name="name" class="form-check-input p-3 {{ $errors->has('name') ? ' is-invalid' : '' }}"  >
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 mb-3 ">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                     </div>

                                    </fieldset>
                                </div>




                                <div class="col-md-4">
                                    <fieldset>

                                        <legend class="title">  {{ __('Informations supplementaires') }}</legend>

                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                        <div class="author">
                                            <a href="#">
                                                <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg" alt="">
                                            </a>

                                            </p>

                                         </div>
                                        </div>
                                    </div>
                                         <div class="form-row">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                                @include('alerts.feedback', ['field' => 'name'])
                                            </div>

                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                                @include('alerts.feedback', ['field' => 'name'])
                                            </div>
                                         </div>

                                         <div class="form-row">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                                @include('alerts.feedback', ['field' => 'name'])
                                            </div>

                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                                @include('alerts.feedback', ['field' => 'name'])
                                            </div>

                                         </div>


                                         <div class="form-row">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                                @include('alerts.feedback', ['field' => 'name'])
                                            </div>

                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6 mb-3 ">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
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
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Attest d inscription') }}</button>
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Att de reussite') }}</button>
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Aut de tournage') }}</button>
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Fiche etudiant') }}</button>
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Fiches d abscences') }}</button>


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
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>




                    </div>

                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                <th scope="col">{{ __('Nom') }}</th>
                                <th scope="col">{{ __('Prénom') }}</th>
                                <th scope="col">{{ __('Nationalité') }}</th>

                                <th scope="col">{{ __('Ville') }}</th>
                                <th scope="col">{{ __('Date de naissance') }}</th>
                                <th scope="col">{{ __('Tél') }}</th>

                                <th scope="col">{{ __('Tél parent') }}</th>
                                <th scope="col">{{ __('Action') }}</th>

                                <th scope="col"></th>
                            </tr></thead>
                            <tbody>
                                                                    <tr>
                                        <td>Admin Admin</td>
                                        <td>Admin Admin</td>
                                        <td>Admin Admin</td>
                                        <td>Admin Admin</td>
                                        <td>Admin Admin</td>
                                        <td>
                                            <a href="mailto:admin@black.com">admin@black.com</a>
                                        </td>
                                        <td>24/02/2020 16:47</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                                    <a class="dropdown-item" href="#">Edit</a>
                                                                                                            </div>
                                                </div>
                                        </td>
                                    </tr>
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
