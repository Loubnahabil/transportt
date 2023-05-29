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
                        <h3 class="page-title mt-5">Ajouter chauffeur</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/addchauffeur/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Matricule</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('Matricule') is-invalid @enderror" id="Matricule" name="Matricule" value="{{ old('Matricule') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('Nom') is-invalid @enderror" id="Nom" name="Nom" value="{{ old('Nom') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('Prenom') is-invalid @enderror" name="Prenom" value="{{ old('Prenom') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CIN</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('CIN') is-invalid @enderror" name="CIN" value="{{ old('CIN') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input type="text" class="form-control @error('Télé') is-invalid @enderror" name="Télé" value="{{ old('Télé') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Sexe</label>
                                    <select class="form-control @error('Sexe') is-invalid @enderror" id="Sexe" name="Sexe">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="homme" {{ old('Sexe') === 'homme' ? 'selected' : '' }}>Homme</option>
                                        <option value="femme" {{ old('Sexe') === 'femme' ? 'selected' : '' }}>Femme</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" class="form-control @error('Adresse') is-invalid @enderror" id="Adresse" name="Adresse" value="{{ old('Adresse') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nationalite</label>
                                    <select class="form-control @error('Nationalité') is-invalid @enderror" id="Nationalité" name="Nationalité">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="marocaine" {{ old('Nationalité') === 'marocaine' ? 'selected' : '' }}>Marocaine</option>
                                        <option value="algerienne" {{ old('Nationalité') === 'algerienne' ? 'selected' : '' }}>Algerienne</option>
                                        <option value="tunisienne" {{ old('Nationalité') === 'tunisienne' ? 'selected' : '' }}>Tunisienne</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ville</label>
                                    <input type="text" class="form-control @error('Ville') is-invalid @enderror" id="Ville" name="Ville" value="{{ old('Ville') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date naissance</label>
                                    <span class="required-field text-danger">*</span>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker @error('Date_de_naissance') is-invalid @enderror" id="Date_de_naissance" name="Date_de_naissance" value="{{ old('Date_de_naissance') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre enfants</label>
                                    <input type="number" class="form-control @error('Nombre_enfants') is-invalid @enderror" id="Nombre_enfants" name="Nombre_enfants" value="{{ old('Nombre_enfants') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Situation familiale</label>
                                    <select class="form-control @error('Situation_familiale') is-invalid @enderror" id="Situation_familiale" name="Situation_familiale">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="celibataire" {{ old('Situation_familiale') === 'celibataire' ? 'selected' : '' }}>celibataire</option>
                                        <option value="marie(e)" {{ old('Situation_familiale') === 'marie(e)' ? 'selected' : '' }}>Marie</option>
                                        <option value="divorce(e)" {{ old('Situation_familiale') === 'divorce(e)' ? 'selected' : '' }}>Divorce</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre deduction</label>
                                    <input type="number" class="form-control @error('Nombre_déduction') is-invalid @enderror" id="Nombre_déduction" name="Nombre_déduction" value="{{ old('Nombre_déduction') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Transport</label>
                                    <select class="form-control @error('Transport') is-invalid @enderror" id="Transport" name="Transport">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="camion" {{ old('Transport') === 'camion' ? 'selected' : '' }}>Camion</option>
                                        <option value="van" {{ old('Transport') === 'van' ? 'selected' : '' }}>Van</option>
                                        <option value="caravane" {{ old('Transport') === 'caravane' ? 'selected' : '' }}>Caravane</option>
                                        <option value="mini camion" {{ old('Transport') === 'mini camion' ? 'selected' : '' }}>Mini camion</option>
                                        <option value="gros camion" {{ old('Transport') === 'gros camion' ? 'selected' : '' }}>Gros camion</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date embauche</label>
                                    <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker @error('Date_embauche') is-invalid @enderror" id="Date_embauche" name="Date_embauche" value="{{ old('Date_embauche') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Type</label>
                                    <span class="required-field text-danger">*</span>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="interne" {{ old('type') === 'interne' ? 'selected' : '' }}>Interne</option>
                                        <option value="externe" {{ old('type') === 'externe' ? 'selected' : '' }}>Externe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date depart</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker @error('Date_départ') is-invalid @enderror" id="Date_départ" name="Date_départ" value="{{ old('Date_départ') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Salaire de base</label>
                                    <input type="number" class="form-control @error('Salaire_de_base') is-invalid @enderror" id="Salaire_de_base" name="Salaire_de_base" value="{{ old('Salaire_de_base') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Taux horaire</label>
                                    <input type="number" class="form-control @error('Taux_Horaire') is-invalid @enderror" id="Taux_Horaire" name="Taux_Horaire" value="{{ old('Taux_Horaire') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Banque</label>
                                    <select class="form-control @error('Banque') is-invalid @enderror" id="Banque" name="Banque">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="bmce" {{ old('Banque') === 'bmce' ? 'selected' : '' }}>bmce</option>
                                        <option value="banque populaire" {{ old('Banque') === 'banque populaire' ? 'selected' : '' }}>banque populaire</option>
                                        <option value="attijari wafabank" {{ old('Banque') === 'attijari wafabank' ? 'selected' : '' }}>Attijari Wafabank</option>
                                        <option value="cih" {{ old('Banque') === 'cih' ? 'selected' : '' }}>CIH</option>
                                        <option value="bmci" {{ old('Banque') === 'bmci' ? 'selected' : '' }}>Bmci</option>
                                        <option value="cash" {{ old('Banque') === 'cash' ? 'selected' : '' }}>Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Numero compte</label>
                                    <input type="text" class="form-control @error('N_Camp_banc') is-invalid @enderror" id="N_Camp_banc" name="N_Camp_banc" value="{{ old('N_Camp_banc') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mode de reglement</label>
                                    <select class="form-control @error('Mode_de_réglement') is-invalid @enderror" id="Mode_de_réglement" name="Mode_de_réglement">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="espèces" {{ old('Mode_de_réglement') === 'espèces' ? 'selected' : '' }}>Espèces</option>
                                        <option value="carte de crédit" {{ old('Mode_de_réglement') === 'carte de crédit' ? 'selected' : '' }}>Carte de crédit</option>
                                        <option value="chèque" {{ old('Mode_de_réglement') === 'chèque' ? 'selected' : '' }}>Chèque</option>
                                        <option value="virement bancaire" {{ old('Mode_de_réglement') === 'virement bancaire' ? 'selected' : '' }}>Virement bancaire</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Prime presentation</label>
                                    <input type="number" class="form-control @error('Prime_présentaion') is-invalid @enderror" id="Prime_présentaion" name="Prime_présentaion" value="{{ old('Prime_présentaion') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Prime de panier</label>
                                    <input type="number" class="form-control @error('Prime_de_panier') is-invalid @enderror" id="Prime_de_panier" name="Prime_de_panier" value="{{ old('Prime_de_panier') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Prime de logement</label>
                                    <input type="number" class="form-control @error('Prime_de_logement') is-invalid @enderror" id="Prime_de_logement" name="Prime_de_logement" value="{{ old('Prime_de_logement') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Retraite</label>
                                    <select class="form-control @error('Retraite') is-invalid @enderror" id="Retraite" name="Retraite">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="public" {{ old('Retraite') === 'public' ? 'selected' : '' }}>Public</option>
                                        <option value="privee" {{ old('Retraite') === 'privee' ? 'selected' : '' }}>Privee</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CNSS</label>
                                    <input type="text" class="form-control @error('CNSS') is-invalid @enderror" id="CNSS" name="CNSS" value="{{ old('CNSS') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date affiliation</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker @error('Date_affiliation') is-invalid @enderror" id="Date_affiliation" name="Date_affiliation" value="{{ old('Date_affiliation') }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>File Upload</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('fileupload') is-invalid @enderror" id="image" name="image" onchange="previewImage(event)">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div id="preview-container" style="display: none;">
                                    <img id="preview-image" src="#" alt="preview image" style="max-width: 200px; max-height:200px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary buttonedit1">Create Chauffeur</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allchauffeurs/page') }}';">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    
@endsection