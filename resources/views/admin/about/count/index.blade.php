@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Abouts') }}
@endsection

{{-- Active Menu --}}
@section('aboutCount')
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
                {{ __('About Count Data') }}
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
                        <h4 class="card-title"> {{ __('Update Count Info') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about.count.update', $countInfo->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }}<span class="text-danger"> *</span></label>
                                        <input type="text" name="title" value="{{ $countInfo->title }}" id="title" class="form-control"/>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="founded">{{ __('Founded') }}</label>
                                        <input type="text" name="founded" value="{{ $countInfo->founded }}" id="founded" class="form-control"/>
                                        @error('founded')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="founded_value">{{ __('Founded Value') }}<span class="text-danger"> *</span></label>
                                        <input type="text" name="founded_value" value="{{ $countInfo->founded_value }}" id="founded_value" class="form-control"/>
                                        @error('founded_value')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="trading_volume">{{ __('Trading Volume') }}</label>
                                        <input type="text" name="trading_volume" value="{{ $countInfo->trading_volume }}" id="trading_volume" class="form-control"/>
                                        @error('trading_volume')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="trading_volume_value">{{ __('Trading Volume Value') }}<span class="text-danger"> *</span></label>
                                        <input type="text" name="trading_volume_value" value="{{ $countInfo->trading_volume_value }}" id="trading_volume_value" class="form-control"/>
                                        @error('trading_volume_value')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nft_created">{{ __('NFT Created') }}</label>
                                        <input type="text" name="nft_created" value="{{ $countInfo->nft_created }}" id="nft_created" class="form-control"/>
                                        @error('nft_created')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nft_created_value">{{ __('Nft Created Value') }}<span class="text-danger"> *</span></label>
                                        <input type="text" name="nft_created_value" value="{{ $countInfo->nft_created_value }}" id="nft_created_value" class="form-control"/>
                                        @error('nft_created_value')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="total_users">{{ __('Total Users') }}</label>
                                        <input type="text" name="total_users" value="{{ $countInfo->total_users }}" id="total_users" class="form-control"/>
                                        @error('total_users')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="total_users_value">{{ _('Total Users value') }}<span class="text-danger"> *</span></label>
                                        <input type="text" name="total_users_value" value="{{ $countInfo->total_users_value }}" id="total_users_value" class="form-control"/>
                                        @error('total_users_value')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">{{ __('Update About Header Info') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
