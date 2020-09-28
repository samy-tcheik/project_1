<div class="modal fade" id="creanceModal" role="modal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Creance de L'évenment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-4">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless" id="creanceTable">
                                <thead class="thead-dark">
                                    <th>Adherent</th>
                                    
                                    <th>Nombre</th>
                                    <th>Montant</th>
                                    
                                    <th>Payment/Total</th>
                                    
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
    $(document).ready(function(){
        $('#table').on('click','.creance',function(){
        var id = $(this).data('id');
        $('#creanceTable').DataTable({
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "/admin/evenment/event/creance/creance_datatables/"+id,
                "error": function(xhr,error){
                    if (xhr.responseJSON.message) {
                        $('#creanceTable').DataTable().clear().destroy();
                        swal("Erreur","Les Creance ne sont pas dispo pour cet evenment","error");
                        $('#creanceModal').modal('hide');
                    }
                },
                },
            "columns": [
                {"data":"Adherent"},
                {"data":"Nombre"},
                {"data":"Montant"},
                {"data":"Payment"},
            ]
        });
        });
        $('#creanceModal').on('hide.bs.modal',function(){
            $('#creanceTable').DataTable().clear().destroy();
        })
        
    });
    </script>
@endpush