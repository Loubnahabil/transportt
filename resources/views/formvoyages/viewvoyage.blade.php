@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Voyage</h3>
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
                                                <tr><td>Num voyage</td><td>{{$voyage->voyage_name}}</td></tr>
                                                <tr><td>Connaissement N°</td><td>{{$voyage->con}}</td></tr>
                                                <tr><td>Provenance</td><td>{{$voyage->provenance}}</td></tr>
                                                <tr><td>Destination</td><td>{{$voyage->destination}}</td></tr>
                                                <tr><td>Date sortie</td><td>{{$voyage->date_sortie}}</td></tr>
                                                <tr><td>Date arrivee</td><td>{{$voyage->date_arrivee}}</td></tr>
                                                <tr><td>Nombre jours au Maroc</td><td>{{$voyage->j_maroc}}</td></tr>
                                                <tr><td>Kilometrage</td><td>{{$voyage->kilometrage}}</td></tr>
                                                <tr><td>Nombre jours a l'etranger</td><td>{{$voyage->j_etranger}}</td></tr>
                                                <tr><td>Scelles douanieres</td><td>{{$voyage->scelles}}</td></tr>
                                                <tr><td>Observation</td><td>{{$voyage->observation}}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Plus d'informations</span>
                                            </h5>
                                            <table class="table table-striped mt-5">
                                                <tr>
                                                    <td>Vehicules</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($voyage->vehicules as $vehicule)
                                                            <li>{{$vehicule->matricule}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Chauffeurs</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($voyage->chauffeurs as $chauffeur)
                                                            <li>{{$chauffeur->Matricule}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Clients</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($voyage->clients as $client)
                                                            <li>{{$client->name_society}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Marchandises</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($voyage->marchandises as $marchandise)
                                                            <li>{{$marchandise->nature}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
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
@endsection
