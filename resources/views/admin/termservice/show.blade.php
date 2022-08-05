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
        <a href="{{ route('term_service.index') }}" class="btn btn-dark">Return Back </a>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered border-width-3">
                <tr>
                    <th> Title </th>
                    <td>{{ $termService->title }}</td>
                </tr>
                <tr>
                    <th> Description </th>
                    <td>{!! $termService->description !!}</td>
                </tr>

            </table>
        </div>
    </div>
@endsection
