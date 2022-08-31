@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __('Report Item') }}
@endsection

{{-- Active Menu --}}
@section('itemReport')
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
            <li class="breadcrumb-item">{{ __('Report') }}</li>
            <li class="breadcrumb-item active">{{ __('List') }}</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="row flex">
                <div class="col-md-3">
                    <button style="margin: 21px 21px 0 21px;" class="btn btn-gradient-primary float-left"><a style="color: #f1f1f1" href="{{ route('seeReport') }}">{{ __('All Reports') }}</a></button>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <button style="margin: 21px 21px 0 0;" class="btn btn-gradient-primary float-right"><a style="color: #f1f1f1" data-toggle="modal" data-target="#createReport">{{ __('Create Report') }}</a></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('Report') }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (reports() as $report)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{ $report->problem ?? 'N/A' }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#editReport{{ $report->id }}">
                                                <i data-feather='edit' class="mr-50"></i>
                                                <span>{{ __('Edit') }}</span>
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter{{ $report->id }}" title="Delete">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>{{ __('Delete') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @push('all_modals')
                                <!-- Delete Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-lg modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Report') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __("Are You Sure To Delete This Report?") }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">{{ __('Close') }}</button>
                                                <form action="{{ route('ItemReport.destroy', $report->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- update modal --}}
                                <div class="modal fade" id="editReport{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-lg modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __("Update Report") }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="POST" action="{{ route('ItemReport.update', $report->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="problem">{{ __('Problem') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="problem" name="problem" value="{{ $report->problem }}">
                                                    </div>
                                                    @error('problem')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endpush
                            @endforeach
                            @push('all_modals')
                                {{-- create modal --}}
                                <div class="modal fade" id="createReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-lg modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Create Report') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('ItemReport.store') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="problem">{{ __('Problem') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="problem" name="problem" value="{{ old('problem') }}">
                                                    </div>
                                                    @error('problem')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endpush
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
