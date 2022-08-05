@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | General Settings
@endsection

{{-- Active Menu --}}
@section('generalSettings')
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
                Gerneral Settings
            </li>
        </ol>
    </div>
@endsection

{{-- Page Content --}}
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('generalSettings.update', $generalSettings->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="favicon">Favicon <span class="text-danger">*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" name="favicon" class="custom-file-input" id="favicon">
                                                    <label class="custom-file-label" for="favicon">Choose file</label>
                                                </div>
                                                @error('favicon')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->favicon }}" style="max-height: 60px" alt="Not Found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="logo">Logo </label>
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input" id="logo">
                                                    <label class="custom-file-label" for="logo">Choose file</label>
                                                </div>
                                                @error('logo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo }}" style="max-height: 60px" alt="Not Found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="logo_dark">Logo Dark </label>
                                                <div class="custom-file">
                                                    <input type="file" name="logo_dark" class="custom-file-input" id="logo_dark">
                                                    <label class="custom-file-label" for="logo_dark">Choose file</label>
                                                </div>
                                                @error('logo_dark')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo_dark }}" style="max-height: 60px" alt="Not Found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="app_title">App Title <span class="text-danger">*</span></label>
                                        <input type="text" name="app_title" value="{{ generalSettings()->app_title }}" id="app_title" class="form-control" placeholder="Enter App title"/>
                                        @error('app_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="footer_description">Footer Description <span class="text-danger">*</span></label>
                                        <input type="text" name="footer_description" value="{{ generalSettings()->footer_description }}" id="footer_description" class="form-control" placeholder="Enter Footer description"/>
                                        @error('footer_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="site_designer">Site Designer <span class="text-danger">*</span></label>
                                        <input type="text" name="site_designer" value="{{ generalSettings()->site_designer }}" id="site_designer" class="form-control" placeholder="Enter Site Designer"/>
                                        @error('site_designer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="site_designer">Designer Route<span class="text-danger">*</span></label>
                                        <input type="text" name="designer_route" value="{{ generalSettings()->designer_route }}" id="designer_route" class="form-control" placeholder="Enter Designer Route"/>
                                        @error('designer_route')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
