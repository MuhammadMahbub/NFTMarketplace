@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('Sell NFT') }}
    @endsection

    {{-- Active Menu --}}
    @section('nftModuleIndex')
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
                    {{ __('NFT Modules') }}
                </li>
            </ol>
        </div>
    @endsection

    {{-- Main Content --}}
    @section('content')
    <div class="row" id="basic-table">
        <div class="col-md-12 col-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-6">
                        <h4 class="card-title">{{ __('NFT Modules') }}</h4>
                    </div>

                    <div class="col-md-6 text-right">
                        <a class="btn btn-info create-btn" href="{{ route('nftModule.create') }}">{{ __('Create NFT Module') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('Sl') }}</th>
                                    <th>{{ __('Icon') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nftModule as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{!! $item->icon !!}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('nftModule.edit', $item->id) }}">
                                                    <i data-feather="edit" class="mr-50"></i>
                                                    <span>{{ __("Edit") }}</span>
                                                </a>

                                                <a class="dropdown-item" data-toggle="modal" data-target="#nftModuleDelete{{ $item->id }}" title="Delete">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>{{ __('Delete') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="nftModuleDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __('Are You Sure Delete Data?') }}
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                        <form action="{{ route('nftModule.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
