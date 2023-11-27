@extends('layouts.master')
@section('title', 'Siswa')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Data Siswa</h4>
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
                    <div class="table-responsive">
                        <form action="{{ route('siswa.update', ['nis' => $siswa->nis]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        
                            <div class="form-group">
                                <label for="">Nis</label>
                                <input class="form-control" value="{{$siswa->nis}}" type="text" name="nis" id="nama" placeholder="Nis">
                                @error('nis')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="id_kelas" id="kelas" class="form-control">
                                    <option value="">--Pilih Satu--</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kelas }} | {{ $k->jurusan }}</option> 
                                    @endforeach        
                                </select>
                                @error('kelas')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input class="form-control" type="text" value="{{$siswa->nama}}" name="nama" id="nama" placeholder="Nama siswa">
                                @error('nama')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert" >{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input class="form-control" type="text" value="{{$siswa->no_telp}}" name="no_telp" id="nama" placeholder="No Telp Siswa">
                                @error('no_telp')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input class="form-control" type="text"value="{{$siswa->alamat}}" name="alamat" id="nama" placeholder="Alamat Siswa">
                                @error('alamat')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Poin</label>
                                <input class="form-control" type="text" value="{{$siswa->poin}}" name="poin" id="nama" placeholder="Poin">
                                @error('poin')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input class="form-control" type="text" value="{{$siswa->status}}" name="status" id="nama" placeholder="Status">
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection