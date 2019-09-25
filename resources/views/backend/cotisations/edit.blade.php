@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))



@section("content")
    <div class="card">
        <div class="card-header">
            <strong>Modifier Cotisation d'adherent <span class="font-xl badge badge-warning">{{$name}}</span></strong>
        </div>
            {{html()->modelForm($cotisation)->action(route('admin.cotisation.update',$cotisation->id))->id("Form")->open()}}
        {{html()->input('hidden','_method','PUT')}}
            @include('backend.cotisations.form')
            <div class="card-footer text-muted">
                {{html()->submit('Enregistrer')->class("btn btn-lg align-self-center btn-success")}}

            </div>
            {{html()->closeModelForm()}}
    </div>

@endsection
@push("myscript")
    <script>
        $("#adhInput").remove()
    </script>
    @endpush()
