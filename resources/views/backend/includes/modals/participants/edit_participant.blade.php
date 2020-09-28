<div class="modal fade" id="participantEditModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifier le participant</h4>
            </div>
            <div class="modal-body">
                {{html()->modelform('POST')->id('participantEditForm')->class('form-horizontal')->open()}}
                <div class="form-group row">
                        <div class="col">
                            {{html()->label('Adherent')->class('form-control-label')->for('adherent_id')}}
                            <select name="adherent_id" id="participantEditAdherent" class="form-control"></select>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-4">  
                                <div class="form-group">
                                    {{html()->label('Nom')->class('col-md form-control-label')->for('nom_participant')->id('participantEditForm')}}
                                    {{html()->text('nom_participant')
                                            ->class('col')
                                            ->id('nom_participant_edit')}}
                                </div>
                                <div class="form-group mt-2">
                                    {{html()->label('Prenom')->class('col-md form-control-label')->for('prenom_participant')}}
                                    {{html()->text('prenom_participant')
                                            ->class('col')
                                            ->id('prenom_participant_edit')}}
                                </div>
                            </div><!--col-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{html()->label('Fonction')->class('col-md form-control-label')->for('fonction')}}
                                    {{html()->text('fonction')
                                            ->class('col')
                                            ->id('fonction_edit')}}
                                </div>
                                <div class="form-group">
                                    {{html()->label('Mobile')->class('col-md form-control-label')->for('mobile_participant')}}
                                    {{html()->text('mobile_participant')
                                            ->class('col')
                                            ->id('mobile_participant_edit')}}
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{html()->label('Email')->class('col-md form-control-label')->for('email')}}
                                    {{html()->email('email')
                                            ->class('col')
                                            ->id('email_edit')}}
                                </div>
                                <div class="form-group">
                                    {{html()->label('Montant')->class('col-md form-control-label')->for('montant')}}
                                    <select name="montant" class="form-control" id="participantEditMontant"></select>
                                </div>
                            </div>
                        </div> 
                        {{html()->form()->close()}}
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
                <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
@push('myscript')
    <script>
    $(document).ready(function(){
        
        
        $('#participantEditModal').on('show.bs.modal',function(){
            var id = $('.edit_participant').data('id');
            var event_id = $('.edit_participant').data('event_id');

            $('#participantEditMontant').select2({
                width: '100%',
                ajax: {
                    url: '/admin/participant/montant/'+event_id,
                    dataType: 'json',
                },
            });
            $('#participantEditAdherent').select2({
                width: '100%',
                ajax: {
                    url: '{{ route("admin.participant.getadherent")}}',
                    dataType: 'json',
                },

            });
        })
    });
    </script>
@endpush