@extends('layouts.dashboard')

{{-- title --}}
@section('title')
{{ config('app.name') }} | {{ __('Single Category') }}
@endsection

{{-- content --}}
@section('content')
<section class="banner-main-section all-pages-input" id="main">
    <div class="row">
        <div class="col-12">
            <h2 class="dash-ad-title m-0 mb-3">{{ __('Admin Dashboard') }} | <span class="dash-span-title">{{ __('Category') }}</span></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> {{ __('Show') }} </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table  class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        {{ __('Name') }}
                                                    </th>
                                                    <td>
                                                        {{ $nft_category->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __('Unique Id') }}
                                                    </th>
                                                    <td>
                                                        {{ $nft_category->unique_id }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <th>
                                                        {{ __("Icon") }}
                                                    </th>
                                                    <td>
                                                        {!! $nft_category->icon !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __('Description') }}
                                                    </th>
                                                    <td>
                                                        {!! $nft_category->description !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                         {{ __('Image') }}
                                                    </th>
                                                    <td>
                                                        <img width="500" src="{{ asset('uploads/nftcategory') }}/{{ $nft_category->image }}" alt="Main Image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php
                                                        $report = App\Models\ReportCategory::where('category_id',$nft_category->id)->get();
                                                    @endphp
                                                    <th>{{ __("Report") }} ({{ $report->count() }})</th>
                                                    <td>
                                                        @foreach ($report as $rep)
                                                            {{ $rep->getUser->name }}{{ !$loop->last ? ',':'' }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @php
                                                        $liked = App\Models\LikeCollection::where('collection_id',$nft_category->id)->get();
                                                    @endphp
                                                    <th>Likes ({{ $liked->count() }})</th>
                                                    <td>
                                                        @foreach ($liked as $like)
                                                            {{ $like->getUser->name }}{{ !$loop->last ? ',':'' }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a class="btn mt-1 btn-success" href="{{ route('nft_category.index') }}">{{ __('Return Back') }}</a>
                                        <a class="btn edit-btn mt-1 btn-primary" href="{{ route('nft_category.edit', $nft_category->id) }}">{{ __("Edit") }}</a>
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
