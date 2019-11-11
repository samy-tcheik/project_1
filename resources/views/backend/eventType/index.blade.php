@extends('backend.layouts.app')

@section('title' . app_name())
    
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Gestion des Evènement
                    </h4>
                </div>
                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar">
                    <a href="{{ route('admin.type.create')}}" class="btn-lg btn-success ml-1"><i class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
            </div> <!--row-->
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Type</th>
                                    <th>Prefixe</th>
                                    <th>Evènement</th>
                                    <th>Crée le</th>
                                    <th>Crée par</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                    <td>{{ $type->type }}</td>
                                    <td>{{ $type->prefix}}</td>
                                    <td></td>
                                    <td>{{ $type->created_at->format('Y-m-d')}}</td>
                                    <td>{{ $type->creator->first_name}}</td>
                                    <td><a href="{{ route('admin.type.edit',$type->id)}}" class="btn btn-primary">Modifier</a>
                                        <button type="button" data-toggle="modal" data-target="#confirmationModal" class="btn btn-danger">Supprimer</button>
                                        @csrf
                                    </td>
                                    </tr>                
                                @endforeach
                                <!--modal-->
                                <div class="modal fade" id="confirmationModal" role="dialog" >
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Voulez vous vraiment suprimer ce type d'évènements ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                            <form action="{{ route('admin.type.destroy',$type->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Confirmer</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    
@endsection
@push('myscript')
<script>
$(document).ready( function(){
    $('#table').DataTable();
});
</script>
@endpush