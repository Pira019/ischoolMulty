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
                                        <option value="" selected >{{__('Selection filière')}}</option>
                                        @if ($data)
                                            @foreach ($getclassModuleProf->unique('codeFiliere') as $codeFiliere)
                                                <option value="{{ $codeFiliere->codeFiliere }}"
                                                    {{ old('fil', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['fil'] : '') ==$codeFiliere->codeFiliere? 'selected': '' }}>
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
                                          <option value="{{old('cls',$classStudent->code_classe)}}" {{ old('cls', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['cls'] : '') == $classStudent->code_classe? 'selected': '' }}>
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
                                           @forelse($profs->unique('CodePersonnel') as $prof)
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
                                    <select id="module" name="module" onchange="javascript:this.form.submit()"
                                            class="form-control{{ $errors->has('module') ? ' is-invalid' : '' }}">
                                        <option value="">{{__('Choisissez module')}}</option>
                                        @isset($modules)
                                            @forelse($modules as $module)
                                                <option value="{{old('module',$module->code_module)}}"
                                                        {{ old('module', isset($dataRqt) && !empty($dataRqt) ? $dataRqt['module'] : $module->code_module) == $module->code_module? 'selected': '' }}>
                                                    {{$module->nom_module}}
                                                </option>
                                            @empty
                                                <option value="">--Aucun-</option>

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
                                <form method="post"  >
                                    @csrf
                                    @method('post')

                                    @include('alerts.success')
                                    @include('alerts.feedback', ['field' => 'module'])
                                    <script>
                                        function changeAction(val) {
                                            document.forms[0].action = val;
                                        }

                                        </script>

                                    <div class="col-md-12 text-white">
                                        <div class="row">
                                            <div class="center">
                                            <button type="reset" class="btn btn-fill btn-primary " value="update" >Vider</button>
                                                @if(isset($dataRqt['module']) && !empty($dataRqt['module']) ? $dataRqt['module'] : '')
                                                    <button formaction="{{route('evaluation.store')}}" type="submit"   class="btn btn-fill btn-primary"  name="submit">{{__('Enregister')}}</button>
                                                @endif

                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-4">
                                        <p> {{__('Code classe : ')}}{{ isset($dataRqt) && !empty($dataRqt) ? $dataRqt['cls'] : ''}} </p>
                                        <p>  {{__('Nombre Etudiant(e) : '). count($students->unique('code_etudiant'))}} </p>
                                        <p>  {{__('Filière : '). $dataRqt['fil']}} </p>
                                    </div>

                                @foreach ($students->unique('code_etudiant') as  $student)

                                    <input type="hidden" name="code_etudiant[]" value="{{$student->code_etudiant}}">
                                    <input type="hidden" name="code_filliere" value="{{ isset($dataRqt) && !empty($dataRqt) ? $dataRqt['fil'] : ''}}">
                                    <input type="hidden" name="code_Evaluation[]" value="{{ $student->codeEvaluation}}">
                                    <input type="hidden" name="annee_Universitaire[]" value="{{session('annee')}}">
                                    <input type="hidden" name="cls" value=" {{isset($dataRqt) && !empty($dataRqt) ? $dataRqt['cls'] : ''}}">
                                    <input type="hidden" name="prof" value="{{isset($dataRqt) && !empty($dataRqt) ? $dataRqt['prof'] : ''}}">
                                    <input type="hidden" name="date" value="{{isset($dataRqt) && !empty($dataRqt) ? $dataRqt['date'] : ''}}">
                                    <input type="hidden" name="module" value="{{isset($dataRqt) && !empty($dataRqt) ? $dataRqt['module'] : ''}}">
                                    <input type="hidden" name="name[]" value="{{strtoupper($student->Nom_etudiant)}}">


                                    <tr>

                                        <td> {!! strtoupper($student->Nom_etudiant) !!} {!! ucfirst(strtolower( $student->prenom_etudiant)) !!}  </td>
                                        <td>  <input type="text" name="cc1[]" id="cc1"
                                                     class="form-control{{ $errors->has('cc1') ? ' is-invalid' : '' }}"
                                                     placeholder="{{ __('CC1') }}"
                                                     value="{{ old('cc1', $student->CC1) }}">
                                            @include('alerts.feedback', ['field' => 'cc1'])
                                        </td>
                                        <td>
                                            <input type="text" name="cc2[]" id="cc2"
                                                   class="form-control{{ $errors->has('cc2') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('CC2') }}"
                                                   value="{{ old('cc2', $student->CC2) }}">
                                            @include('alerts.feedback', ['field' => 'cc2'])
                                        </td>
                                        <td><input type="text" name="cc3[]" id="cc3"
                                                   class="form-control{{ $errors->has('cc3') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('CC3') }}"
                                                   value="{{ old('cc3', $student->CC3) }}">
                                            @include('alerts.feedback', ['field' => 'cc3'])
                                        </td>
                                        <td><input type="text" name="cc4[]" id="cc4"
                                                   class="form-control{{ $errors->has('cc4') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('CC4') }}"
                                                   value="{{ old('cc4', $student->CC4) }}">
                                            @include('alerts.feedback', ['field' => 'cc4'])
                                        </td>
                                        <td>
                                            <input type="text" name="efmt[]" id="efmt"
                                                   class="form-control{{ $errors->has('efmt') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Efmt') }}"
                                                   value="{{ old('efmt', $student->Efm) }}">
                                            @include('alerts.feedback', ['field' => 'efmt'])
                                        </td>

                                        <td>
                                            <input type="text" name="efmp[]" id="efmp"
                                                   class="form-control{{ $errors->has('efmp') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Efmp') }}"
                                                   value="{{ old('efmt', $student->Efm) }}">
                                            @include('alerts.feedback', ['field' => 'efmp'])
                                        </td>

                                        <td>
                                            <input type="text" name="moyenne" id="moyenne"
                                                   class="form-control{{ $errors->has('moyenne') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Moyenne') }}"
                                                   value="{{ old('moyenne', $student->Efm) }}">
                                            @include('alerts.feedback', ['field' => 'moyenne'])
                                        </td>

                                      <!--  <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

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
                                        </td>-->
                                    </tr>
                                @endforeach

                                    </form>

                                @if( count($students) == 0)
                                    <tr>
                                        <td colspan="9">
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
