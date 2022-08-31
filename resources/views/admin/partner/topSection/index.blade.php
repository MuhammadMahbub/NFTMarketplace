@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Partner Top Section') }}

@endsection

{{-- Active Menu --}}
@section('partnerTopSection')
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
                {{ __('Partner Top Section') }}
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
                        <h4 class="card-title"> {{ __('Update Partner Top Section') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('partnerTopSection.update', $partnerTopSection->id) }}" method="POST" class="form form-vertical">
                            @csrf
                            @method('PUT')
                            <p class="text-muted">{{ __('Icon name will be HTML tag encrypted.') }}</p>
                            <div class="row">
                                <div class="col-11">
                                    <div class="form-group">
                                        <label for="icon1">{{ __('Icon One') }}</label>
                                        <input type="text" name="icon1" value="{{ $partnerTopSection->icon1 }}" id="icon1" class="form-control"/>
                                        @error('icon1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-1 mt-2">
                                    <i class="fa-solid fa-code"></i>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="text1">{{ __('Text One') }}</label>
                                        <input type="text" name="text1" value="{{ $partnerTopSection->text1 }}" id="text1" class="form-control"/>
                                        @error('text1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="form-group">
                                        <label for="icon2">{{ __('Icon Two') }}</label>
                                        <input type="text" name="icon2" value="{{ $partnerTopSection->icon2 }}" id="icon2" class="form-control"/>
                                        @error('icon2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-1 mt-2">
                                    <i class="fa-solid fa-star-shooting"></i>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="text2">{{ __('Text Two') }}</label>
                                        <input type="text" name="text2" value="{{ $partnerTopSection->text2 }}" id="text2" class="form-control"/>
                                        @error('text2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="form-group">
                                        <label for="icon3">{{ __('Icon Three') }}</label>
                                        <input type="text" name="icon3" value="{{ $partnerTopSection->icon3 }}" id="icon3" class="form-control"/>
                                        @error('icon3')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-1 mt-2">
                                    <i class="fa-solid fa-face-smile"></i>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="text3">{{ __('Text Three') }}</label>
                                        <input type="text" name="text3" value="{{ $partnerTopSection->text3 }}" id="text3" class="form-control"/>
                                        @error('text3')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">{{ __('Update Partner Top') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
