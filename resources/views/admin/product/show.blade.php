@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    Product
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
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('product.index') }}">Product</a>
            </li>
            <li class="breadcrumb-item active">
                Product Details
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{ route('product.index') }}" class="btn btn-dark">Return Back </a>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered border-width-3">
                <tr>
                    <th> Category </th>
                    <td>{{ $product->get_category->name }}</td>
                </tr>
                <tr>
                    <th> Name </th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $product->price }}</td>
                </tr>

                <tr>
                    <th>Quantity</th>
                    <td>{{ $product->quantity }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="{{ asset('uploads/images/product') }}/{{ $product->image }}" width="150" height="100"
                            alt="No Photo"></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
