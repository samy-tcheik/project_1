@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Adherents Management <small class="text-muted"> active adherents</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.adherent.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless" id="table">
                        <thead class="thead-dark">
                        <tr >
                            <th>@lang('labels.backend.access.users.table.name')</th>
                          @if(! $prospect )
                            <th>numero dossier</th>
                            @endif
                            <th>form juridique</th>
                            <th>status</th>
                            <th>activité</th>
                            @if(! $prospect)
                            <th>archivé</th>
                                <th>Statut de Paiment </th>
                            @endif
                            <th>actions</th>

                        </tr>
                        </thead>
                        <tbody>

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

                            <div class="modal fade" id="confirmArchive" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirmer l'action</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body h5">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                                            <form id="archiveForm" method="post">
                                                @csrf
                                                <input class="btn btn-pill btn-info" type="submit"value="Changer" >
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="makeAdherent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">mettre au tant que  adhérent</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body h5" >
                                            <form name="valideForm" id="valideForm"  method="post">

                                                <p class=" badge-warning">pour mettre ce prospect comme un adhérent , vous devéz tapez un numéro de dossier</p>
                                                <div class="input-group mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">numéro de dossier</span>
                                                    </div>

                                                    <input   autocomplete="off" id="numeroDossier" name="numeroDossier" placeholder="tapéz ici un numéro non utilisé" type="text" class="form-control"  >

                                                </div>
                                                <button type="button" class="btn btn-lg btn-outline-danger col-5" data-dismiss="modal">Quitter</button>

                                                <button  class="btn btn-lg  btn-outline-primary col-6" type="submit" id="submit" >appliquer</button>
                                                @csrf
                                            </form>

                                        </div>




                                    </div>
                                </div>
                            </div>


                        </tbody>
                    </table>

                </div>
            </div><!--col-->
        </div><!--row-->

        <div class="row">
            <div class="col-7">
                <div class="float-left">

                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">

                </div>
            </div><!--col-->
        </div><!--row-->
          <div class="col-sm-10 d-flex justify-content-center">
          </div>

    </div><!--card-body-->
</div><!--card-->


@endsection

@if(! $prospect)
    @push('myscript')
    <script>
        table =  $('#table').dataTable({
             "processing":"true",
             "serverSide":"true",
             "ajax": '{{route("admin.dataTables",['prospect'=> request()->route()->parameter('prospect')])}}' ,
             "columns": [
                 {data:'name'},
                 {data:'dossier'},
                 {data:'juridic.designation'},
                 {data:'statu.designation'},
                 {data:'activity.designation'},
                 {data : 'archive'} ,
                 {data : 'paimentStat'} ,
                 {data :'actions'}

             ]

         })
        $("#confirmDelete").on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body').html("Vous voulez vraiment supprimér "  + "<span class='text-dark bg-warning text-uppercase'>"+name+"</span>" )
            modal.find('#deleteForm').attr('action' ,'/admin/adherents/' + id )

        })


        $("#confirmArchive").on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
             id =  button.data('id')
            var modal = $(this);
            modal.find('.modal-body').html("  Ce adhérent est <span class='text-info font-weight-bold'> "+ button.text()+"</span>" + " <span class='font-weight-bolder'> vous voulez vraiment le changer ?</span>" )
            modal.find('#archiveForm').attr('action' ,'/admin/adherent/archive/'+id   )
        })




    </script>
    @endpush
@else
    @push('myscript')
        <script>
            table =  $('#table').dataTable({
                "processing":"true",
                "serverSide":"true",
                "ajax": '{{route("admin.dataTables",['prospect'=> request()->route()->parameter('prospect')])}}' ,
                "columns": [
                    {data:'name'},
                    {data:'juridic.designation'},
                    {data:'statu.designation'},
                    {data:'activity.designation'},
                    {data :'actions'}

                ]

            })
            $("#confirmDelete").on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('name')
                var modal = $(this)
                modal.find('.modal-body').html("Vous voulez vraiment supprimér "  + "<span class='text-dark bg-warning text-uppercase'>"+name+"</span>" )
                modal.find('#deleteForm').attr('action' ,'/admin/adherents/' + id )

            })

            token =  $('input[name="_token"]').val();


            $('#numeroDossier').autocomplete({
                source:function (data,callback){

                    $.ajax({
                        url : "{{route('admin.autoComplete')}}",
                        type:'POST',
                        dataType: 'Json',
                        data:{ _token:token},
                        success:function (data) {
                            callback(data)
                        }/*success Func*/
                    })/* ajax Func*/
                }/*Source Func*/
            }) /*autoCompl func*/

            $("#numeroDossier").keyup(function () {
                $.ajax({
                    method: "POST",
                    url: "{{route('admin.checkNumber')}}",
                    data: {dossier:function () {
                            return $("#numeroDossier").val()
                        },_token:token},
                    success:function (data) {
                        if(JSON.parse(data)){
                            $('#numeroDossier').css({"text-decoration":"initial","color" : "black"})
                            $('#submit').prop('disabled', false);
                            $("#inputGroup-sizing-default").removeClass("error")
                            $("#inputGroup-sizing-default").text('Numéro de dossier')
                        }else {
                            $('#numeroDossier').css({"text-decoration":"line-through","color" : "red"})
                            $('#submit').prop('disabled', true);
                            $("#inputGroup-sizing-default").addClass("error")
                            $("#inputGroup-sizing-default").text('numéro déja utilisé')
                        }



                    }
                })

            })

            $("#makeAdherent").on("show.bs.modal" , function (event) {
                var button = $(event.relatedTarget)
                id = button.data('id')
                $(this).find("#valideForm").attr('action',"/admin/adherents/changeProspect/"+ id)

            })


        </script>
        <style>
            .ui-autocomplete {
                position: absolute;
                z-index: 2150000000;
                cursor: default;
                border: 2px solid #ccc;
                padding: 5px 0;
                border-radius: 2px;

            }

            .error{
                color: #ff3c35;
                font-style: italic;

            }
        </style>
    @endpush
@endif
