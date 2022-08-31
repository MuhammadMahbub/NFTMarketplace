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
                    <a class="text-muted">{{ __('Brand Image Update') }}</a>
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
                        <h4 class="card-title">{{ __('Update Brand Image') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('partner.brandImage.update', $brandImage->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group mt-2">
                                    <label class="form-label">{{ __('Image') }}</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <img style="height: 80px;width:80px; border-radius:5px" src="{{ asset('uploads/images/partner/brand') }}/{{ $brandImage->image }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">{{ __('Submit') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection
