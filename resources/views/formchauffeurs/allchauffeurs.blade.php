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
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Chauffeurs</h4> <a href="{{ route('form/addchauffeur/page') }}" class="btn btn-primary float-right veiwbutton">Ajouter Chauffeur</a> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body booking_card">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th hidden>Id</th>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Date naissance</th>
                                                <th>CIN</th>
                                                <th>Telephone</th>
                                                <th>Type</th>


                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allChauffeurs as $chauffeurs )
                                            <tr>
                                                <td hidden class="id">{{ $chauffeurs->id }}</td>
                                                <td>{{ $chauffeurs->Matricule }}</td>
                                                <td>{{ $chauffeurs->Nom }}</td>
                                                <td>{{ $chauffeurs->Prenom}}</td>
                                                <td>{{ $chauffeurs->Date_de_naissance}}</td>
                                                <td>{{ $chauffeurs->CIN }}</td>
                                                <td>{{ $chauffeurs->Télé }}</td>
                                                <td>{{ $chauffeurs->type }}</td>

                                            
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"  href="{{ url('form/chauffeur/edit/'.$chauffeurs->id) }}">
                                                                <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item chauffeurDelete" href="#" data-toggle="modal" data-target="#delete_asset">
                                                                <i class="fas fa-trash-alt m-r-5"></i> Delete
                                                            </a> 
                                                            <a class="dropdown-item" href="{{ route('form/chauffeur/view', ['id' => $chauffeurs->id]) }}">
                                                                <i class="far fa-eye m-r-5"></i> View
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- delete model --}}
            <div id="delete_asset" class="modal fade delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <form action="{{ route('form/chauffeur/delete') }}" method="POST">
                                @csrf
                                <img src="{{ URL::to('assets/img/sent.png') }}" alt="" width="50" height="46">
                                <h3 class="delete_class">Are you sure want to delete this Asset?</h3>
                                <div class="m-t-20">
                                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                    <input class="form-control" type="hidden" id="e_id" name="id" value="">
                                    <input class="form-control" type="hidden" id="e_fileupload" name="fileupload" value="">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end delete model --}}
        </div>
        @section('script')
        {{-- delete model --}}
        <script>
            $(document).on('click','.chauffeurDelete',function()
            {
                var _this = $(this).parents('tr');
                $('#e_id').val(_this.find('.id').text());
                $('#e_fileupload').val(_this.find('.fileupload').text());
            });
        </script>
        @endsection

@endsection