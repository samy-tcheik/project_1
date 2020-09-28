<div class="modal fade" role="dialog" id="eventEditModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifier l'evenment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{html()->modelform('POST')->class('form-horizontal')->id('eventEditForm')->open()}}
                <div class="row mt-4 mb-4">
                    <div class="col-md-6">
                        <div class="form-group row">
                            {{html()->label('Type')->class('col-md-3 form-control-label')->for('type')}}
                            <div class="col">
                                {{html()->select('type')
                                        ->class('form-control')
                                        ->id('type')}}
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            {{html()->label('Theme')->class('col-md-3 form-control-label')->for('theme')}}
                            <div class="col">
                                {{html()->text('theme')
                                        ->placeholder('Theme')
                                        ->id('theme')
                                        ->class('form-control')}}
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            {{html()->label('Date de Debut')->class('col-md-3 form-control-label')->for('date_debut')}}
                            <div class="col">
                                {{html()->date('date_debut')
                                        ->id('date_debut')
                                        ->class('form-control')}}
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            {{html()->label('Depenses')->class('col-md-3 form-control-label')->for('depenses')}}
                            <div class="col">
                                {{html()->text('depenses')
                                        ->class('form-control')
                                        ->id('depenses')
                                        ->attribute('type','number')}}
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                                {{html()->label('Désignation de la dépense')->class('col-md-3 form-control-label')->for('depenses_designation')}}
                                <div class="col">
                                    {{html()->text('depenses_designation')
                                            ->id('depenses_designation')
                                            ->class('form-control')}}
                                </div>
                            </div>
                    </div><!--col-->
                    <div class="col-md-6">
                            <div class="form-group row">
                                    {{html()->label('Responsable')->class('col-md-3 form-control-label')->for('user_id')}}
                                    <div class="col">
                                        {{html()->select('user_id')
                                                ->id('responsable')
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
                                                ->placeholder('Cout')
                                                ->id('cout')
                                                ->attribute('type','number')
                                                ->class('form-control')}}
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                        {{html()->label('Lien')->class('col-md-3 form-control-label')->for('lien')}}
                                        <div class="col">
                                            {{html()->text('lien')
                                                    ->id('lien')
                                                    ->attribute('type','url')
                                                    ->class('form-control')}}
                                        </div>
                                    </div>
                                    
                    </div><!--col-->
                    <div class="col">
                        <div class="form-group row mt-4">
                            {{html()->label('Montants')->class('col-md-2 form-control-label')->for('designation')}}
                            <div class="col-md-10">
                                <select name="designation[]" class="form-control" multiple="multiple" id="montant"></select>
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
                                    ->class('form-control')}}
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            {{html()->label('Observation')->class('col-md-2 form-control-label')->for('observation')}}
                            <div class="col-md-10">
                                {{html()->textarea('observation')
                                    ->id('observation')
                                    ->class('form-control')}}
                            </div>
                        </div>
                    </div>
                </div><!--row-->
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Enregistrer</button>
                <button class="btn btn-danger">Annuler</button>
            </div>
            {{html()->form()->close()}}
        </div>
    </div>
</div>
@push('myscript')
<script>
    $(document).ready(function(){
        $('#table').on('click','.eventEdit',function(){
            window.event_id = $(this).data('id');
            $('#eventEditForm').validate({
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
                    theme: "Une theme est requis",
                    date_debut: "Une date de debut d'évenment est requise",
                    date_fin: "Une date de fin d'évenment est requise",
                    responsable: "Veillez designez un responsable",
                    lieu: "Une lieu est requis"
                },
            });
            $('#type').select2({
                width: '100%',
                ajax: {
                    url: '{{ route("admin.event.getType")}}',
                    dataType: 'json',
                },
            });
            $('#responsable').select2({
                width: '100%',
                ajax: {
                    url: "{{route('admin.event.getResponsable')}}",
                    dataType: 'json',
                },
            });
            $('#montant').select2({
                width: '100%',
                disabled: true,
                ajax: {
                    url: "{{route('admin.event.getMontant')}}",
                    dataType: 'json',
                },
            });
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: 'GET',
                url: "/admin/event_edit/"+window.event_id,
                success: function(html){
                    var montant_selector = $('#montant');
                    var data = html.data;
                    var montant = html.montant;
                    $('#theme').val(data.theme);
                    $('#lieu').val(data.lieu);
                    $('#depenses').val(data.depenses);
                    $('#date_debut').val(data.date_debut);
                    $('#date_fin').val(data.date_fin);
                    $('#cout').val(data.cout);
                    $('#depenses_designation').val(data.depenses_designation);
                    $('#lien').val(data.lien);
                    $('#description').val(data.description);
                    $('#observation').val(data.observation);
                    $("#type").empty().append('<option value="'+html.type[0].id+'">'+html.type[0].text+'</option>').val(''+html.type[0].id+'').trigger('change');
                    $('#responsable').empty().append('<option value="'+html.responsable[0].id+'">'+html.responsable[0].first_name+'</option>').val(''+html.responsable[0].id+'').trigger('change');
                    montant.forEach(element => {
                        montant_selector.append('<option value="'+element.id+'">'+element.designation+'</option>').val(''+element.id+'');
                    });
                    montant_selector.trigger('change');
                    
                },
            });
            $('#eventEditModal').on('change','#payant',function(){
                $('#montant').attr('disabled', !this.checked);
            });
            
        }); 
        $('#eventEditForm').on('submit',function(e){
                var id = window.event_id;
                e.preventDefault();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: 'POST',
                    url: "/admin/evenment/event/"+id,
                    data: $(this).serialize(),
                    success: function(data){
                        $('#eventEditModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                        swal('Modifié','evenment a bien etait modifié','success');
                    },
                });
            });
    });
</script>
@endpush
<style>
    .error{
        color:red;
    }
</style>