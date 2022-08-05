@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     Help Center
@endsection

{{-- Active Menu --}}
@section('help_center')
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
                Help Center
            </li>
            <li class="breadcrumb-item active">
                Create Category
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
            <h4 class="card-title">Create Help Center</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('help_center.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="description"> Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="3">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
        </div>
    </div>
        </div>
    </section>
@endsection
