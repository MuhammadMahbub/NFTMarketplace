@extends('layouts.dashboard')

{{-- title --}}
@section('title')
{{ config('app.name') }} | Single Item
@endsection

{{-- content --}}
@section('content')
<section class="banner-main-section all-pages-input" id="main">
    <div class="row">
        <div class="col-12">
            <h2 class="dash-ad-title m-0 mb-3">Admin Dashboard | <span class="dash-span-title">Item</span></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Show </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table  class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <td>
                                                        {{ Str::ucfirst($item->name) ?? "N/A"}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <td>
                                                        {{ Str::ucfirst($item->status) ?? ""}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Slug
                                                    </th>
                                                    <td>
                                                        {{ $item->slug ?? "N/A" }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       Category
                                                    </th>
                                                    <td>
                                                        {{ Str::ucfirst($item->get_category->name) ?? "N/A" }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Main Image
                                                    </th>
                                                    <td>
                                                        <img width="200" src="{{ asset('uploads/items') }}/{{ $item->image }}" alt="Main Image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       Description
                                                    </th>
                                                    <td>
                                                        {!! $item->description ?? "" !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       Price
                                                    </th>
                                                    <td>
                                                        {{ $item->price ?? "" }} {{ $item->blockchain }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       Quantity
                                                    </th>
                                                    <td>
                                                        {{ $item->quantity ?? "" }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       Creator
                                                    </th>
                                                    <td>
                                                        {{ Str::ucfirst($item->get_creator->name) ?? "N/A"}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Creator Photo
                                                    </th>
                                                    <td>
                                                        <img width="100" src="{{ asset('uploads/images/users') }}/{{ $item->get_creator->profile_photo_path ?? 'default.jpg'}}" alt="Creator Image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       Creators Loyalty
                                                    </th>
                                                    <td>
                                                        {{ $item->creator_loyalty ?? 'n/s'}} %
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       Owner
                                                    </th>
                                                    <td>
                                                        {{ $item->owner_name ?? 'N/A'}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Owner Photo
                                                    </th>
                                                    <td>
                                                        <img width="100" src="{{ asset('uploads/images/users') }}/{{ $item->get_owner->profile_photo_path ?? 'default.jpg' }}" alt="Creator Image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       Expire Date
                                                    </th>
                                                    <td>
                                                        {{ $item->expire_date ?? ''}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <th>
                                                       Buy Button
                                                    </th>
                                                    <td>
                                                        {{ $item->buy_button_text ?? ''}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                       View Button
                                                    </th>
                                                    <td>
                                                        {{ $item->view_button_text ?? '' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php
                                                        $bids = App\Models\PlaceBid::where('item_id',$item->id)->get();
                                                    @endphp
                                                    <th>
                                                       Bids ({{ $bids->count() }})
                                                    </th>
                                                    <td>
                                                        @foreach ($bids as $bid)
                                                            {{ $bid->getUser->name }}:-{{ $bid->bid_amount }}{{ $item->blockchain }}{{ !$loop->last ? ',':'' }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php
                                                        $likes = App\Models\Like::where('item_id',$item->id)->get();
                                                    @endphp
                                                    <th>
                                                       Likes ({{ $likes->count() }})
                                                    </th>
                                                    <td>
                                                        @foreach ($likes as $like)
                                                            {{ $like->get_liker->name }}{{ !$loop->last ? ',':'' }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php
                                                        $problem = App\Models\ItemProblem::where('item_id',$item->id)->get();
                                                    @endphp
                                                    <th>
                                                       Report ({{ $problem->count() }})
                                                    </th>
                                                    <td>
                                                        @foreach ($problem as $pro)
                                                            {{ $pro->getUser->name }}{{ !$loop->last ? ',':'' }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a class="btn mt-1 btn-info" href="{{ route('item.index') }}">Return Back</a>
                                        @if ($item->creator_id != 1)
                                        <a class="btn mt-1 btn-success" href="{{ route('item_edit', $item->id ?? '') }}">
                                            <span>Edit</span>
                                        </a>
                                        @else
                                        <a class="btn mt-1 btn-success" href="{{ route('item.edit', $item->id ?? '') }}">
                                            <span>Edit</span>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
