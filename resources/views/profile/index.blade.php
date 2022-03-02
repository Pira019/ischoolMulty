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
                                            @foreach ($getclassModuleProf as $codeFiliere)
                                                <option value="{{ $codeFiliere->codeFiliere }}"
                                                    {{ old('fil', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['fil'] : $codeFiliere->codeFiliere) ==$codeFiliere->codeFiliere? 'selected': '' }}>
                                                    {{ ucfirst($codeFiliere->codeFiliere) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

                                    @include('alerts.feedback', ['field' => 'fil'])
                                </div>



                                <div class="form-group{{ $errors->has('class') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label for="cls">{{ __('Classe') }}</label>

                                  <select id="cls" name="cls"
                                        class="form-control{{ $errors->has('cls') ? ' is-invalid' : '' }}">

                                      @isset($getClasses)
                                      @foreach($getClasses as  $classStudent)
                                          <option>{{$classStudent->niveauClasse}}</option>
                                       @endforeach
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

                                <div class="form-group{{ $errors->has('sem') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label for="sem">{{ __('Professeur') }}</label>
                                    <select id="sem" name="sem"
                                            class="form-control{{ $errors->has('sem') ? ' is-invalid' : '' }}">
                                        <option value="1">1</option
                                                {{ old('sem', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['sem'] : 'sem') == 1 ? 'selected' : '' }}>
                                        >
                                        <option value="2"
                                                {{ old('sem', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['sem'] : 'sem') == 2 ? 'selected' : '' }}>
                                            2</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'sem'])
                                </div>

                                <div class="form-group{{ $errors->has('sem') ? ' has-danger' : '' }} col-md-2 mb-3 ">
                                    <label for="sem">{{ __('Professeur') }}</label>
                                    <select id="sem" name="sem"
                                            class="form-control{{ $errors->has('sem') ? ' is-invalid' : '' }}">
                                        <option value="1">1</option
                                                {{ old('sem', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['sem'] : 'sem') == 1 ? 'selected' : '' }}>
                                        >
                                        <option value="2"
                                                {{ old('sem', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['sem'] : 'sem') == 2 ? 'selected' : '' }}>
                                            2</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'sem'])
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
