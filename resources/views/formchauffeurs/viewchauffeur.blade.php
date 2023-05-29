@extends('layouts.master')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Chauffeur</h3>
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
                                            <h5 class="card-title">
                                                <span>Informations personelles</span>
                                            </h5><br>
                                            <div class="row justify-content-center">
                                                @if($chauffeur->image)
                                                    <img src="{{ asset('images/'.$chauffeur->image) }}" alt="Chauffeur Image" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; border: 4px solid #ddd; margin-bottom: 20px;">
                                                @else
                                                    <img src="{{ asset('images/default.png') }}" alt="Default Image" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; border: 4px solid #ddd; margin-bottom: 20px;">
                                                @endif
                                            </div>
                                            <table class="table table-striped mt-5">
                                                <tr><td>Nom</td><td>{{ $chauffeur->Nom }}</td></tr>
                                                <tr><td>Prenom</td><td>{{ $chauffeur->Prenom }}</td></tr>
                                                <tr><td>CIN</td><td>{{ $chauffeur->CIN }}</td></tr>
                                                <tr><td>Telephone</td><td>{{ $chauffeur->Télé }}</td></tr>
                                                <tr><td>Sexe</td><td>{{ $chauffeur->Sexe }}</td></tr>
                                                <tr><td>Nationalite</td><td>{{ $chauffeur->Nationalité }}</td></tr>
                                                <tr><td>Adresse</td><td>{{ $chauffeur->Adresse }}</td></tr>
                                                <tr><td>Ville</td><td>{{ $chauffeur->Ville }}</td></tr>
                                                <tr><td>Date naissance</td><td>{{ $chauffeur->Date_de_naissance }}</td></tr>
                                                <tr><td>Situation familiale</td><td>{{ $chauffeur->Situation_familiale }}</td></tr>
                                                <tr><td>Nombre enfants</td><td>{{ $chauffeur->Nombre_enfants }}</td></tr>
                                                <tr><td>Nombre deduction</td><td>{{ $chauffeur->Nombre_déduction}}</td></tr>
                                                <tr><td>Transport</td><td>{{ $chauffeur->Transport }}</td></tr>
                                                <tr><td>Type</td><td>{{ $chauffeur->Type }}</td></tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Elements salaire</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr><td>Salaire de base</td><td>{{ $chauffeur->Salaire_de_base }}</td></tr>
                                                <tr><td>Taux horaire</td><td>{{ $chauffeur->Taux_Horaire }}</td></tr>
                                                <tr><td>Banque</td><td>{{ $chauffeur->Banque }}</td></tr>
                                                <tr><td>Numero compte</td><td>{{ $chauffeur->N_Camp_banc }}</td></tr>
                                                <tr><td>Prime presentation</td><td>{{ $chauffeur->Prime_présentation }}</td></tr>
                                                <tr><td>Prime de panier</td><td>{{ $chauffeur->Prime_de_panier }}</td></tr>
                                                <tr><td>Prime de logement</td><td>{{ $chauffeur->Prime_de_logement }}</td></tr>
                                                <tr><td>Retraite</td><td>{{ $chauffeur->Retraite }}</td></tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Organismes sociaux</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr><td>CNSS</td><td>{{ $chauffeur->CNSS }}</td></tr>
                                                <tr><td>Date affiliation</td><td>{{ $chauffeur->Date_affiliation }}</td></tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Status</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr><td>Date embauche</td><td>{{ $chauffeur->Date_embauche }}</td></tr>
                                                <tr><td>Date depart</td><td>{{ $chauffeur->Date_départ }}</td></tr>
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