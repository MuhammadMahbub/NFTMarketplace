@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Create User') }}

@endsection

{{-- Active Menu --}}
@section('usersCreate')
    active
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item">
                {{ __('User') }}
            </li>
            <li class="breadcrumb-item active">
                {{ __('Update') }} {{ $user->name }} {{ __('Data') }}
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
                        <h4 class="card-title"> {{ __('Update') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="name"> {{ __('Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="username"> {{ __('Username') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                </div>
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="email"> {{ __('Email') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="waller_address"> {{ __('Wallet Address') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="waller_address" name="wallet_address" value="{{ $user->wallet_address }}">
                                </div>
                                @error('waller_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="twitter_link"> {{ __('Twitter Link') }}</label>
                                    <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="{{ $user->twitter_link }}">
                                </div>
                                @error('twitter_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="instagram_link"> {{ __('Instagram Link') }}</label>
                                    <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="{{ $user->instagram_link }}">
                                </div>
                                @error('instagram_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="youtube_link"> {{ __('Youtube Link') }}</label>
                                    <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="{{ $user->youtube_link }}">
                                </div>
                                @error('youtube_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="profile_photo_path">{{ __('Profile Photo') }}</label>
                                            <input class="form-control" type="file" name="profile_photo_path" id="profile_photo_path">
                                            @error('profile_photo_path')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="cover_photo_path">{{ __('Previous Profile Photo') }}</label>
                                        <img style="" src="{{ asset('uploads/images/users') }}/{{ $user->profile_photo_path }}" alt="image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="cover_photo_path">{{ __('Cover Photo') }}</label>
                                            <input class="form-control" type="file" name="cover_photo_path" id="cover_photo_path">
                                            @error('cover_photo_path')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="cover_photo_path">{{ __('Previous Cover Photo') }}</label>
                                        <img style="width:100%" src="{{ asset('uploads/images/users') }}/{{ $user->cover_photo_path }}" alt="image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mt-2">{{ __('Update User Data') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
