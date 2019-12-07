@extends('backend.layouts.app')

@section('title' . app_name())

@section('content')

{{html()->form('POST', route('admin.participant.store'))->id('form')->class('form-horizontal')->open()}}
<div class="card">
    <div class="card-header">
        <h3>Ajouter un participant</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col">
                {{html()->label('Adherent')->class('col form-control-label')->for('adherent_id')->open()}}
                    {{html()->select('adherent_id',$adherent)->class('col form-control')}}
            </div>
        </div>
            <div id="tabs" class="mt-4">
                <ul>
                  <li><a href="#participant">Participant</a></li>
                  <li><a href="#payeur">Payeur</a></li>
                </ul>
                    <div id="participant">
                    <div class="row">
                    <div class="col-md-4">  
                        <div class="form-group">
                            {{html()->label('Nom')->class('col-md form-control-label')->for('nom_participant')}}
                                {{html()->text('nom_participant')
                                        ->class('col')}}
                        </div>
                    <input type="hidden" name="event_id" value="{{$event}}">
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
                            {{html()->label('Montant')->class('col-md form-control-label')->for('montant')}}
                                {{html()->select('montant')
                                        ->class('col')}}
                        </div>
                    </div>
                    </div> 
                    <div class="row">
                        <div class="col">
                            {{ form_cancel(route('admin.event.index'), __('buttons.general.cancel')) }}
                        </div>
                        <div class="col text-right">
                            {{form_submit(__('buttons.general.crud.create'))}}
                        </div>
                    </div>
                    </div><!--participant_tab-->
                    <div id="payeur">
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
                                                {{html()->number('telephone')
                                                        ->class('col')}}
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
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                        <button type="submit" formaction="{{route('admin.payeur.store')}}" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                    </div>
                    </div><!--payeur_tab-->
                  </div>
    </div><!--card_body-->
    <div class="card-footer">
        
    </div>
</div>
{{html()->form()->close()}}
@endsection
@push('myscript')
    <script>
    $(document).ready( function(){
        $( "#tabs" ).tabs();
    });
    </script>
@endpush