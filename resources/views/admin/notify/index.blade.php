@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | Notifications
@endsection

{{-- Active Menu --}}
@section('notifications')
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
                Notifications
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
                <h4 class="card-title">All Notifications</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Check</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Notifications</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <form action="{{ route('multi_notify_delete') }}" method="POST">
                            <tbody>
                                @csrf

                                @foreach ($all_notifications as $not)
                                @php
                                    $item_slug = App\Models\Item::find($not->type_id);
                                    $user_info = App\Models\User::find($not->user_id);
                                @endphp

                                    @if ($not->status == 'unseen')
                                        <tr class="bg__shade notification_msg_seen" data-id="{{ $not->id }}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><input type="checkbox" name="check[]" class="form-control"
                                                value="{{ $not->id }}"></td>
                                            <td>
                                                <a href="{{ route('user',$user_info->id) }}">
                                                    <img style="height:40px;width:40px;border-radius:50%" src="{{ asset('uploads/images/users') }}/{{ $user_info->profile_photo_path }}" alt="Admin picture">
                                                </a>
                                            </td>
                                            <td><a href="{{ route('user',$user_info->id) }}">{{ $user_info->name }}</a></td>
                                            <td><a href="{{ route('item_details', $item_slug->slug) }}">{{ $not->message }}</a></td>
                                            <td>{{ ucfirst($not->status) }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter{{ $not->id }}" title="Delete">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><input type="checkbox" name="check[]" class="form-control"
                                                value="{{ $not->id }}"></td>
                                            <td>
                                                <a href="{{ route('user',$user_info->id) }}">
                                                    <img style="height:40px;width:40px;border-radius:50%" src="{{ asset('uploads/images/users') }}/{{ $user_info->profile_photo_path }}" alt="Admin picture">
                                                </a>
                                            </td>
                                            <td><a href="{{ route('user',$user_info->id) }}">{{ $user_info->name }}</a></td>
                                            <td><a href="{{ route('item_details', $item_slug->slug) }}">{{ $not->message }}</a></td>
                                            <td>{{ ucfirst($not->status) }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter{{ $not->id }}" title="Delete">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                @push('all_modals')
                                <!-- Delete Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{ $not->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Report</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are You Sure To Delete This Notification?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('notify_destroy', $not->id) }}" method="POST">
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
                            {{-- <td>
                                <button class="btn btn-info">Check All</button>
                            </td> --}}
                            <td>
                                <button type="submit" class="btn btn-info">Delete Checked</button>
                            </td>
                        </form>
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
        $(".notification_msg_seen").on("click", function(){
            let notify_id = $(this).attr('data-id')
        //    alert(notify_id)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('notification_seen') }}",
                type: "POST",
                data: {
                    notify_id: notify_id,
                },
                success: function (response){
                    // location.reload()
                },
            });
        });
    });
</script>
@endsection

