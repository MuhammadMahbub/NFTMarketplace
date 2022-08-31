@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('Platform Status') }}
    @endsection

    {{-- Active Menu --}}
    @section('platform')
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
                    <a href="#">{{ __('Update Platform Titles') }}</a>
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
                        <h4 class="card-title">{{ __('Update Titles') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('platformTitles.update', $platforms->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Title') }}<span class="text-danger"> *</span></label>
                            <input type="text" name="title" class="form-control" value="{{ $platforms->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-2">
                                    <label class="form-label">{{ __('Banner Image') }}</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <img style="height:120px;width:100%;border-radius:5px" src="{{ asset('uploads/images/platfrom') }}/{{ $platforms->image }}">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Operation Title') }}<span class="text-danger"> *</span></label>
                            <input type="text" name="operation_title" class="form-control" value="{{ $platforms->operation_title }}">
                            @error('operation_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('History Title') }}<span class="text-danger"> *</span></label>
                            <input type="text" name="history_title" class="form-control" value="{{ $platforms->history_title }}">
                            @error('history_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">{{ __('Update Titles') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection
