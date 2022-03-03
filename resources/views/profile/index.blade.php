@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'Pedagogie'])

@php
$data = false;
if (isset($getclassModuleProf)) {
    $data = true;

    //get niveau classe
}

@endphp

<script>
    document.getElementById('date').value = new Date().toDateInputValue();
</script>


@section('content')
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __($title) }}</h4>
                        </div>
                    </div>


                    <form method="get" action="{{ route('evaluation.create') }}" autocomplete="off">
                        <div class="card-body">
                            @csrf
                            @method('get')


                            <div class="form-row">
                                <div class="form-group{{ $errors->has('fil') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label for="fil">{{ __('Fillière') }}</label>
                                    <select id="fil" name="fil" onchange="javascript:this.form.submit()"
                                        class="form-control{{ $errors->has('fil') ? ' is-invalid' : '' }}">
                                        @if ($data)
                                            @foreach ($getclassModuleProf->unique('codeFiliere') as $codeFiliere)
                                                <option value="{{ $codeFiliere->codeFiliere }}"
                                                    {{ old('fil', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['fil'] : $codeFiliere->codeFiliere) ==$codeFiliere->codeFiliere? 'selected': '' }}>
                                                    {{ ucfirst($codeFiliere->codeFiliere) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

                                    @include('alerts.feedback', ['field' => 'fil'])
                                </div>



                                <div class="form-group{{ $errors->has('cls') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label for="cls">{{ __('Classe') }}</label>
                                  <select id="cls" name="cls" onchange="javascript:this.form.submit()" title="Niveau classe"
                                        class="form-control{{ $errors->has('cls') ? ' is-invalid' : '' }}">
                                      <option value="">{{__('Choisissez une classe')}}</option>
                                      @isset($getClasses)
                                      @forelse($getClasses as  $classStudent)
                                          <option value="{{old('cls',$classStudent->code_classe)}}" {{ old('cls', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['cls'] : $classStudent->code_classe) == $classStudent->code_classe? 'selected': '' }}>
                                               {{$classStudent->niveauClasse}}</option>
                                          @empty
                                              <option value="">Aucune classe</option>
                                       @endforelse
                                      @endisset
                                    </select>

                                    @include('alerts.feedback', ['field' => 'cls'])
                                </div>


                                <div class="form-group{{ $errors->has('grp') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label for="grp">{{ __('Groupe') }}</label>
                                    <select id="grp" name="grp"
                                        class="form-control{{ $errors->has('grp') ? ' is-invalid' : '' }}">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'grp'])
                                </div>

                                <div class="form-group{{ $errors->has('prof') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label for="prof">{{ __('Professeur') }}</label>
                                    <select id="prof" name="prof" onchange="javascript:this.form.submit()"
                                            class="form-control{{ $errors->has('prof') ? ' is-invalid' : '' }}">
                                        <option value="">{{__('Choisissez le professeur')}}</option>
                                        @isset($profs)
                                           @forelse($profs as $prof)
                                        <option value="{{old('prof',$prof->CodePersonnel)}}"
                                                    {{ old('prof', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['prof'] : $prof->CodePersonnel) == $prof->CodePersonnel? 'selected': '' }}>

                                            {{$prof->NomPersonnel.' '.$prof->PrenomPersonnel}}
                                        </option>
                                        @empty
                                               <option>--Vide-</option>
                                            @endforelse
                                        @endisset

                                    </select>
                                    @include('alerts.feedback', ['field' => 'prof'])
                                </div>

                                <div class="form-group{{ $errors->has('module') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label for="module">{{ __('Module') }}</label>
                                    <select id="module" name="module"
                                            class="form-control{{ $errors->has('sem') ? ' is-invalid' : '' }}">
                                        @isset($modules)
                                            @forelse($modules as $module)
                                                <option value="{{'old',$module->code_module}}"
                                                        {{ old('module', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['module'] : $module->code_module) == $module->code_module? 'selected': '' }}>
                                                    {{$module->nom_module}}
                                                </option>
                                            @empty
                                                <option>--Aucun-</option>

                                            @endforelse
                                        @endisset
                                    </select>
                                    @include('alerts.feedback', ['field' => 'module'])
                                </div>

                                <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label>{{ __('Date') }}</label>
                                    <input type="date" id="date" name="date"
                                           class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('date') }}" value="<?php echo e(old('date', isset($dataRqt) && !empty($dataRqt) ? date('Y-m-d', strtotime($dataRqt['date'])) : date('Y-m-d'))); ?>">
                                    @include('alerts.feedback', ['field' => 'date'])
                                </div>

                                <input name="annee" value="2021/2022" type="hidden">
                            </div>
                        </div>
                    </form>



            </div>

            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <style>
                        .my-custom-scrollbar {
                            position: relative;
                            height: 500px;
                            overflow: auto;
                        }
                        .table-wrapper-scroll-y {
                            display: block;
                        }
                    </style>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-bordered table-striped mb-0" id="" style="overflow: auto; max-height: 400px;">
                            <thead class=" text-primary">


                            <tr>
                                <th scope="col"></th>
                                <th scope="col">{{ __('Noms') }}</th>
                                <th scope="col">{{ __('CC1') }}</th>
                                <th scope="col">{{ __('CC2') }}</th>
                                <th scope="col">{{ __('CC3') }}</th>
                                <th scope="col">{{ __('CC4') }}</th>
                                <th scope="col">{{ __('Efmt') }}</th>
                                <th scope="col">{{ __('EfmP') }}</th>
                                <th scope="col">{{ __('Moyenne') }}</th>

                                <th scope="col"> </th>

                            </tr>



                            </thead>
                            <tbody>

                            @isset($students)

                                @foreach ($students as  $student)
                                    <tr>
                                        <td> {!! strtoupper($student->Nom_etudiant) !!} {!! ucfirst(strtolower( $student->prenom_etudiant)) !!}  </td>
                                        <td>{!! ucfirst(strtolower($student->Adresse_actuelle)) !!}</td>
                                        <td>{!! ucfirst(strtolower($student->Nationalité )) !!}</td>
                                        <td>{!! ucfirst(strtolower($student->Ville ))!!}</td>
                                        <td>{!! $student->Date_naissance ? date('d-m-Y',strtotime($student->Date_naissance)) :'' !!}</td>
                                        <td>{!! $student->Telephone_personnel !!}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" type="button" href="{{route('etudiant.show', [$student->code_etudiant] )}}">{{__('Voir')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Att. Inscription')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Att. Scolarité')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Att. Réussite')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Att. Réussite')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Att. Tournage')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Fiche Etudiant')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Fiche de suivi')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Fiche d\'abscence')}}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach



                                @if( count($students) == 0)
                                    <tr>
                                        <td colspan="7">
                                            <p class="text-center">{{__('Aucune donnée trouvée')}}</p>
                                        </td>
                                    </tr>
                                @endif

                            @endisset



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
