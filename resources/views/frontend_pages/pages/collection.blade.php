@extends('layouts.app')

@push('css')
<style>
    .dropdown .dropdown-item.active{
            /* color: rgb(19 23 64/var(--tw-text-opacity)); */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%238358ff' class='bi bi-check-lg' viewBox='0 0 16 16'%3E%3Cpath d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z'/%3E%3C/svg%3E");
            background-repeat: no-repeat no-repeat;
            background-position: 90% center;
            background-size: 18px;
        }
      html:not(.dark) .dropdown .dropdown-item.active{
          color: rgb(19 23 64/var(--tw-text-opacity));
      }
      .hover-color{
        background-color: rgba(131,88,255,var(--tw-bg-opacity));
        color: white;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Banner -->
    <div class="relative">
      <img src="{{ asset('uploads/nftcategory') }}/{{ $nftcategory->image ?? "collection_banner.jpg" }}" alt="banner" class="h-[18.75rem] object-cover w-full" />
    </div>
    <!-- end banner -->

    <!-- Profile -->
    <section class="dark:bg-jacarta-800 bg-light-base relative pb-12 pt-12">
      <!-- Avatar -->
      {{-- <div class="absolute left-1/2 top-0 z-10 flex -translate-x-1/2 -translate-y-1/2 items-center justify-center">
        <figure class="relative">
          <img style="width: 140px; height: 140px"
            src="{{ asset('uploads/images/users') }}/{{ $nftcategory->get_user->profile_photo_path ?? "default.jpg" }}"
            alt="collection avatar"
            class="dark:border-jacarta-600 rounded-xl border-[5px] border-white"
          />
          <div
            class="dark:border-jacarta-600 bg-green absolute -right-3 bottom-0 flex h-6 w-6 items-center justify-center rounded-full border-2 border-white"
            data-tippy-content="Verified Collection"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="h-[.875rem] w-[.875rem] fill-white"
            >
              <path fill="none" d="M0 0h24v24H0z"></path>
              <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
            </svg>
          </div>
        </figure>
      </div> --}}

      <div class="container">
        <div class="text-center">
            <div id="collectionName">
                <h2 id="collectionDiv" class="font-display text-jacarta-700 mb-2 text-4xl font-medium dark:text-white">{{ $nftcategory->name ?? "N/A"}}</h2>
            </div>
          {{-- <div
            class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 mb-8 inline-flex items-center justify-center rounded-full border bg-white py-1.5 px-4">
            <span data-tippy-content="ETH"></span>
            <div class="">
                <span class="text-jacarta-400 text-sm font-bold">Created by: </span>
                <a href="{{ route('user', $nftcategory->get_user->id) }}" class="text-accent text-sm font-bold">{{ $nftcategory->get_user->name }}</a>
            </div>
          </div> --}}

          <p class="dark:text-jacarta-300 mx-auto mb-2 max-w-xl text-lg">
            {!! $nftcategory->description ?? '' !!}
          </p>
          <div class="mb-8">
            <span class="text-jacarta-400 text-sm font-bold">Created: </span>
            <a class="text-accent text-sm font-bold">{{ $nftcategory->created_at->diffForHumans() ?? '' }}</a>
          </div>
          @php
            $like_exist = App\Models\LikeCollection::where('collection_id', $nftcategory->id)->where('user_id', Auth::id())->first();
            $like_count = App\Models\LikeCollection::where('collection_id', $nftcategory->id)->count();
          @endphp
          <div class="mt-6 flex items-center justify-center space-x-2.5">
            <div class="dark:border-jacarta-600 dark:hover:bg-jacarta-600 border-jacarta-100 hover:bg-jacarta-100 dark:bg-jacarta-700 rounded-xl border bg-white" >
              <div class="p-2">
              @auth
              <a style="cursor: pointer" class="like_col_btn" cat_id="{{ $nftcategory->id }}">
                  <span class="like_col_icon">
                      @if($like_exist)
                          <i class="fa fa-heart"></i>
                      @else
                          <i class="fa-regular fa-heart"></i>
                      @endif
                  </span>
              </a>
              <span class="likeColCount" class="dark:text-jacarta-200 text-sm">{{ $like_count }}</span>
              @else
                  <a style="cursor: pointer" data-bs-toggle="modal"
                  data-bs-target="#loginModal{{ $nftcategory->id }}">
                      <span>
                          <i class="fa-regular fa-heart"></i>
                      </span>
                  </a>
                  <span class="dark:text-jacarta-200 text-sm">{{ $like_count }}</span>
              @endauth
              </div>
            </div>
            {{-- <div
              class="dark:border-jacarta-600 dark:hover:bg-jacarta-600 border-jacarta-100 dropdown hover:bg-jacarta-100 dark:bg-jacarta-700 rounded-xl border bg-white">
              <a
                href="#"
                class="dropdown-toggle inline-flex h-10 w-10 items-center justify-center text-sm"
                role="button"
                id="collectionShare"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                data-tippy-content="Share"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  class="dark:fill-jacarta-200 fill-jacarta-500 h-4 w-4"
                >
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M13.576 17.271l-5.11-2.787a3.5 3.5 0 1 1 0-4.968l5.11-2.787a3.5 3.5 0 1 1 .958 1.755l-5.11 2.787a3.514 3.514 0 0 1 0 1.458l5.11 2.787a3.5 3.5 0 1 1-.958 1.755z"
                  />
                </svg>
              </a>
              <div
                class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden max-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                aria-labelledby="collectionShare" >
                <a
                  href="#"
                  class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                >
                  <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fab"
                    data-icon="facebook"
                    class="group-hover:fill-accent fill-jacarta-300 mr-2 h-4 w-4 dark:group-hover:fill-white"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                  >
                    <path
                      d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
                    ></path>
                  </svg>
                  <span class="mt-1 inline-block">Facebook</span>
                </a>
                <a
                  href="#"
                  class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                >
                  <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fab"
                    data-icon="twitter"
                    class="group-hover:fill-accent fill-jacarta-300 mr-2 h-4 w-4 dark:group-hover:fill-white"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                  >
                    <path
                      d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                    ></path>
                  </svg>
                  <span class="mt-1 inline-block">Twitter</span>
                </a>
                <a
                  href="#"
                  class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                >
                  <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fab"
                    data-icon="discord"
                    class="group-hover:fill-accent fill-jacarta-300 mr-2 h-4 w-4 dark:group-hover:fill-white"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 640 512"
                  >
                    <path
                      d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z"
                    ></path>
                  </svg>
                  <span class="mt-1 inline-block">Discord</span>
                </a>
                <a
                  href="#"
                  class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="group-hover:fill-accent fill-jacarta-300 mr-2 h-4 w-4 dark:group-hover:fill-white"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm9.06 8.683L5.648 6.238 4.353 7.762l7.72 6.555 7.581-6.56-1.308-1.513-6.285 5.439z"
                    />
                  </svg>
                  <span class="mt-1 inline-block">Email</span>
                </a>
                <a
                  href="#"
                  class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="group-hover:fill-accent fill-jacarta-300 mr-2 h-4 w-4 dark:group-hover:fill-white"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z"
                    />
                  </svg>
                  <span class="mt-1 inline-block">Copy</span>
                </a>
              </div>
            </div> --}}
            <div class="dark:border-jacarta-600 dark:hover:bg-jacarta-600 border-jacarta-100 dropdown hover:bg-jacarta-100 dark:bg-jacarta-700 rounded-xl border bg-white" >
              <a href="#"
                class="dropdown-toggle inline-flex h-10 w-10 items-center justify-center text-sm"
                role="button"
                id="collectionActions"
                data-bs-toggle="dropdown"
                aria-expanded="false" >
                <svg width="16"
                  height="4"
                  viewBox="0 0 16 4"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="dark:fill-jacarta-200 fill-jacarta-500" >
                  <circle cx="2" cy="2" r="2" />
                  <circle cx="8" cy="2" r="2" />
                  <circle cx="14" cy="2" r="2" />
                </svg>
              </a>
              <div class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                aria-labelledby="collectionActions" >
                {{-- <button
                  class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                  New bid
                </button>
                <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" /> --}}
                <button class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                  Refresh Metadata
                </button>
                <button class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white copyURL" >
                  Share
                </button>
                @if (Auth::check())
                @if (Auth::user()->role_id != 1)
                    <button
                    data-bs-toggle="modal"
                    data-bs-target="#ReportModal"
                    class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                    Report
                    </button>
                @endif
                @else
                    <button
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal{{ $nftcategory->id }}"
                    class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                    Report
                    </button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      @push('modals')
      <div class="modal fade" id="ReportModal" tabindex="-1" aria-labelledby="walletModalLabel" aria-hidden="true">
          <div class="modal-dialog max-w-2xl">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="walletModalLabel">Report this collection</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  class="fill-jacarta-700 h-6 w-6 dark:fill-white" >
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                      d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                  </svg>
              </button>
              </div>
              <div class="modal-body p-6 text-center">
                  <form>
                      <input type="hidden" class="report_by" name="report_by" value="{{ Auth::id() }}">
                      <input type="hidden" class="category_id" name="category_id" value="{{ $nftcategory->id }}">
                      <div class="dropdown my-1 cursor-pointer">
                          <select class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 dark:text-jacarta-300 flex items-center justify-between rounded-lg border bg-white py-3 px-3 w-full report_id"
                              name="problem" >
                              <option disabled selected>Select Problem</option>
                              @foreach (reports() as $report)
                                  <option value="{{ $report->id }}">{{ $report->problem }}</option>
                              @endforeach
                          </select>
                          @error('problem')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                          <button type="button"
                              style="margin-top: 20px"
                              class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all submitReport">
                              {{ __('Submit') }}
                          </button>
                      </div>
                  </form>
              </div>
              </div>
          </div>
      </div>
    @endpush
    </section>
    <!-- end profile -->

    <!-- Collection -->
    <section class="relative py-24 pt-20">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <div class="container">
        <!-- Tabs Nav -->
        <ul class="nav nav-tabs scrollbar-custom dark:border-jacarta-600 border-jacarta-100 mb-12 flex items-center justify-start overflow-x-auto overflow-y-hidden border-b pb-px md:justify-center"
          role="tablist" >
          <li class="nav-item" role="presentation">
            <button class="nav-link active hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="on-sale-tab"
              data-bs-toggle="tab"
              data-bs-target="#on-sale"
              type="button"
              role="tab"
              aria-controls="on-sale"
              aria-selected="true" >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="mr-1 h-5 w-5 fill-current" >
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                  d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 2v14h16V5H4zm4.5 9H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z" />
              </svg>
              <span class="font-display text-base font-medium">On Sale</span>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="owned-tab"
              data-bs-toggle="tab"
              data-bs-target="#owned"
              type="button"
              role="tab"
              aria-controls="owned"
              aria-selected="false" >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="mr-1 h-5 w-5 fill-current" >
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                  d="M12.414 5H21a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2zM4 5v14h16V7h-8.414l-2-2H4zm9 8h3l-4 4-4-4h3V9h2v4z" />
              </svg>
              <span class="font-display text-base font-medium">Owned</span>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="created-tab"
              data-bs-toggle="tab"
              data-bs-target="#created"
              type="button"
              role="tab"
              aria-controls="created"
              aria-selected="false" >
              <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="mr-1 h-5 w-5 fill-current" >
                <path fill="none" d="M0 0h24v24H0z" />
                <path d="M5 5v3h14V5H5zM4 3h16a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm2 9h6a1 1 0 0 1 1 1v3h1v6h-4v-6h1v-2H5a1 1 0 0 1-1-1v-2h2v1zm11.732 1.732l1.768-1.768 1.768 1.768a2.5 2.5 0 1 1-3.536 0z" />
              </svg>
              <span class="font-display text-base font-medium">Created (20)</span>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="collections-tab"
              data-bs-toggle="tab"
              data-bs-target="#collections"
              type="button"
              role="tab"
              aria-controls="collections"
              aria-selected="false" >
              <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="mr-1 h-5 w-5 fill-current" >
                <path fill="none" d="M0 0h24v24H0z" />
                <path d="M10.9 2.1l9.899 1.415 1.414 9.9-9.192 9.192a1 1 0 0 1-1.414 0l-9.9-9.9a1 1 0 0 1 0-1.414L10.9 2.1zm.707 2.122L3.828 12l8.486 8.485 7.778-7.778-1.06-7.425-7.425-1.06zm2.12 6.364a2 2 0 1 1 2.83-2.829 2 2 0 0 1-2.83 2.829z" />
              </svg>
              <span class="font-display text-base font-medium">Collections</span>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="activity-tab"
              data-bs-toggle="tab"
              data-bs-target="#activity"
              type="button"
              role="tab"
              aria-controls="activity"
              aria-selected="false" >
              <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="mr-1 h-5 w-5 fill-current" >
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                  d="M11.95 7.95l-1.414 1.414L8 6.828 8 20H6V6.828L3.465 9.364 2.05 7.95 7 3l4.95 4.95zm10 8.1L17 21l-4.95-4.95 1.414-1.414 2.537 2.536L16 4h2v13.172l2.536-2.536 1.414 1.414z" />
              </svg>
              <span class="font-display text-base font-medium">Activity</span>
            </button>
          </li>
        </ul>

        <div class="tab-content">
          <!-- On Sale Tab -->
          <div class="tab-pane fade show active" id="on-sale" role="tabpanel" aria-labelledby="on-sale-tab">
            <!-- Filters -->
            <div class="mb-8 flex flex-wrap items-center justify-between">
              <div class="flex flex-wrap items-center">

                <!-- Category -->
                {{-- <div class="my-1 mr-2.5">
                  <button
                    class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                    id="onSaleCategoriesFilter"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white">
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M14 10v4h-4v-4h4zm2 0h5v4h-5v-4zm-2 11h-4v-5h4v5zm2 0v-5h5v4a1 1 0 0 1-1 1h-4zM14 3v5h-4V3h4zm2 0h4a1 1 0 0 1 1 1v4h-5V3zm-8 7v4H3v-4h5zm0 11H4a1 1 0 0 1-1-1v-4h5v5zM8 3v5H3V4a1 1 0 0 1 1-1h4z"/>
                    </svg>
                    <span>Category</span>
                  </button>
                  <div
                    class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="onSaleCategoriesFilter"
                  >
                    <ul class="flex flex-col flex-wrap">
                      @foreach (nftCategories() as $cat)
                      <li>
                        <a
                            style="cursor:pointer"
                            cat_id="{{ $cat->id }}"
                            class="onSaleBtn dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          {{ $cat->name }}
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div> --}}

                <!-- Price Range -->
                <form action="{{ route('search_by_price') }}" method="POSt">
                    @csrf
                    <div class="my-1 mr-2.5">
                        <button class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                          id="onSalePriceRangeFilter"
                          data-bs-toggle="dropdown"
                          data-bs-auto-close="outside"
                          aria-expanded="false" >
                          <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white" >
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M17 16h2V4H9v2h8v10zm0 2v3c0 .552-.45 1-1.007 1H4.007A1.001 1.001 0 0 1 3 21l.003-14c0-.552.45-1 1.007-1H7V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-3zM5.003 8L5 20h10V8H5.003zM7 16h4.5a.5.5 0 1 0 0-1h-3a2.5 2.5 0 1 1 0-5H9V9h2v1h2v2H8.5a.5.5 0 1 0 0 1h3a2.5 2.5 0 1 1 0 5H11v1H9v-1H7v-2z" />
                          </svg>
                          <span>Price Range</span>
                        </button>

                        <div class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                          aria-labelledby="onSalePriceRangeFilter" id="price-range-div">
                          <!-- Blockchain -->
                          <div class="dropdown mb-4 cursor-pointer px-5 pt-2">
                            <div class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 flex items-center justify-between rounded-lg border py-3.5 px-3 text-sm dark:text-white"
                              role="button"
                              id="onSaleFilterPriceBlockchain"
                              data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <span class="font-display flex items-center">
                                <img src="{{ asset('frontend_assets') }}/img/chains/ETH.png" alt="eth" class="mr-2 h-5 w-5 rounded-full" loading="lazy" />
                                ETH
                              </span>
                              {{-- <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                width="24"
                                height="24"
                                class="fill-jacarta-500 h-4 w-4 dark:fill-white" >
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
                              </svg> --}}
                            </div>

                            {{-- <div
                              class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[252px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                              aria-labelledby="onSaleFilterPriceBlockchain" >
                              <button class="dropdown-item font-display text-jacarta-700 dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                                <span class="flex items-center">
                                  <img src="{{ asset('frontend_assets') }}/img/chains/ETH.png"
                                    alt="eth"
                                    class="mr-2 h-5 w-5 rounded-full"
                                    loading="lazy" />
                                  ETH
                                </span>
                              </button>
                              <button
                                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                                <span class="flex items-center">
                                  <img
                                    src="{{ asset('frontend_assets') }}/img/chains/FLOW.png"
                                    alt="flow"
                                    class="mr-2 h-5 w-5 rounded-full"
                                    loading="lazy"
                                  />
                                  FLOW
                                </span>
                              </button>

                              <button
                                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                                <span class="flex items-center">
                                  <img
                                    src="{{ asset('frontend_assets') }}/img/chains/FUSD.png"
                                    alt="fusd"
                                    class="mr-2 h-5 w-5 rounded-full"
                                    loading="lazy"
                                  />
                                  FUSD
                                </span>
                              </button>

                              <button
                                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                                <span class="flex items-center">
                                  <img
                                    src="{{ asset('frontend_assets') }}/img/chains/XTZ.png"
                                    alt="xtz"
                                    class="mr-2 h-5 w-5 rounded-full"
                                    loading="lazy"
                                  />
                                  XTZ
                                </span>
                              </button>

                              <button
                                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                                <span class="flex items-center">
                                  <img
                                    src="{{ asset('frontend_assets') }}/img/chains/DAI.png"
                                    alt="dai"
                                    class="mr-2 h-5 w-5 rounded-full"
                                    loading="lazy"
                                  />
                                  DAI
                                </span>
                              </button>

                              <button
                                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                                <span class="flex items-center">
                                  <img
                                    src="{{ asset('frontend_assets') }}/img/chains/RARI.png"
                                    alt="rari"
                                    class="mr-2 h-5 w-5 rounded-full"
                                    loading="lazy"
                                  />
                                  RARI
                                </span>
                              </button>
                            </div> --}}
                          </div>

                          <!-- From / To -->
                          <div class="flex items-center space-x-3 px-5 pb-2" id="range_value">
                            <input type="hidden" name="cat_id" id="cat_id" value="{{ $nftcategory->id }}">
                            <input type="number" name="min_amount" id="min_amount"
                              placeholder="From" class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full max-w-[7.5rem] rounded-lg border py-[0.6875rem] px-4 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white" value="{{ old('min_amount') }}" />
                            <input type="number" name="max_amount" id="max_amount" placeholder="To"
                              class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full max-w-[7.5rem] rounded-lg border py-[0.6875rem] px-4 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white" value="{{ old('max_amount') }}" />
                          </div>

                          <!-- Clear / Apply -->
                          <div class="dark:border-jacarta-600 border-jacarta-100 -ml-2 -mr-2 mt-4 flex items-center justify-center space-x-3 border-t px-7 pt-4" id="range_wise_item" >
                            {{-- <button
                              type="button"
                              class="text-accent shadow-white-volume hover:bg-accent-dark hover:shadow-accent-volume flex-1 rounded-full bg-white py-2 px-6 text-center text-sm font-semibold transition-all hover:text-white" >
                              Clear
                            </button> --}}
                            <a category_id="{{ $nftcategory->id }}"
                              style="cursor:pointer"
                              id="priceFilterBtn"
                              class="bg-accent shadow-accent-volume hover:bg-accent-dark flex-1 rounded-full py-2 px-6 text-center text-sm font-semibold text-white transition-all">
                              Apply
                            </a>
                          </div>
                        </div>
                    </div>
                </form>
              </div>

              <!-- Sort -->
              <div class="dropdown my-1 cursor-pointer">
                <div class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 inline-flex w-48 items-center justify-between rounded-lg border bg-white py-2 px-3 text-sm dark:text-white"
                  role="button"
                  id="onSaleSort"
                  data-bs-toggle="dropdown"
                  aria-expanded="false" >
                  <span class="font-display dropdown-toggle__text">Sort By</span>
                  <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="fill-jacarta-500 h-4 w-4 dark:fill-white">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                  </svg>
                </div>

                <div
                  class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                  aria-labelledby="onSaleSort" >
                  {{-- <span class="font-display text-jacarta-300 block px-5 py-2 text-sm font-semibold">Sort By</span> --}}
                  <button class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" id="RecentlyAddedCollection" category_id="{{ $nftcategory->id }}" >
                    Recently Added
                    {{-- <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-accent mb-[3px] h-4 w-4"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                    </svg> --}}
                  </button>
                  <button class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" id="LowToHighCollection" category_id="{{ $nftcategory->id }}" >
                    Price: Low to High
                  </button>

                  <button class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" id="HighToLowCollection" category_id="{{ $nftcategory->id }}" >
                    Price: High to Low
                  </button>

                  {{-- <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Auction ending soon
                  </button>
                  <span class="font-display text-jacarta-300 block px-5 py-2 text-sm font-semibold">Options</span>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    <span class="flex items-center justify-between">
                      <span>Verified Only</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        checked
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    <span class="flex items-center justify-between">
                      <span>NFSW Only</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white" >
                    <span class="flex items-center justify-between">
                      <span>Show Lazy Minted</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div> --}}
                </div>
              </div>
            </div>
            <!-- end filters -->

            <!-- Grid -->
            <div id="onSaleCategoryDiv" class="grid grid-cols-1 gap-[1.875rem] md:grid-cols-2 lg:grid-cols-4">

                @include('frontend_pages.resources.onSaleCategory')

            </div>
            <!-- end grid -->
            </div>
            <!-- end on sale tab -->

          <!-- Owned Tab -->
          <div class="tab-pane fade" id="owned" role="tabpanel" aria-labelledby="owned-tab">
            <!-- Filters -->
            <div class="mb-8 flex flex-wrap items-center justify-between">
              <div class="flex flex-wrap items-center">
                <!-- Collections -->
                <div class="my-1 mr-2.5">
                  <button
                    class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                    id="ownedCollectionsFilter"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="outside"
                    aria-expanded="false"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M7 5V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4zm2 8H4v6h16v-6h-5v3H9v-3zm11-6H4v4h5V9h6v2h5V7zm-9 4v3h2v-3h-2zM9 3v2h6V3H9z"
                      />
                    </svg>
                    <span>Collections</span>
                  </button>
                  <div
                    class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[280px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="ownedCollectionsFilter"
                  >
                    <!-- Search -->
                    <div class="p-4">
                      <form action="search" class="relative block">
                        <input
                          type="search"
                          class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full rounded-2xl border py-[0.6875rem] px-4 pl-10 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
                          placeholder="Search"
                        />
                        <span class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                          >
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                              d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"
                            ></path>
                          </svg>
                        </span>
                      </form>
                    </div>

                    <!-- Collections List -->
                    <ul class="scrollbar-custom flex max-h-48 flex-col overflow-y-auto">
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_1.png"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">CryptoKitties</span>
                          </span>
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="fill-accent mb-[3px] h-4 w-4"
                          >
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_2.jpg"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">KaijuKings</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_3.png"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">Kumo x World</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_4.jpg"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">Irene DAO</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_5.png"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">GenerativeDungeon</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_6.jpg"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">ENS Domains</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_7.png"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">Cozy Penguin</span>
                          </span>
                        </a>
                      </li>
                    </ul>

                    <!-- Clear / Apply -->
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 -ml-2 -mr-2 mt-4 flex items-center justify-center space-x-3 border-t px-7 pt-4"
                    >
                      <button
                        type="button"
                        class="text-accent shadow-white-volume hover:bg-accent-dark hover:shadow-accent-volume flex-1 rounded-full bg-white py-2 px-6 text-center text-sm font-semibold transition-all hover:text-white"
                      >
                        Clear
                      </button>
                      <button
                        type="button"
                        class="bg-accent shadow-accent-volume hover:bg-accent-dark flex-1 rounded-full py-2 px-6 text-center text-sm font-semibold text-white transition-all"
                      >
                        Apply
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Category -->
                <div class="my-1 mr-2.5">
                  <button
                    class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                    id="ownedCategoriesFilter"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M14 10v4h-4v-4h4zm2 0h5v4h-5v-4zm-2 11h-4v-5h4v5zm2 0v-5h5v4a1 1 0 0 1-1 1h-4zM14 3v5h-4V3h4zm2 0h4a1 1 0 0 1 1 1v4h-5V3zm-8 7v4H3v-4h5zm0 11H4a1 1 0 0 1-1-1v-4h5v5zM8 3v5H3V4a1 1 0 0 1 1-1h4z"
                      />
                    </svg>
                    <span>Category</span>
                  </button>
                  <div
                    class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="ownedCategoriesFilter"
                  >
                    <ul class="flex flex-col flex-wrap">
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="text-jacarta-700 dark:text-white">All</span>
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="fill-accent mb-[3px] h-4 w-4"
                          >
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Art
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Collectibles
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Domain
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Music
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Photography
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Virtual World
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <!-- Price Range -->
                <div class="my-1 mr-2.5">
                  <button
                    class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                    id="ownedPriceRangeFilter"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="outside"
                    aria-expanded="false"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M17 16h2V4H9v2h8v10zm0 2v3c0 .552-.45 1-1.007 1H4.007A1.001 1.001 0 0 1 3 21l.003-14c0-.552.45-1 1.007-1H7V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-3zM5.003 8L5 20h10V8H5.003zM7 16h4.5a.5.5 0 1 0 0-1h-3a2.5 2.5 0 1 1 0-5H9V9h2v1h2v2H8.5a.5.5 0 1 0 0 1h3a2.5 2.5 0 1 1 0 5H11v1H9v-1H7v-2z"
                      />
                    </svg>
                    <span>Price Range</span>
                  </button>

                  <div
                    class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="ownedPriceRangeFilter"
                  >
                    <!-- Blockchain -->
                    <div class="dropdown mb-4 cursor-pointer px-5 pt-2">
                      <div
                        class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 flex items-center justify-between rounded-lg border py-3.5 px-3 text-sm dark:text-white"
                        role="button"
                        id="ownedFilterPriceBlockchain"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <span class="font-display flex items-center">
                          <img src="{{ asset('frontend_assets') }}/img/chains/ETH.png" alt="eth" class="mr-2 h-5 w-5" loading="lazy" />
                          ETH
                        </span>
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                        >
                          <path fill="none" d="M0 0h24v24H0z"></path>
                          <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
                        </svg>
                      </div>

                      <div
                        class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[252px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="ownedFilterPriceBlockchain"
                      >
                        <button
                          class="dropdown-item font-display text-jacarta-700 dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/ETH.png"
                              alt="eth"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            ETH
                          </span>
                        </button>
                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/FLOW.png"
                              alt="flow"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            FLOW
                          </span>
                        </button>

                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/FUSD.png"
                              alt="fusd"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            FUSD
                          </span>
                        </button>

                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/XTZ.png"
                              alt="xtz"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            XTZ
                          </span>
                        </button>

                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/DAI.png"
                              alt="dai"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            DAI
                          </span>
                        </button>

                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/RARI.png"
                              alt="rari"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            RARI
                          </span>
                        </button>
                      </div>
                    </div>

                    <!-- From / To -->
                    <div class="flex items-center space-x-3 px-5 pb-2">
                      <input
                        type="number"
                        placeholder="From"
                        class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full max-w-[7.5rem] rounded-lg border py-[0.6875rem] px-4 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
                      />
                      <input
                        type="number"
                        placeholder="To"
                        class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full max-w-[7.5rem] rounded-lg border py-[0.6875rem] px-4 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
                      />
                    </div>

                    <!-- Clear / Apply -->
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 -ml-2 -mr-2 mt-4 flex items-center justify-center space-x-3 border-t px-7 pt-4"
                    >
                      <button
                        type="button"
                        class="text-accent shadow-white-volume hover:bg-accent-dark hover:shadow-accent-volume flex-1 rounded-full bg-white py-2 px-6 text-center text-sm font-semibold transition-all hover:text-white"
                      >
                        Clear
                      </button>
                      <button
                        type="button"
                        class="bg-accent shadow-accent-volume hover:bg-accent-dark flex-1 rounded-full py-2 px-6 text-center text-sm font-semibold text-white transition-all"
                      >
                        Apply
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Sort -->
              <div class="dropdown my-1 cursor-pointer">
                <div
                  class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 inline-flex w-48 items-center justify-between rounded-lg border bg-white py-2 px-3 text-sm dark:text-white"
                  role="button"
                  id="ownedSort"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="font-display">Recently Added</span>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                  </svg>
                </div>

                <div
                  class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                  aria-labelledby="ownedSort"
                >
                  <span class="font-display text-jacarta-300 block px-5 py-2 text-sm font-semibold">Sort By</span>
                  <button
                    class="dropdown-item font-display text-jacarta-700 dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Recently Added
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-accent mb-[3px] h-4 w-4"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                    </svg>
                  </button>
                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Price: Low to High
                  </button>

                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Price: High to Low
                  </button>

                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Auction ending soon
                  </button>
                  <span class="font-display text-jacarta-300 block px-5 py-2 text-sm font-semibold">Options</span>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    <span class="flex items-center justify-between">
                      <span>Verified Only</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        checked
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    <span class="flex items-center justify-between">
                      <span>NFSW Only</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    <span class="flex items-center justify-between">
                      <span>Show Lazy Minted</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- end filters -->

            <!-- Grid -->
            <div class="grid grid-cols-1 gap-[1.875rem] md:grid-cols-2 lg:grid-cols-4">
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_11.gif"
                        alt="item 11"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">70</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_8.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_5.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Asuna #1649</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions8"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions8"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.8 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/1</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_10.jpg"
                        alt="item 10"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">55</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_2.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_7.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Artof Eve</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions7"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions7"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.13 FLOW</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/1</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_9.jpg"
                        alt="item 9"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">25</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_6.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_4.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Jedidia#149</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions6"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions6"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.16 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/1</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_8.jpg"
                        alt="item 8"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">32</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_3.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_5.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Monkeyme#155</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions5"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions5"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">From 5 FLOW</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/1</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>

              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_5.jpg"
                        alt="item 5"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">15</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_1.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_1.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Flourishing Cat #180</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">From 8.49 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">2/8</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_4.jpg"
                        alt="item 4"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">188</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_2.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_2.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Amazing NFT art</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions2"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions2"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">From 5.9 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/7</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_7.jpg"
                        alt="item 7"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">160</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_3.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_3.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >SwagFox#133</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions3"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions3"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.078 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/3</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_6.jpg"
                        alt="item 6"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">159</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_4.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_4.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Splendid Girl</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions4"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions4"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">10 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">2/3</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
            </div>
            <!-- end grid -->
          </div>
          <!-- end owned tab -->

          <!-- Created Tab -->
          <div class="tab-pane fade" id="created" role="tabpanel" aria-labelledby="created-tab">
            <!-- Filters -->
            <div class="mb-8 flex flex-wrap items-center justify-between">
              <div class="flex flex-wrap items-center">
                <!-- Collections -->
                <div class="my-1 mr-2.5">
                  <button
                    class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                    id="createdCollectionsFilter"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="outside"
                    aria-expanded="false"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M7 5V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4zm2 8H4v6h16v-6h-5v3H9v-3zm11-6H4v4h5V9h6v2h5V7zm-9 4v3h2v-3h-2zM9 3v2h6V3H9z"
                      />
                    </svg>
                    <span>Collections</span>
                  </button>
                  <div
                    class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[280px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="createdCollectionsFilter"
                  >
                    <!-- Search -->
                    <div class="p-4">
                      <form action="search" class="relative block">
                        <input
                          type="search"
                          class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full rounded-2xl border py-[0.6875rem] px-4 pl-10 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
                          placeholder="Search"
                        />
                        <span class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                          >
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                              d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"
                            ></path>
                          </svg>
                        </span>
                      </form>
                    </div>

                    <!-- Collections List -->
                    <ul class="scrollbar-custom flex max-h-48 flex-col overflow-y-auto">
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_1.png"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">CryptoKitties</span>
                          </span>
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="fill-accent mb-[3px] h-4 w-4"
                          >
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_2.jpg"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">KaijuKings</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_3.png"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">Kumo x World</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_4.jpg"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">Irene DAO</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_5.png"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">GenerativeDungeon</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_6.jpg"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">ENS Domains</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center space-x-3">
                            <img
                              src="{{ asset('frontend_assets') }}/img/avatars/collection_ava_7.png"
                              class="h-8 w-8 rounded-full"
                              loading="lazy"
                              alt="avatar"
                            />
                            <span class="text-jacarta-700 dark:text-white">Cozy Penguin</span>
                          </span>
                        </a>
                      </li>
                    </ul>

                    <!-- Clear / Apply -->
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 -ml-2 -mr-2 mt-4 flex items-center justify-center space-x-3 border-t px-7 pt-4"
                    >
                      <button
                        type="button"
                        class="text-accent shadow-white-volume hover:bg-accent-dark hover:shadow-accent-volume flex-1 rounded-full bg-white py-2 px-6 text-center text-sm font-semibold transition-all hover:text-white"
                      >
                        Clear
                      </button>
                      <button
                        type="button"
                        class="bg-accent shadow-accent-volume hover:bg-accent-dark flex-1 rounded-full py-2 px-6 text-center text-sm font-semibold text-white transition-all"
                      >
                        Apply
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Category -->
                <div class="my-1 mr-2.5">
                  <button
                    class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                    id="createdCategoriesFilter"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M14 10v4h-4v-4h4zm2 0h5v4h-5v-4zm-2 11h-4v-5h4v5zm2 0v-5h5v4a1 1 0 0 1-1 1h-4zM14 3v5h-4V3h4zm2 0h4a1 1 0 0 1 1 1v4h-5V3zm-8 7v4H3v-4h5zm0 11H4a1 1 0 0 1-1-1v-4h5v5zM8 3v5H3V4a1 1 0 0 1 1-1h4z"
                      />
                    </svg>
                    <span>Category</span>
                  </button>
                  <div
                    class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="createdCategoriesFilter"
                  >
                    <ul class="flex flex-col flex-wrap">
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="text-jacarta-700 dark:text-white">All</span>
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="fill-accent mb-[3px] h-4 w-4"
                          >
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Art
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Collectibles
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Domain
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Music
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Photography
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Virtual World
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <!-- Price Range -->
                <div class="my-1 mr-2.5">
                  <button
                    class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                    id="createdPriceRangeFilter"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="outside"
                    aria-expanded="false"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M17 16h2V4H9v2h8v10zm0 2v3c0 .552-.45 1-1.007 1H4.007A1.001 1.001 0 0 1 3 21l.003-14c0-.552.45-1 1.007-1H7V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-3zM5.003 8L5 20h10V8H5.003zM7 16h4.5a.5.5 0 1 0 0-1h-3a2.5 2.5 0 1 1 0-5H9V9h2v1h2v2H8.5a.5.5 0 1 0 0 1h3a2.5 2.5 0 1 1 0 5H11v1H9v-1H7v-2z"
                      />
                    </svg>
                    <span>Price Range</span>
                  </button>

                  <div
                    class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="createdPriceRangeFilter"
                  >
                    <!-- Blockchain -->
                    <div class="dropdown mb-4 cursor-pointer px-5 pt-2">
                      <div
                        class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 flex items-center justify-between rounded-lg border py-3.5 px-3 text-sm dark:text-white"
                        role="button"
                        id="createdFilterPriceBlockchain"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <span class="font-display flex items-center">
                          <img src="{{ asset('frontend_assets') }}/img/chains/ETH.png" alt="eth" class="mr-2 h-5 w-5" loading="lazy" />
                          ETH
                        </span>
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                        >
                          <path fill="none" d="M0 0h24v24H0z"></path>
                          <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
                        </svg>
                      </div>

                      <div
                        class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[252px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="createdFilterPriceBlockchain"
                      >
                        <button
                          class="dropdown-item font-display text-jacarta-700 dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/ETH.png"
                              alt="eth"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            ETH
                          </span>
                        </button>
                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/FLOW.png"
                              alt="flow"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            FLOW
                          </span>
                        </button>

                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/FUSD.png"
                              alt="fusd"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            FUSD
                          </span>
                        </button>

                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/XTZ.png"
                              alt="xtz"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            XTZ
                          </span>
                        </button>

                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/DAI.png"
                              alt="dai"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            DAI
                          </span>
                        </button>

                        <button
                          class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          <span class="flex items-center">
                            <img
                              src="{{ asset('frontend_assets') }}/img/chains/RARI.png"
                              alt="rari"
                              class="mr-2 h-5 w-5 rounded-full"
                              loading="lazy"
                            />
                            RARI
                          </span>
                        </button>
                      </div>
                    </div>

                    <!-- From / To -->
                    <div class="flex items-center space-x-3 px-5 pb-2">
                      <input
                        type="number"
                        placeholder="From"
                        class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full max-w-[7.5rem] rounded-lg border py-[0.6875rem] px-4 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
                      />
                      <input
                        type="number"
                        placeholder="To"
                        class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full max-w-[7.5rem] rounded-lg border py-[0.6875rem] px-4 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
                      />
                    </div>

                    <!-- Clear / Apply -->
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 -ml-2 -mr-2 mt-4 flex items-center justify-center space-x-3 border-t px-7 pt-4"
                    >
                      <button
                        type="button"
                        class="text-accent shadow-white-volume hover:bg-accent-dark hover:shadow-accent-volume flex-1 rounded-full bg-white py-2 px-6 text-center text-sm font-semibold transition-all hover:text-white"
                      >
                        Clear
                      </button>
                      <button
                        type="button"
                        class="bg-accent shadow-accent-volume hover:bg-accent-dark flex-1 rounded-full py-2 px-6 text-center text-sm font-semibold text-white transition-all"
                      >
                        Apply
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Sort -->
              <div class="dropdown my-1 cursor-pointer">
                <div
                  class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 inline-flex w-48 items-center justify-between rounded-lg border bg-white py-2 px-3 text-sm dark:text-white"
                  role="button"
                  id="createdSort"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="font-display">Recently Added</span>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                  </svg>
                </div>

                <div
                  class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                  aria-labelledby="createdSort"
                >
                  <span class="font-display text-jacarta-300 block px-5 py-2 text-sm font-semibold">Sort By</span>
                  <button
                    class="dropdown-item font-display text-jacarta-700 dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Recently Added
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-accent mb-[3px] h-4 w-4"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                    </svg>
                  </button>
                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Price: Low to High
                  </button>

                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Price: High to Low
                  </button>

                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Auction ending soon
                  </button>
                  <span class="font-display text-jacarta-300 block px-5 py-2 text-sm font-semibold">Options</span>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    <span class="flex items-center justify-between">
                      <span>Verified Only</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        checked
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    <span class="flex items-center justify-between">
                      <span>NFSW Only</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div>
                  <div
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    <span class="flex items-center justify-between">
                      <span>Show Lazy Minted</span>
                      <input
                        type="checkbox"
                        value="checkbox"
                        name="check"
                        class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                      />
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- end filters -->

            <!-- Grid -->
            <div class="grid grid-cols-1 gap-[1.875rem] md:grid-cols-2 lg:grid-cols-4">
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_5.jpg"
                        alt="item 5"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">15</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_1.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_1.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Flourishing Cat #180</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">From 8.49 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">2/8</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_6.jpg"
                        alt="item 6"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">159</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_4.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_4.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Splendid Girl</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions4"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions4"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">10 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">2/3</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>

              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_11.gif"
                        alt="item 11"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">70</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_8.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_5.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Asuna #1649</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions8"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions8"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.8 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/1</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_10.jpg"
                        alt="item 10"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">55</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_2.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_7.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Artof Eve</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions7"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions7"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.13 FLOW</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/1</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>

              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_8.jpg"
                        alt="item 8"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">32</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_3.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_5.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Monkeyme#155</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions5"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions5"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">From 5 FLOW</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/1</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>

              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_9.jpg"
                        alt="item 9"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">25</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_6.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_4.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Jedidia#149</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions6"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions6"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.16 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/1</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_4.jpg"
                        alt="item 4"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">188</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_2.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_2.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Amazing NFT art</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions2"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions2"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">From 5.9 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/7</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="{{ asset('frontend_assets') }}/img/products/item_7.jpg"
                        alt="item 7"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('{{ asset('frontend_assets') }}/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Favorite"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">160</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/creator_3.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="{{ asset('frontend_assets') }}/img/avatars/owner_3.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >SwagFox#133</span
                      >
                    </a>
                    <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
                      <a
                        href="#"
                        class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
                        role="button"
                        id="itemActions3"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <svg
                          width="16"
                          height="4"
                          viewBox="0 0 16 4"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="dark:fill-jacarta-200 fill-jacarta-500"
                        >
                          <circle cx="2" cy="2" r="2" />
                          <circle cx="8" cy="2" r="2" />
                          <circle cx="14" cy="2" r="2" />
                        </svg>
                      </a>
                      <div
                        class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                        aria-labelledby="itemActions3"
                      >
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          New bid
                        </button>
                        <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Refresh Metadata
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Share
                        </button>
                        <button
                          class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                        >
                          Report
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.078 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/3</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Buy now
                    </button>
                    <a href="item.html" class="group flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0H24V24H0z" />
                        <path
                          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
                        />
                      </svg>
                      <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
                        >View History</span
                      >
                    </a>
                  </div>
                </div>
              </article>
            </div>
            <!-- end grid -->
          </div>
          <!-- end created tab -->

          <!-- Collections Tab -->
          @php
              $cats = App\Models\Item::where('status','show')->where('category_id',$nftcategory->id)->get();
          @endphp
          <div class="tab-pane fade" id="collections" role="tabpanel" aria-labelledby="collections-tab">
            <div class="grid grid-cols-1 gap-[1.875rem] md:grid-cols-2 lg:grid-cols-4">
              @foreach ($cats as $cat)
              <article>
                <div class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg">
                  <a href="{{ route('item_details' , $cat->slug) }}" class="flex space-x-[0.625rem]">
                    <span class="w-[100%]">
                      <img style="height: 230px"
                        src="{{ asset('uploads/items') }}/{{ $cat->image ?? 'default.jpg'}}"
                        alt="item 1"
                        class="h-full w-full rounded-[0.625rem] object-cover"
                        loading="lazy"/>
                    </span>
                  </a>

                  <a href="{{ route('item_details' , $cat->slug) }}"
                    class="font-display hover:text-accent dark:hover:text-accent text-jacarta-700 mt-4 block text-base dark:text-white">
                    {{ $cat->name ?? "N/A"}}
                  </a>

                  <div class="mt-2 flex items-center justify-between text-sm font-medium tracking-tight">
                    <div class="flex flex-wrap items-center">
                      <a href="{{ route('user',$cat->get_creator->id) }}" class="mr-2 shrink-0">
                        <img src="{{ asset('uploads/images/users') }}/{{ $cat->get_creator->profile_photo_path }}" alt="owner" class="h-5 w-5 rounded-full" />
                      </a>
                      <span class="dark:text-jacarta-400 mr-1">by</span>
                      <a href="{{ route('user',$cat->get_creator->id) }}" class="text-accent">
                        <span>{{ $cat->get_creator->name }}</span>
                      </a>
                    </div>
                    <span class="dark:text-jacarta-300 text-sm">10K Items</span>
                  </div>
                </div>
              </article>
              @endforeach
            </div>
          </div>
          <!-- end collections tab -->

          <!-- Activity Tab -->
          <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
            <!-- Records / Filter -->
            <div class="lg:flex">
            @php
                $cat_reports = App\Models\ReportCategory::where('category_id',$nftcategory->id)->latest()->get();
            @endphp
              <!-- Records -->
              <div class="mb-10 shrink-0 basis-8/12 space-y-5 lg:mb-0 lg:pr-10 report_div">
                @foreach ($cat_reports as $repo)
                    <a
                    href="#"
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl relative flex items-center border bg-white p-8 transition-shadow hover:shadow-lg">
                    <figure class="mr-5 self-start">
                    <img src="{{ asset('uploads/images/users') }}/{{ $repo->getUser->profile_photo_path ?? 'default.jpg' }}" alt="avatar 2" class="rounded-2lg" loading="lazy" width="50"/>
                    </figure>

                    <div>
                    <h3 class="font-display text-jacarta-700 mb-1 text-base font-semibold dark:text-white">
                        {{ $repo->getUser->name ?? '' }}
                    </h3>
                    <span class="text-jacarta-500 mb-3 block text-sm">Report: {{ $repo->getReportCat->problem ?? '' }}</span>
                    <span class="text-jacarta-300 block text-xs">{{ $repo->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="dark:border-jacarta-600 border-jacarta-100 ml-auto rounded-full border p-3">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 dark:fill-white"
                    >
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                        d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z"
                        />
                    </svg>
                    </div>
                    </a>
                @endforeach
              </div>

              @php
                $cat_likes = App\Models\LikeCollection::where('collection_id',$nftcategory->id)->latest()->get();
              @endphp
              <div class="mb-10 shrink-0 basis-8/12 space-y-5 lg:mb-0 lg:pr-10 like_div">
                @foreach ($cat_likes as $like)
                    <a href="#"
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl relative flex items-center border bg-white p-8 transition-shadow hover:shadow-lg">
                    <figure class="mr-5 self-start">
                    <img src="{{ asset('uploads/images/users') }}/{{ $like->getUser->profile_photo_path ?? 'default.jpg'}}" alt="avatar 2" class="rounded-2lg" loading="lazy" width="50"/>
                    </figure>

                    <div>
                    <h3 class="font-display text-jacarta-700 mb-1 text-base font-semibold dark:text-white">
                        {{ $like->getUser->name ?? '' }}
                    </h3>Likes This Category
                    <span class="text-jacarta-300 block text-xs">{{ $like->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="dark:border-jacarta-600 border-jacarta-100 ml-auto rounded-full border p-3">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 dark:fill-white"
                    >
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                        d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z"
                        />
                    </svg>
                    </div>
                    </a>
                @endforeach
              </div>

              <!-- Filters -->
              <aside class="basis-4/12 lg:pl-5">
                {{-- <form action="search" class="relative mb-12 block">
                  <input
                    type="search"
                    class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full rounded-2xl border py-[0.6875rem] px-4 pl-10 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
                    placeholder="Search"
                  />
                  <span class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"
                      ></path>
                    </svg>
                  </span>
                </form> --}}

                <h3 class="font-display text-jacarta-500 mb-4 font-semibold dark:text-white">Filters</h3>
                <div class="flex flex-wrap">
                  <button
                    class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent report_filter"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M10.9 2.1l9.899 1.415 1.414 9.9-9.192 9.192a1 1 0 0 1-1.414 0l-9.9-9.9a1 1 0 0 1 0-1.414L10.9 2.1zm.707 2.122L3.828 12l8.486 8.485 7.778-7.778-1.06-7.425-7.425-1.06zm2.12 6.364a2 2 0 1 1 2.83-2.829 2 2 0 0 1-2.83 2.829z"
                      />
                    </svg>
                    <span class="text-2xs font-medium">Reports</span>
                  </button>
                  {{-- <button
                    class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M14 20v2H2v-2h12zM14.586.686l7.778 7.778L20.95 9.88l-1.06-.354L17.413 12l5.657 5.657-1.414 1.414L16 13.414l-2.404 2.404.283 1.132-1.415 1.414-7.778-7.778 1.415-1.414 1.13.282 6.294-6.293-.353-1.06L14.586.686zm.707 3.536l-7.071 7.07 3.535 3.536 7.071-7.07-3.535-3.536z"
                      />
                    </svg>
                    <span class="text-2xs font-medium">Bids</span>
                  </button> --}}
                  {{-- <button
                    class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M16.05 12.05L21 17l-4.95 4.95-1.414-1.414 2.536-2.537L4 18v-2h13.172l-2.536-2.536 1.414-1.414zm-8.1-10l1.414 1.414L6.828 6 20 6v2H6.828l2.536 2.536L7.95 11.95 3 7l4.95-4.95z"
                      />
                    </svg>
                    <span class="text-2xs font-medium">Transfer</span>
                  </button> --}}
                  <button
                    class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent like_filter hover-color"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                    >
                      <path fill="none" d="M0 0H24V24H0z" />
                      <path
                        d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                      />
                    </svg>
                    <span class="text-2xs font-medium">Likes</span>
                  </button>
                  {{-- <button
                    class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z"
                      />
                    </svg>
                    <span class="text-2xs font-medium">Purchases</span>
                  </button> --}}
                </div>
              </aside>
            </div>
          </div>
          <!-- end activity tab -->
        </div>
      </div>
    </section>
    <!-- end collection -->
  </main>

  <!-- Wallet Modal -->
  <div class="modal fade" id="walletModal" tabindex="-1" aria-labelledby="walletModalLabel" aria-hidden="true">
    <div class="modal-dialog max-w-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="walletModalLabel">Connect your wallet</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="fill-jacarta-700 h-6 w-6 dark:fill-white"
            >
              <path fill="none" d="M0 0h24v24H0z" />
              <path
                d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
              />
            </svg>
          </button>
        </div>

        <!-- Body -->
        <div class="modal-body p-6 text-center">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            x="0"
            y="0"
            viewBox="0 0 318.6 318.6"
            xml:space="preserve"
            class="mb-4 inline-block h-8 w-8"
          >
            <style>
              .st1,
              .st6 {
                fill: #e4761b;
                stroke: #e4761b;
                stroke-linecap: round;
                stroke-linejoin: round;
              }
              .st6 {
                fill: #f6851b;
                stroke: #f6851b;
              }
            </style>
            <path
              fill="#e2761b"
              stroke="#e2761b"
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M274.1 35.5l-99.5 73.9L193 65.8z"
            />
            <path
              class="st1"
              d="M44.4 35.5l98.7 74.6-17.5-44.3zm193.9 171.3l-26.5 40.6 56.7 15.6 16.3-55.3zm-204.4.9L50.1 263l56.7-15.6-26.5-40.6z"
            />
            <path
              class="st1"
              d="M103.6 138.2l-15.8 23.9 56.3 2.5-2-60.5zm111.3 0l-39-34.8-1.3 61.2 56.2-2.5zM106.8 247.4l33.8-16.5-29.2-22.8zm71.1-16.5l33.9 16.5-4.7-39.3z"
            />
            <path
              d="M211.8 247.4l-33.9-16.5 2.7 22.1-.3 9.3zm-105 0l31.5 14.9-.2-9.3 2.5-22.1z"
              fill="#d7c1b3"
              stroke="#d7c1b3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M138.8 193.5l-28.2-8.3 19.9-9.1zm40.9 0l8.3-17.4 20 9.1z"
              fill="#233447"
              stroke="#233447"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M106.8 247.4l4.8-40.6-31.3.9zM207 206.8l4.8 40.6 26.5-39.7zm23.8-44.7l-56.2 2.5 5.2 28.9 8.3-17.4 20 9.1zm-120.2 23.1l20-9.1 8.2 17.4 5.3-28.9-56.3-2.5z"
              fill="#cd6116"
              stroke="#cd6116"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M87.8 162.1l23.6 46-.8-22.9zm120.3 23.1l-1 22.9 23.7-46zm-64-20.6l-5.3 28.9 6.6 34.1 1.5-44.9zm30.5 0l-2.7 18 1.2 45 6.7-34.1z"
              fill="#e4751f"
              stroke="#e4751f"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              class="st6"
              d="M179.8 193.5l-6.7 34.1 4.8 3.3 29.2-22.8 1-22.9zm-69.2-8.3l.8 22.9 29.2 22.8 4.8-3.3-6.6-34.1z"
            />
            <path
              fill="#c0ad9e"
              stroke="#c0ad9e"
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M180.3 262.3l.3-9.3-2.5-2.2h-37.7l-2.3 2.2.2 9.3-31.5-14.9 11 9 22.3 15.5h38.3l22.4-15.5 11-9z"
            />
            <path
              fill="#161616"
              stroke="#161616"
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M177.9 230.9l-4.8-3.3h-27.7l-4.8 3.3-2.5 22.1 2.3-2.2h37.7l2.5 2.2z"
            />
            <path
              d="M278.3 114.2l8.5-40.8-12.7-37.9-96.2 71.4 37 31.3 52.3 15.3 11.6-13.5-5-3.6 8-7.3-6.2-4.8 8-6.1zM31.8 73.4l8.5 40.8-5.4 4 8 6.1-6.1 4.8 8 7.3-5 3.6 11.5 13.5 52.3-15.3 37-31.3-96.2-71.4z"
              fill="#763d16"
              stroke="#763d16"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              class="st6"
              d="M267.2 153.5l-52.3-15.3 15.9 23.9-23.7 46 31.2-.4h46.5zm-163.6-15.3l-52.3 15.3-17.4 54.2h46.4l31.1.4-23.6-46zm71 26.4l3.3-57.7 15.2-41.1h-67.5l15 41.1 3.5 57.7 1.2 18.2.1 44.8h27.7l.2-44.8z"
            />
          </svg>
          <p class="text-center dark:text-white">
            You don't have MetaMask in your browser, please download it from
            <a href="https://metamask.io/" class="text-accent" target="_blank" rel="noreferrer noopener">MetaMask</a>
          </p>
        </div>
        <!-- end body -->

        <div class="modal-footer">
          <div class="flex items-center justify-center space-x-4">
            <a
              href="https://metamask.io/"
              target="_blank"
              rel="noreferrer noopener"
              class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
            >
              Get Metamask
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Buy Now Modal -->
  <div class="modal fade" id="buyNowModal" tabindex="-1" aria-labelledby="buyNowModalLabel" aria-hidden="true">
    <div class="modal-dialog max-w-2xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="buyNowModalLabel">Complete checkout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="fill-jacarta-700 h-6 w-6 dark:fill-white"
            >
              <path fill="none" d="M0 0h24v24H0z" />
              <path
                d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
              />
            </svg>
          </button>
        </div>

        <!-- Body -->
        <div class="modal-body p-6">
          <div class="mb-2 flex items-center justify-between">
            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Item</span>
            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Subtotal</span>
          </div>

          <div class="dark:border-jacarta-600 border-jacarta-100 relative flex items-center border-t border-b py-4">
            <figure class="mr-5 self-start">
              <img src="{{ asset('frontend_assets') }}/img/avatars/avatar_2.jpg" alt="avatar 2" class="rounded-2lg" loading="lazy" />
            </figure>

            <div>
              <a href="collection.html" class="text-accent text-sm">Elon Musk #709</a>
              <h3 class="font-display text-jacarta-700 mb-1 text-base font-semibold dark:text-white">
                Lazyone Panda
              </h3>
              <div class="flex flex-wrap items-center">
                <span class="dark:text-jacarta-300 text-jacarta-500 mr-1 block text-sm">Creator Earnings: 5%</span>
                <span
                  data-tippy-content="The creator of this collection will receive 5% of the sale total from future sales of this item."
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="dark:fill-jacarta-300 fill-jacarta-700 h-4 w-4"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM11 7h2v2h-2V7zm0 4h2v6h-2v-6z"
                    />
                  </svg>
                </span>
              </div>
            </div>

            <div class="ml-auto">
              <span class="mb-1 flex items-center whitespace-nowrap">
                <span data-tippy-content="ETH">
                  <svg
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    x="0"
                    y="0"
                    viewBox="0 0 1920 1920"
                    xml:space="preserve"
                    class="h-4 w-4"
                  >
                    <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="dark:text-jacarta-100 text-sm font-medium tracking-tight">1.55 ETH</span>
              </span>
              <div class="dark:text-jacarta-300 text-right text-sm">$130.82</div>
            </div>
          </div>

          <!-- Total -->
          <div
            class="dark:border-jacarta-600 border-jacarta-100 mb-2 flex items-center justify-between border-b py-2.5"
          >
            <span class="font-display text-jacarta-700 font-semibold dark:text-white">Total</span>
            <div class="ml-auto">
              <span class="flex items-center whitespace-nowrap">
                <span data-tippy-content="ETH">
                  <svg
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    x="0"
                    y="0"
                    viewBox="0 0 1920 1920"
                    xml:space="preserve"
                    class="h-4 w-4"
                  >
                    <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-green font-medium tracking-tight">1.55 ETH</span>
              </span>
              <div class="dark:text-jacarta-300 text-right">$130.82</div>
            </div>
          </div>

          <!-- Terms -->
          <div class="mt-4 flex items-center space-x-2">
            <input
              type="checkbox"
              id="buyNowTerms"
              class="checked:bg-accent dark:bg-jacarta-600 text-accent border-jacarta-200 focus:ring-accent/20 dark:border-jacarta-500 h-5 w-5 self-start rounded focus:ring-offset-0"
            />
            <label for="buyNowTerms" class="dark:text-jacarta-200 text-sm"
              >By checking this box, I agree to Xhibiter's <a href="#" class="text-accent">Terms of Service</a></label
            >
          </div>
        </div>
        <!-- end body -->

        <div class="modal-footer">
          <div class="flex items-center justify-center space-x-4">
            <button
              type="button"
              class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
            >
              Confirm Checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('js')
    <script>
        $(document).ready(function () {
            $('#priceFilterBtn').on('click', function(){
                let min_amount = $('#min_amount').val();
                let max_amount = $('#max_amount').val();
                let category_id = $(this).attr('category_id');
                // alert(max_amount);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });
                $.ajax({
                    url: "{{ route('filterByPriceRangeInCollection') }}",
                    type: "POST",
                    data: {
                        min_amount: min_amount,
                        max_amount: max_amount,
                        category_id: category_id,
                    },
                    success: function (data){
                        // console.log(data);
                        $('#onSaleCategoryDiv').html(data.data);
                        $('#price-range-div').hide();
                    }
                });
            });

            $('#RecentlyAddedCollection').click(function (){
                let category_id = $(this).attr('category_id');
                // alert(category_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('RecentlyAddedCollection') }}",
                    type: "POST",
                    data:{
                        category_id: category_id
                    },
                    success: function(data){
                        $('#onSaleCategoryDiv').html(data.data);
                    },

                });
            });

            $('#LowToHighCollection').click(function (){
                let category_id = $(this).attr('category_id');
                // alert(category_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('LowToHighCollection') }}",
                    type: "POST",
                    data:{
                        category_id: category_id
                    },
                    success: function(data){
                        $('#onSaleCategoryDiv').html(data.data);
                    },

                });
            });

            $('#HighToLowCollection').click(function (){
                let category_id = $(this).attr('category_id');
                // alert(category_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('HighToLowCollection') }}",
                    type: "POST",
                    data:{
                        category_id: category_id
                    },
                    success: function(data){
                        $('#onSaleCategoryDiv').html(data.data);
                    },

                });
            });

            $('.like_btn').click(function(){
                let item_id = $(this).attr('item_id');
                // alert(item_id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('like_item') }}",
                    type: "POST",
                    data: {
                        item_id: item_id,
                    },
                    success: function(response){
                        console.log(response.item_id)
                        $(".likeCount" + response.item_id).html(response.count);
                        if (response.status != 200) {
                            $('.like_icon'+response.item_id).html(`<i class="fa-regular fa-heart"></i>`);
                            alertify.set('notifier','position', 'top-right');
                            alertify.error(response.message);
                        } else {
                            $('.like_icon'+response.item_id).html(`<i class="fa fa-heart"></i>`);
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                        }
                    }
                });

            });

            $('.loginFromBid').on('click', function (){
                let data_id = $(this).attr('data_id');
                // alert(data_id)

                let email = $('.email'+data_id).val();
                let password = $('.password'+data_id).val();
                if(email == ''){
                    alertify.set('notifier','position', 'top-right');
                    alertify.error("Please Put Valid Emal");
                }
                if(password == ''){
                    alertify.set('notifier','position', 'top-right');
                    alertify.error("Please Put Valid Password");
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('login') }}",
                    type: "POST",
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function (response){
                        console.log(response)
                        $('.loginModal').modal('hide');
                        location.reload();
                    }
                });
            });

            $(".dropdown .dropdown-item").on("click", function(){
                $(this).closest(".dropdown").find(".dropdown-toggle__text").text($(this).text());
                $(".dropdown .dropdown-item").removeClass("active");
                $(this).addClass("active");
            });

            $('.like_col_btn').click(function(){
                let cat_id = $(this).attr('cat_id');
                // alert(cat_id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('like_collection') }}",
                    type: "POST",
                    data: {
                        cat_id: cat_id,
                    },
                    success: function(response){
                        // console.log(response)
                        $(".likeColCount").html(response.count);
                        if (response.status != 200) {
                            $('.like_col_icon').html(`<i class="fa-regular fa-heart"></i>`);
                            alertify.set('notifier','position', 'top-right');
                            alertify.error(response.message);
                        } else {
                            $('.like_col_icon').html(`<i class="fa fa-heart"></i>`);
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                        }
                    }
                });

            });

            $('.submitReport').on('click', function (){
                let report_by = $('.report_by').val();
                let category_id   = $('.category_id').val();
                let report_id = $('.report_id').val();
                // alert(category_id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('report_to_category') }}",
                    type: "POST",
                    data: {
                        report_by: report_by,
                        category_id: category_id,
                        report_id: report_id,
                    },
                    success: function(response){
                        if(response.status==200){
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message);
                            location.reload()
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.error(response.message);
                        }
                    }
                });
            });


            $('.copyURL').click(function(){
                alertify.set('notifier','position', 'top-right');
                alertify.success('Link Copied');
            })
        });
    </script>

<script>
    $('.like_div').show()
    $('.report_div').hide()

    $('.like_filter').click(function(){
        $('.like_div').show()
        $('.like_filter').addClass('hover-color')
        $('.report_div').hide()
        $('.report_filter').removeClass('hover-color')
    })
    $('.report_filter').click(function(){
        $('.report_div').show()
        $('.report_filter').addClass('hover-color')
        $('.like_div').hide()
        $('.like_filter').removeClass('hover-color')
    })
</script>
@endsection
