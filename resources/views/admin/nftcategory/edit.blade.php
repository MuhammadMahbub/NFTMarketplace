@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('NFT Category') }}
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
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __('Update NFT Category') }}
            </li>
        </ol>
    </div>
    @endsection

    @section('content')
<section class="banner-main-section" id="main">
    <div class="row">
      <div class="col-lg-12">
          <a href="{{ route('nft_category.index') }}" type="button" class="btn btn-info">{{ __('Back') }}</a>
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">{{ __('Update NFT Category') }}</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('nft_category.update', $nft_category->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">{{ __('Category Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $nft_category->name }}">
                </div>
                <div class="form-group">
                    <label for="icon">{{ __('Icon') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="icon" name="icon"
                        value="{{ $nft_category->icon }}">
                </div>
                <div class="form-group mt-2">
                    <label class="form-label">{{ __('Image') }}({{ __('Size') }}: 1350px*300px)</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-lg-3">
                    <img style="height:100px; width: 100px" src="{{ asset('uploads/nftcategory') }}/{{ $nft_category->image }}" alt="item Image">
                </div>
                <div class="form-group">
                    <label for="description"><b>{{ __('Description') }}</b> <span class="text-danger">*</span></label>
                    <input id="description" type="hidden" name="description" value="{{ $nft_category->description }}" />
                    <trix-editor input="description" class="trix-content"></trix-editor>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group mt-2">
                    <label class="form-label">Creator Name <span class="text-danger"> *</span></label>
                    <input type="text" name="creator_name" class="form-control" value="{{ $nft_category->creator_name }}">
                    @error('creator_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label">Creator Photo(Size: 140*140px)</label>
                    <input type="file" name="creator_photo" class="form-control">
                </div>
                <div class="col-lg-3">
                    <img style="height:100px; width: 100px" src="{{ asset('uploads/nftcategory') }}/{{ $nft_category->creator_photo }}" alt="item Image">
                </div> --}}
                <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
            </form>
        </div>
    </div>

      </div>
    </div>
</section>
@endsection
