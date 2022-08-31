@extends('layouts.dashboard')

{{-- title --}}
@section('title')
 {{ __('Single Blog') }}
@endsection

{{-- content --}}
@section('content')
<section class="banner-main-section all-pages-input" id="main">
    <div class="row">
        <div class="col-12">
            <h2 class="dash-ad-title m-0 mb-3">{{ __('Admin Dashboard') }} | <span class="dash-span-title">{{ __('Show Blog') }}</span></h2>
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
                                                        {{ __('Title') }}
                                                    </th>
                                                    <td>
                                                        {{ $blog->title }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __("Sub Title") }}
                                                    </th>
                                                    <td>
                                                        {{ $blog->subtitle }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __('Main Image') }}
                                                    </th>
                                                    <td>
                                                        <img style="height:100px; width: 100px" src="{{ asset('uploads/images/blog') }}/{{ $blog->main_image }}" alt="Blog Main Image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __("Image 1") }}
                                                    </th>
                                                    <td>
                                                        <img style="height:100px; width: 100px" src="{{ asset('uploads/images/blog') }}/{{ $blog->image1 }}" alt="Blog Image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __('Image 2') }}
                                                    </th>
                                                    <td>
                                                        <img style="height:100px; width: 100px" src="{{ asset('uploads/images/blog') }}/{{ $blog->image2 }}" alt="Blog Image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __('Quote') }}
                                                    </th>
                                                    <td>
                                                        {{ $blog->quote }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __('Quote Name') }}
                                                    </th>
                                                    <td>
                                                        {{ $blog->quote_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __('Author Comment') }}
                                                    </th>
                                                    <td>
                                                        {{ $blog->author_comment }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        {{ __('Description') }}
                                                    </th>
                                                    <td>
                                                        {!! $blog->description !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a class="btn mt-1 btn-success" href="{{ route('blogs.index') }}">{{ __('Return Back') }}</a>
                                        <a class="btn edit-btn mt-1 btn-primary" href="{{ route('blogs.edit', $blog->id) }}">{{ __('Edit') }}</a>
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
