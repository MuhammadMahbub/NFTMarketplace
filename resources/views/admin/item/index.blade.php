@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
{{ config('app.name') }} | Item
@endsection

{{-- Active Menu --}}
@section('item')
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
            <li class="breadcrumb-item">Item</li>
            <li class="breadcrumb-item active">List</li>
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
                        <h4 class="card-title">Items</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <button style="margin: 21px 21px 0 0;" class="btn btn-gradient-primary float-right"><a style="color: #f1f1f1" href="{{ route('item.create') }}">Create Item</a></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Creator</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('item.show', $item->id ?? '') }}">{{ $item->name ?? "N/A" }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('collection', $item->category_id ?? '') }}">{{ $item->get_category->name ?? "N/A" }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('user', $item->creator_id ?? '') }}">{{ $item->get_creator->name ?? "N/A" }}</a>
                                </td>
                                <td>
                                    <img width="150px" src="{{ asset('uploads/items') }}/{{ $item->image ?? 'default.jpg'}}" alt=""></td>
                                <td>{{ $item->price }} {{ $item->blockchain }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    {{Str::ucfirst( $item->status) }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('item.show', $item->id ?? '') }}">
                                                <i data-feather='eye' class="mr-50"></i>
                                                <span>Show</span>
                                            </a>
                                            {{-- @if ($item->get_creator->role_id != 1)
                                            <a class="dropdown-item" href="{{ route('item_edit', $item->id ?? '') }}">
                                                <i data-feather='edit' class="mr-50"></i>
                                                <span>Edit item</span>
                                            </a>
                                            @else --}}
                                            <a class="dropdown-item" href="{{ route('item.edit', $item->id ?? '') }}">
                                                <i data-feather='edit' class="mr-50"></i>
                                                <span>Edit Item</span>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('status_change', $item->id ?? '') }}">
                                                <i data-feather='edit-2' class="mr-50"></i>
                                                <span>Set Status</span>
                                            </a>
                                            {{-- @endif --}}
                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{ $item->id }}" title="Delete">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @push('all_modals')
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Item Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure To Delete This Item?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                <form action="{{ route('item.destroy', $item->id ?? '') }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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

@section('js')
<script>
    $(document).ready(function(){
        // $('.status_select').click(function(){
        //     alert('hi')
        // })
    })
</script>
@endsection
