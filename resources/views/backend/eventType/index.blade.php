@extends('backend.layouts.app')

@section('title' . app_name())
    
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Gestion des Types D'évènement
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
        "ajax": "{{route('admin.type.ajaxdt')}}",
        "columns":[
            {"data": "type"},
            {"data": "prefix"},
            {"data": "event"},
            {"data": "created_at"},
            {"data": "created_by"},
            {"data": "action"},
        ]
    })
    $('#table').on('click','.delete_type',function(){
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
                        url: "/admin/evenment/type/"+id,
                        type: "DELETE",
                        data: {_method:'DELETE' },
                        success: function ()
                        {
                            swal("Supprimé!", "Le type d'évènment a bien etait supprimé", "success");
                            $('#table').DataTable().ajax.reload();
                        },
                        error: function() {
                            swal("Erreur","Le type d'évènment n'a pas pu etre supprimé!", "error")
                        }
                    });
                }
            })
    });
});
</script>
@endpush