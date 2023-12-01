@extends('layouts.master')
@section('title', 'Pelanggaran')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Pelanggaran</h4>
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
                    <a href=" " class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Siswa</th>
                                    <th>Petugas</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggaran as $h)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$h->Siswa->nama}}</td>
                                    <td>{{$h->User->nama}}</td>
                                    <td>{{$h->keterangan}}</td>
                                    <td>{{$h->status}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#{{ $h->id }}" class="btn btn-primary text-white"><i class="fas fa-info-circle"></i> Detail</a>
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
                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Siswa</label>
                        <input list="siswa" type="text" name="nis" class="form-control" placeholder="Masukkan Nama Siswa">
                        <datalist id="siswa">
                            @foreach ($siswa as $s)
                                <option value="{{ $s->nis }}">{{ $s->nama }} | {{ $s->Kelas->nama_kelas }}</option>
                            @endforeach
                        </datalist>
                        @error('nis')
                            <p class="text-danger">* {{ $errors->first('nis') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                        @error('keterangan')
                            <p class="text-danger">* {{ $errors->first('keterangan') }}</p>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
            </form>
            </div>
        </div>
    </div>
</div>

@foreach ($pelanggaran as $p)
<div class="modal fade" id="{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Siswa</label>
                            <input type="text" class="form-control" name="nis" value="{{ $p->Siswa->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Aturan</label>
                            <input list="aturan" type="text" class="form-control" name="id_aturan" onchange="anjay({{ $aturan }}, this)" value="{{ ($p->id_aturan) ? $p->Aturan->nama_aturan : '--' }}" readonly>
                            <datalist id="aturan">
                                @foreach ($aturan as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="{{ $p->keterangan }}" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Poin</label>
                            <input type="text" name="total_poin" id="poin" class="form-control" value="{{ $p->total_poin }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" value="{{ $p->status }}" class="form-control" readonly>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('review.edit', $p->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Proses</a>
                <a class="btn btn-secondary text-white"><i class="fa fa-edit"></i></a>
                <a onclick="confirmDel(`{{ route('review.destroy', $p->id) }}`)" class="btn btn-secondary text-white"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
	function anjay(...arr) {
		for(let a of arr[0]) {
			if(a.id == arr[1].value) {
				$('#poin').val(a.poin);
            }
		}
	}
</script>
@endsection