@extends('layout-default')
@section('content')
<link href="css/sb-admin.css" rel="stylesheet"> 
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="./vendor/chart.js/Chart.bundle.js"></script>
<script src="./vendor/chart.js/utils.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-inline">
                <div class="form-group mb-2">
                    <label for="input1" class="sr-only">Fecha incial</label>
                    <input type="date" class="form-control" id="input1">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="input2" class="sr-only">Fecha Final</label>
                    <input type="date" class="form-control" id="input2">
                </div>
                <button id="filtrar" type="button" class="btn btn-primary mb-2">Filtrar</button>
            </div>
        </div>
        <div class="col-md-12">
            <div style="width: 75%;">
                <canvas id="canvas"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
		var color = Chart.helpers.color;
		var barChartData = {
			labels: ['Impacto Bajo', 'Impacto Medio', 'Impacto Alto'],
			datasets: [{
				label: '',
				backgroundColor: [color(window.chartColors.red).alpha(0.5).rgbString(),
                                  color(window.chartColors.yellow).alpha(0.5).rgbString(),
                                  color(window.chartColors.green).alpha(0.5).rgbString()],
				borderColor: [window.chartColors.red, window.chartColors.yellow, window.chartColors.green],
				borderWidth: 1,
				data: [
					
				]
			}
            ]

		};    
    window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
                        display: false
					},
					title: {
						display: true,
						text: 'Proyecto de Responsabilida Social'
					},
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
				}
			});
            $('#filtrar').click(function name(params) {
                var params = '';
                if($('#input1').val().length > 0 && $('#input2').val().length > 0){
                    params = '?start=' + $('#input1').val() + '&end=' + $('#input2').val();
                }else{
                    params = '';
                }
                $.get( "report/qualities" + params)
                .done(function( data ) {
			        if (barChartData.datasets.length > 0) {
                        for (var index = 0; index < barChartData.datasets.length; ++index) {
                            barChartData.datasets[index].data = [];
                            barChartData.datasets[index].data.push(data['bajo']);
                            barChartData.datasets[index].data.push(data['medio']);
                            barChartData.datasets[index].data.push(data['alto']);
                        }
                        window.myBar.update();
                    }
                });
            });
		};
</script>
@stop
