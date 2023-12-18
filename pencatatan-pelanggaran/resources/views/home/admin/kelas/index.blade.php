@extends('layouts.master')
@section('title', 'Kelas')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Kelas</h4>
        <div class="btn-group btn-group-page-header ml-auto">
            <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu">
                <div class="arrow"></div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href=" " class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate">Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $k)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$k->nama_kelas}}</td>
                                    <td>{{$k->jurusan}}</td>
                                    <td align="center" colspan="3">
                                        <a href="{{ route('kelas.edit', (string) $k->id) }}" class="fa fa-edit" style="margin-right: 20%;"></a>
                                        <a onclick="confirmDel('{{ route('kelas.destroy', $k->id) }}')" class="fa fa-trash text-danger"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kelas.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input class="form-control" type="text" name="nama_kelas" id="nama" placeholder="Nama Kelas">
                        @error('nama_kelas')
                        <p class="text-danger timeout">* {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan</label>
                        <input class="form-control" type="text" name="jurusan" id="nama" placeholder="Jurusan">
                        @error('jurusan')
                        <p class="text-danger timeout">* {{ $message }}</p>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Select all elements with the 'timeout' class
        let timeoutErrors = document.querySelectorAll('.timeout');

        // Check if the elements exist
        if (timeoutErrors) {
            // Set a timeout to remove the elements after 3 seconds (3000 milliseconds)
            setTimeout(function () {
                timeoutErrors.forEach(function (error) {
                    error.remove(); // Remove each element
                });
            }, 3000);
        }
    });
</script>

@endsection