@extends('layouts.master')
@section('title', 'Inbox Pelanggaran')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Inbox Pelanggaran</h4>
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
                    <a href="{{ route('review.create') }}" class="btn btn-primary mb-2 ml-3"><i class="fa fa-plus mr-2"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
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
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td>{{$h->Siswa->nama}}</td>
                                    <td>{{$h->User->nama}}</td>
                                    <td>{{$h->keterangan}}</td>
                                    <td>{{$h->status}}</td>
                                    <td align="center" colspan="3">
                                        <a href="{{route('review.detail', $h->id)}}" class="btn btn-primary text-white"><i class="fas fa-info-circle mr-2"></i> Detail</a>
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


{{-- @foreach ($pelanggaran as $p)
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
                <div class="form-group">
                    <label for="">Siswa</label>
                    <input type="text" class="form-control" name="nis" value="{{ $p->Siswa->nama }}" readonly>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-md-6">
                    </div>
                </div> --}}
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Aturan</label>
                            <input list="aturan" type="text" class="form-control" name="id_aturan" onchange="anjay({{ $aturan }}, this)" value="{{ ($p->id_aturan) ? $p->Aturan->nama_aturan : '--' }}" readonly>
                            <datalist id="aturan">
                                @foreach ($aturan as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div> --}}
                {{-- <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="{{ $p->keterangan }}" readonly>
                </div> --}}
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Poin</label>
                        <input type="text" name="total_poin" id="poin" class="form-control" value="{{ $p->total_poin }}" readonly>
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-md-6">

                    </div>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" value="{{ $p->status }}" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('review.edit', $p->id) }}" class="btn btn-primary"><i class="fa fa-edit mr-2"></i>Proses</a>
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
</script> --}}
@endsection
