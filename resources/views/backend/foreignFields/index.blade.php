@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('content')


    <div class="card">
        <div class="card-header">
            Customizing Fields
        </div>
        <div class="card-body">
            <h2>places</h2>
            <hr>
            <div class="row">
                <div class="col">@include("backend.foreignFields.form",['table' =>'cities','data' =>$cities] )</div>
                <div class="col">@include("backend.foreignFields.form",['table' =>'regions','data'=>$regions])</div>
                <div class="col">@include("backend.foreignFields.form",['table' =>'countries','data' =>$countries])</div>
            </div>
                <hr>
                <h2>activity related</h2>
                <hr>
            <div class="row">
                <div class="col-4">@include("backend.foreignFields.form",['table' =>'activities' ,'data' => $activity])</div>
                <div class="col-4">@include("backend.foreignFields.form",['table' =>'sectors','data' => $sectors])</div>

            </div>
                <hr>
                <h2>Info personnel</h2>
                <hr>
            <div class="row">
                <div class="col-4">@include("backend.foreignFields.form",['table' =>'status' ,'data' => $status])</div>
                <div class="col-4">@include("backend.foreignFields.form",['table' =>'juridic_forms' ,'data' => $juridics])</div>

            </div>
        </div>

    </div>

    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        {{html()->input('hidden', 'table' )->id('deleteField')}}
                        @csrf

                        <button id="delete" class="btn btn-danger">Confirm delete</button>

                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection


@push('myscript')
    <script>


        $("#confirm").on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let table = button.data('table');
            let modal = $(this);
            let  option =  $("#"+table+' option:selected');
            modal.find('.modal-body').text('do you really want to delete '+  option.text().toUpperCase() + ' from ' + table.toUpperCase() + ' ?');
            modal.find('#deleteForm').attr('action' ,'/admin/foreign/' + option.val() );
            modal.find("#deleteField").val(table);
        })


         $('select').change(function () {
              select =  $(this);
              table = select.attr('id');
             var field = select.find('option:selected').text();
           $( '#'+table+'Input').val(field);
            var form =  $('#'+table +'Form');

             form.attr('action' , '/admin/foreign/'+select.val());

             console.log(form.attr('action'))
        })


    </script>


@endpush
