@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __('Product') }}
@endsection

{{-- Active Menu --}}
@section('productList')
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
    <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('category.index') }}">{{ __('Product') }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __('Update Product') }}
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
            <h4 class="card-title">{{ __('Update Product') }}</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('product.update', $product->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_name"> {{ __('Category') }} <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $product->id ? 'selected':'' }}>{{  $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="name"> {{ __('Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                </div>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="name"> {{ __('Price') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                </div>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="name"> {{ __('Quantity') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
                </div>
                @error('quantity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="image"> {{ __('Image') }} <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div>
                    <label for="">{{ __('Preview Photo') }}</label>
                    <img src="{{ asset('uploads/images/product') }}/{{ $product->image }}" alt="not found" width="100">
                </div>
                <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
