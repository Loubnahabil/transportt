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
                            <h3 class="page-title mt-5">Edit marchandise</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('form/marchandise/update', ['id' => $marchandiseEdit->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row formtype">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $marchandiseEdit->id }}">

                                                <label>Nature</label>
                                                <input type="text" class="form-control @error('nature') is-invalid @enderror" name="nature" value="{{ $marchandiseEdit->nature }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Valeur</label>
                                                    <input type="text" class="form-control @error('valeur') is-invalid @enderror" name="valeur" value="{{ $marchandiseEdit->valeur }}"> 
                                             </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Origine</label>
                                                    <input type="text" class="form-control @error('origine') is-invalid @enderror" name="origine" value="{{ $marchandiseEdit->origine }}"> 
                                                                                       </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Destination</label>
                                                    <input type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ $marchandiseEdit->destination }}"> 
                                                                                       </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Poids net</label>
                                                
                                                    <input type="text" class="form-control @error('poids_net') is-invalid @enderror" name="poids_net" value="{{ $marchandiseEdit->poids_net }}"> 
                                                                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Poids brut</label>
                                                <input type="text" class="form-control @error('poids_brut') is-invalid @enderror" name="poids_brut" value="{{ $marchandiseEdit->poids_brut }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Longueur</label>
                                                <input type="text" class="form-control @error('longueur') is-invalid @enderror" name="longueur" value="{{ $marchandiseEdit->longueur }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Largeur</label>
                                                <input type="text" class="form-control @error('largeur') is-invalid @enderror" name="largeur" value="{{ $marchandiseEdit->largeur }}">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Hauteur</label>
                                                <input type="text" class="form-control @error('hauteur') is-invalid @enderror" name="hauteur" value="{{ $marchandiseEdit->hauteur }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $marchandiseEdit->hauteur }}">
                                            </div>
                                        </div>
                                       
                                        
    
                                     
                                    
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary buttonedit1">Update Marchandise</button>
                </form>
                <button class="btn btn-secondary buttonedit2 bg-white border border-success text-success" onclick="window.location.href = '{{ route('form/allmarchandises/page') }}';">Cancel</button>

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