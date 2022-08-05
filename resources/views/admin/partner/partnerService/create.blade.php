@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | Partner Service Section

@endsection

{{-- Active Menu --}}
@section('partnerServiceSectionCreate')
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
                Partner Service Section
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
                        <h4 class="card-title"> Create Partner Service Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('partner.service.store') }}" method="POST" class="form form-vertical">
                            @csrf
                            <p class="text-muted">Icon name will be HTML tag encrypted.</p>
                            <div class="row">
                                <div class="col-11">
                                    <div class="form-group">
                                        <label for="icon">Icon <span class="text-danger"> *</span></label>
                                        <input type="text" name="icon" value="{{ old('icon') }}" id="icon" class="form-control"/>
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
                                        <label for="title">Title <span class="text-danger"> *</span></label>
                                        <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control"/>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="text-danger"> *</span></label>
                                        <textarea name="description" value="" id="description" class="form-control">{{ old('description') }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Create Partner Service</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
