@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('Contacts') }}
    @endsection

    {{-- Active Menu --}}
    @section('contactUs')
        active
    @endsection


    {{-- Breadcrumb --}}
    @section('breadcrumb')
         <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">{{ __('Contact Us') }}</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ __('Update') }}
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
                        <h4 class="card-title">{{ __('Contact Us') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contactUs.titles.update', $contactUsTitles->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $contactUsTitles->title }}">
                        </div>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="col-9">
                                <div class="form-group">
                                    <label for="image">{{ __("Image") }} <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ $contactUsTitles->image }}">
                                </div>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('uploads/images/contactUs') }}/{{ $contactUsTitles->image }}" style="height:80px;width:225px;border-radius:5px" alt="Banner">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form_title">{{ __('Form Title') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="form_title" name="form_title" value="{{ $contactUsTitles->form_title }}">
                        </div>
                        @error('form_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="form_meta_title">{{ __('Form Meta-Title') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="form_meta_title" name="form_meta_title" value="{{ $contactUsTitles->form_meta_title }}">
                        </div>
                        @error('form_meta_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="address_title">{{ __('Address Title') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address_title" name="address_title" value="{{ $contactUsTitles->address_title }}">
                        </div>
                        @error('address_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="address_meta_title">{{ __("Address Meta-Title") }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address_meta_title" name="address_meta_title" value="{{ $contactUsTitles->address_meta_title }}">
                        </div>
                        @error('address_meta_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection</h3>
