@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('Review Edit') }}
    @endsection

    {{-- Active Menu --}}
    @section('partnerReview')
        active
    @endsection


    {{-- Breadcrumb --}}
    @section('breadcrumb')
         <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-muted">{{ __('Update Review') }}</a>
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
                        <h4 class="card-title">{{ __('Update Review') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('partner.review.update', $partnerReview->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Comment') }} <span class="text-danger"> *</span></label>
                            <textarea name="comment" class="form-control" cols="30" rows="4">{{ $partnerReview->comment }}</textarea>
                            @error('comment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Name') }} <span class="text-danger"> *</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $partnerReview->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">{{ __('Designation') }} <span class="text-danger"> *</span></label>
                            <input type="text" name="designation" class="form-control" value="{{ $partnerReview->designation }}">
                            @error('designation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-group mt-2">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-2">
                                    <label class="form-label">{{ __('Image') }}</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <img style="height:120px;border-radius:5px" src="{{ asset('uploads/images/partner/partnerReview') }}/{{ $partnerReview->image }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">{{ __('Create Review') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
