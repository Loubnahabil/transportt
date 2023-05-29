@extends('layouts.master')
@section('menu')

@section('content')


    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Ajouter voyage</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/addvoyage/save') }}"  method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Num voyage</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="number" class="form-control @error('voyage_name') is-invalid @enderror" id="voyage_name" name="voyage_name" value="{{ old('voyage_name') }}">
                                        </div>
                                    </div>
                                    <!--new fields-->
                                    <!-- Additional fields here -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Connaissement N°</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="text" class="form-control @error('con') is-invalid @enderror" id="con" name="con" value="{{ old('con') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Provenance</label>
                                            <input type="text" class="form-control @error('provenance') is-invalid @enderror" id="provenance" name="provenance" value="{{ old('provenance') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <input type="text" class="form-control @error('destination') is-invalid @enderror" id="destination" name="destination" value="{{ old('destination') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date sortie</label>
                                            <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker @error('date_sortie') is-invalid @enderror" id="date_sortie" name="date_sortie" value="{{ old('date_sortie') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date arrivee</label>
                                            <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker @error('date_arrivee') is-invalid @enderror" id="date_arrivee" name="date_arrivee" value="{{ old('date_arrivee') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre jours au Maroc</label>
                                            <input type="number" class="form-control @error('j_maroc') is-invalid @enderror" id="j_maroc" name="j_maroc" value="{{ old('j_maroc') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kilometrage</label>
                                            <input type="number" class="form-control @error('kilometrage') is-invalid @enderror" id="kilometrage" name="kilometrage" value="{{ old('kilometrage') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre jours a letranger</label>
                                            <input type="number" class="form-control @error('j_etranger') is-invalid @enderror" id="j_etranger" name="j_etranger" value="{{ old('j_etranger') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Scelles douanieres</label>
                                            <input type="text" class="form-control @error('scelles') is-invalid @enderror" id="scelles" name="scelles" value="{{ old('scelles') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Observation</label>
                                            <textarea class="form-control @error('observation') is-invalid @enderror" id="observation" name="observation" rows="3">{{ old('observation') }}</textarea>
                                        </div>
                                    </div>



                                    <!--how hard fields-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Vehicules</label>
                                            <span class="required-field text-danger">*</span>
                                            <select id="vehicules_select" name="vehicules[]" class="form-control @error('vehicules') is-invalid @enderror"  style="display: none;" multiple>
                                                @foreach($vehicules as $vehicule)
                                                    <option value="{{ $vehicule->id }}">{{ $vehicule->matricule }}</option>
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
                                            <span class="required-field text-danger">*</span>
                                            <select id="vehicules_select" name="chauffeurs[]" class="form-control @error('chauffeurs') is-invalid @enderror" style="display: none;" multiple>
                                                @foreach($chauffeurs as $chauffeur)
                                                    <option value="{{ $chauffeur->id }}">{{ $chauffeur->Matricule }}</option> <!-- Display the name or other property of chauffeur -->
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
                                            <span class="required-field text-danger">*</span>
                                            <select id="vehicules_select" name="clients[]" class="form-control @error('clients') is-invalid @enderror"style="display: none;" multiple>
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name_society }}</option> <!-- Display the name or other property of client -->
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
                                            <span class="required-field text-danger">*</span>
                                            <select id="vehicules_select" name="marchandises[]" class="form-control @error('marchandises') is-invalid @enderror"  style="display: none;" multiple>
                                                @foreach($marchandises as $marchandise)
                                                    <option value="{{ $marchandise->id }}">{{ $marchandise->nature }}</option> <!-- Display the name or other property of marchandise -->
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
                <div class="row">
                    <div class="col-lg-12">
                <button type="submit" class="btn btn-primary buttonedit1">Create Voyage</button>
            </div>
        </div>
            </form>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allvoyages/page') }}';">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection