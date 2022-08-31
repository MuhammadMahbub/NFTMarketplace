@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('NFT Categories') }}
    @endsection

    {{-- Active Menu --}}
    @section('nft_category')
        active
    @endsection


    {{-- Breadcrumb --}}
    @section('breadcrumb')
         <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
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
                        <h4 class="card-title">{{ __('Create Category') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('nft_category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Name') }} <span class="text-danger"> *</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Icon') }} ({{ __('Icon link') }}: <a href="https://fontawesome.com/" target="_blank">{{ __('Font Awesome') }}</a>)<span class="text-danger"> *</span></label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}">
                            @error('icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Image') }} ({{ __('Size') }}: 1350px*300px)<span class="text-danger"> *</span></label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description"><b>{{ __('Description') }}</b> <span class="text-danger">*</span></label>
                            <input id="description" type="hidden" name="description" value="{{ old('description') }}" />
                            <trix-editor input="description" class="trix-content"></trix-editor>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group mt-2">
                            <label class="form-label">Creator Name <span class="text-danger"> *</span></label>
                            <input type="text" name="creator_name" class="form-control" value="{{ old('creator_name') }}">
                            @error('creator_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Creator Photo (Size: 140*140px)<span class="text-danger">*</span></label>
                            <input type="file" name="creator_photo" class="form-control">
                            @error('creator_photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <button type="submit" class="btn btn-primary mt-3">{{ __('Submit') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection
