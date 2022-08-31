@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('Help Center') }}
    @endsection

    {{-- Active Menu --}}
    @section('help_center')
        active
    @endsection

        {{-- Breadcrumb --}}
    @section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __('Help Center') }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __('Update Help Center') }}
            </li>
        </ol>
    </div>
    @endsection

    @section('content')
<section class="banner-main-section" id="main">
    <div class="row">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">{{ __('Update Help Center') }}</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('help_center.update', $helpCenter->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">{{ __('Category Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $helpCenter->title }}">
                </div>
                <div class="form-group">
                    <label for="name">{{ __('Description') }} <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="3">{{ $helpCenter->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
