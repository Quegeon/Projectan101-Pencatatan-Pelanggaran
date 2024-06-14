<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APLIKASI PENCATATAN PELANGGARAN</title>
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
    <style>
        .fixed-layout {
          position: relative;
          top: 10px;
          left: 0;
          width: 100%;
          z-index: 10;
          /* background-color: white; */
          padding: 20px;
          /* box-shadow: 0 2px 5px rgba(0,0,0,0.1); */
        }
        .background-layout {
          position: absolute;
          width: 100%;
          height: 100vh; /* Ubah sesuai kebutuhan Anda */
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
                            <div class="d-flex rounded" style="background: white;">
                                <div class="filter-nis">
                                    <input class="form-control" type="text" placeholder="Masukan Nama...">
                                </div>
                                <div class="form-group p-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="datepicker" name="datepicker">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-cari">
                                    <button class="btn btn-primary rounded-right">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3 p-5" style="height:auto; ">
                <div class="col" >
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-5">
                            <div class="credential-content">
                                <table>
                                    <tr>
                                        <th class="pr-5">NIS</th>
                                        <td>: 212121212121</td>
                                    </tr>
                                    <tr>
                                        <th class="pr-5">Nama</th>
                                        <td>: Ansel</td>
                                    </tr>
                                    <tr>
                                        <th class="pr-5">Kelas</th>
                                        <td>: XI PPLG 1</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card d-flex point-content p-3 m-0" style="border: #868686 dashed 2px;">
                                <div class="d-flex justify-content-around align-items-center">
                                    <h5 class="fs-5">Jumlah Poin :</h5>
                                    <div class="card card-point px-5 m-0" style="border: #ff1717 solid 2px; background: rgba(255, 23, 23, 0.5);">
                                        <h1 class="my-3 font-weight-bold text-white" style="font-size: 34px;">90</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body d-flex justify-content-center" style="margin-top: 15%">
                    <div class="col-12 p-0">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
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
                                <tr class="bg-info" style="color: white;" >
                                    <th colspan="2" style="text-align: center;">JUMLAH POIN </th>
                                    <th style="text-align: center" >90</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer border-0 mt-5">
        <div class="container-fluid d-flex">
            <div class="copyright mr-auto">
                2024, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://yourwebsite.com">MATA Group</a>
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
    </footer>

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
       function displayPoint(...arr) {
           for (let a of arr[0]) {
               if (a.id == arr[1].value) {
                   $('#poin').val(a.poin);
               }
           }
       }
   </script>

   <script>
       function displaySubtract(subPoint) {
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
    <script>
        $('#datepicker').datetimepicker({
        format: 'MM/DD/YYYY',
    });
    </script>
</body>
</html>
