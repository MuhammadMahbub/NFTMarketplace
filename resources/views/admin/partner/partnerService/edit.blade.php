@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Partner Service Section') }}

@endsection

{{-- Active Menu --}}
@section('partnerServiceIndex')
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
                {{ __('Partner Service Section') }}
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
                        <h4 class="card-title"> {{ __('Update Partner Service Section') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('partner.service.update', $partnerService->id) }}" method="POST" class="form form-vertical">
                            @csrf
                            @method('PUT')
                            <p class="text-muted">{{ __('Icon name will be HTML tag encrypted.') }}</p>
                            <div class="row">
                                <div class="col-11">
                                    <div class="form-group">
                                        <label for="icon">{{ __('Icon') }} <span class="text-danger"> *</span></label>
                                        <input type="text" name="icon" value="{{ $partnerService->icon }}" id="icon" class="form-control"/>
                                        @error('icon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-1 mt-2">
                                    <i class="fa-solid fa-code"></i>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span class="text-danger"> *</span></label>
                                        <input type="text" name="title" value="{{ $partnerService->title }}" id="title" class="form-control"/>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }} <span class="text-danger"> *</span></label>
                                        <textarea name="description" value="" id="description" class="form-control">{{ $partnerService->description }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">{{ __('Update Partner Service') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
