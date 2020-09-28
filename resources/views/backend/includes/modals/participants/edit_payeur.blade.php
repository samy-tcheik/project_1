<div class="modal fade" id="payeurEditModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modifier le payeur</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">  
                    {{html()->modelform('POST')->id('payeurEditForm')->class('form-horizontal')->open()}}
                        <div class="form-group">
                            {{html()->label('Nom')->class('col-md form-control-label')->for('nom_payeur')}}
                            {{html()->text('nom_payeur')
                                    ->id('nom_payeur_edit')
                                    ->class('col')}}
                        </div>
                        <div class="form-group mt-2">
                            {{html()->label('Prenom')->class('col-md form-control-label')->for('prenom_payeur')}}
                            {{html()->text('prenom_payeur')
                                    ->id('prenom_payeur_edit')
                                    ->class('col')}}
                            </div>
                        <div class="form-group">
                            {{html()->label('Mobile')->class('col-md form-control-label')->for('mobile_payeur')}}
                            {{html()->text('mobile_payeur')
                                    ->id('mobile_payeur_edit')
                                    ->class('col')}}
                        </div>
                        <div class="form-group">
                            {{html()->label('Téléphone')->class('col-md form-control-label')->for('telephone')}}
                            {{html()->number('telephone')
                                    ->id('telephone_edit')
                                    ->class('col')}}
                        </div>
                    </div><!--col-->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{html()->label('Adresse')->class('col-md form-control-label')->for('adresse')}}
                            {{html()->textarea('adresse')
                                    ->id('adresse_edit')
                                    ->class('col')}}
                        </div>
                        <div class="form-group">
                            {{html()->label('Observation')->class('col-md form-control-label')->for('observation')}}
                            {{html()->textarea('observation')
                                    ->id('observation_edit')
                                    ->class('col')}}
                        </div>
                    </div>
                    {{html()->form()->close()}}
                </div>
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
        $('#tableModal').on('click','.editPayeur',function(){
            var id = $('.editPayeur').data('id');
            console.log(id);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type:'GET',
                url: "/admin/payeur_edit/"+id,
                success: function(data){

                }

            })
        });
    });
    </Script>
@endpush