@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __("Blogs") }}
@endsection

{{-- Active Menu --}}
@section('BlogCreate')
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
            <li class="breadcrumb-item">{{ __('Blog') }}</li>
            <li class="breadcrumb-item active">{{ __('Create') }}</li>
        </ol>
    </div>
@endsection
{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('Category Name') }} <span class="text-danger"> *</span></label>
                        <select name="category_id" class="form-control">
                            <option selected disabled>--{{ __('Select One') }}--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Title') }} <span class="text-danger"> *</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Sub Title') }}</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}">
                        @error('subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Main Image') }} <span class="text-danger"> *</span></label>
                        <input type="file" name="main_image" class="form-control">
                        @error('main_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Feature Image 1') }}</label>
                        <input type="file" name="image1" class="form-control">
                        @error('image1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __("Feature Image 2") }}</label>
                        <input type="file" name="image2" class="form-control">
                        @error('image2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group mt-2">
                        <label class="form-label">Author Image</label>
                        <input type="file" name="author_image" class="form-control">
                        @error('author_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Quote Name') }}</label>
                        <input type="text" name="quote_name" class="form-control" value="{{ old('quote_name') }}">
                        @error('quote_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Quote') }}</label>
                        <input type="text" name="quote" class="form-control" value="{{ old('quote') }}">
                        @error('quote')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __("Author Comment") }}</label>
                        <input type="text" name="author_comment" class="form-control" value="{{ old('author_comment') }}">
                        @error('author_comment')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Author Facebook') }}</label>
                        <input type="text" name="author_facebook" class="form-control" value="{{ old('author_facebook') }}">
                        @error('author_facebook')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Author Twitter') }}</label>
                        <input type="text" name="author_twitter" class="form-control" value="{{ old('author_twitter') }}">
                        @error('author_twitter')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __("Author Discord") }}</label>
                        <input type="text" name="author_discord" class="form-control" value="{{ old('author_discord') }}">
                        @error('author_discord')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __("Long Description") }} <span class="text-danger"> *</span></label>
                        <input type="hidden" name="description" id="description" class="form-control">
                        <trix-editor input="description" style="min-height: 12rem !important"></trix-editor>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">{{ __('Submit') }}</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
