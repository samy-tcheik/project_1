@extends('backend.layouts.app')

@section('title' . app_name())

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Gestion des Evènements
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
                                <th>Actions</th>
                            </tr>
                        </thead>
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
    $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('admin.event.ajaxdt')}}",
        "columns":[
            {"data": "theme"},
            {"data": null},
            {"data": "date_debut"},
            {"data": "date_fin"},
            {"data": "inscrits"},
            {"data": "lieu"},
            {"data": "responsable"},
            {"data": null},
            {"data": null},
            {"data": "action"}
        ]
    });
    $('#table').on('click','.delete_event',function() {
        var id = $(this).data('id');
            swal({
            title: "Attention",
            text: "Veuillez confirmer la suppression",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmer",
            cancelButtonText: "Annuler",
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/admin/evenment/event/"+id,
                        type: "DELETE",
                        data: {_method:'DELETE' },
                        success: function ()
                        {
                            swal("Supprimé!", "Le type d'évenment a bien etait supprimé!", "success");
                            $('#table').DataTable().ajax.reload();
                        },
                        error: function() {
                            swal("Erreur","L'évenment n'a pas pu etre supprimé!", "error")
                        }
                        
                    });
                }
            })
    })
});
</script>
@endpush