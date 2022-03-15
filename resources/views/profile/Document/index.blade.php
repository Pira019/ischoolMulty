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
                                @include('alerts.success')
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

                    <div class="table-wrapper-scroll-y my-custom-scrollbar table">
                        <table class="table table-bordered table-striped mb-0" id="" style="overflow: auto; max-height: 400px;">
                            <thead class=" text-primary">


                            <tr>

                                <th scope="col">{{ __('Titre') }}</th>
                                <th scope="col">{{ __('Année') }}</th>
                                <th scope="col">{{ __('Date demande') }}</th>
                                <th scope="col">{{ __('Date Traitement') }}</th>
                                <th scope="col">{{ __('Statut') }}</th>
                                <th scope="col">{{ __('Action') }}</th>


                            </tr>


                            </thead>
                            <tbody>

                            @isset($documents_rqt)

                                @forelse($documents_rqt  as $list )

                                    <tr>

                                        <td>{{__( $list->name)}}</td>
                                        <td>{{__( $list->annee)}}</td>
                                        <td>{{ isset($list->created_at) ? date('d-m-Y',strtotime($list->created_at)) : ''}}</td>
                                        <td>{{ isset($list->created_at) ? date('d-m-Y',strtotime($list->created_at)) : ''}}</td>
                                        <td>{{ $list->status}}</td>
                                        <td>
                                        <button  disabled class="btn btn-info">{{__('Annuler')}}</button>
                                        </td>

                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="5">
                                            <p class="text-center">{{__('Aucune demande '.session('annee') )}}</p>
                                        </td>
                                    </tr>

                                @endforelse


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
