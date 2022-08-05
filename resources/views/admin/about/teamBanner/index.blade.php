@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | Team Banner
@endsection

{{-- Active Menu --}}
@section('teamBanner')
    active
@endsection


{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                About Team Banner
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
                        <h4 class="card-title"> Update Team Banner</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('team.banner.update', $teamBanner->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-danger"> *</span></label>
                                        <input type="text" name="title" value="{{ $teamBanner->title }}" id="title" class="form-control"/>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title<span class="text-danger"> *</span></label>
                                        <input type="text" name="meta_title" value="{{ $teamBanner->meta_title }}" id="meta_title" class="form-control"/>
                                        @error('meta_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">Description<span class="text-danger"> *</span></label>
                                        <textarea  name="description" id="description" class="form-control" cols="30" rows="5">{{ $teamBanner->description }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="launch_product_text">Launch Product Text</label>
                                        <input type="text" name="launch_product_text" value="{{ $teamBanner->launch_product_text }}" id="launch_product_text" class="form-control"/>
                                        @error('launch_product_text')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="launch_product_text_value">Launch Product Text Value<span class="text-danger"> *</span></label>
                                        <input type="text" name="launch_product_text_value" value="{{ $teamBanner->launch_product_text_value }}" id="launch_product_text_value" class="form-control"/>
                                        @error('launch_product_text_value')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="satisfaction_rate">Satisfaction Rate</label>
                                        <input type="text" name="satisfaction_rate" value="{{ $teamBanner->satisfaction_rate }}" id="satisfaction_rate" class="form-control"/>
                                        @error('satisfaction_rate')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="satisfaction_rate_value">Satisfaction Rate Value<span class="text-danger"> *</span></label>
                                        <input type="text" name="satisfaction_rate_value" value="{{ $teamBanner->satisfaction_rate_value }}" id="satisfaction_rate_value" class="form-control"/>
                                        @error('satisfaction_rate_value')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="image">Image<span class="text-danger"> *</span></label>
                                        <input type="file" name="image" id="image" class="form-control"/>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/images/about/teamBanner') }}/{{ $teamBanner->image }}" style="height:80px;width:80px;border-radius:5px" alt="team banner">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Update About Header Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
