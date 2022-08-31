@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __('Notifications') }}
@endsection

{{-- Active Menu --}}
@section('notifications')
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
                {{ __('Notifications') }}
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
                <h4 class="card-title">{{ __('All Notifications') }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Notifications') }}</th>
                                <th>{{ __('Status') }}</th>
                                {{-- <th><input type="checkbox" class="checkAll"></th> --}}
                                <th>
                                    <div class="custom-control custom-checkbox" cursorshover="true">
                                        <input type="checkbox" name="check_all" value="1" data-status="all" id="customCheck" class="check_all custom-control-input" style="cursor:pointer">
                                        <label class="custom-control-label" for="customCheck" cursorshover="true"></label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="render_notification">
                                @foreach ($all_notifications as $not)
                                @php
                                    $item_slug = App\Models\Item::find($not->type_id);
                                    $user_info = App\Models\User::find($not->user_id);
                                @endphp
                                    @if ($not->status == 'unseen')
                                        <tr class="bg__shade">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td class="notification_msg_seen" data-id="{{ $not->id }}">
                                                <a href="{{ route('user', $user_info->id) }}">
                                                    <img style="height:40px;width:40px;border-radius:50%" src="{{ asset('uploads/images/users') }}/{{ $user_info->profile_photo_path }}" alt="Admin picture">
                                                </a>
                                            </td>
                                            <td class="notification_msg_seen" data-id="{{ $not->id }}"><a href="{{ route('user',$user_info->id) }}">{{ $user_info->name }}</a></td>
                                            <td class="notification_msg_seen" data-id="{{ $not->id }}"><a href="{{ route('item_details', $item_slug->slug ?? '') }}">{{ $not->message }}</a></td>
                                            <td>{{ ucfirst($not->status) }}</td>

                                            <td>
                                                <div class="custom-control custom-checkbox" cursorshover="true">
                                                    <input type="checkbox" name="id[]" value="{{ $not->id }}" id="customCheck{{ $not->id }}" class="custom-control-input notification_check" data-id="{{ $not->id }}" style="cursor:pointer">
                                                    <label class="custom-control-label" for="customCheck{{ $not->id }}" cursorshover="true"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="seenData">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <a href="{{ route('user', $user_info->id) }}">
                                                    <img style="height:40px;width:40px;border-radius:50%" src="{{ asset('uploads/images/users') }}/{{ $user_info->profile_photo_path }}" alt="Admin picture">
                                                </a>
                                            </td>
                                            <td><a href="{{ route('user',$user_info->id) }}">{{ $user_info->name }}</a></td>
                                            <td><a href="{{ route('item_details', $item_slug->slug ?? '') }}">{{ $not->message }}</a></td>
                                            <td>{{ ucfirst($not->status) }}</td>

                                            <td>
                                                <div class="custom-control custom-checkbox" cursorshover="true">
                                                    <input type="checkbox" name="id[]" value="{{ $not->id }}" id="customCheck{{ $not->id }}" class="custom-control-input notification_check" data-id="{{ $not->id }}" style="cursor:pointer">
                                                    <label class="custom-control-label" for="customCheck{{ $not->id }}" cursorshover="true"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>

                    </table>
                    <div class="text-right bulk_notification_delete d-none">
                        {{-- <a style="" class="checkAllDelete btn btn-info">{{ __('Delete Checked') }}</a> --}}
                        <button class="btn btn-danger d-inline btn btn-danger" data-toggle="modal" data-target="#delete_selected_notification">{{ __('Delete') }}</button>
                    </div>
                </div>
            </div>
            @push('all_modals')
                {{-- Delete selected Notifications --}}
                <div class="modal fade" id="delete_selected_notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Notifications') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('delete.bulk.notification') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="notification_id" class="notification_id_checked">
                                    <p class="text-danger text center">{{ __('Are you sure delete?') }}</p>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endpush
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        // Method for notification seen
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
                        console.log(response);
                        // location.reload()
                    },
                });
            });
        });

        // Mehtod for delete single or all notification
        // $(document).ready(function(){
        //     $('.checkAll').on('click',function() {
        //         $('input[name="checkOne[]"]').prop('checked', $(this).is(":checked"));
        //         let selected = [];
        //         $("input:checkbox[name='checkOne[]']:checked").each(function() {
        //             selected.push($(this).val());
        //             if($(this).is(':checked')){
        //                     $('.checkAll').prop('checked', true)
        //                 } else{
        //                     $('.checkAll').prop('checked', false)
        //                     return false;
        //                 }
        //         });
        //     });

        //     $('.checkAllDelete').on('click', function(){
        //         let selected = [];
        //         $("input:checkbox[name='checkOne[]']:checked").each(function() {
        //             selected.push($(this).val());
        //         });

        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });

        //         $.ajax({
        //             url: "{{ route('multi_notify_delete') }}",
        //             type: "POST",
        //             data: {
        //                 selected: selected,
        //             },
        //             success: function (response){
        //                 location.reload();
        //             },
        //         });
        //     });

        // });

    </script>

    <script>
        $(document).ready(function(){
            var notification_array = [];
            $('.check_all').on('click', function(){
                notification_array = [];
                if(this.checked){

                    $('.bulk_notification_delete').removeClass('d-none');

                    $('.notification_check').each(function(){
                        $(this).prop('checked', true);
                        notification_array.push($(this).attr('data-id'));
                        $('.notification_id_checked').val(notification_array);
                    });

                }else{

                    $('.bulk_notification_delete').addClass('d-none');

                    $('.notification_check').each(function(){

                        $(this).prop('checked', false);
                        $('.notification_id_checked').val(notification_array);

                    });
                }

                if(notification_array.length == 0)
                {
                    $('.bulk_notification_delete').addClass('d-none');

                }else{
                    $('.bulk_notification_delete').removeClass('d-none');
                }

                // Ajax Setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('filter.by.all.notification') }}",
                    data: {
                        notification_array : notification_array,
                    },
                    success: function (response) {
                        console.log(response);
                        // if ((response.count)*1 <  1) {
                        //     $('#render_notification').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                        // } else {
                        //     $('#render_notification').html(response.data);
                        // }
                        // toastr.success("Showing Filtered Result");
                    },
                    error: function(response) {

                    }
                });

                console.log(notification_array);

            });


            $('body').on("click", ".notification_check", function(){

                var data_id = $(this).attr('data-id');

                $('.notification_check').each(function(){
                    if($(this).is(':checked')){
                        $('.check_all').prop('checked', true)
                    } else{
                        $('.check_all').prop('checked', false)
                        return false;
                    }
                });

                if(notification_array.indexOf(data_id)  != -1){
                    notification_array = notification_array.filter(item => item !== data_id)
                    $('.notification_id_checked').val(notification_array);
                }
                else{
                    notification_array.push(data_id);
                    $('.notification_id_checked').val(notification_array);
                }


                if(notification_array.length == 0)
                {
                    $('.bulk_notification_delete').addClass('d-none');
                }else{
                    $('.bulk_notification_delete').removeClass('d-none');
                }


                // Ajax Setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('filter.by.single.notification') }}",
                    data: {
                        notification_array : notification_array,
                    },
                    success: function (response) {
                        console.log(response);
                        // if ((response.count)*1 <  1) {
                        //     $('#render_notification').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                        // } else {
                        //     $('#render_notification').html(response.data);
                        // }
                        // toastr.success("Showing Filtered Result");
                    },
                    error: function(response) {

                    }
                });

                console.log(notification_array);

            });

        });

    </script>


@endsection

