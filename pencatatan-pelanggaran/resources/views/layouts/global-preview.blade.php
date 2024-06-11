<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/azzara.css') }}">

    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['{{ asset('assets/css/fonts.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <style>
        body{
            margin: 0;
            padding: 3%;
            background-color: #F9FBFD;
        }
    </style>
</head>
<body>
    <div class="navbar col card p-4 m-0">
        tes
    </div>
    <div class="col">
        <div class="row gap-3">
            <div class="top-movers col-7 card my-3 mr-3 p-0">
                <div class="title p-3">
                    <h2>Pelanggaran</h2>
                </div>
                <hr class="mt-0">
                <div class="px-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pelanggaran</th>
                                <th scope="col">Jumlah Pelanggaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Mark</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Jacob</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry the Bird</td>
                                <td>Larry the Bird</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Larry the Bird</td>
                                <td>Larry the Bird</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Larry the Bird</td>
                                <td>Larry the Bird</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="top-siswa col card my-3 p-0">
                <div class="title p-3">
                    <h2>Siswa</h2>
                </div>
                <hr class="mt-0">
                <div class="px-3">
                    <div class="col">
                        <div class="card py-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col ml-3">
                                    <h2>Maul Arfad</h2>
                                    <span style="background-color: #1d7af3;" class="text-white p-1 rounded">PPLG</span>
                                </div>
                                <div class="col-3 border-left">
                                    <h1 class="font-weight-bold m-0" style="font-size: 44px">100</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card py-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col ml-3">
                                    <h2>Maul Arfad</h2>
                                    <span style="background-color: #FF9602;" class="text-white p-1 rounded">TMS</span>
                                </div>
                                <div class="col-3 border-left">
                                    <h1 class="font-weight-bold m-0" style="font-size: 44px">100</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card py-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col ml-3">
                                    <h2>Maul Arfad</h2>
                                    <span style="background-color: #1d7af3;" class="text-white p-1 rounded">PPLG</span>
                                </div>
                                <div class="col-3 border-left">
                                    <h1 class="font-weight-bold m-0" style="font-size: 44px">100</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card py-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col ml-3">
                                    <h2>Maul Arfad</h2>
                                    <span style="background-color: #1d7af3;" class="text-white p-1 rounded">PPLG</span>
                                </div>
                                <div class="col-3 border-left">
                                    <h1 class="font-weight-bold m-0" style="font-size: 44px">100</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card py-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col ml-3">
                                    <h2>Maul Arfad</h2>
                                    <span style="background-color: #1d7af3;" class="text-white p-1 rounded">PPLG</span>
                                </div>
                                <div class="col-3 border-left">
                                    <h1 class="font-weight-bold m-0" style="font-size: 44px">100</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line-chart col-12 card mb-3 px-0">
        <div class="title p-3">
            <h2>Multiple Line Chart</h2>
        </div>
        <hr class="mt-0">
        <div class="px-3">
            <div id="chart-container">
                <canvas id="multipleLineChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="row">
            <div class="radar-chart col card mb-3 px-0">
                <div class="title p-3 d-flex justify-content-between">
                    <h2>Radar Chart</h2>
                    <div class="col-4">
                        <div class="row">
                            <button class="btn btn-secondary btn-xs">Kelas 10</button>
                            <button class="btn btn-secondary btn-border btn-xs mx-1">Kelas 11</button>
                            <button class="btn btn-secondary btn-border btn-xs">Kelas 12</button>
                        </div>
                    </div>
                </div>
                <hr class="mt-0">
                <div id="chart-container">
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
            <div class="doughnut-chart col card mb-3 px-0 ml-3">
                <div class="title p-3">
                    <h2>Doughnut Chart</h2>
                </div>
                <hr class="mt-0">
                <div id="chart-container">
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

 <!-- jQuery UI -->
 <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
 <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

 <!-- jQuery Scrollbar -->
 <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

 <!-- Moment JS -->
 <script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>

 <!-- Chart JS -->
 <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

 <!-- jQuery Sparkline -->
 <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

 <!-- Chart Circle -->
 <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

 <!-- Datatables -->
 <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

 <!-- Bootstrap Notify -->
 <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

 <!-- Bootstrap Toggle -->
 <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

 <!-- jQuery Vector Maps -->
 <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

 <!-- Google Maps Plugin -->
 <script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>

 <!-- Azzara JS -->
 <script src="{{ asset('assets/js/ready.min.js') }}"></script>

 <!-- Select2 -->
 <script src="{{ asset('assets/select2/js/select2.full.min.js') }}"></script>

 <script>
    var multipleLineChart = document.getElementById('multipleLineChart').getContext('2d');

    var myMultipleLineChart = new Chart(multipleLineChart, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "PPLG",
                borderColor: "#1D7AF3",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#1d7af3",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'transparent',
                fill: true,
                borderWidth: 2,
                data: [30, 45, 45, 68, 69, 90, 100, 158, 177, 200, 245, 256]
            },{
                label: "TMS",
                borderColor: "#FF9602",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#FF9602",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'transparent',
                fill: true,
                borderWidth: 2,
                data: [10, 20, 55, 75, 80, 48, 59, 55, 23, 107, 60, 87]
            }]
        },
        options : {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'top',
            },
            tooltips: {
                bodySpacing: 4,
                mode:"nearest",
                intersect: 0,
                position:"nearest",
                xPadding:10,
                yPadding:10,
                caretPadding:10
            },
            layout:{
                padding:{left:15,right:15,top:15,bottom:15}
            }
        }
    });
    </script>
    <script>
        var radarChart = document.getElementById('radarChart').getContext('2d');

var myRadarChart = new Chart(radarChart, {
	type: 'radar',
	data: {
		labels: ['PPLG 1', 'TMS 1', 'PPLG 2', 'TMS 2', 'PPLG 3', 'TMS 3','PPLG 4'],
		datasets: [{
			data: [20, 10, 30, 2, 30],
			borderColor: '#1d7af3',
			backgroundColor : 'rgba(29, 122, 243, 0.25)',
			pointBackgroundColor: "#1d7af3",
			pointHoverRadius: 4,
			pointRadius: 3,
			label: 'PPLG'
		}, {
			data: [10, 20, 15, 30, 22],
			borderColor: '#FF9602',
			backgroundColor: 'rgba(255, 150, 2, 0.25)',
			pointBackgroundColor: "#FF9602",
			pointHoverRadius: 4,
			pointRadius: 3,
			label: 'TMS'
		},
		]
	},
	options : {
		responsive: true,
		maintainAspectRatio: false,
		legend : {
			position: 'bottom'
		}
	}
});
    </script>
    <script>
        var doughnutChart = document.getElementById('doughnutChart').getContext('2d');

var myDoughnutChart = new Chart(doughnutChart, {
	type: 'doughnut',
	data: {
		datasets: [{
			data: [30, 10],
			backgroundColor: ['#FF9602','#1d7af3']
		}],

		labels: [
		'TMS',
		'PPLG'
		]
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend : {
			position: 'bottom'
		},
		layout: {
			padding: {
				left: 20,
				right: 20,
				top: 20,
				bottom: 20
			}
		}
	}
});
    </script>

</html>
