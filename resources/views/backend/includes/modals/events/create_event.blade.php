    <div class="modal fade" id="eventCreateModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter Un Eventment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{html()->form('POST')->id('eventCreate')->class('form-horizontal')->open()}}
                    <div class="row mt-4 mb-4">
                        <div class="col-md-6">
                            <div class="form-group row">
                                {{html()->label('Type')->class('col-md-3 form-control-label')->for('type')}}
                                <div class="col">
                                    {{html()->select('type',$type)
                                            ->class('form-control')
                                            ->id('type')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Theme')->class('col-md-3 form-control-label')->for('theme')}}
                                <div class="col">
                                    {{html()->text('theme')
                                            ->id('theme')
                                            ->placeholder('Theme')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Date de Debut')->class('col-md-3 form-control-label')->for('date_debut')}}
                                <div class="col">
                                    {{html()->date('date_debut')
                                            ->id('data_debut')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Depenses')->class('col-md-3 form-control-label')->for('depenses')}}
                                <div class="col">
                                    {{html()->text('depenses')
                                            ->id('depenses')
                                            ->class('form-control')
                                            ->placeholder('Depenses')
                                            ->attribute('type','number')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Désignation de la dépense')->class('col-md-3 form-control-label')->for('depenses_designation')}}
                                <div class="col">
                                    {{html()->text('depenses_designation')
                                            ->id('depenses_designation')
                                            ->placeholder('Désignation de la dépense')
                                            ->class('form-control')}}
                                </div>
                            </div>
                        </div><!--col-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                {{html()->label('Responsable')->class('col-md-3 form-control-label')->for('user_id')}}
                                <div class="col">
                                    {{html()->select('user_id' ,$responsable)
                                            ->id('user_id')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Lieu')->class('col-md-3 form-control-label')->for('lieu')}}
                                <div class="col">
                                    {{html()->text('lieu')
                                            ->id('lieu')
                                            ->placeholder('Lieu')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Date de Fin')->class('col-md-3 form-control-label')->for('date_fin')}}
                                <div class="col">
                                    {{html()->date('date_fin')
                                            ->id('date_fin')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Cout')->class('col-md-3 form-control-label')->for('cout')}}
                                <div class="col">
                                    {{html()->text('cout')
                                            ->id('cout')
                                    ->placeholder('Cout')
                                    ->attribute('type','number')
                                    ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Lien')->class('col-md-3 form-control-label')->for('lien')}}
                                <div class="col">
                                    {{html()->text('lien')
                                            ->id('lien')
                                            ->placeholder('Lien')
                                            ->attribute('type','url')
                                            ->class('form-control')}}
                                </div>
                            </div>
                        </div><!--col-->
                        <div class="col">
                            <div class="form-group row mt-4">
                                {{html()->label('Montants')->class('col-md-2 form-control-label')->for('designation')}}
                                <div class="col-md-10">
                                    <select name="designation[]" class="form-control" multiple="multiple" id="createMontantSelect2"></select>
                                </div>
                            </div>
                        <div class="form-group row mt-4">
                            <label for="paiment_modes_id" class="col-md-2">payant</label>
                            {{html()->checkbox('paiment_modes_id', false, '2')
                                    ->id('payant')}}
                        </div>
                        <div class="form-group row mt-4">
                            {{html()->label('Description')->class('col-md-2 form-control-label')->for('description')}}
                            <div class="col-md-10">
                                {{html()->textarea('description')
                                        ->id('description')
                                        ->placeholder('description')
                                        ->class('form-control')}}
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            {{html()->label('Observation')->class('col-md-2 form-control-label')->for('observation')}}
                            <div class="col-md-10">
                                {{html()->textarea('observation')
                                        ->id('observation')
                                        ->placeholder('observation')
                                        ->class('form-control')}}
                            </div>
                        </div>
                    </div>
                </div><!--row-->
            </div>
            <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                    <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>
        </div>
        {{html()->form()->close()}}
    </div>
</div>
@push('myscript')
    <script>
    $(document).ready(function(){
        $('#createEventModal').on('show.bs.modal',function(){
            
        })
        $('#createMontantSelect2').select2({
        width: '100%',
        disabled: true,
        tags: true,
        tokenSeparators: [',', ' '],
        selectOnClose: true
        });
        $('#eventCreate').validate({
            rules: {
            type: "required",
            theme: "required",
            date_debut: "required",
            date_fin: "required",
            responsable: "required",
            lieu: "required"
            },
            messages: {
                type: "Un type d'évenment est requis",
                theme: "Un theme est requis",
                date_debut: "Une date de debut d'évenment est requise",
                date_fin: "Une date de fin d'évenment est requise",
                responsable: "Veillez designez un responsable",
                lieu: "Une lieu est requis"
            },
            submitHandler: function(){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "POST",
                url: "{{route('admin.event.store')}}",
                data: $('#eventCreate').serialize(),
                success: function(data){
                    $('#eventCreateModal').modal('hide');
                    $('#table').DataTable().ajax.reload();
                    swal('Ajouté','Eventment Ajouté','success');
                    $('#eventCreate').trigger('reset');
                    $('#createMontantSelect2').val(null).trigger('change');
                    $('#createMontantSelect2').attr('disabled');
                }
            });   
            },
        });
        $('#eventCreateModal').on('change','#payant',function(){
            $('#createMontantSelect2').attr('disabled', !this.checked);
        });
        
    });
    </script>
@endpush