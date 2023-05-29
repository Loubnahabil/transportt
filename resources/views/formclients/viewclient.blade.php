@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Client</h3>
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
                                                <tr><td>Nom de la société</td><td>{{ $client->name_society }}</td></tr>
                                                <tr><td>Nom</td><td>{{ $client->nom }}</td></tr>
                                                <tr><td>Prenom</td><td>{{ $client->prenom }}</td></tr>
                                                <tr><td>Email</td><td>{{ $client->email }}</td></tr>
                                                <tr><td>Telephone 1</td><td>{{ $client->tele1 }}</td></tr>
                                                <tr><td>Telephone 2</td><td>{{ $client->tele2 }}</td></tr>
                                                <tr><td>Type</td><td>{{ $client->type }}</td></tr>
                                                <tr><td>Date première relation</td><td>{{ $client->date_relation }}</td></tr>
                                                <tr><td>Pays</td><td>{{ $client->Pays }}</td></tr>
                                                <tr><td>Ville</td><td>{{ $client->ville }}</td></tr>
                                                <tr><td>Adresse</td><td>{{ $client->adresse }}</td></tr>
                                                <tr><td>Code postal</td><td>{{ $client->code_postal }}</td></tr>
                                                <tr><td>Notes</td><td>{{ $client->notes }}</td></tr>

                                                
                                                
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
