@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | Team
@endsection

{{-- Active Menu --}}
@section('team')
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
                Team Mamber
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
                        <h4 class="card-title"> Update Team Mamber Data</h4>
                        <span><a  class="btn btn-primary mr-1" href="{{ route('team') }}">Back</a></span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="image">Image <span class="text-danger"> *</span></label>
                                        <input type="file" name="image" id="image" class="form-control"/>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/images/about/team') }}/{{ $team->image }}" style="height:80px;width:80px;border-radius:5px" alt="Team Mamber">
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger"> *</span></label>
                                        <input type="text" name="name" value="{{ $team->name }}" id="name" class="form-control"/>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="designation">Designation <span class="text-danger"> *</span></label>
                                        <input type="text" name="designation" value="{{ $team->designation }}" id="designation" class="form-control"/>
                                        @error('designation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="linkedin_url">Linkedin URL</label>
                                        <input type="text" name="linkedin_url" value="{{ $team->linkedin_url }}" id="linkedin_url" class="form-control"/>
                                        @error('linkedin_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="facebook_url">Facebook URL</label>
                                        <input type="text" name="facebook_url" value="{{ $team->facebook_url }}" id="facebook_url" class="form-control"/>
                                        @error('facebook_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="twitter_url">Twitter URL</label>
                                        <input type="text" name="twitter_url" value="{{ $team->twitter_url }}" id="twitter_url" class="form-control"/>
                                        @error('twitter_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Update Team Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
