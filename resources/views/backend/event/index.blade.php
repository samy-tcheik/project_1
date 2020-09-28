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
                <a class="btn-lg btn-success ml-1" data-toggle="modal" data-target="#eventCreateModal"><i class="fas fa-plus-circle"></i></a>
                <button class="btn btn-primary ml-1" id="responsableChartButton"><i class="icon-chart"></i> Par Responsable</button>
                <button class="btn btn-warning ml-1" id="typeChartButton"><i class="icon-chart"></i> Par Type D'évèntment</button>
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
                @include('backend.includes.modals.events.edit_event')
                @include('backend.includes.modals.participants.create_participant')
                @include('backend.includes.modals.events.create_event')
                @include('backend.includes.modals.participants.edit_participant')
                @include('backend.includes.modals.participants.edit_payeur')
                @include('backend.includes.modals.charts.responsable_chart')
                @include('backend.includes.modals.charts.type_chart')
                @include('backend.includes.modals.emargement.emargement')
                @include('backend.includes.modals.creance.creance')
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
        "ajax": "{{route('admin.event.event_datatable')}}",
        "columns":[
            {"data": "theme"},
            {"data": "mobile"},
            {"data": "date_debut"},
            {"data": "date_fin"},
            {"data": "inscrits"},
            {"data": "lieu"},
            {"data": "responsable"},
            {"data": "presence"},
            {"data": "payment"},
            {"data": "action"}
        ],
        "columnDefs": [
            {"width": "130px", "targets": 9 }
        ]
    });

    $('#table').on('click', '.gestionParticipant', function () {
        var tr = $(this).closest('tr');
        var table = $('#table').DataTable();
        var row = table.row(tr);
        var id = $(this).data('id');

        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            row.child(format()).show();
            tr.addClass('shown');
        }

        function format () {

        var div = $('<div/>')
            .addClass( 'loading' )
            .text( 'Chargement...' );
 
            return '<table class="stripe" id="tableRow">'+
                        '<thead class="thead-light">'+
                            '<th>Adherents</th>'+
                            '<th>Participant</th>'+
                            '<th>Payeur</th>'+
                            '<th>Montant</th>'+
                            '<th>Presence</th>'+
                        '</thead>'+
                    '</table>';
            }
 
        
        
            $('#tableRow').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": false,
                "lengthChange": false,
                "ajax": "/admin/evenment/event/participant/ajax_gestion_participant/"+id,
                "columns":[
                    {"data":"adherent"},
                    {"data":"participant"},
                    {"data":"payeur"},
                    {"data":"montant"},
                    {"data":"presence"},
                ]
            });
            
            $('#tableRow').on('init.dt',function(){
                //firing when tableRow initialisation is complete

                $('#tableRow').on('click','.edit_participant',function(){
                var id = $(this).data('id');

                //populate participant edit form with data
                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                    $.ajax({
                    type: 'GET',
                    url: '/admin/participant_edit/'+id,
                    success: function(data){
                        var montant = $('#participantEditMontant');
                        $('#nom_participant_edit').val(data.participant.nom_participant);
                        $('#prenom_participant_edit').val(data.participant.prenom_participant);
                        $('#fonction_edit').val(data.participant.fonction);
                        $('#mobile_participant_edit').val(data.participant.mobile);
                        $('#email_edit').val(data.participant.email);
                        $("#participantEditAdherent").empty().append('<option value="'+data.adherent[0].id+'">'+data.adherent[0].name+'</option>').val(''+data.adherent[0].id+'').trigger('change');
                        montant.empty().append('<option value="'+data.montant[0].id+'">'+data.montant[0].text+'</option>').val(''+data.montant[0].id+'').trigger('change');
                        
                    },
                });
                });
                $('#tableRow').on('click','.edit_payeur',function(){
                    var id = $(this).data('id');
                    //populate payeur edit form with data

                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                    $.ajax({
                        type: 'GET',
                        url: '/admin/evenment/event/payeur/edit/'+id,
                        success: function(data){
                            $('#nom_payeur_edit').val(data.payeur.nom_payeur);
                            $('#prenom_payeur_edit').val(data.payeur.prenom_payeur);
                            $('#mobile_payeur_edit').val(data.payeur.mobile);
                            $('#telephone_edit').val(data.payeur.telephone);
                            $('#adresse_edit').val(data.payeur.adresse);
                            $('#observation_edit').val(data.payeur.observation);
                        },
                    });
                });
            });

            $('#tableRow').on('click','.delete_participant',function(){
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
                    url: "/admin/evenment/event/participant/delete/"+id,
                    type: "DELETE",
                    data: {_method:'DELETE'},
                    success: function()
                    {
                        
                        swal("Supprimé!", "Le participant a bien etait supprimé!", "success");
                        $('#table').DataTable().ajax.reload();
                        
                    },
                })
            }
        })
    })
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
                        url: "/admin/evenment/event/delete/"+id,
                        type: "DELETE",
                        data: {_method:'DELETE' },
                        success: function ()
                        {
                            swal("Supprimé!", "L'evenment a bien etait supprimé!", "success");
                            $('#table').DataTable().ajax.reload();
                        },
                        error: function() {
                            swal("Erreur","L'évenment n'a pas pu etre supprimé!", "error")
                        }
                        
                    });
                }
            })
    });
});
</script>
@endpush