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
     <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
            </li>
            <li class="breadcrumb-item">
                {{ __("User") }}
            </li>
            <li class="breadcrumb-item active">
                {{ __("Update") }} {{ $user->name }} {{ __('Data') }}
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
                        <form action="{{ route('update_user_role', $user->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="role_id">{{ __("Role") }}</label>
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="1"{{ $user->role_id == 1 ? 'selected': '' }}>{{ __('Admin') }}</option>
                                            <option value="2" {{ $user->role_id == 2 ? 'selected': '' }}>{{ __('User') }}</option>
                                        </select>
                                        @error('role_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mt-2">{{ __('Update User Role') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
