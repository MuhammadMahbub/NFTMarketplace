@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | Titles
    @endsection

    {{-- Active Menu --}}
    @section('homeTitle')
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
                    <a href="#">Update Home Titles</a>
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
                        <h4 class="card-title">Update Titles</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('homeTitles.update', $homeTitle->id) }}" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label">Collection Title<span class="text-danger"> *</span></label>
                            <input type="text" name="collection_title" class="form-control" value="{{ $homeTitle->collection_title }}">
                            @error('collection_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Category Title<span class="text-danger"> *</span></label>
                            <input type="text" name="category_title" class="form-control" value="{{ $homeTitle->category_title }}">
                            @error('category_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Module Title<span class="text-danger"> *</span></label>
                            <input type="text" name="module_title" class="form-control" value="{{ $homeTitle->module_title }}">
                            @error('module_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Titles</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection
