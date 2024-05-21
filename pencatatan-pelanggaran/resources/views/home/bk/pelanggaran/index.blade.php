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
                    <a href="" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Siswa</th>
                                    <th>Petugas</th>
                                    <th>Aturan</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggaran as $k)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$k->Siswa->nama}}</td>
                                    <td>{{$k->User->nama}}</td>
                                    <td>{{$k->Aturan->nama_aturan}}</td>
                                    <td>{{$k->keterangan}}</td>
                                    <td>{{$k->status}}</td>
                                    <td>
                                        <a class="btn btn-info text-white" data-toggle="modal" data-target="#{{ $k->id }}"><i class="fas fa-info-circle" data-toggle="tooltip" title="Detail"></i> Detail</a>
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

<!-- Modal Create -->
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
                <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Siswa</label>
                                <select name="nis" class="form-control" id="">
                                    @foreach ($siswa as $s)
                                        <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Aturan</label>
                                <select name="id_aturan" onclick="anjay({{ $aturan }}, this)" class="form-control" id="">
                                    <option value="" hidden>-- Aturan --</option>
                                    @foreach ($aturan as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Bk</label>
                        <select class="form-control" name="id_bk" id="" readonly>
                            @foreach ($bk as $b)
                                <option value="{{ $b->id }}">{{ $b->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" >
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Poin</label>
                                <input type="text" name="total_poin" id="poin" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="">
                                    <option value="Belum">Belum di proses</option>
                                    <option value="Beres">Sudah di proses</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tgl_pelanggaran" value="{{ date('Y-m-d') }}">
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

<!-- Modal Pelanggaran -->
@foreach ($pelanggaran as $p)
<div class="modal fade" id="{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Siswa</label>
                            <input type="text" name="nis" class="form-control" value="{{ $p->Siswa->nama ?? 'Belum Di Proses' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Aturan</label>
                            <input type="text" name="id_aturan" class="form-control" value="{{ $p->Aturan->nama_aturan ?? 'Belum Di Proses' }}" readonly>
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
                            <input type="text" name="status" id="status" class="form-control" value="{{ $p->status }}" readonly>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="tgl_pelanggaran" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('review.proses', $p->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Proses</a>
                <a href="{{ route('review.edit', $p->id) }}" class="btn btn-secondary text-white"><i class="fa fa-edit"></i></a>
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
