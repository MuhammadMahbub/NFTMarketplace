@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('Contacts') }}
    @endsection

    {{-- Active Menu --}}
    @section('contactAddress')
        active
    @endsection


    {{-- Breadcrumb --}}
    @section('breadcrumb')
         <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">{{ __('Contact address') }}</a>
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
                        <h4 class="card-title">{{ __('Contact Address') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p class="ml-1 text-muted">{{ __('All Icon Will BE HTML tag Encrypted.') }}</p>
                    <form method="POST" action="{{ route('contact.address.update', $contactAddress->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="phone_title">{{ __('Phone Title') }}</label>
                            <input type="text" class="form-control" id="phone_title" name="phone_title" value="{{ $contactAddress->phone_title }}">
                        </div>
                        @error('phone_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="phone_icon">{{ __('Phone Icon') }}</label>
                                    <input type="text" class="form-control" id="phone_icon" name="phone_icon" value="{{ $contactAddress->phone_icon }}">
                                </div>
                                @error('phone_icon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                @php
                                    echo $contactAddress->phone_icon;
                                @endphp
                                {{-- {{ echo $contactAddress->phone_icon }} --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $contactAddress->phone }}">
                        </div>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="address_title">{{ __('Address Title') }}</label>
                            <input type="text" class="form-control" id="address_title" name="address_title" value="{{ $contactAddress->address_title }}">
                        </div>
                        @error('address_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="address_icon">{{ __('Address Icon') }}</label>
                                    <input type="text" class="form-control" id="address_icon" name="address_icon" value="{{ $contactAddress->address_icon }}">
                                </div>
                                @error('address_icon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                @php
                                    echo $contactAddress->address_icon;
                                @endphp
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $contactAddress->address }}">
                        </div>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="email_title">{{ __('Email Title') }}</label>
                            <input type="text" class="form-control" id="email_title" name="email_title" value="{{ $contactAddress->email_title }}">
                        </div>
                        @error('email_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="email_icon">{{ __('Email Icon') }}</label>
                                    <input type="text" class="form-control" id="email_icon" name="email_icon" value="{{ $contactAddress->email_icon }}">
                                </div>
                                @error('email_icon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-2">
                                @php
                                    echo $contactAddress->email_icon;
                                @endphp
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $contactAddress->email }}">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection
