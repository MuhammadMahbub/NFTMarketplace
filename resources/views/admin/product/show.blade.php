@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ __('Product') }}
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
            <li class="breadcrumb-item">
                <a href="{{ route('product.index') }}">{{ __("Product") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Product Details") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{ route('product.index') }}" class="btn btn-dark">{{ __('Return Back') }} </a>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered border-width-3">
                <tr>
                    <th> {{ __('Category') }} </th>
                    <td>{{ $product->get_category->name }}</td>
                </tr>
                <tr>
                    <th> {{ __("Name") }} </th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('Price') }}</th>
                    <td>{{ $product->price }}</td>
                </tr>

                <tr>
                    <th>{{ __('Quantity') }}</th>
                    <td>{{ $product->quantity }}</td>
                </tr>
                <tr>
                    <th>{{ __('Image') }}</th>
                    <td><img src="{{ asset('uploads/images/product') }}/{{ $product->image }}" width="150" height="100"
                            alt="No Photo"></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
