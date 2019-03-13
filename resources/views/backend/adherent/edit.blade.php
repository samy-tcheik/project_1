

@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))



@section('content')
    <div class="card">
        <h3 class="card-header">Modifier Adhérent </h3>
        <div class="card-body">
            <h5 class="card-title">Adhérent info</h5>
            <hr>
            {{ html()->modelForm($adherent)->action(route('admin.adherent.update', $adherent->id))->open() }}
            @include('backend.adherent.form')

        </div>

        <div class="card-footer ">

                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.adherent.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.update')) }}
                    </div><!--col-->
                </div><!--row-->


        </div>

        {{ html()->closeModelForm() }}
    </div>


@endsection



