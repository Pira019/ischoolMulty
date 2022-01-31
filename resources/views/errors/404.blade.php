@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-body">

                        <div class="">
                            <br>
                            <div class="col-sm-offset-4 col-sm-4">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Il y a un problème !</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Nous sommes désolés mais la page que vous désirez n'existe pas...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>

            @endsection
