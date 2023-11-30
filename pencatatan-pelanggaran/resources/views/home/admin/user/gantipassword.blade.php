@extends('layouts.master')
@section('title', 'Petugas')
@section('content')

<div class="col-12">
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <h4 class="page-title">Ganti Password</h4>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-with-nav">
                            <div class="card-header">
                                <div class="row row-nav-line">
                                    <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password" role="tab" aria-selected="false">Password</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password Lama</label>
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label>Pasword Baru</label>
                                            <input type="text" name="" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-secondary ">Simpan</button>
                                <button class="btn btn-secondary ">Kembali</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile card-secondary">
                            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                                <div class="profile-picture">
                                    <div class="avatar avatar-xl">
                                        <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-profile text-center">
                                    <div class="name">{{ Auth()->User()->nama}}</div>
                                    <div class="job">{{ Auth()->User()->level}}</div>
                                    <div class="desc">Hm</div>
                                    <div class="social-media">
                                        <a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
                                            <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                            <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
                                        </a>
                                        <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
                                            <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                            <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
                                        </a>
                                    </div>
                                    <div class="view-profile">
                                        <a href="#" class="btn btn-secondary btn-block">Change Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row user-stats text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>


</div>

@endsection