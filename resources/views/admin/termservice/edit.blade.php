@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __("Terms Of Services") }}
    @endsection

    {{-- Active Menu --}}
    @section('term_service')
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
                {{ __('Update Term Service') }}
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
                <h4 class="card-title">{{ __('Update Term Service') }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('term_service.update', $termService->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- @foreach ($termservices as $item) --}}
                    <div class="form-group">
                        <label for="title"><b>{{ __('Title') }} </b></label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $termService->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description"><b>{{ __('Description') }}</b> <span class="text-danger">*</span></label>
                        <input id="description" type="hidden" name="description" value="{{ $termService->description }}" />
                        <trix-editor input="description" class="trix-content"></trix-editor>
                    </div>
                    {{-- @endforeach --}}

                    <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route('term_service.index') }}" class="btn btn-dark"> {{ __('Back') }} </a>
        </div>
        </div>
        </div>
    </section>
@endsection
