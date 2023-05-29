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
                        <h3 class="page-title mt-5">Ajouter vehicule</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/addmarchandise/save') }}"  method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">                   
                            <div class="col-lg-12">
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nature</label>
                                            <span class="required-field text-danger">*</span>
                                            
                                                <input type="text" class="form-control @error('nature') is-invalid @enderror" name="nature" value="{{ old('nature') }}"> 
                                            
                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Valeur</label>
                                            <span class="required-field text-danger">*</span>
                                            
                                                <input type="number" class="form-control @error('valeur') is-invalid @enderror" name="valeur" value="{{ old('valeur') }}"> 
                                                                                   </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Origine</label>
                                            <span class="required-field text-danger">*</span>

                                           
                                                <input type="text" class="form-control @error('origine') is-invalid @enderror" name="origine" value="{{ old('origine') }}"> 
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <span class="required-field text-danger">*</span>

                                                <input type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination') }}"> 
                                                                                     </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Poids net</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="number" class="form-control @error('poids_net') is-invalid @enderror" id="poids_net" name="poids_net" value="{{ old('poids_net') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Poids brut</label>
                                            <span class="required-field text-danger">*</span>

                                            <input type="number" class="form-control @error('poids_brut') is-invalid @enderror" id="poids_brut" name="poids_brut" value="{{ old('poids_brut') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Longueur</label>

                                            <input type="number" class="form-control @error('longueur') is-invalid @enderror" id="longueur" name="longueur" value="{{ old('longueur') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Largeur</label>

                                            <input type="number" class="form-control @error('largeur') is-invalid @enderror" id="largeur" name="largeur" value="{{ old('largeur') }}">
                                              
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Hauteur</label>

                                            <input type="number" class="form-control @error('hauteur') is-invalid @enderror" id="hauteur" name="hauteur" value="{{ old('hauteur') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Description</label>
                                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"> 
                                            </div>
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                <button type="submit" class="btn btn-primary buttonedit1">Create Marchandise</button>
            </div>
        </div>
            </form>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allmarchandises/page') }}';">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection 