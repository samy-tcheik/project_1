@extends('backend.layouts.app')

@section('title' . app_name())
    
@section('content')
    {{html()->form('POST', route('admin.event.store'))->id('form')->class('form-horizonntal')->open()}}
    <div class="card">
        <h3 class="card-header">Ajouter Un Eventment</h3>
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col-md-6">
                    <div class="form-groupe row">
                        {{html()->label('Type')->class('col-md-3 form-control-label')->for('type')}}
                        <div class="col">
                            {{html()->select('type' ,$type)
                                    ->class('form-control')}}
                        </div>
                    </div>
                    <div class="form-groupe row mt-4">
                        {{html()->label('Theme')->class('col-md-3 form-control-label')->for('theme')}}
                        <div class="col">
                            {{html()->text('theme')
                                    ->class('form-control')}}
                        </div>
                    </div>
                    <div class="form-groupe row mt-4">
                        {{html()->label('Date de Debut')->class('col-md-3 form-control-label')->for('date-debut')}}
                        <div class="col">
                            {{html()->date('date_debut')
                                    ->class('form-control')}}
                        </div>
                    </div>
                    <div class="form-groupe row mt-4">
                        {{html()->label('Depenses')->class('col-md-3 form-control-label')->for('depenses')}}
                        <div class="col">
                            {{html()->text('depenses')
                                    ->class('form-control')}}
                        </div>
                    </div>
                    <div class="form-groupe row mt-4">
                            {{html()->label('Désignation de la dépense')->class('col-md-3 form-control-label')->for('depenses_designation')}}
                            <div class="col">
                                {{html()->text('depenses_designation')
                                        ->class('form-control')}}
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-groupe row">
                                {{html()->label('Responsable')->class('col-md-3 form-control-label')->for('responsable')}}
                                <div class="col">
                                    {{html()->select('responsable' ,$responsable)
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-groupe row mt-4">
                                {{html()->label('Lieu')->class('col-md-3 form-control-label')->for('lieu')}}
                                <div class="col">
                                    {{html()->text('lieu')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-groupe row mt-4">
                                {{html()->label('Date de Fin')->class('col-md-3 form-control-label')->for('date-fin')}}
                                <div class="col">
                                    {{html()->date('date_fin')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-groupe row mt-4">
                                {{html()->label('Cout')->class('col-md-3 form-control-label')->for('cout')}}
                                <div class="col">
                                    {{html()->text('cout')
                                            ->class('form-control')}}
                                </div>
                            </div>
                            <div class="form-groupe row mt-4">
                                    {{html()->label('Lien')->class('col-md-3 form-control-label')->for('lien')}}
                                    <div class="col">
                                        {{html()->text('lien')
                                                ->class('form-control')}}
                                    </div>
                                </div>
                                
                </div>
                
            </div>
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
    </div>
@endsection