@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __('Login Page Design') }}
@endsection

{{-- Active Menu --}}
@section('loginPageDesign')
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

            <li class="breadcrumb-item">
                <a>{{ __('Login Page Customize') }}</a>
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
            <h4 class="card-title">{{ __('Update Login Interface') }}</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('login.page.design.update', $loginPage->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="login_title">{{ __('Login Title') }} <span class="text-danger"> *</span> </label>
                    <input type="text" class="form-control" id="login_Title" name="login_title"
                        value="{{ $loginPage->login_title }}">
                </div>
                <div class="form-group">
                    <label for="login_sub_title">{{ __('Login Sub Title') }}</label>
                    <input type="text" class="form-control" id="login_sub_title" name="login_sub_title"
                        value="{{ $loginPage->login_sub_title }}">
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group mt-2">
                            <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="favicon">
                                <label class="custom-file-label" for="favicon">{{ __('Choose logo') }}</label>
                            </div>
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img class="my-2" style="height:100px; width: 100%" src="{{ asset('uploads/login') }}/{{ $loginPage->logo }}" alt="image2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group mt-2">
                            <div class="custom-file">
                                <input type="file" name="banner_image" class="custom-file-input" id="favicon">
                                <label class="custom-file-label" for="favicon">{{ __('Choose Banner Image') }}</label>
                            </div>
                            @error('banner_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img class="my-2" style="height:100px; width: 100px" src="{{ asset('uploads/login') }}/{{ $loginPage->banner_image }}" alt="image2">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
