@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
{{ config('app.name') }} | {{ __('Item') }}
@endsection

{{-- Active Menu --}}
@section('item')
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
            <li class="breadcrumb-item">{{ __('Item') }}</li>
            <li class="breadcrumb-item active">{{ __('Update') }}</li>
        </ol>
    </div>
@endsection
{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">{{ __('Update Item') }}</h4>
              </div>
            <div class="card-body">
                <form action="{{ route('item_update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('User') }}</label>
                        <input type="text" disabled class="form-control" value="{{ $item->get_creator->name }}">
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Item') }}</label>
                        <input type="text" disabled class="form-control" value="{{ $item->name }}">
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Creators Loyalty') }}</label>
                        <input type="text" name="creator_loyalty" class="form-control" value="{{ $item->creator_loyalty }}">
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Buy Button Text') }}</label>
                        <input type="text" name="buy_button_text" class="form-control" value="{{ $item->buy_button_text }}">
                        @error('buy_button_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('View Button Text') }}</label>
                        <input type="text" name="view_button_text" class="form-control" value="{{ $item->view_button_text }}">
                        @error('view_button_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-1">{{ __('Update Item') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
