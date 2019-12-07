@extends('backend.layouts.app')

@section('title' . app_name())

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Emargement
                </h4>
            </div>
        </div><!--row-->
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Adherent</th>
                                <th>Nom participant</th>
                                <th>Prenom participant</th>
                                <th>Fonction participant</th>
                                <th>Présence</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div><!--card-body-->
</div>

@endsection
@push('myscript')
    <script>
        $(document).ready( function(){
            var id = {{request()->route('id')}}
        $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
        "url": "/admin/evenment/event/participant/ajaxdatatable/"+id,
        "complete": function(){
        $('.participation').bootstrapToggle({
        on: 'Oui',
        off: 'Non',
        onstyle: 'success',
        offstyle: 'danger',
        width: '70'
        });
        $('.participation').change(function(){
        
        
        var checkbox = $('.participation');
        if (checkbox.is(':checked')===true) {
            checkbox.attr('value','1')
        } else {
            checkbox.attr('value','0')
        }
        var presence = $(this).attr('value');
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            type: "POST",
            url: "/admin/evenment/event/participant/presence/"+id,
            data: { presence:presence },
        });
    });
        },
        },
        "columns":[
            {"data": "adherent_id"},
            {"data": "nom_participant"},
            {"data": "prenom_participant"},
            {"data": "fonction"},
            {"data": "action"},
        ]
    });
    
    });
    
    </script>
@endpush