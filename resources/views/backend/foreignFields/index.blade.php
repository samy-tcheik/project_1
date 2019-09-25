@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('content')


    <div class="card">
        <div class="card-header">
            Additionnel
        </div>
        <div class="card-body">
            <div>
                @include("backend.foreignFields.form")
            </div>
            </div>
        </div>


    <div class=" modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        {{html()->input('hidden', 'table',$table )->id('deleteField')}}
                        @csrf

                        <button id="delete" class="btn btn-danger">Confirm delete</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rename" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Renommer le champ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body h5">
                    <form class="row" id="RenameForm" method="post">
                        @csrf
                        {{html()->input('hidden','_method' ,'PUT')}}
                        {{html()->input('hidden',"table",$table)}}

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info" id="basic-addon1">Renommer vers</span>
                            </div>
                                {{html()->input('text','designation')->class("form-control")->id('Input')
                            ->placeholder('Nouveau nom')->attribute("autocomplete","off")}}

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input  type="submit" form="RenameForm" value="Confirmer la renomination " class="btn btn-css3">
                </div>
            </div>
        </div>
    </div>


@endsection


@push('myscript')
    <script>


        $("#confirmDelete").on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let modal = $(this);
            modal.find('.modal-body').text('do you really want to delete it ?');
            modal.find('#deleteForm').attr('action' ,'/admin/foreign/' + id );

        })

        $("#rename").on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let field = button.data('field');
            $("#Input").val(field)
            let id = button.data('id');
            let modal = $(this);
            modal.find('#RenameForm').attr('action' ,'/admin/foreign/' + id );
        })




    </script>


@endpush
