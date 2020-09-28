<div class="modal fade" id="typeChartModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Par Type d'evenment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <canvas id="typeChart"></canvas>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@push('myscript')
    <script>
        $(document).ready(function(){
            $('#typeChartButton').click(function(){
                var type_chart = $('#typeChart');
                var chart2 = new Chart(type_chart,{
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
                    url: '{{route("admin.chart.type")}}',
                    success: function(data){
                        console.log(data.returnData);
                        chart2.data = data.returnData;
                        $('#typeChartModal').modal('show');
                    },  
                });  
            })
        });
    </script>
@endpush