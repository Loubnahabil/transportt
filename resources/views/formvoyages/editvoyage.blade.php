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
                            <h3 class="page-title mt-5">Edit voyage</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('form/voyage/update', ['id' => $voyageEdit->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row formtype">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $voyageEdit->id }}">

                                                <label>Nom voyage</label>
                                                <span class="required-field text-danger">*</span>
                                                <input type="text" class="form-control @error('voyage_name') is-invalid @enderror" name="voyage_name" value="{{ $voyageEdit->voyage_name }}" >
                                            </div>
                                        </div>
                                        <!--the new fields-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Connaissement N°</label>
                                                <span class="required-field text-danger">*</span>
                                                <input type="text" class="form-control @error('con') is-invalid @enderror" name="con" value="{{ $voyageEdit->con }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Provenance</label>
                                                <input type="text" class="form-control @error('provenance') is-invalid @enderror" name="provenance" value="{{ $voyageEdit->provenance }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Destination</label>
                                                <input type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ $voyageEdit->destination }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date de sortie</label>
                                                <div class="cal-icon">

                                                <input type="date" class="form-control datetimepicker @error('date_sortie') is-invalid @enderror" name="date_sortie" value="{{ $voyageEdit->date_sortie }}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date d'arrivée</label>
                                                <div class="cal-icon">
                                                <input type="date" class="form-control datetimepicker @error('date_arrivee') is-invalid @enderror" name="date_arrivee" value="{{ $voyageEdit->date_arrivee }}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre de jours au Maroc</label>
                                                <input type="text" class="form-control @error('j_maroc') is-invalid @enderror" name="j_maroc" value="{{ $voyageEdit->j_maroc }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Kilométrage</label>
                                                <input type="text" class="form-control @error('kilometrage') is-invalid @enderror" name="kilometrage" value="{{ $voyageEdit->kilometrage }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre de jours à l'étranger</label>
                                                <input type="text" class="form-control @error('j_etranger') is-invalid @enderror" name="j_etranger" value="{{ $voyageEdit->j_etranger }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Scelles douanieres</label>
                                                <input type="text" class="form-control @error('scelles') is-invalid @enderror" name="scelles" value="{{ $voyageEdit->scelles }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Observation</label>
                                                <textarea class="form-control @error('observation') is-invalid @enderror" name="observation" rows="3">{{ $voyageEdit->observation }}</textarea>
                                            </div>
                                        </div>


                                        <!--the important fields-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Vehicules</label>
                                                <select id="vehicules_select" name="vehicules[]" multiple class="form-control " style="display: none;">
                                                    @foreach ($vehicules as $vehicule)
                                                        <option value="{{ $vehicule->id }}"
                                                            {{ in_array($vehicule->id, $voyageEdit->vehicules->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                            {{ $vehicule->matricule }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('vehicules')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4"> <!-- New select field for chauffeurs -->
                                            <div class="form-group">
                                                <label>Chauffeurs</label>
                                                <select id="vehicules_select" name="chauffeurs[]" multiple class="form-control " style="display: none;">
                                                    @foreach ($chauffeurs as $chauffeur)
                                                        <option value="{{ $chauffeur->id }}"
                                                            {{ in_array($chauffeur->id, $voyageEdit->chauffeurs->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                            {{ $chauffeur->Matricule }} <!-- Display the name or other property of chauffeur -->
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('chauffeurs')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4"> <!-- New select field for clients -->
                                            <div class="form-group">
                                                <label>Clients</label>
                                                <select id="vehicules_select" name="clients[]" multiple class="form-control " style="display: none;">
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}"
                                                            {{ in_array($client->id, $voyageEdit->clients->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                            {{ $client->name_society }} <!-- Display the name or other property of client -->
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('clients')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4"> <!-- New select field for marchandises -->
                                            <div class="form-group">
                                                <label>Marchandises</label>
                                                <select id="vehicules_select" name="marchandises[]" multiple class="form-control " style="display: none;">
                                                    @foreach ($marchandises as $marchandise)
                                                        <option value="{{ $marchandise->id }}"
                                                            {{ in_array($marchandise->id, $voyageEdit->marchandises->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                            {{ $marchandise->nature }} <!-- Display the name or other property of marchandise -->
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('marchandises')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                </form>
                <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allvoyages/page') }}';">Cancel</button>

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