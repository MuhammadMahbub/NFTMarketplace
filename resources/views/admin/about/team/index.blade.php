@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __("Teams") }}
@endsection

{{-- Active Menu --}}
@section('team')
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
            <li class="breadcrumb-item">{{ __('Team') }}</li>
            <li class="breadcrumb-item active">{{ __("List") }}</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="row">
                <div class="col-md-9">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("List") }}</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <button style="margin: 21px 21px 0 0;" class="btn btn-gradient-primary float-right"><a style="color: #f1f1f1" href="{{ route('team.create') }}">{{ __("Create team Mamber") }}</a></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>{{ __("Sl") }}</th>
                                <th>{{ __("Image") }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __("Designation") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ asset('uploads/images/about/team') }}/{{ $team->image }}" alt="Team Image" style="height:80px;width:80px;border-radius:5px">
                                </td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->designation }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('team.edit', $team->id) }}">
                                                <i data-feather='edit' class="mr-50"></i>
                                                <span>{{ __('Edit') }}</span>
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter{{ $team->id }}" title="Delete">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>{{ __("Delete") }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @push('all_modals')
                                <!-- Delete Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $team->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Employee') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __("Are You Sure To Delete This Employee") }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <form action="{{ route('team.destroy', $team->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-primary">{{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endpush
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
