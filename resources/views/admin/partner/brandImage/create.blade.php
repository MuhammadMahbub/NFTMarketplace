@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('Brand Image') }}
    @endsection

    {{-- Active Menu --}}
    @section('partnerBrandImage')
        active
    @endsection


    {{-- Breadcrumb --}}
    @section('breadcrumb')
         <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
                </li>
                <li class="breadcrumb-item active">
                    <a class="text-muted">{{ __("Brand Image") }}</a>
                </li>
            </ol>
        </div>
    @endsection

    {{-- Main Content --}}
    @section('content')
    <div class="row" id="basic-table">
        <div class="col-md-12 col-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-6">
                        <h4 class="card-title">{{ __('Create Brand Image') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('partner.brandImage.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Image') }} <span class="text-danger"> *</span></label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">{{ __('Submit') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection
