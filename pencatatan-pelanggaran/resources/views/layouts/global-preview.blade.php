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
    {{-- <div class="navbar col card p-4 m-0">
        tes
    </div> --}}
    <div class="col" >
        <div class="row gap-3">
            <div class="card top-movers col-lg-4 mr-3 p-0">
                <div class="card-header p-3">
                    <h2 class="m-0">Pelanggaran</h2>
                </div>
                <div class="card-body px-3">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="col-9">Nama Pelanggaran</th>
                                <th scope="col" class="col-3">Jumlah Pelanggaran</th>
                            </tr>
                        </thead>
                        <tbody class="font-weight-bold">
                            <tr>
                                <td style="height: 50px"">1</td>
                                <td style="height: 50px"">Bolos</td>
                                <td style="height: 50px"">2</td>
                            </tr>
                            <tr>
                                <td style="height: 50px"">2</td>
                                <td style="height: 50px"">Sepatu Berwarna</td>
                                <td style="height: 50px"">5</td>
                            </tr>
                            <tr>
                                <td style="height: 50px"">3</td>
                                <td style="height: 50px"">Menggunakan Make up</td>
                                <td style="height: 50px"">10</td>
                            </tr>
                            <tr>
                                <td style="height: 50px"">4</td>
                                <td style="height: 50px"">Terlambat</td>
                                <td style="height: 50px"">30</td>
                            </tr>
                            <tr>
                                <td style="height: 50px"">5</td>
                                <td style="height: 50px"">Salah Seragam</td>
                                <td style="height: 50px"">25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card top-siswa col-lg-4 p-0">
                <div class="card-header p-3">
                    <h2 class="m-0">Siswa</h2>
                </div>
                <div class="card-body px-3">
                    <div class="col">
                        {{-- {{dd($data)}} --}}
                    @php
                        $siswaWithPoints = $siswa->filter(function ($item) {
                            return $item->poin > 0;
                        });
                    @endphp

                    @if ($siswaWithPoints->isEmpty())
                        <div class="align-items-center">
                            <h3 class="text-center" style="color: #c5c5c5">Belum ada pelanggar</h3>
                        </div>
                    @else
                        @foreach ($siswaWithPoints->sortByDesc('poin') as $item)
                            <div class="card py-2 mb-2">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-8 ml-3">
                                        @if (strlen($item->nama) > 22)
                                            <marquee scrollamount="2" scrolldelay="50"><h3 class="mb-2">{{ $item->nama }}</h3></marquee>
                                        @else
                                            <h3 class="mb-2">{{ $item->nama }}</h3>
                                        @endif
                                       <div class="col-5 p-0">
                                            @if ($item->Kelas && $item->Kelas->jurusan == 'Pengembangan Perangkat Lunak Dan Gim')
                                                <div class="text-white p-1 rounded text-center" style="background-color:#1D7AF3 ">
                                                    {{ $item->Kelas->nama_kelas }}
                                                </div>
                                            @elseif ($item->Kelas && $item->Kelas->jurusan == 'Teknik Mesin')
                                                <div class="text-white p-1 rounded text-center" style="background-color:#FF9602 ">
                                                    {{ $item->Kelas->nama_kelas }}
                                                </div>
                                            @endif
                                       </div>
                                    </div>
                                    <div class="col border-left d-flex justify-content-center pl-0" style="width: 5px">
                                    @switch($item->poin)
                                        @case($item->poin >=0 && $item->poin <=25 )
                                            <span class="text-success font-weight-bold" style="font-size: 34px">{{ $item->poin }}</span>
                                            @break
                                        @case($item->poin >=25 && $item->poin <=50)
                                            <span class="text-info font-weight-bold" style="font-size: 34px">{{ $item->poin }}</span>
                                            @break
                                        @case($item->poin >=50 && $item->poin <=75)
                                            <span class="text-warning font-weight-bold" style="font-size: 34px">{{ $item->poin }}</span>
                                            @break
                                        @case($item->poin >=75 && $item->poin <=100)
                                            <span class="text-danger font-weight-bold" style="font-size: 34px">{{ $item->poin }}</span>
                                            @break
                                    @endswitch
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <div class="card radar-chart col px-0 ml-3">
                <div class="card-header p-3 d-flex justify-content-between">
                    <h2 class="m-0">Radar Chart</h2>
                    <div class="col-7 ">
                        <div class="row justify-content-end">
                            <button class="btn btn-secondary btn-xs" onclick="setActive(this)">Kelas 10</button>
                            <button class="btn btn-secondary btn-border btn-xs mx-1" onclick="setActive(this)">Kelas 11</button>
                            <button class="btn btn-secondary btn-border btn-xs" onclick="setActive(this)">Kelas 12</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="chart-container">
                    <canvas id="radarChart" "></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="row">
            <div class="card line-chart col-9 mb-3 px-0">
                <div class="card-header p-3">
                    <h2 class="m-0">Multiple Line Chart</h2>
                </div>
                <div class="card-body px-3">
                    <div id="chart-container">
                        <canvas id="multipleLineChart" style="height:300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="card doughnut-chart col mb-3 px-0 ml-3">
                <div class="card-header p-3">
                    <h2 class="m-0">Doughnut Chart</h2>
                </div>
                <div id="card-body chart-container">
                    <canvas id="doughnutChart" style="height:300px;"></canvas>
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
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Juni", "Juli", "Agu", "Sep", "Okt", "Nov", "Des"],
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
		labels: ['PPLG 1', 'PPLG 2', 'PPLG 3', 'PPLG 4', 'TMS 1', 'TMS 2','TMS 3'],
		datasets: [{
			data: [20, 10, 30, 10, 0, 0, 0],
			borderColor: '#1d7af3',
			backgroundColor : 'rgba(29, 122, 243, 0.25)',
			pointBackgroundColor: "#1d7af3",
			pointHoverRadius: 4,
			pointRadius: 3,
			label: 'PPLG'
		}, {
			data: [0, 0, 0, 0, 30, 50, 20],
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
			data: [10, 30],
			backgroundColor: ['#1d7af3','#FF9602']
		}],

		labels: [
        'PPLG',
		'TMS'
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

<script>
    function setActive(button) {
        // Remove the active class from all buttons and set them to non-active class
        var buttons = document.querySelectorAll('.btn');
        buttons.forEach(function(btn) {
            btn.classList.remove('btn-xs');
            btn.classList.remove('btn-secondary');
            btn.classList.remove('active');
            btn.classList.add('btn-border');
            btn.classList.add('btn-xs');
            btn.classList.add('btn-secondary');
        });

        // Add the active class to the clicked button
        button.classList.remove('btn-border');
        button.classList.add('btn-xs');
        button.classList.add('btn-secondary');
        button.classList.add('active');
    }
</script>
</html>
