@extends('layouts.master')
@section('title', 'Edit Data Aturan')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Data Aturan</h4>
            {{-- <div class="btn-group btn-group-page-header ml-auto">
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
            </div> --}}
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('aturan.update', $aturan->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Aturan</label>
                                    <input type="text" name="nama_aturan" class="form-control" value="{{ $aturan->nama_aturan }}" placeholder="{{ $aturan->nama_aturan }}">
                                    @error('nama_aturan')
                                        <p class="text-danger timeout">* {{ $message }}</p>                                    
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select name="id_jenis" class="select-search-no-modal">
                                        <option value="{{ $aturan->id_jenis }}" selected>Default: {{ $aturan->Jenis->nama_jenis }}</option>
                                        @foreach ($jenis as $j)
                                            <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_jenis')
                                        <p class="text-danger timeout">{{ $message }}</p>
                                    @enderror    
                                </div>
                                <div class="form-group">
                                    <label>Hukuman</label>
                                    <select name="id_hukuman" class="select-search-no-modal">
                                        <option value="{{ $aturan->id_hukuman }}" selected>Default: {{ $aturan->Hukuman->hukuman }}</option>
                                        @foreach ($hukuman as $h)
                                            <option value="{{ $h->id }}">{{ $h->hukuman }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_hukuman')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Poin</label>
                                    <input type="text" name="poin" class="form-control" value="{{ $aturan->poin }}" placeholder="{{ $aturan->poin }}">
                                    @error('poin')
                                        <p class="text-danger timeout">* {{ $message }}</p>                                    
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('aturan.index') }}" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection