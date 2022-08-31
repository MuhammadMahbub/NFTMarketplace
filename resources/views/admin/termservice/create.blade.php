@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __('Terms Of Services') }}
@endsection

{{-- Active Menu --}}
@section('term_service')
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
                {{ __('Term Service') }}
            </li>
            <li class="breadcrumb-item active">
                {{ __('Add Term Service') }}
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
            <h4 class="card-title">{{ __('Add Term Service') }}</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('term_service.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title"> {{ __('Title') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="description"><b>{{ __('Description') }}</b> <span class="text-danger">*</span></label>
                    <input id="description" type="hidden" name="description" value="{{ old('description') }}" />
                    <trix-editor input="description" class="trix-content"></trix-editor>
                </div>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
            </form>
        </div>
    </div>
        </div>
    </div>
        </div>
    </section>
@endsection
