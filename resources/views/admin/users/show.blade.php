@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    User
@endsection

{{-- Active Menu --}}
@section('users')
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
                <a href="{{ route('users.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active">
                Users Details
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{ route('users.index') }}" class="btn btn-dark">Return Back </a>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered border-width-3">
                <tr>
                    <th> Name </th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th> Email </th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>User Name </th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ $user->role_id == 1 ? 'Admin' : 'User'}}</td>
                </tr>

                <tr>
                    <th>Bio</th>
                    <td>{{ $user->bio }}</td>
                </tr>
                <tr>
                    @php
                        $report = App\Models\ReportUser::where('report_id',$user->id)->get();
                    @endphp
                    <th>Report ({{ $report->count() }})</th>
                    <td>
                        @foreach ($report as $prob)
                            {{ $prob->getUser->name }}{{ !$loop->last ? ',':'' }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    @php
                        $liked = App\Models\LikeUser::where('creator_id',$user->id)->get();
                    @endphp
                    <th>Likes ({{ $liked->count() }})</th>
                    <td>
                        @foreach ($liked as $prob)
                            {{ $prob->getUser->name }}{{ !$loop->last ? ',':'' }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Profile Photo</th>
                    <td><img src="{{ asset('uploads/images/users') }}/{{ $user->profile_photo_path }}" width="150" height="100"
                            alt="No Photo"></td>
                </tr>
                <tr>
                    <th>Cover Photo</th>
                    <td><img src="{{ asset('uploads/images/users') }}/{{ $user->cover_photo_path }}" width="150" height="100"
                            alt="No Photo"></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
