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
                        <h3 class="page-title mt-5">Ajouter client</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/addclient/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nom de la société</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('name_society') is-invalid @enderror" id="name_society" name="name_society" value="{{ old('name_society') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Prenom</label>
                                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date première relation</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('date_relation') is-invalid @enderror" name="date_relation" value="{{ old('date_relation') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telephone 1</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('tele1') is-invalid @enderror" id="tele1" name="tele1" value="{{ old('tele1') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telephone 2</label>
                                            <input type="text" class="form-control @error('tele2') is-invalid @enderror" id="tele2" name="tele2" value="{{ old('tele2') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pays</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('Pays') is-invalid @enderror" id="Pays" name="Pays" value="{{ old('Pays') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ville</label>
                                            <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ old('ville') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Adresse</label>
                                            <span class="required-field text-danger">*</span>
                                            <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <span class="required-field text-danger">*</span>
                                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                                <option value="" disabled selected>Select Type</option>
                                                <option value="importateur" {{ old('type') === 'importateur' ? 'selected' : '' }}>Importateur</option>
                                                <option value="exportateur" {{ old('type') === 'exportateur' ? 'selected' : '' }}>Exportateur</option>
                                                <option value="importateur-exportateur" {{ old('type') === 'importateur-exportateur' ? 'selected' : '' }}>Importateur-exportateur</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Code postal</label>
                                            <input type="text" class="form-control @error('code_postal') is-invalid @enderror" id="code_postal" name="code_postal" value="{{ old('code_postal') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Notes</label>
                                            <input type="text" class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" value="{{ old('notes') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary buttonedit1">Create Client</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allclients/page') }}';">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection 