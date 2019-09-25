

@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))



@section('content')
    <div class="card">
        <h3 class="card-header">Modifier Adhérent </h3>
        <div class="card-body">

            {{ html()->modelForm($adherent)->action(route('admin.adherents.update', $adherent))->id('Form')->open() }}
            {{html()->input('hidden','_method','PUT')}}

                <div class="row">
            @include('backend.adherent.form')
                </div>


        </div>

        <div class="card-footer ">

                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.adherents.index',$adherent->prospect), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.update')) }}
                    </div><!--col-->
                </div><!--row-->


        </div>

        {{ html()->closeModelForm() }}
    </div>


@endsection
@if(!$adherent->prospect)
@push('myscript')
    <script>
        token =  $('input[name="_token"]').val();
        $(function () {

        })/*D.ready*/

        $('#dossier').autocomplete({
            source:function (data,callback){

                $.ajax({
                    url : "{{route('admin.autoComplete')}}",
                    type:'POST',
                    dataType: 'Json',
                    data:{ _token:token},
                    success:function (data) {
                        callback(data)
                    }/*success Func*/
                })/* ajax Func*/
            }/*Source Func*/
        }) /*autoCompl func*/
        $('#Form').validate({
            messages : {
                dossier: {
                    remote: "ce dossier n'est pas dispenible"
                }
            }
        })
        edited = "{{$adherent->id}}";

        $('#dossier').rules('add',{
            remote :{
                url:"{{route('admin.checkNumber')}}",
                type: 'POST',
                data: {id:edited ,dossier:$("dossier").val(),_token:token},
            }
        })
    </script>
@endpush
@else
@push('myscript')
    <script>
        $('#dossier').prop('disabled',true)
    </script>
    @endpush
    @endif


