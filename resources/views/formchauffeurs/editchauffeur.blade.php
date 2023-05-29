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
                            <h3 class="page-title mt-5">Edit chauffeur</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('form/chauffeur/update', ['id' => $chauffeurEdit->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $chauffeurEdit->id }}">
                                    <label>Matricule</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('Matricule') is-invalid @enderror" id="Matricule" name="Matricule" value="{{$chauffeurEdit->Matricule }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('Nom') is-invalid @enderror" id="Nom" name="Nom" value="{{ $chauffeurEdit->Nom }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('Prenom') is-invalid @enderror" name="Prenom" value="{{ $chauffeurEdit->Prenom }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CIN</label>
                                    <span class="required-field text-danger">*</span>
                                    <input type="text" class="form-control @error('CIN') is-invalid @enderror" name="CIN" value="{{ $chauffeurEdit->CIN }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input type="text" class="form-control @error('Télé') is-invalid @enderror" name="Télé" value="{{ $chauffeurEdit->Télé }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Sexe</label>
                                    <select class="form-control @error('Sexe') is-invalid @enderror" id="Sexe" name="Sexe">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="homme" {{ (old('Sexe',$chauffeurEdit->Sexe) === 'homme') ? 'selected' : '' }}>Homme</option>
                                        <option value="femme" {{ (old('Sexe',$chauffeurEdit->Sexe) === 'femme') ? 'selected' : '' }}>Femme</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" class="form-control @error('Adresse') is-invalid @enderror" id="Adresse" name="Adresse" value="{{ $chauffeurEdit->Adresse }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nationalite</label>
                                    <select class="form-control @error('Nationalité') is-invalid @enderror" id="Nationalité" name="Nationalité">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="marocaine" {{ (old('Nationalité',$chauffeurEdit->Nationalité) === 'marocaine') ? 'selected' : '' }}>Marocaine</option>
                                        <option value="algerienne" {{ (old('Nationalité',$chauffeurEdit->Nationalité) === 'algerienne') ? 'selected' : '' }}>Algerienne</option>
                                        <option value="tunisienne" {{ (old('Nationalité',$chauffeurEdit->Nationalité) === 'tunisienne') ? 'selected' : '' }}>Tunisienne</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Ville</label>
                                    <input type="text" class="form-control @error('Ville') is-invalid @enderror" id="Ville" name="Ville" value="{{ $chauffeurEdit->Ville }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date naissance</label>
                                    <span class="required-field text-danger">*</span>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker @error('Date_de_naissance') is-invalid @enderror" id="Date_de_naissance" name="Date_de_naissance" value="{{ $chauffeurEdit->Date_de_naissance }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre enfants</label>
                                    <input type="number" class="form-control @error('Nombre_enfants') is-invalid @enderror" id="Nombre_enfants" name="Nombre_enfants" value="{{ $chauffeurEdit->Nombre_enfants }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Situation familiale</label>
                                    <select class="form-control @error('Situation_familiale') is-invalid @enderror" id="Situation_familiale" name="Situation_familiale">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="celibataire" {{ (old('Situation_familiale',$chauffeurEdit->Situation_familiale) === 'celibataire') ? 'selected' : '' }}>celibataire</option>
                                        <option value="marie(e)" {{ (old('Situation_familiale',$chauffeurEdit->Situation_familiale) === 'marie(e)') ? 'selected' : '' }}>Marie</option>
                                        <option value="divorce(e)" {{ (old('Situation_familiale',$chauffeurEdit->Situation_familiale) === 'divorce(e)') ? 'selected' : '' }}>Divorce</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre deduction</label>
                                    <input type="number" class="form-control @error('Nombre_déduction') is-invalid @enderror" id="Nombre_déduction" name="Nombre_déduction" value="{{ $chauffeurEdit->Nombre_déduction }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Transport</label>
                                    <select class="form-control @error('Transport') is-invalid @enderror" id="Transport" name="Transport">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="camion" {{ (old('Transport',$chauffeurEdit->Transport) === 'camion') ? 'selected' : '' }}>Camion</option>
                                        <option value="van" {{ (old('Transport',$chauffeurEdit->Transport) === 'van') ? 'selected' : '' }}>Van</option>
                                        <option value="caravane" {{ (old('Transport',$chauffeurEdit->Transport) === 'caravane') ? 'selected' : '' }}>Caravane</option>
                                        <option value="mini camion" {{ (old('Transport',$chauffeurEdit->Transport) === 'mini camion') ? 'selected' : '' }}>Mini camion</option>
                                        <option value="gros camion" {{ (old('Transport',$chauffeurEdit->Transport) === 'gros camion') ? 'selected' : '' }}>Gros camion</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date embauche</label>
                                    <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker @error('Date_embauche') is-invalid @enderror" id="Date_embauche" name="Date_embauche" value="{{ $chauffeurEdit->Date_embauche }}">
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
                                        <option value="interne" {{ (old('type',$chauffeurEdit->type) === 'interne') ? 'selected' : '' }}>Interne</option>
                                        <option value="externe" {{ old('type',$chauffeurEdit->type) === 'externe' ? 'selected' : '' }}>Externe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date depart</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker @error('Date_départ') is-invalid @enderror" id="Date_départ" name="Date_départ" value="{{ $chauffeurEdit->Date_départ }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Salaire de base</label>
                                    <input type="number" class="form-control @error('Salaire_de_base') is-invalid @enderror" id="Salaire_de_base" name="Salaire_de_base" value="{{ $chauffeurEdit->Salaire_de_base }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Taux horaire</label>
                                    <input type="number" class="form-control @error('Taux_Horaire') is-invalid @enderror" id="Taux_Horaire" name="Taux_Horaire" value="{{ $chauffeurEdit->Taux_Horaire }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Banque</label>
                                    <select class="form-control @error('Banque') is-invalid @enderror" id="Banque" name="Banque">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="bmce" {{ old('Banque') === 'bmce' ? 'selected' : '' }}>bmce</option>
                                        <option value="banque populaire" {{ (old('Banque',$chauffeurEdit->Banque) === 'banque populaire') ? 'selected' : '' }}>banque populaire</option>
                                        <option value="attijari wafabank" {{ (old('Banque',$chauffeurEdit->Banque) === 'attijari wafabank') ? 'selected' : '' }}>Attijari Wafabank</option>
                                        <option value="cih" {{ (old('Banque',$chauffeurEdit->Banque) === 'cih') ? 'selected' : '' }}>CIH</option>
                                        <option value="bmci" {{ (old('Banque',$chauffeurEdit->Banque) === 'bmci') ? 'selected' : '' }}>Bmci</option>
                                        <option value="cash" {{ (old('Banque',$chauffeurEdit->Banque) === 'cash') ? 'selected' : '' }}>Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Numero compte</label>
                                    <input type="text" class="form-control @error('N_Camp_banc') is-invalid @enderror" id="N_Camp_banc" name="N_Camp_banc" value="{{ $chauffeurEdit->N_Camp_banc }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mode de reglement</label>
                                    <select class="form-control @error('Mode_de_réglement') is-invalid @enderror" id="Mode_de_réglement" name="Mode_de_réglement">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="espèces" {{ (old('Mode_de_réglement',$chauffeurEdit->Mode_de_réglement) === 'espèces') ? 'selected' : '' }}>Espèces</option>
                                        <option value="carte de crédit" {{ (old('Mode_de_réglement',$chauffeurEdit->Mode_de_réglement) === 'carte de crédit') ? 'selected' : '' }}>Carte de crédit</option>
                                        <option value="chèque" {{ (old('Mode_de_réglement',$chauffeurEdit->Mode_de_réglement) === 'chèque') ? 'selected' : '' }}>Chèque</option>
                                        <option value="virement bancaire" {{ (old('Mode_de_réglement',$chauffeurEdit->Mode_de_réglement) === 'virement bancaire') ? 'selected' : '' }}>Virement bancaire</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Prime presentation</label>
                                    <input type="number" class="form-control @error('Prime_présentaion') is-invalid @enderror" id="Prime_présentaion" name="Prime_présentaion" value="{{ $chauffeurEdit->Prime_présentaion }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Prime de panier</label>
                                    <input type="number" class="form-control @error('Prime_de_panier') is-invalid @enderror" id="Prime_de_panier" name="Prime_de_panier" value="{{ $chauffeurEdit->Prime_de_panier }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Prime de logement</label>
                                    <input type="number" class="form-control @error('Prime_de_logement') is-invalid @enderror" id="Prime_de_logement" name="Prime_de_logement" value="{{ $chauffeurEdit->Prime_de_logement }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Retraite</label>
                                    <select class="form-control @error('Retraite') is-invalid @enderror" id="Retraite" name="Retraite">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="public" {{ (old('Retraite',$chauffeurEdit->Retraite) === 'public') ? 'selected' : '' }}>Public</option>
                                        <option value="privee" {{ (old('Retraite',$chauffeurEdit->Retraite) === 'privee') ? 'selected' : '' }}>Privee</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CNSS</label>
                                    <input type="text" class="form-control @error('CNSS') is-invalid @enderror" id="CNSS" name="CNSS" value="{{ $chauffeurEdit->CNSS }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date affiliation</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker @error('Date_affiliation') is-invalid @enderror" id="Date_affiliation" name="Date_affiliation" value="{{ $chauffeurEdit->Date_affiliation }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>File Upload</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage(event)">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div id="preview-container" @if(!$chauffeurEdit->image) style="display: none;" @endif>
                                        <img id="preview-image" src="{{ $chauffeurEdit->image ? asset('images/'.$chauffeurEdit->image) : '#' }}" alt="preview image" style="max-width: 200px; max-height:200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary buttonedit1">Update Chauffeur</button>
                    </div>
                </div>
            </form>
                <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allchauffeurs/page') }}';">Cancel</button>

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