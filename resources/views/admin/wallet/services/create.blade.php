@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | Wallet Service
    @endsection

    {{-- Active Menu --}}
    @section('walletServices')
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
                    <a class="text-muted">Service</a>
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
                    <div class="col-md-10">
                        <h4 class="card-title">Create Service</h4>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end">
                        <a href="{{ route('wallet.services') }}" class="btn btn-primary">Return Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('wallet.services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label">Image <span class="text-danger"> *</span></label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Title <span class="text-danger"> *</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Description <span class="text-danger"> *</span></label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Create Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
