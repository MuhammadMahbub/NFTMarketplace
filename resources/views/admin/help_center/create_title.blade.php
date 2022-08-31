@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __('Help Center Title') }}
@endsection

{{-- Active Menu --}}
@section('help_center_title')
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
                {{ __("Help Center") }}
            </li>
            <li class="breadcrumb-item active">
                {{ __('Create Titles') }}
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
            <h4 class="card-title">{{ __('Create Help Center') }}</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('help_center_title.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="help_center_title">{{ __('Help Center Title') }} <span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" id="help_center_title" name="help_center_title" value="{{ HelpCenterTitle()->help_center_title }}">
                </div>
                @error('help_center_title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="bg_image">{{ __('Background Image') }} <span class="text-danger"> *</span></label>
                            <input type="file" class="form-control" id="bg_image" name="bg_image">
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('uploads/images/help_center') }}/{{ HelpCenterTitle()->bg_image }}" style="height: 100px; width: 200px">
                        </div>
                    </div>
                </div>
                @error('bg_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="category_title">{{ __('Category Title') }} <span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" id="category_title" name="category_title" value="{{ HelpCenterTitle()->category_title }}">
                </div>
                @error('help_center_title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="faq_title">{{ __('Faq Title') }} <span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" id="faq_title" name="faq_title" value="{{ HelpCenterTitle()->faq_title }}">
                </div>
                @error('faq_title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="faq_meta_title">{{ __('Faq Meta Title') }} <span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" id="faq_meta_title" name="faq_meta_title" value="{{ HelpCenterTitle()->faq_meta_title }}">
                </div>
                @error('faq_meta_title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>
        </div>
    </div>
        </div>
    </section>
@endsection
