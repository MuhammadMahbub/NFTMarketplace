@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | Wallets
    @endsection

    {{-- Active Menu --}}
    @section('walletBanner')
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
                <li class="breadcrumb-item active">
                    <a href="#">Update Wallet Banner</a>
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
                        <h4 class="card-title">Update Banner</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('walletBanner.update', $bannerData->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label">Title <span class="text-danger"> *</span> </label>
                            <input type="text" name="title" class="form-control" value="{{ $bannerData->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <div class="row">
                                <div class="col-10">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-2">
                                    <img style="height:80px;width:140px;border-radius:5px" src="{{ asset('uploads/images/wallet') }}/{{ $bannerData->image }}" alt="Banner Image">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Banner</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection
