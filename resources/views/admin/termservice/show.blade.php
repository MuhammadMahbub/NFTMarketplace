@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ __('Policy') }}
@endsection

{{-- Active Menu --}}
@section('porductList')
    active
@endsection

@section('blogSpinner')
    <div class="spinner-grow spinner-main-grow-style text-primary mr-1 " role="status">
    </div>
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
                <a href="{{ route('product.index') }}">{{ __('Policy') }}</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{ route('term_service.index') }}" class="btn btn-dark">{{ __('Return Back') }} </a>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered border-width-3">
                <tr>
                    <th> {{ __('Title') }} </th>
                    <td>{{ $termService->title }}</td>
                </tr>
                <tr>
                    <th> {{ __('Description') }} </th>
                    <td>{!! $termService->description !!}</td>
                </tr>

            </table>
        </div>
    </div>
@endsection
