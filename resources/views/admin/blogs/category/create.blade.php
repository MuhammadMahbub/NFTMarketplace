@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __("Blog Categories") }}
    @endsection

    {{-- Active Menu --}}
    @section('BlogCategoryList')
        active
    @endsection


    {{-- Breadcrumb --}}
    @section('breadcrumb')
         <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">{{ __("Blog Categories") }}</a>
                </li>
            </ol>
        </div>
    @endsection

    {{-- Main Content --}}
    @section('content')
    <div class="row" id="basic-table">
        <div class="col-md-12 col-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-6">
                        <h4 class="card-title">{{ __("Create Category") }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('blog_category.store') }}" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __("Name") }} <span class="text-danger"> *</span></label>
                            <input type="text" name="category_name" class="form-control" value="{{ old('category_name') }}">
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">{{ __('Submit') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection
