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
     <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item">{{ __("Status") }}</li>
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
                <h4 class="card-title">{{ __("Update Status") }}</h4>
              </div>
            <div class="card-body">
                <form action="{{ route('status_update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label class="form-label">{{ __('Current Status') }}</label>
                        <input type="text" disabled class="form-control" value="{{ ucfirst($item->status) }}">
                    </div>

                        <label>{{ __("Set Status") }}<span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                                <option value="show" {{ $item->status == 'show' ? 'selected' : '' }}>{{ __("Show") }}</option>
                                <option value="hide" {{ $item->status == 'hide' ? 'selected' : '' }}>{{ __("Hide") }}</option>
                        </select>


                    <button type="submit" class="btn btn-primary mt-1">{{ __('Update Status') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
