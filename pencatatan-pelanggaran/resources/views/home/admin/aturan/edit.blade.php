@extends('layouts.master')
@section('title', 'Edit Aturan')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Halaman Edit Aturan</h4>
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
                        <form action="{{ route('aturan.update', $aturan->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="id_jenis" class="form-control">
                                    <option value="{{ $aturan->id_jenis }}">{{ $aturan->Jenis->nama_jenis }}</option>
                                    @foreach ($jenis as $j)
                                        <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Aturan</label>
                                <input type="text" name="nama_aturan" class="form-control" value="{{ $aturan->nama_aturan }}" placeholder="{{ $aturan->nama_aturan }}">
                            </div>
                            <div class="form-group">
                                <label>Poin</label>
                                <input type="text" name="poin" class="form-control" value="{{ $aturan->poin }}" placeholder="{{ $aturan->poin }}">
                            </div>
                            <div class="form-group">
                                <label>Hukuman</label>
                                <input list="hukuman" name="id_hukuman" value="{{ $aturan->id_hukuman }}" placeholder="{{ $aturan->Hukuman->hukuman }}">
                                <datalist id="hukuman">
                                    @foreach ($hukuman as $h)
                                        <option value="{{ $h->id }}">{{ $h->hukuman }}</option>
                                    @endforeach
                                </datalist>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{ route('hukuman.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection