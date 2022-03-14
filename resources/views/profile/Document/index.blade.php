@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'document'])

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

   @if(isset($create) && $create == true)
                    <form method="post" action="{{ route('document.store') }}" autocomplete="off">
                        <div class="card-body">
                            @csrf
                            @method('post')


                            <div class="form-row">

                                <div class="form-check{{ $errors->has('doc') ? ' has-danger' : '' }} col-md-12   ">
                                    @foreach($documents as $list)
                                        <section class="mt-2">
                                        <label class="form-check-label">
                                            <input class="form-check-input {{ $errors->has('doc') ? ' has-danger' : '' }}" type="checkbox" name="doc[]"
                                                   value="{{old('doc',$list->id)}}">

                                            <span class="form-check-sign"> <span class="check"></span>
                                                         {{__($list->name)}}
                                          </span>
                                        </label>

                                        </section>
                                        @endforeach
                                </div>
                                @include('alerts.feedback', ['field' => 'doc'])
                        </div>
                            <div class="mt-3">
                                <button class="btn btn-success">{{__('Validé')}}</button>
                            </div>
                        </div>
                    </form>
@endisset


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

                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">
                                <a href="{{route('document.create')}}" class="btn btn-primary">{{ __('Nouvelle demande +') }}</a>
                            </h4>

                        </div>
                    </div>

                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-bordered table-striped mb-0" id="" style="overflow: auto; max-height: 400px;">
                            <thead class=" text-primary">


                            <tr>

                                <th scope="col">{{ __('Titre') }}</th>
                                <th scope="col">{{ __('Année') }}</th>
                                <th scope="col">{{ __('Date demande') }}</th>
                                <th scope="col">{{ __('Date Traitement') }}</th>
                                <th scope="col">{{ __('Statut') }}</th>


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
