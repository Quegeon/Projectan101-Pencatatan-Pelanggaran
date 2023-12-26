@extends('layouts.master')
@section('title', 'Edit Data Hukuman')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Data Hukuman</h4>
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
                            <form action="{{ route('hukuman.update', $hukuman->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Hukuman</label>
                                    <input class="form-control" type="text" name="hukuman" value="{{ $hukuman->hukuman }}" placeholder="{{ $hukuman->hukuman }}">
                                    @error('hukuman')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('hukuman.index') }}" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
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