@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))



@section("content")
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                          Cotisations <small class="text-muted">liste des cotisations</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">

                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body">
            <table class="table table-striped table-borderless" id="Cotisation">
               <thead class="thead-dark">
               <tr>
                   <th>Adhérent</th>
                   <th>Debut date</th>
                   <th>Numéro chèque</th>
                   <th>BQ</th>
                   <th>Montant</th>
                   <th>Actions</th>
               </tr>
               </thead>

            </table>
        </div>
    </div>
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Confirm delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body h5">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form  id="deleteForm" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf

                        <button id="delete" class="btn btn-danger">Confirmer la suppression</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push("myscript")
    <script>
        table =  $('#Cotisation').dataTable({
            "processing":"true",
            "serverSide":"true",
            "ajax": '{{route('admin.ajaxIndex')}}' ,
            "columns": [
                {data:'adhs.name'},
                {data:'debut_date'},
                {data:'num_cheque'},
                {data:'BQ'},
                {data:'tarif.designation'},
                {data:"actions"}
            ]

        })
        $("#confirmDelete").on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body').html("Vous voulez vraiment supprimér cette cotisation " )
            modal.find('#deleteForm').attr('action' ,'/admin/cotisation/' + id )

        })

    </script>
@endpush
