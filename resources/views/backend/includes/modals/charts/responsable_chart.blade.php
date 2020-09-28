<div class="modal fade" id="responsableChartModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Par Responsable d'evenment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <canvas id="responsableChart"></canvas>
            </div>
        </div>
    </div>
</div>
@push('myscript')
    <script>
    $(document).ready(function(){
        
            $('#responsableChartButton').click(function(){
                var responsable_chart = $('#responsableChart');
            var chart1 = new Chart(responsable_chart,{
                type: 'bar',
                options: {
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                            }
                        }],
                    },
                },
            });
              $.ajax({
                    type: 'GET',
                    url: '{{route("admin.chart.responsable")}}',
                    success: function(data){
                        chart1.data = data.returnData;
                        $('#responsableChartModal').modal('show');
                    },  
                });  
            });

    });
    </script>    
@endpush