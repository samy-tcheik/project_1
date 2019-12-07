@extends('backend.layouts.app')

@section('title' . app_name())
    
@section('content')
    {{html()->form('POST', route('admin.event.store'))->id('form')->class('form-horizontal')->open()}}
    <div class="card">
        <h3 class="card-header">Ajouter Un Eventment</h3>
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <div class="form-group row">
                        {{html()->label('Type')->class('col-md-3 form-control-label')->for('type')}}
                        <div class="col">
                            {{html()->select('type',$type)
                                    ->class('form-control')}}
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        {{html()->label('Theme')->class('col-md-3 form-control-label')->for('theme')}}
                        <div class="col">
                            {{html()->text('theme')
                                    ->placeholder('Theme')
                                    ->class('form-control')}}
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        {{html()->label('Date de Debut')->class('col-md-3 form-control-label')->for('date_debut')}}
                        <div class="col">
                            {{html()->date('date_debut')
                                    ->class('form-control')}}
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        {{html()->label('Depenses')->class('col-md-3 form-control-label')->for('depenses')}}
                        <div class="col">
                            {{html()->text('depenses')
                                    ->class('form-control')
                                    ->placeholder('Depenses')
                                    ->attribute('type','number')}}
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                            {{html()->label('Désignation de la dépense')->class('col-md-3 form-control-label')->for('depenses_designation')}}
                            <div class="col">
                                {{html()->text('depenses_designation')
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
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Lieu')->class('col-md-3 form-control-label')->for('lieu')}}
                                <div class="col">
                                    {{html()->text('lieu')
                                            ->placeholder('Lieu')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Date de Fin')->class('col-md-3 form-control-label')->for('date_fin')}}
                                <div class="col">
                                    {{html()->date('date_fin')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                {{html()->label('Cout')->class('col-md-3 form-control-label')->for('cout')}}
                                <div class="col">
                                    {{html()->text('cout')
                                            ->placeholder('Cout')
                                            ->attribute('type','number')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                    {{html()->label('Lien')->class('col-md-3 form-control-label')->for('lien')}}
                                    <div class="col">
                                        {{html()->text('lien')
                                                ->placeholder('Lien')
                                                ->attribute('type','url')
                                                ->class('form-control')}}
                                    </div>
                                </div>
                                
                </div><!--col-->
                <div class="col">
                    <div class="form-group row mt-4">
                        {{html()->label('Montants')->class('col-md-2 form-control-label')->for('designation')}}
                        <div class="col-md-10 ">
                            <input type="text" name="designation" data-role="tagsinput" id="tags_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                            <label for="paiment_modes_id" class="col-md-2">payant</label>
                    {{html()->checkbox('paiment_modes_id', false, '2')}}
                    </div>
                    <div class="form-group row mt-4">
                        {{html()->label('Description')->class('col-md-2 form-control-label')->for('description')}}
                        <div class="col-md-10">
                            {{html()->textarea('description')
                                ->placeholder('description')
                                ->class('form-control')}}
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        {{html()->label('Observation')->class('col-md-2 form-control-label')->for('observation')}}
                        <div class="col-md-10">
                            {{html()->textarea('observation')
                                ->placeholder('observation')
                                ->class('form-control')}}
                        </div>
                    </div>
                </div>
                
            </div><!--row-->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.event.index'), __('buttons.general.cancel')) }}
                </div>
                <div class="col text-right">
                    {{form_submit(__('buttons.general.crud.create'))}}
                </div>
            </div><!--row-->
        </div><!--card_footer-->
    </div><!--card-->
    {{html()->form()->close()}}
@endsection
@push('myscript')
<script>
$(document).ready(function(){
    $('#tags_id').tagsinput('items').split(','); 
    $('#form').validate({
    rules: {
        type: "required",
        theme: "required",
        date_debut: "required",
        date_fin: "required",
        responsable: "required",
        lieu: "required"
    }
}); 
});
        


</script>
<style>
.error{
    color: red;
}
</style>
    
@endpush