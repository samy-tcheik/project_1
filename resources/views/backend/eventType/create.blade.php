@extends('backend.layouts.app')

@section('title' . app_name())

@section('content')
{{ html()->form('POST', route('admin.type.store'))->id('form')->class('form-horizontal')->open()}}
    <div class="card">
        <h3 class="card-header">Ajouter Un Type</h3>
        <div class="card-body">
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-groupe row">
                        {{ html()->label('<h5>Type</h5>')->class('col-md-1 form-control-label')->for('type')}}
                        <div class="col-md-11">
                            {{html()->text('type')
                                    ->class('form-control')
                                    ->placeholder('Nom du type')
                                    ->required()
                                    ->autofocus()}}
                                    @if ($errors->has('type'))
                                    <label for="type" class="error">{{$errors->first('type')}}</label>
                                    @endif
                        </div><!--col-->
                    </div><!--form-groupe-->
                    <br>
                    <div class="form-groupe row">
                        {{ html()->label('<h5>Prefix</h5>')->class('col-md-1 form-control-label')->for('prefix')}}
                        <div class="col-md-11">
                            {{ html()->text('prefix')
                                    ->class('form-control')
                                    ->placeholder('Prefix')
                                    ->required()
                                    ->autofocus()}}
                        @if ($errors->has('prefix'))
                        <label for="prefix" class="error">{{$errors->first('prefix')}}</label>
                        @endif
                    </div><!--col-->
                        
                    </div><!--form-groupe-->
                    <br>
                    <div class="form-groupe row">
                        <h5 class="m-3">Date <small>(date de la note de frais)</small></h5>
                        <div class="col-md-11">
                            {{html()->radio('date')->value('1')->id('debut')}}
                            {{html()->label("Début D'évenetment")->for('debut')}}
                        </div>
                        <div class="col-md-11">
                            {{html()->radio('date')->value('2')->id('fin')}}
                            {{html()->label("Fin D'évèntment")->for('fin')}}
                        </div>
                        <div class="col-md-11">
                            {{html()->radio('date')->value('3')->id('edit')}}
                            {{html()->label("Date D'édition")->for('edit')}}
                        </div>
                    </div><!--form-groupe-->
                    <br>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                {{ form_cancel(route('admin.type.index'), __('buttons.general.cancel')) }}
                            </div>
                            <div class="col text-right">
                                {{form_submit(__('buttons.general.crud.create'))}}
                            </div>
                        </div><!--row-->
                    </div><!--card_footer-->
                </div>
            </div>
            
        </div>
    </div>
    {{html()->form()->close()}}
@endsection
@push('myscript')
    <script>
            $("#form").validate({
                rules: {
                    type: "required",
                    prefix: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    type: "Ce champ est obligatoire",
                    prefix: {
                        required: "Ce champ est obligatoire",
                        minlength: "Le prefix doit comporter trois caractères ou plus"
                    }
                }
            })
    </script>
    <style>
        .error{
            color: red;
        }
    </style>
@endpush