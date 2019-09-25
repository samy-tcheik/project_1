@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))



@section("content")
    <div class="card">
        <div class="card-header">
            <strong>Ajouter Cotisation</strong>
        </div>
        <form method="post" action="{{route("admin.cotisation.store")}}" id="Form">
        @include('backend.cotisations.form')
            <div class="card-footer text-muted">
            {{html()->submit('Enregistrer')->class("btn btn-lg align-self-center btn-success")->id("submit")}}
               {{html()->reset('cancel')->class("btn btn-lg align-self-center btn-danger")}}
            </div>
        </form>
    </div>

@endsection
@push('myscript')
    <script>

$('#search').autocomplete({
    source:function (data,callback) {
        $.ajax({
            url:"{{route("admin.ajaxAdherent")}}",
            dataType: 'Json',
            data:{"search":$("#search").val()},
            type:"get",
            success:function (data) {
                callback(data)
            }

        })

    },
    select:function (event,ui) {
        $("[name='adherents_id']").val(ui.item.id)
        $(this).val(ui.item.name)
        $(this).prop('disabled',true)
        return false
    }
}).autocomplete("instance")._renderItem = function (ul ,item) {
    return  $('<li class=" font-lg" >')
        .append("<div class='shadow-sm border-bottom'><br> Nom d'adherent :: <span class='badge badge-success font-xl'> "+item.name+"</span>"+
                "&emsp;Numéro de dossier :: <span class='badge badge-secondary font-xl'>  "+ item.dossier +"</span><br><br>"+
                "&emsp; Chiffre affaire :: <span class='badge badge-secondary font-xl'> " +item.ca+"</span>"+
                "&emsp;Nombre d'effectif :: <span class='badge badge-secondary font-xl'> "+ item.effectif+"</span><br><br>" +
                "&emsp; Forme juridique :: <span class='badge badge-success font-xl'> " + item.juridic.designation +"</span>"+
                "&emsp; Code nae :: <span class='badge badge-secondary font-xl'>  "+ item.code_nae +"</span></div>"
                )
        .appendTo(ul)
}
$('#search').focus(function () {
    $("[name='adherents_id']").val("")
})

$('#Form').validate({
    ignore:[],
})
$('#Form input').on('keyup blur', function () {
    if ($('#Form').valid()) {
        $('#submit').prop('disabled', false);
    } else {
        $('#submit').prop('disabled', 'disabled');
    }
});
$("#Form").on("reset",function () {
    $('#search').prop("disabled",false)
    $("[name='adherents_id']").val("")
})

    </script>
    <style>
        .error{
            color: red;
        }
        .ui-autocomplete {
            max-height: 400px;
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: 20px;}
    </style>
@endpush
