@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __('Nft Modules') }}
@endsection

{{-- Active Menu --}}
@section('nftModule')
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
            <li class="breadcrumb-item active">{{ __('NFT Modules') }}</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Update') }}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted">{{ __('Icon Name Will Be HTML Tag Encrypted.') }}</p>
                <form action="{{ route('nftModule.update', $nftModule->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group mt-2">
                                <label class="form-label">{{ __('Icon') }} <span class="text-danger"> *</span></label>
                                <input type="text" name="icon" class="form-control" value="{{ $nftModule->icon }}">
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            {!! $nftModule->icon !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Title') }} <span class="text-danger"> *</span></label>
                        <input type="text" name="title" class="form-control" value="{{ $nftModule->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Description') }} <span class="text-danger"> *</span></label>
                        <textarea name="description" class="form-control"  cols="30" rows="5">{{ $nftModule->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">{{ __('Update Module Data') }}</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
