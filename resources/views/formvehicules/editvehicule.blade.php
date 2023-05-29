@extends('layouts.master')
@section('menu')

@section('content')
    <style>
        .avatar {
            background-color: #aaa;
            border-radius: 50%;
            color: #fff;
            display: inline-block;
            font-weight: 500;
            height: 38px;
            line-height: 38px;
            margin: -38px 10px 0 0;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            vertical-align: middle;
            width: 38px;
            position: relative;
            white-space: nowrap;
            z-index: 2;
        }
    </style>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title mt-5">Edit vehicule</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('form/vehicule/update', ['id' => $vehiculeEdit->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row formtype">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $vehiculeEdit->id }}">

                                                <label>N° Immatriculation</label>
                                                <input type="text" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ $vehiculeEdit->matricule }}" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Premiére Mise en Ciculation</label>
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control datetimepicker @error('date_circulation') is-invalid @enderror" name="date_circulation" value="{{ $vehiculeEdit->date_circulation }}"> 
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>M.C au Maroc</label>
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control datetimepicker @error('mc') is-invalid @enderror" name="mc" value="{{ $vehiculeEdit->mc }}"> 
                                                </div>                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mutation le</label>
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control datetimepicker @error('mutation') is-invalid @enderror" name="mutation" value="{{ $vehiculeEdit->mutation }}"> 
                                                </div>                                         </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date de validité</label>
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control datetimepicker @error('validite_date') is-invalid @enderror" name="validite_date" value="{{ $vehiculeEdit->validite_date }}"> 
                                                </div>                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Propriétaire</label>
                                                <input type="text" class="form-control @error('proprietaire') is-invalid @enderror" name="proprietaire" value="{{ $vehiculeEdit->proprietaire }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Marque</label>
                                                <input type="text" class="form-control @error('marque') is-invalid @enderror" name="marque" value="{{ $vehiculeEdit->marque }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $vehiculeEdit->type }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Genre</label>
                                                <select class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre">
                                                    <option value="" disabled selected>Select Genre</option>
                                                    <option value="remorque" {{ (old('genre', $vehiculeEdit->genre) === 'remorque') ? 'selected' : '' }}>Remorque</option>
                                                    <option value="forgon" {{ (old('genre', $vehiculeEdit->genre) === 'forgon') ? 'selected' : '' }}>Forgon</option>
                                                    <option value="conteneur" {{ (old('genre', $vehiculeEdit->genre) === 'conteneur') ? 'selected' : '' }}>Conteneur</option>
                                                    <option value="camion" {{ (old('genre', $vehiculeEdit->genre) === 'camion') ? 'selected' : '' }}>Camion</option>
                                                    <option value="tracteur" {{ (old('genre', $vehiculeEdit->genre) === 'tracteur') ? 'selected' : '' }}>Tracteur</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Modele</label>
                                                <input type="text" class="form-control @error('modele') is-invalid @enderror" name="modele" value="{{ $vehiculeEdit->modele }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Genre</label>
                                                <select class="form-control @error('carburant') is-invalid @enderror" id="carburant" name="carburant">
                                                    <option value="" disabled selected>Select Carburant</option>
                                                    <option value="Diesel" {{ (old('carburant', $vehiculeEdit->carburant) === 'Diesel') ? 'selected' : '' }}>Diesel</option>

                                                    <option value="Essence" {{ (old('carburant', $vehiculeEdit->carburant) === 'Essence') ? 'selected' : '' }}>Essence</option>


                                                    <option value="Carburants gazeux" {{ (old('carburant', $vehiculeEdit->carburant) === 'Carburants gazeux') ? 'selected' : '' }}>Carburants gazeux</option>
                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>N° du chassis</label>
                                                <input type="text" class="form-control @error('n_chassis') is-invalid @enderror" name="n_chassis" value="{{ $vehiculeEdit->n_chassis }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nbre cylindres</label>
                                                <input type="number" class="form-control @error('nbre_cylindres') is-invalid @enderror" id="nbre_cylindres" name="nbre_cylindres" value="{{ $vehiculeEdit->nbre_cylindres }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Puissance fiscale</label>
                                                <input type="number" class="form-control @error('puissance') is-invalid @enderror" id="puissance" name="puissance" value="{{ $vehiculeEdit->puissance }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>P.T.A.C</label>
                                                <input type="text" class="form-control @error('ptac') is-invalid @enderror" id="ptac" name="ptac" value="{{ $vehiculeEdit->ptac }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Poids à vide</label>
                                                <input type="number" class="form-control @error('poids') is-invalid @enderror" id="poids" name="poids" value="{{ $vehiculeEdit->poids }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>P.T.M.C.T</label>
                                                <input type="number" class="form-control @error('ptmct') is-invalid @enderror" id="ptmct" name="ptmct" value="{{ $vehiculeEdit->ptmct }}">
                                            </div>
                                        </div>
                                        
    
                                     
                                    
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary buttonedit1">Update Vehicule</button>
                </form>
                <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allvehicules/page') }}';">Cancel</button>

            </div>
        </div>
        @endsection



@section('script')
<script>
    $(function() {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });
    </script>
@endsection
@endsection