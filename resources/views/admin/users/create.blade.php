@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | Create User

@endsection

{{-- Active Menu --}}
@section('usersCreate')
    active
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                User
            </li>
            <li class="breadcrumb-item active">
                Create New User
            </li>
        </ol>
    </div>
@endsection

{{-- Page Content --}}
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Create New User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger"> *</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control"/>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="username">Username <span class="text-danger"> *</span></label>
                                        <input type="text" name="username" value="{{ old('username') }}" id="username" class="form-control"/>
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger"> *</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control"/>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger"> *</span></label>
                                        <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control"/>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="re_password">Re-enter Password <span class="text-danger"> *</span></label>
                                        <input type="password" name="re_password" value="{{ old('re_password') }}" id="re_password" class="form-control"/>
                                        @error('re_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="profile_photo_path">Profile Photo</label>
                                        <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control"/>
                                        @error('profile_photo_path')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="cover_photo_path">Cover Photo</label>
                                        <input type="file" name="cover_photo_path" id="cover_photo_path" class="form-control"/>
                                        @error('cover_photo_path')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="wallet_address">Wallet Address <span class="text-danger"> *</span></label>
                                        <input type="text" name="wallet_address" value="{{ old('wallet_address') }}" id="wallet_address" class="form-control"/>
                                        @error('wallet_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Create a user</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
