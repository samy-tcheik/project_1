<div class="modal fade" id="emargementModal" role="modal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Emargement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" id="emargementTable">
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
        </div>
        </div>
    </div>
</div>
@push('myscript')
    <script>
        $(document).ready( function(){
        $('#table').on('click','.emargement',function(){
            var id = $(this).data('id');
            var emargement_table = $('#emargementTable');
        $('#emargementTable').DataTable({
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

        var presence = $(this).is(':checked') ? 1 : 0 ;


        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            });
    
            $.ajax({
            type: "POST",
            url: "/admin/evenment/event/participant/presence/"+id,
            data: { presence:presence },
            success: function(data)
            {
                $('#emargementTable').ajax.reload();
            }
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
    $('#emargementModal').on('hide.bs.modal',function(){
        $('#emargementTable').DataTable().clear().destroy();
        $('#table').DataTable().ajax.reload();
    });
    });
    
    </script>
    @endpush