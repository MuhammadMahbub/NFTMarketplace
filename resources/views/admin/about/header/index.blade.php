@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("About us") }}
@endsection

{{-- Active Menu --}}
@section('aboutHeaderIndex')
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
                {{ __('Header Info') }}
            </li>
        </ol>
    </div>
@endsection

{{-- Page Content --}}
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> {{ __('Update Header Info') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about.header.update', $headerInfo->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }}<span class="text-danger"> *</span></label>
                                        <input type="text" name="title" value="{{ $headerInfo->title }}" id="title" class="form-control"/>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_title">{{ __('Meta Title') }}<span class="text-danger"> *</span></label>
                                        <textarea name="meta_title" id="meta_title" cols="30" rows="5" class="form-control">{{ $headerInfo->meta_title }}</textarea>
                                        @error('meta_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="video_url">{{ __('Video Url') }} <span class="text-danger"> *</span></label>
                                        <input type="text" name="video_url" value="{{ $headerInfo->video_url }}" id="video_url" class="form-control"/>
                                        @error('video_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">{{ __("Update About Header Info") }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
