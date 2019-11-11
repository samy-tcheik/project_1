@extends('backend.layouts.app')

@section('title' . app_name())

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Gestion des types d'évènements
                </h4>
            </div>
            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar">
                <a href="{{ route('admin.event.create')}}" class="btn-lg btn-success ml-1"><i class="fas fa-plus-circle"></i></a>
                <a href="#" class="btn btn-primary ml-1"><i class="icon-chart"></i> Par Responsable</a>
                <a href="#" class="btn btn-warning ml-1"><i class="icon-chart"></i> Par Type D'évèntment</a>
                </div>
            </div>
        </div> <!--row-->
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Designation</th>
                                <th>Mobile</th>
                                <th>Debut</th>
                                <th>Fin</th>
                                <th>Inscrit</th>
                                <th>Lieu</th>
                                <th>Responsable</th>
                                <th>Presences</th>
                                <th>Payments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>                
                            <!--modal-->
                            
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