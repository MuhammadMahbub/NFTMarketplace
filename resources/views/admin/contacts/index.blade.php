@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Contacts') }}
@endsection

{{-- Active Menu --}}
@section('contacts')
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
                Contacts
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Contact List') }}</h4>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">{{ session('warning') }}</div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Message') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $contact->name }}</span></td>
                                <td>{{ $contact->email }}</span></td>
                                <td>{{ $contact->phone }}</span></td>
                                <td>{{ $contact->message }}</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                                {{-- Initiate Delete method --}}
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <a class="dropdown-item" href="{{ route('contacts.destroy', $contact->id) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>{{ __('Delete') }}</span>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
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
