@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     Category
@endsection

{{-- Active Menu --}}
@section('categoryList')
    active
@endsection

@section('blogSpinner')
    <div class="spinner-grow spinner-main-grow-style text-primary mr-1 " role="status">
    </div>
@endsection

@section('blogCategoryList')
    spinner-border text-info
@endsection


{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('category.index') }}">Category</a>
            </li>
            <li class="breadcrumb-item active">
                update category name
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
            <h4 class="card-title">Update Category</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('category.update', $category->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $category->name }}">
                </div>
                <button type="submit" class="btn btn-primary mt-4">Update</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
