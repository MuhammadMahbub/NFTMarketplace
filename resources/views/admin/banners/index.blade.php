@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __('Banner') }}
@endsection

{{-- Active Menu --}}
@section('banner')
    active
@endsection



{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __('Hmoe') }}</a>
            </li>
            <li class="breadcrumb-item active">{{ __('Banner') }}</li>
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
                        <h4 class="card-title">{{ __("Update Banner") }}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('Banner Title') }} <span class="text-danger"> *</span></label>
                        <input type="text" name="title" class="form-control" value="{{ $banner->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Banner Sub-Title') }} <span class="text-danger"> *</span></label>
                        <input type="text" name="sub_title" class="form-control" value="{{ $banner->sub_title }}">
                        @error('sub_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Banner Button 1 Text') }} <span class="text-danger"> *</span></label>
                        <input type="text" name="btn1_text" class="form-control" value="{{ $banner->btn1_text }}">
                        @error('btn1_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __("Banner Button 1 URL") }} <span class="text-danger"> *</span></label>
                        <input type="text" name="btn1_url" class="form-control" value="{{ $banner->btn1_url }}">
                        @error('btn1_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __("Banner Button 2 Text") }} <span class="text-danger"> *</span></label>
                        <input type="text" name="btn2_text" class="form-control" value="{{ $banner->btn2_text }}">
                        @error('btn2_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Banner Button 2 URL') }} <span class="text-danger"> *</span></label>
                        <input type="text" name="btn2_url" class="form-control" value="{{ $banner->btn2_url }}">
                        @error('btn2_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group mt-2">
                                <label class="form-label">{{ __('Image') }} </label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <img src="{{ asset('uploads/images/banner') }}/{{ $banner->image }}" style="height:100px; width: 100px" alt="Banner Image">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">{{ __("Update Banner data") }}</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
