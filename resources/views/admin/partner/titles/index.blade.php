@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Partner titles") }}

@endsection

{{-- Active Menu --}}
@section('partnerTitles')
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
                {{ __('Partner titles') }}
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
                        <h4 class="card-title"> {{ __('Update Partner titles') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('partnerTitles.update', $partnerTitles->id) }}" method="POST" class="form form-vertical">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title1">{{ __('Title One') }}<span class="text-danger"> *</span></label>
                                        <input type="text" name="title1" value="{{ $partnerTitles->title1 }}" id="title1" class="form-control"/>
                                        @error('title1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description1">{{ __('Description One') }}<span class="text-danger"> *</span></label>
                                        <textarea name="description1" value="" id="description1" class="form-control" cols="30" rows="5">{{ $partnerTitles->description1 }}</textarea>
                                        @error('description1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title2">{{ __('Title Two') }}<span class="text-danger"> *</span></label>
                                        <input type="text" name="title2" value="{{ $partnerTitles->title2 }}" id="title2" class="form-control"/>
                                        @error('title2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description2">{{ __('Description Two') }}<span class="text-danger"> *</span></label>
                                        <textarea name="description2" value="" id="description2" class="form-control" cols="30" rows="5">{{ $partnerTitles->description2 }}</textarea>
                                        @error('description2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title3">{{ __('Title') }} <span class="text-danger"> *</span></label>
                                        <input type="text" name="title3" value="{{ $partnerTitles->title3 }}" id="title3" class="form-control"/>
                                        @error('title3')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description3">{{ __('Description Three') }}<span class="text-danger"> *</span></label>
                                        <textarea name="description3" value="" id="description3" class="form-control" cols="30" rows="5">{{ $partnerTitles->description3 }}</textarea>
                                        @error('description3')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">{{ __('Update partner Titles') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
