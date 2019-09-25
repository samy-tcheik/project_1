@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))



@section('content')
    <div class="card">
        <h3 class="card-header">Nouveaux Adhérent </h3>
            <div class="card-body">
                @csrf     {{--adherent  inf--}}
                {{html()->form('post' ,Route('admin.adherents.store') )->id('Form')->attribute('autocomplete',"off")->open()}}
                <div class="row">
                    @include('backend.adherent.form')
                </div>
            </div>
        <div class="card-footer ">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.adherents.index', request()->route()->parameter('adherent')), __('buttons.general.cancel')) }}
                </div><!--col-->
                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
        {{html()->form()->close()}}
    </div>

@endsection
@if(!request()->route()->parameter('adherent'))
@push('myscript')
    <script>
        token =  $('input[name="_token"]').val();
        $(function () {

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
        })/*D.ready*/
        $('#Form').validate({

            messages : {
                dossier: {
                    remote: "ce dossier n'est pas disponible"
                }
            }
        })
        $('#dossier').rules('add',{

                "remote" :{
                    url:"{{route('admin.checkNumber')}}",
                    type: 'POST',
                    data: {dossier:function () {
                            return $("#dossier").val()
                        },_token:token},
        }
        })
    </script>
@endpush
    @else
@push('myscript')
        <script>
            $('#dossier_html').remove()
        </script>
        @endpush
@endif
