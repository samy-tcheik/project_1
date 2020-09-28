<div class="modal fade" id="participantCreateModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un participant/payeur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{html()->form('POST')->id('participantCreateForm')->class('form-horizontal')->open()}}
                <div class="modal-body">
                        
                            <div id="tabs" class="mt-4">
                                <ul>
                                  <li><a href="#participant">Participant</a></li>
                                  <li><a href="#payeur">Payeur</a></li>
                                </ul>
                                <div id="participant">
                                    <div class="form-group row">
                                        <div class="col">
                                            {{html()->label('Adherent')->class('form-control-label')->for('adherent_id')}}
                                            <select name="adherent_id" id="adherent_participant" class="form-control"></select>
                                        </div>
                                    </div>  
                                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{html()->label('Nom')->class('col-md form-control-label')->for('nom_participant')}}
                                            {{html()->text('nom_participant')
                                                    ->class('col')}}
                                        </div>
                                        <input type="hidden" name="event_id" id="participant_event_id" value="">
                                        <div class="form-group mt-2">
                                            {{html()->label('Prenom')->class('col-md form-control-label')->for('prenom_participant')}}
                                            {{html()->text('prenom_participant')
                                                    ->class('col')}}
                                        </div>
                                    </div><!--col-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{html()->label('Fonction')->class('col-md form-control-label')->for('fonction')}}
                                            {{html()->text('fonction')
                                                    ->class('col')}}
                                        </div>
                                        <div class="form-group">
                                            {{html()->label('Mobile')->class('col-md form-control-label')->for('mobile_participant')}}
                                            {{html()->text('mobile_participant')
                                                    ->class('col')}}
                                        </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{html()->label('Email')->class('col-md form-control-label')->for('email')}}
                                                {{html()->email('email')
                                                        ->class('col')}}
                                        </div>
                                        <div class="form-group">
                                            {{html()->label('Montant')->class('col-md form-control-label')->id('montant_id')->for('montant_id')}}
                                                <select name="montant_id" class="form-control" id="participantCreateMontant"></select>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-danger" id="participantCreateCancel">Annuler</button>
                                        </div>
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary" id="participant_submit">Enregistrer</button>
                                        </div>
                                    </div>
                                {{html()->form()->close()}}
                                </div><!--participant_tab-->
                                <div id="payeur">
                                {{html()->form('POST')->id('payeurCreateForm')->class('form-horizontal')->open()}}
                                <div class="form-group row">
                                        <div class="col">
                                            {{html()->label('Adherent')->class('form-control-label')->for('adherent_id')}}
                                            <select name="adherent_id" id="adherent_payeur" class="form-control"></select>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                {{html()->label('Nom')->class('col-md form-control-label')->for('nom_payeur')}}
                                                {{html()->text('nom_payeur')
                                                        ->class('col')}}
                                            </div>
                                            <div class="form-group mt-2">
                                                {{html()->label('Prenom')->class('col-md form-control-label')->for('prenom_payeur')}}
                                                {{html()->text('prenom_payeur')
                                                        ->class('col')}}
                                            </div>
                                            <div class="form-group">
                                                {{html()->label('Mobile')->class('col-md form-control-label')->for('mobile_payeur')}}
                                                {{html()->text('mobile_payeur')
                                                        ->class('col')}}
                                            </div>
                                            <div class="form-group">
                                                {{html()->label('Téléphone')->class('col-md form-control-label')->for('telephone')}}
                                                <input type="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" name="telephone" id="telephone">
                                            </div>
                                        </div><!--col-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{html()->label('Adresse')->class('col-md form-control-label')->for('adresse')}}
                                                {{html()->textarea('adresse')
                                                        ->class('col')}}
                                            </div>
                                            <div class="form-group">
                                                {{html()->label('Observation')->class('col-md form-control-label')->for('observation')}}
                                                {{html()->textarea('observation')
                                                        ->class('col')}}
                                            </div>
                                            <input type="hidden" name="event_id" id="payeur_event_id" value="">
                                        </div>
                                        <div class="row">
                                            <div class="col md-12">
                                                <button type="submit" class="btn btn-primary" id="payeur_submit">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--payeur_tab-->
                            </div>
                    {{html()->form()->close()}}
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@push('myscript')
    <script>
    $(document).ready(function(){
        $( "#tabs" ).tabs();
        $('#participantCreateForm').validate({   
            rules: {
                adherent_id: "required",
                nom_participant: "required",
                prenom_participant: "required",
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                adherent_id: "Ce champ est obligatoire",
                nom_participant: "Ce champ est obligatoire",
                prenom_participant: "Ce champ est obligatoire",
                email:{
                    required: "Ce champ est obligatoire",
                    email: "L'email n'est pas valid"
                },
            },
        });
        $('#payeurCreateForm').validate({
                rules: {
                    adherent_id: "required",
                    nom_payeur: "required",
                    prenom_payeur: "required",
                    telephone: "required",
                },
            });
        $('#table').on('click','.create-participant',function(){
            var event_id = $(this).data('id');
            var event_montant = $('.create-participant').data('montant');
            $('#payeurCreateForm').trigger('reset');
            $('#participantCreateForm').trigger('reset');
            $('#payeur_submit').removeAttr('disabled');
            $('#participant_submit').removeAttr('disabled');
            $('#participant_event_id').val(event_id);
            $('#payeur_event_id').val(event_id);

            $('#participantCreateMontant').select2({
                width: '100%',
                ajax: {
                    url: '/admin/participant/montant/'+event_id,
                    dataType: 'json',
                },
            });

            $('#adherent_participant').select2({
            width: '100%',
            ajax: {
                url: '{{ route("admin.participant.getadherent")}}',
                dataType: 'json',
            }
            });

            $('#adherent_payeur').select2({
            width: '100%',
            ajax: {
                width: '100%',
                url: '{{ route("admin.participant.getadherent")}}',
                dataType: 'json',
            }
            });
            $('#montant').val(null).trigger('change');
            $('#adherent_participant').val(null).trigger('change');
            $('#adherent_payeur').val(null).trigger('change');
            });
            //all the ajax submition calls related to the form
            $('#payeurCreateForm').on('submit',function(e){
                e.preventDefault();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: 'POST',
                    url: "{{route('admin.payeur.store')}}",
                    data: $(this).serialize(),
                    success: function(data){
                        $('#participantCreateModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                        swal('Ajouté','Le Particiopant '+data+' a bien etait ajouté','success');
                    }
                });
            });
            $('#participantCreateForm').on('submit',function(e){
            e.preventDefault();
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: 'POST',
                url: "{{route('admin.participant.store')}}",
                data: $(this).serialize(),
                success: function(data){
                    $('#participantCreateModal').modal('hide');
                    $('#table').DataTable().ajax.reload();
                    swal('Ajouté','Le Particiopant '+data+' a bien etait ajouté','success');
                }
            });
        });
    });
    </script>
@endpush