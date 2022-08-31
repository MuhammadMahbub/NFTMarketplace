@extends('layouts.dashboard')

    {{-- Title --}}
    @section('title')
        {{ config('app.name') }} | {{ __('FAQ') }}
    @endsection

    {{-- Active Menu --}}
    @section('faq')
        active
    @endsection

        {{-- Breadcrumb --}}
    @section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __('FAQ') }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __('Update FAQ') }}
            </li>
        </ol>
    </div>
    @endsection

    @section('content')
<section class="banner-main-section" id="main">
    <div class="row">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">{{ __('Update FAQ') }}</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('faq.update', $faq->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="question">{{ __("Question") }} <span class="text-danger">*</span></label>
                    <textarea name="question" id="question" class="form-control" cols="30" rows="3">{{ $faq->question }}</textarea>
                </div>
                <div class="form-group">
                    <label for="answer">{{ __('Answer') }} <span class="text-danger">*</span></label>
                    <textarea name="answer" id="answer" class="form-control" cols="30" rows="3">{{ $faq->answer }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
