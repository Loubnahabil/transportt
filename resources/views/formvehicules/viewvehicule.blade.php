@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Vehicule</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Informations generales</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr><td>N° Immatriculation</td><td>{{ $vehicule->matricule }}</td></tr>
                                                <tr><td>Marque</td><td>{{ $vehicule->marque }}</td></tr>
                                                <tr><td>Type</td><td>{{ $vehicule->type }}</td></tr>
                                                <tr><td>Genre</td><td>{{ $vehicule->genre }}</td></tr>
                                                <tr><td>Modele</td><td>{{ $vehicule->modele }}</td></tr>
                                                <tr><td>Carburant</td><td>{{ $vehicule->carburant }}</td></tr>
                                                <tr><td>Premiére Mise en Ciculation</td><td>{{ $vehicule->date_circulation }}</td></tr>
                                                <tr><td>M.C au Maroc</td><td>{{ $vehicule->mc }}</td></tr>
                                                <tr><td>Mutation le</td><td>{{ $vehicule->mutation }}</td></tr>
                                                <tr><td>Date de validité</td><td>{{ $vehicule->validite_date }}</td></tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Plus d'informations</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr><td>Propriétaire</td><td>{{ $vehicule->proprietaire }}</td></tr>
                                                <tr><td>N° du chassis</td><td>{{ $vehicule->n_chassis }}</td></tr>
                                                <tr><td>Nbre cylindres</td><td>{{ $vehicule->nbre_cylindres }}</td></tr>
                                                <tr><td>Puissance fiscale</td><td>{{ $vehicule->puissance }}</td></tr>
                                                <tr><td>P.T.A.C</td><td>{{ $vehicule->ptac }}</td></tr>
                                                <tr><td>Poids à vide</td><td>{{ $vehicule->poids }}</td></tr>
                                                <tr><td>P.T.M.C.T</td><td>{{ $vehicule->ptmct }}</td></tr>

                                                
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