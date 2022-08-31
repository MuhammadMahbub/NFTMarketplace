@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Users') }}
@endsection

{{-- Active Menu --}}
@section('users')
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
        {{ __('Users') }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title">{{ __('User List') }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ route('users.show',$user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <img style="height:80px;width:80px;border-radius:5px" src="{{ asset('uploads/images/users') }}/{{ $user->profile_photo_path }}" alt="Admin picture">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('users.show', $user->id) }}">
                                                <i data-feather="eye" class="mr-50"></i>
                                                <span>{{ __('Show') }}</span>
                                            </a>

                                            @if (Auth::id() == $user->id)
                                            <a class="dropdown-item" href="{{ route('profile_edit', $user->slug) }}">
                                                    <i data-feather="edit" class="mr-50"></i>
                                                    <span>
                                                    {{ __('Edit Profile') }}
                                                </span>
                                                </a>
                                                @else
                                                @if (Auth::id()==1)
                                                    <a class="dropdown-item" href="{{ route('users.role.edit', $user->id) }}">
                                                        <i data-feather="edit" class="mr-50"></i>
                                                        <span>
                                                        {{ __('Edit Role') }}
                                                    </span>
                                                </a>
                                                @endif
                                            @endif

                                            @if ($user->role_id != 1)
                                            <a class="dropdown-item" data-toggle="modal" data-target="#userDelete{{ $user->id }}" title="delete">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>{{ __('Delete') }}</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <!-- Delete Modal -->
                                <div class="modal modal-lg fade" id="userDelete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __('Are You Sure Delete The User?') }}
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
