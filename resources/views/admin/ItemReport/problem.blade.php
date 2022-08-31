@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
     {{ __("Report Item") }}
@endsection

{{-- Active Menu --}}
@section('itemProblems')
    active
@endsection



{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item">{{ __('Report') }}</li>
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
                        <h4 class="card-title">{{ __('List') }}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('User Name') }}</th>
                                <th>{{ __("Item") }} </th>
                                <th>{{ __("Report") }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($problems as $report)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ route('user',$report->getUser->id ?? '') }}">{{ $report->getUser->name ?? 'N/A'}}</a></td>
                                <td><a href="{{ route('item_details', $report->getItem->slug ?? '') }}">{{ $report->getItem->name ?? 'N/A'}}</a></td>
                                <td>
                                    {{ $report->getProblem->problem ?? 'N/A'}}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu">
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
                                                {{ __('Are You Sure To Delete This Report?') }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
                                                <form action="{{ route('ItemProblem.destroy', $report->id ?? '') }}" method="POST">
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
                    <a class="btn mt-1 btn-success" href="{{ route('ItemReport.index') }}">{{ __('Return Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
