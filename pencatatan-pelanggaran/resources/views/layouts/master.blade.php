<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pelanggaran | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
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

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/azzara.css') }}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/css/sweetalert2.min.css') }}">
    <script src="{{ asset('assets/sweetalert2/js/sweetalert2.all.min.js') }}"></script>

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/theme.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <!--
   Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
  -->
        <div class="main-header" data-background-color="navy">
            <!-- Logo Header -->
            <div class="logo-header">

                <a href="index.html" class="logo">
                    <img src="{{ asset('/foto/mataw1.png') }}" alt="navbar brand" class="navbar-brand" style="width: 80px">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            {{-- <nav class="navbar navbar-header navbar-expand-lg"> --}}

                {{-- <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> --}}

                        {{-- ! UDH GA KEPAKE COY --}}
                        {{-- <li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">My Profile</a>
									<a class="dropdown-item" href="#">My Balance</a>
									<a class="dropdown-item" href="#">Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Logout</a>
								</li>
							</ul>
						</li> --}}
                    {{-- </ul>
                </div> --}}
            {{-- </nav> --}}
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        @if (Auth()->User()->level == 'Petugas' || Auth()->User()->level == 'Admin')
            @include('layouts.sidebar-petugas')
        @else
            @include('layouts.sidebar-bk')
        @endif
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
        </div>

    </div>
    </div>



    <script>
        function confirmDel(url) {
            Swal.fire({
                title: "Konfirmasi Hapus Data",
                text: "Data Akan Dihapus",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#716aca",
                cancelButtonColor: "#f3545d",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = url;
                }
            });
        }
        
        // 1
        function alertConfirm(url, msg) {
            Swal.fire({
                title: "Konfirmasi",
                text: msg,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#716aca",
                cancelButtonColor: "#f3545d",
                confirmButtonText: "Ya, Lakukan!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = url;
                }
            });
        }

        // function confirmDel(url) {
        // 	Swal.fire({
        // 		title: "Yakin",
        // 		text: "Sepertinya siswa baru 1x melakukan pelanggaran, apakah ingin memberikan peringatan saja?",
        // 		icon: "warning",
        // 		showCancelButton: true,
        // 		confirmButtonColor: "#716aca",
        // 		cancelButtonColor: "#f3545d",
        // 		confirmButtonText: "Ya, Hapus!"
        // 	}).then((result) => {
        // 		if (result.isConfirmed) {
        // 			window.location = url;
        // 		} else if ( result.dismiss === Swal.DismissReason.cancel) {
        // 			Swal.fire({
        // 				title: "Cancelled",
        // 				text: "Your imaginary file is safe :)",
        // 				icon: "error"
        // 			});
        // 		}
        // 	});
        // }

        @if (session('error'))
            Swal.fire({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error"
            });
        @endif

        @if (session('success'))
            Swal.fire({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @endif
    </script>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <script>
        $('.simphan').on('click', function(e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success mr-2",
                    cancelButton: "btn btn-info"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Pertimbangkan",
                text: "Sepertinya murid ini baru pertama kali melakukan kesalahan, apakah anda tidak ingin menambahkan poinnya?",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "Ya, Jangan Tambah",
                cancelButtonText: "Tetap Tambah",
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#poin').val('0');
                    $('#submit-cenah').submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    $('#submit-cenah').submit();
                }
            });
        });
    </script>

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
        function displayPoint(...arr) {
            for (let a of arr[0]) {
                if (a.id == arr[1].value) {
                    $('#poin').val(a.poin);
                }
            }
        }
    </script>

    <script>
        function displaySubtract(subPoint){
            const poinSiswa = document.getElementById('poin_siswa').value
            const result = (parseInt(poinSiswa) || 0) - (parseInt(subPoint) || 0);

            if (result < 0) {                
                document.getElementById('result').value = 'Pengurangan Poin Melebihi Poin Siswa';
            } else {
                document.getElementById('result').value = result;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.select-search').select2({
                dropdownParent: $('.modal'),
                theme: 'bootstrap4',
                width: 'auto',
                allowClear: true,
                placeholder: 'Pilih Seleksi Data'
            });
            $('.select-search-no-modal').select2({
                theme: 'bootstrap4',
                width: 'auto',
                allowClear: true,
                placeholder: 'Pilih Seleksi Data'
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable();

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const fileReader = new FileReader();
            fileReader.readAsDataURL(image.files[0]);

            fileReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>

    {{-- error time out --}}
    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Select all elements with the 'timeout' class
            const timeoutErrors = document.querySelectorAll('.timeout');

            // Check if the elements exist
            if (timeoutErrors) {
                // Set a timeout to remove the elements after 3 seconds (3000 milliseconds)
                setTimeout(function() {
                    timeoutErrors.forEach(function(error) {
                        error.remove(); // Remove each element
                    });
                }, 5000);
            }
        });
    </script>
</body>

</html>
