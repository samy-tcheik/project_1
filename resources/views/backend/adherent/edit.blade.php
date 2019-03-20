

@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))



@section('content')
    <div class="card">
        <h3 class="card-header">Modifier Adhérent </h3>
        <div class="card-body">

            {{ html()->modelForm($adherent)->action(route('admin.adherents.update', $adherent))->open() }}
            {{html()->input('hidden','_method','PUT')}}

                <div class="row">
            @include('backend.adherent.form')
                </div>


        </div>

        <div class="card-footer ">

                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.adherents.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.update')) }}
                    </div><!--col-->
                </div><!--row-->


        </div>

        {{ html()->closeModelForm() }}
    </div>


@endsection



