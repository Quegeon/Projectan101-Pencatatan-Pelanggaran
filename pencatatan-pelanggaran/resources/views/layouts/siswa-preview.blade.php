<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Siswa</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/azzara.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Include FontAwesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
        .fixed-layout {
            position: relative;
            top: 10px;
            left: 0;
            width: 100%;
            z-index: 10;
            padding: 20px;
        }

        .background-layout {
            position: absolute;
            width: 100%;
            height: 100vh;
            overflow: auto;
        }

        .background-layout svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow-y: auto;
        }

        .gradient-rect {
            width: 100%;
            height: 300px;
            background: linear-gradient(180deg, #060455 0%, #0875A8 100%);
        }

        /* Custom style for input */
        #datepicker {
            background-color: white !important;
            /* Ubah background menjadi putih */
        }

        .tab-pane {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="background-layout">
        <div class="gradient-rect"></div>
    </div>
    <div class="fixed-layout">
        <div class="container">
            <div class="title text-center">
                <h1 class="font-weight-bold text-white">Preview Siswa</h1>
            </div>
            <div class="filter mt-5">
                <div class="container">
                    <div class="col">
                        <div class="row justify-content-center">
                            <form id="form-search-siswa" action="{{ route('display.siswa') }}" method="post"
                                autocomplete="off">
                                @csrf
                                <div class="d-flex rounded" style="background: white;">
                                    <input type="text" name="nis" id="input-nis" class="form-control"
                                        style="border: none; border-right: 1px solid rgb(179, 179, 179);"
                                        placeholder="Masukan NIS...">
                                    <input type="password" name="password" id="input-password" class="form-control"
                                        style="border: none; border-right: 1px solid rgb(179, 179, 179);"
                                        placeholder="Masukan Password...">
                                    <div>
                                        <div class="btn-cari">
                                            <button type="submit" class="btn btn-icon btn-primary"
                                                style="border-radius:0 5px 5px 0;">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="content" class="card mt-4 p-5">
                        <div class="m-0 text-center text-muted h3">Tidak ada data...</div>

                        {{-- <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggaran</th>
                                            <th>Poin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center">1</td>
                                            <td>bolos</td>
                                            <td style="text-align: center">90</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-info" style="color: white;">
                                            <th colspan="2" style="text-align: center;">JUMLAH POIN</th>
                                            <th style="text-align: center">90</th>
                                        </tr>
                                    </tfoot>
                                </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <footer class="footer border-0 mt-5">
        <div class="container-fluid d-flex">
            <div class="copyright mr-auto">
                2024, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://yourwebsite.com">MATA
                    Group</a>
            </div>
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer> --}}
    </div>

    <!-- Core JS Files -->
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
        $(document).ready(function() {
            $('#form-search-siswa').submit(function(e) {
                e.preventDefault();

                const formData = {
                    nis: $('#input-nis').val(),
                    password: $('#input-password').val()
                };

                $.ajax({
                    method: 'GET',
                    url: "{{ route('display.siswa') }}",
                    data: formData,
                    success: function(res) {
                        // console.log(res.data);
                        if (res.data) {
                            $('#content').html(res.data);

                        } else {
                            $('#content').html(
                                '<div class="m-0 text-center text-muted h3">Tidak ada data...</div>'
                            )
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
</body>

</html>
