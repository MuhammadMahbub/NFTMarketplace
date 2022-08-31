@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
{{ config('app.name') }} | {{ __('FAQ') }}
@endsection

{{-- Active Menu --}}
@section('faq')
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
                {{ __("FAQ") }}
            </li>
            <li class="breadcrumb-item active">
                {{ __("Create FAQ") }}
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
            <h4 class="card-title">{{ __('Create FAQ') }}</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('faq.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="question">{{ __('Question') }} <span class="text-danger">*</span></label>
                    <textarea name="question" class="form-control" id="" cols="30" rows="3">{{ old('question') }}</textarea>
                </div>
                @error('question')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="answer"> {{ __("Answer") }} <span class="text-danger">*</span></label>
                    <textarea name="answer" class="form-control" id="" cols="30" rows="3">{{ old('answer') }}</textarea>
                </div>
                @error('answer')
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
