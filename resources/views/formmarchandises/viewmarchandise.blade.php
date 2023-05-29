@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Marchandise</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Informations generales</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr><td>Nature</td><td>{{ $marchandise->nature }}</td></tr>
                                                <tr><td>Valeur</td><td>{{ $marchandise->valeur }}</td></tr>
                                                <tr><td>Origine</td><td>{{ $marchandise->origine }}</td></tr>
                                                <tr><td>Destination</td><td>{{ $marchandise->destination }}</td></tr>
                                                <tr><td>Poids brut</td><td>{{ $marchandise->poids_brut }}</td></tr>
                                                <tr><td>Poids net</td><td>{{ $marchandise->poids_net }}</td></tr>
                                                <tr><td>Longueur</td><td>{{ $marchandise->longueur }}</td></tr>
                                                <tr><td>Largeur</td><td>{{ $marchandise->largeur }}</td></tr>
                                                <tr><td>Hauteur</td><td>{{ $marchandise->hauteur }}</td></tr>
                                                <tr><td>Description</td><td>{{ $marchandise->description }}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection