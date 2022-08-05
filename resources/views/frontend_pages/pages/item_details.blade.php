@extends('layouts.app')

@section('content')

<main>
    <!-- Item -->
    <section class="relative pt-12 pb-24 lg:py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full" />
      </picture>
      <div class="container">
        <!-- Item -->
        <div class="md:flex md:flex-wrap">
          <!-- Image -->
          <figure class="mb-8 md:w-2/5 md:flex-shrink-0 md:flex-grow-0 md:basis-auto lg:w-1/2">
            <img
              src="{{ asset('uploads/items') }}/{{ $single_item->image ?? 'default.jpg' }}"
              alt="item" style="height: 670px"
              class="rounded-2.5xl cursor-pointer"
              data-bs-toggle="modal"
              data-bs-target="#imageModal"
            />

            <!-- Modal -->
            <div
              class="modal fade testModal"
              id="imageModal"
              tabindex="-1"
              aria-labelledby="buyNowModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog !my-0 flex h-full items-center justify-center p-4">
                <img src="{{ asset('frontend_assets') }}/img/products/item_single_full.jpg" alt="item" />
              </div>

              <button
                type="button"
                class="btn-close absolute top-6 right-6"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  class="h-6 w-6 fill-white"
                >
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
                  />
                </svg>
              </button>
            </div>
            <!-- end modal -->
          </figure>

          <!-- Details -->
          <div class="md:w-3/5 md:basis-auto md:pl-8 lg:w-1/2 lg:pl-[3.75rem]">
            <!-- Collection / Likes / Actions -->
            <div class="mb-3 flex">
              <!-- Collection -->
              <div style="color:green" id="bidError"></div>
              <div class="flex items-center">
                <a href="{{ route('collection', $single_item->category_id ?? '') }}" class="text-accent mr-2 text-sm font-bold">{{ $single_item->get_category->name ?? 'N/A'}}</a>
                <span
                  class="dark:border-jacarta-600 bg-green inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-white"
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
                </span>
              </div>

              <!-- Likes / Actions -->
                @php
                    $like_exist = App\Models\Like::where('item_id', $single_item->id)->where('user_id', Auth::id())->first();
                    $like_count = App\Models\Like::where('item_id', $single_item->id)->count();
                @endphp
                {{-- <div id="liked_msg"></div> --}}
                <div class="ml-auto flex space-x-2">
                    <div class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 flex items-center space-x-1 rounded-xl border bg-white py-2 px-4">
                        @auth
                            <a style="cursor: pointer" class="like_btn" item_id="{{ $single_item->id }}">
                                <span class="like_icon{{ $single_item->id }}">
                                    @if($like_exist)
                                        <i class="fa fa-heart"></i>
                                    @else
                                        <i class="fa-regular fa-heart"></i>
                                    @endif
                                </span>
                            </a>
                            <span class="likeCount{{ $single_item->id }}" class="dark:text-jacarta-200 text-sm">{{ $like_count }}</span>
                        @else
                            <a style="cursor: pointer" data-bs-toggle="modal"
                            data-bs-target="#loginModal{{ $single_item->id }}">
                                <span>
                                    <i class="fa-regular fa-heart"></i>
                                </span>
                            </a>
                            <span class="dark:text-jacarta-200 text-sm">{{ $like_count }}</span>
                        @endauth
                    </div>

                <!-- Actions -->
                <div
                  class="dark:border-jacarta-600 dark:hover:bg-jacarta-600 border-jacarta-100 dropdown hover:bg-jacarta-100 dark:bg-jacarta-700 rounded-xl border bg-white"
                >
                  <a
                    href="#"
                    class="dropdown-toggle inline-flex h-10 w-10 items-center justify-center text-sm"
                    role="button"
                    id="collectionActions"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <svg
                      width="16"
                      height="4"
                      viewBox="0 0 16 4"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      class="dark:fill-jacarta-200 fill-jacarta-500"
                    >
                      <circle cx="2" cy="2" r="2"></circle>
                      <circle cx="8" cy="2" r="2"></circle>
                      <circle cx="14" cy="2" r="2"></circle>
                    </svg>
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="collectionActions"
                  >
                  @if ($single_item->creator_id != Auth::id())
                  <button
                    data-bs-toggle="modal"
                    data-bs-target="#placeBidModal_{{ $single_item->id }}"
                    class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                    New bid
                  </button>
                  @endif
                    <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
                    <button id="refreshMetadata"
                      class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                      Refresh Metadata
                    </button>
                    <button
                      class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                    >
                      Share
                    </button>
                    @if ($single_item->creator_id != Auth::id())
                    <button
                      data-bs-toggle="modal"
                      data-bs-target="#ReportModal"
                      class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                      Report
                    </button>
                    @endif

                    @push('modals')
                    <div class="modal fade" id="ReportModal" tabindex="-1" aria-labelledby="walletModalLabel" aria-hidden="true">
                        <div class="modal-dialog max-w-2xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="walletModalLabel">Report this collection</h5>
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
                            <div class="modal-body p-6 text-center">
                                <form>
                                    @csrf
                                    <input type="hidden" class="user_id" name="user_id" value="{{ Auth::id() }}">
                                    <input type="hidden" class="item_id" name="item_id" value="{{ $single_item->id }}">
                                    <div class="dropdown my-1 cursor-pointer">
                                        <select
                                            class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 dark:text-jacarta-300 flex items-center justify-between rounded-lg border bg-white py-3 px-3 w-full report_id"
                                            name="problem"
                                         >
                                            <option disabled selected>Select Problem</option>
                                            @foreach (reports() as $report)
                                                <option value="{{ $report->id }}">{{ $report->problem }}</option>
                                            @endforeach
                                        </select>
                                        @error('problem')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @auth
                                        <button type="button"
                                            style="margin-top: 20px"
                                            class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all submitReport">
                                            {{ __('Submit') }}
                                        </button>
                                        @else
                                        <div style="margin-top: 20px">
                                            <a
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal{{ $single_item->id }}"
                                                style="cursor: pointer"
                                                class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all">
                                                {{ __('Submit') }}
                                            </a>
                                        </div>
                                        @endauth
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endpush
                    @push('modals')
                <div class="modal loginModal fade" id="loginModal{{ $single_item->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
                    <form>
                        <div class="modal-dialog max-w-2xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Login</h5>
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
                                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                        <div class="mb-2 flex items-center justify-between">
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Email</span>
                                        </div>

                                        <div
                                            class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                            <input
                                            type="email"
                                            name="email"
                                            class="email{{ $single_item->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                            placeholder="Email"
                                            />
                                        </div>
                                        <div class="mb-2 flex items-center justify-between">
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Password</span>
                                        </div>

                                        <div
                                            class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                            <input
                                            type="password"
                                            name="password"
                                            data-id="{{ $single_item->id }}"
                                            class="login__Input password{{ $single_item->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                            placeholder="Password"
                                            />
                                        </div>
                                        <span id="errorPass"></span>
                                        <div class="flex items-center justify-center space-x-4">
                                            <a
                                                data_id="{{ $single_item->id }}"
                                                id='loginFromBid'
                                                style="cursor:pointer"
                                                class="placeBidBtn loginFromBid loginFrom__Bid{{ $single_item->id }} bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                                                >
                                                {{ __('Login') }}
                                            </a>
                                        </div>

                                    </form>
                                </div>
                                <!-- end body -->
                                <div class="modal-footer">
                                    <div class="flex items-center justify-end mt-4">
                                        <a href="{{ route('register') }}">
                                          Not Registered Yet ?  <b>{{ __('Register Here') }}</b>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endpush
                  </div>
                </div>
              </div>
            </div>

            <h1 class="font-display text-jacarta-700 mb-4 text-4xl font-semibold dark:text-white">{{ $single_item->name }}</h1>

            <div class="mb-8 flex items-center space-x-4 whitespace-nowrap">
              <div class="flex items-center">
                <span class="-ml-1" data-tippy-content="ETH">
                  <svg
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    x="0"
                    y="0"
                    viewBox="0 0 1920 1920"
                    xml:space="preserve"
                    class="mr-1 h-4 w-4"
                  >
                    <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-green text-sm font-medium tracking-tight mr-2">{{ $single_item->price ?? '' }} </span> {{ $single_item->blockchain }}
              </div>
              <span class="dark:text-jacarta-300 text-jacarta-400 text-sm">Base Price</span>
              <span class="dark:text-jacarta-300 text-jacarta-400 text-sm">{{ $single_item->quantity }}-Available</span>
            </div>

            <p class="dark:text-jacarta-300 mb-10">
                {!! $single_item->description !!}{{ $single_item->id }}
            </p>

            <!-- Creator / Owner -->
            <div class="mb-8 flex flex-wrap">
              <div class="mr-8 mb-4 flex">
                <figure class="mr-4 shrink-0">
                  <a href="{{ route('user', $single_item->get_creator->id ?? '') }}" class="relative block">
                    <img src="{{ asset('uploads/images/users') }}/{{ $single_item->get_creator->profile_photo_path ?? 'default.jpg'}}" alt="avatar 7" class="rounded-2lg" loading="lazy" style="height: 48px; width:48px"/>
                    <div
                      class="dark:border-jacarta-600 bg-green absolute -right-3 top-[60%] flex h-6 w-6 items-center justify-center rounded-full border-2 border-white"
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
                  </a>
                </figure>
                <div class="flex flex-col justify-center">
                  <span class="text-jacarta-400 block text-sm dark:text-white"
                    >Creator <strong>{{ $single_item->creator_loyalty }}% Loyalties</strong></span
                  >
                  <a href="{{ route('user', $single_item->get_creator->id ?? '') }}" class="text-accent block">
                    <span class="text-sm font-bold">@ {{ $single_item->get_creator->name  ?? 'N/A'}}</span>
                  </a>
                </div>
              </div>

              <div class="mb-4 flex">
                <figure class="mr-4 shrink-0">
                  <a href="#" class="relative block">
                    <img src="{{ asset('uploads/images/users') }}/{{ $single_item->get_owner->profile_photo_path ?? 'default.jpg'}}" alt="avatar 1" class="rounded-2lg" loading="lazy" style="height: 48px; width:48px" />
                    <div
                      class="dark:border-jacarta-600 bg-green absolute -right-3 top-[60%] flex h-6 w-6 items-center justify-center rounded-full border-2 border-white"
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
                  </a>
                </figure>
                <div class="flex flex-col justify-center">
                  <span class="text-jacarta-400 block text-sm dark:text-white">Owned by</span>
                  <a href="" class="text-accent block">
                    <span class="text-sm font-bold">@ {{ $single_item->get_owner->name ?? 'N/A' }}</span>
                  </a>
                </div>
              </div>
            </div>

            <!-- Bid -->
            <div
              class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 rounded-2lg border bg-white p-8"
            >
              <div class="mb-8 sm:flex sm:flex-wrap">
                <!-- Highest bid -->
                <div class="sm:w-1/2 sm:pr-4 lg:pr-8">
                  <div class="block overflow-hidden text-ellipsis whitespace-nowrap">
                    <span class="dark:text-jacarta-300 text-jacarta-400 text-sm">Highest bid by</span>
                    <a href="#" class="text-accent text-sm font-bold">
                        {{ $max_bid->getUser->name ?? 'N/A' }}
                      </a>
                  </div>
                  <div class="mt-3 flex">
                    <figure class="mr-4 shrink-0">
                      <a href="#" class="relative block">
                        <img src="{{ asset('uploads/images/users') }}/{{ $max_bid->getUser->profile_photo_path ?? 'default.jpg' }}" alt="avatar" class="rounded-2lg" loading="lazy" style="height: 48px; width:48px" />
                      </a>
                    </figure>
                    <div>
                      <div class="flex items-center whitespace-nowrap">
                        <span class="-ml-1" data-tippy-content="ETH">
                          <svg
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            x="0"
                            y="0"
                            viewBox="0 0 1920 1920"
                            xml:space="preserve"
                            class="h-5 w-5"
                          >
                            <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                            <path
                              fill="#62688F"
                              d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                            ></path>
                            <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                            <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                            <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                          </svg>
                        </span>
                        <span class="text-green text-lg font-medium leading-tight tracking-tight">{{ $max_bid->bid_amount ?? '0'}} {{ $single_item->blockchain }}</span>
                      </div>
                      {{-- <span class="dark:text-jacarta-300 text-jacarta-400 text-sm">~10,864.10</span> --}}
                    </div>
                  </div>
                </div>

                <!-- Countdown -->
                <div class="dark:border-jacarta-600 sm:border-jacarta-100 mt-4 sm:mt-0 sm:w-1/2 sm:border-l sm:pl-4 lg:pl-8">
                    <span class="js-countdown-ends-label text-jacarta-400 dark:text-jacarta-300 text-sm">Auction ends in</span>
                    @if ($single_item->expire_date > Carbon\Carbon::today())
                    <div class="js-countdown-single-timer mt-3 flex space-x-4" data-countdown="{{ $single_item->expire_date }}T12:00:00" data-expired="This auction has ended">
                      <span class="countdown-days text-jacarta-700 dark:text-white">
                        <span class="js-countdown-days-number text-lg font-medium lg:text-[1.5rem]">0</span>
                        <span class="block text-xs font-medium tracking-tight">Days</span>
                      </span>
                      <span class="countdown-hours text-jacarta-700 dark:text-white">
                        <span class="js-countdown-hours-number text-lg font-medium lg:text-[1.5rem]">0</span>
                        <span class="block text-xs font-medium tracking-tight">Hrs</span>
                      </span>
                      <span class="countdown-minutes text-jacarta-700 dark:text-white">
                        <span class="js-countdown-minutes-number text-lg font-medium lg:text-[1.5rem]">0</span>
                        <span class="block text-xs font-medium tracking-tight">Min</span>
                      </span>
                      <span class="countdown-seconds text-jacarta-700 dark:text-white">
                        <span class="js-countdown-seconds-number text-lg font-medium lg:text-[1.5rem]">0</span>
                        <span class="block text-xs font-medium tracking-tight">Sec</span>
                      </span>
                    </div>
                    @else
                    <div class="js-countdown-single-timer mt-3 flex space-x-4" data-expired="This auction has ended">
                        <span class="countdown-days text-jacarta-700 dark:text-white">
                          <span class="js-countdown-days-number text-lg font-medium lg:text-[1.5rem]">0</span>
                          <span class="block text-xs font-medium tracking-tight">Days</span>
                        </span>
                        <span class="countdown-hours text-jacarta-700 dark:text-white">
                          <span class="js-countdown-hours-number text-lg font-medium lg:text-[1.5rem]">0</span>
                          <span class="block text-xs font-medium tracking-tight">Hrs</span>
                        </span>
                        <span class="countdown-minutes text-jacarta-700 dark:text-white">
                          <span class="js-countdown-minutes-number text-lg font-medium lg:text-[1.5rem]">0</span>
                          <span class="block text-xs font-medium tracking-tight">Min</span>
                        </span>
                        <span class="countdown-seconds text-jacarta-700 dark:text-white">
                          <span class="js-countdown-seconds-number text-lg font-medium lg:text-[1.5rem]">0</span>
                          <span class="block text-xs font-medium tracking-tight">Sec</span>
                        </span>
                      </div>
                    @endif
                </div>

              </div>

              @if ($single_item->creator_id != Auth::id())
              <button type="button"
              class="text-accent font-display text-sm font-semibold"
              data-bs-toggle="modal"
              data-bs-target="#placeBidModal_{{ $single_item->id }}"
                >Place Bid</button>
              @endif


                @php
                    $latest_bid = App\Models\PlaceBid::where('item_id',$single_item->id)->latest('id')->first();
                @endphp

                @push('modals')
                 <!-- Place Bid Modal -->
                <div class="modal testModal fade" id="placeBidModal_{{ $single_item->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
                    <form>
                        <div class="modal-dialog max-w-2xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="placeBidLabel">Place a bid</h5>
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
                                        <div>
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Current Bid: </span>{{ $latest_bid->bid_amount ?? '0' }}
                                        </div>
                                        <div
                                            class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border"
                                        >
                                            <div class="border-jacarta-100 bg-jacarta-50 flex flex-1 items-center self-stretch border-r px-2">
                                            <span>
                                                <svg
                                                version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                x="0"
                                                y="0"
                                                viewBox="0 0 1920 1920"
                                                xml:space="preserve"
                                                class="mr-1 h-5 w-5"
                                                >
                                                <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                                                <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                                                <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                                                <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                                                <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                                                </svg>
                                            </span>
                                            <span class="font-display text-jacarta-700 text-sm">{{ $single_item->blockchain }}</span>
                                            </div>
                                            <input type="hidden" class="item_id{{ $single_item->id }}" name="item_id" value="{{ $single_item->id }}">
                                            <input
                                            type="text" name="bid_amount"
                                            class="bid_amount{{ $single_item->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                            placeholder="Amount"
                                            />
                                            <div class="bg-jacarta-50 border-jacarta-100 flex flex-1 justify-end self-stretch border-l">
                                                <span class="self-center px-2 text-sm">${{ $single_item->price }}</span>
                                            </div>
                                        </div>

                                        <!-- Terms -->
                                        @auth
                                        @else
                                        <h3 style="color: red">Please
                                            <a

                                                style="color: blue; cursor:pointer"
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal{{ $single_item->id }}"
                                             >
                                             Login
                                            </a>
                                             First
                                            </h3>
                                        @endauth
                                        <div class="mt-4 flex items-center space-x-2">
                                            <input
                                            type="checkbox"
                                            name="check"
                                            class="terms checked:bg-accent dark:bg-jacarta-600 text-accent border-jacarta-200 focus:ring-accent/20 dark:border-jacarta-500 h-5 w-5 self-start rounded focus:ring-offset-0"
                                            />
                                            <label for="terms" class="dark:text-jacarta-200 text-sm"
                                            >By checking this box, I agree to Xhibiter's <a href="{{ route('terms_of_services') }}" class="text-accent">Terms of Service</a></label
                                            >
                                        </div>
                                        <div class="checkBoxError"></div>
                                    </div>
                                <!-- end body -->

                                <div class="modal-footer">
                                    @auth
                                    <div class="flex items-center justify-center space-x-4">
                                        <a
                                            data-id="{{ $single_item->id }}"
                                            style="cursor:pointer"
                                            class="placeBidBtn bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                                            >
                                            {{ __('Place Bid') }}
                                        </a>
                                    </div>
                                    @else
                                    <div class="flex items-center justify-center space-x-4">
                                        <a

                                            style="cursor:pointer"
                                            data-bs-toggle="modal"
                                            data-bs-target="#loginModal{{ $single_item->id }}"
                                            class=" bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                                            >
                                            {{ __('Place Bid') }}
                                        </a>
                                    </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endpush

                {{-- login modal --}}
              @push('modals')
              <div class="modal loginModal fade" id="loginModal{{ $single_item->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
                  <form>
                      <div class="modal-dialog max-w-2xl">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Login</h5>
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
                                  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                      <div class="mb-2 flex items-center justify-between">
                                          <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Email</span>
                                      </div>

                                      <div
                                          class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                          <input
                                          type="email"
                                          name="email"
                                          class="email{{ $single_item->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                          placeholder="Email"
                                          />
                                      </div>
                                      <div class="mb-2 flex items-center justify-between">
                                          <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Password</span>
                                      </div>

                                      <div
                                          class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                          <input
                                          type="password"
                                          name="password"
                                          class="password{{ $single_item->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                          placeholder="Password"
                                          />
                                      </div>
                                      <div class="flex items-center justify-center space-x-4">
                                          <a
                                              data_id="{{ $single_item->id }}"
                                              id='loginFromBid'
                                              style="cursor:pointer"
                                              class="placeBidBtn loginFromBid bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                                              >
                                              {{ __('Login') }}
                                          </a>
                                      </div>

                                    </form>
                              </div>
                              <!-- end body -->
                              <div class="modal-footer">
                                  <div class="flex items-center justify-end mt-4">
                                      <a href="{{ route('register') }}">
                                        Not Registered Yet ?  <b>{{ __('Register Here') }}</b>
                                  </a>
                              </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              @endpush
            </div>
            <!-- end bid -->
          </div>
          <!-- end details -->
        </div>

        <!-- Tabs -->
        <div class="scrollbar-custom mt-14 overflow-x-auto rounded-lg">
          <div class="min-w-fit">
            <!-- Tabs Nav -->
            <ul class="nav nav-tabs flex items-center" role="tablist">

              <!-- Properties -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
                  id="properties-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#properties"
                  type="button"
                  role="tab"
                  aria-controls="properties"
                  aria-selected="true"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="mr-1 h-5 w-5 fill-current"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M6.17 18a3.001 3.001 0 0 1 5.66 0H22v2H11.83a3.001 3.001 0 0 1-5.66 0H2v-2h4.17zm6-7a3.001 3.001 0 0 1 5.66 0H22v2h-4.17a3.001 3.001 0 0 1-5.66 0H2v-2h10.17zm-6-7a3.001 3.001 0 0 1 5.66 0H22v2H11.83a3.001 3.001 0 0 1-5.66 0H2V4h4.17z"
                    />
                  </svg>
                  <span class="font-display text-base font-medium">Properties</span>
                </button>
              </li>

              <!-- Offers -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
                  id="offers-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#offers"
                  type="button"
                  role="tab"
                  aria-controls="offers"
                  aria-selected="false"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="mr-1 h-5 w-5 fill-current"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M8 4h13v2H8V4zm-5-.5h3v3H3v-3zm0 7h3v3H3v-3zm0 7h3v3H3v-3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z"
                    />
                  </svg>
                  <span class="font-display text-base font-medium">Offers</span>
                </button>
              </li>

              <!-- Details -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
                  id="details-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#details"
                  type="button"
                  role="tab"
                  aria-controls="details"
                  aria-selected="false"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="mr-1 h-5 w-5 fill-current"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M20 22H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zm-1-2V4H5v16h14zM7 6h4v4H7V6zm0 6h10v2H7v-2zm0 4h10v2H7v-2zm6-9h4v2h-4V7z"
                    />
                  </svg>
                  <span class="font-display text-base font-medium">Details</span>
                </button>
              </li>

              <!-- Activity -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
                  id="activity-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#activity"
                  type="button"
                  role="tab"
                  aria-controls="activity"
                  aria-selected="false"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="mr-1 h-5 w-5 fill-current"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M11.95 7.95l-1.414 1.414L8 6.828 8 20H6V6.828L3.465 9.364 2.05 7.95 7 3l4.95 4.95zm10 8.1L17 21l-4.95-4.95 1.414-1.414 2.537 2.536L16 4h2v13.172l2.536-2.536 1.414 1.414z"
                    />
                  </svg>
                  <span class="font-display text-base font-medium">Activity</span>
                </button>
              </li>

              <!-- Price History -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
                  id="price-history-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#price-history"
                  type="button"
                  role="tab"
                  aria-controls="price-history"
                  aria-selected="false"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="mr-1 h-5 w-5 fill-current"
                  >
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                      d="M5 3v16h16v2H3V3h2zm15.293 3.293l1.414 1.414L16 13.414l-3-2.999-4.293 4.292-1.414-1.414L13 7.586l3 2.999 4.293-4.292z"
                    />
                  </svg>
                  <span class="font-display text-base font-medium">Price History</span>
                </button>
              </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
              <!-- Offers -->
              <div class="tab-pane fade" id="offers" role="tabpanel" aria-labelledby="offers-tab">
                <div
                  role="table"
                  class="scrollbar-custom dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 grid max-h-72 w-full grid-cols-5 overflow-y-auto rounded-lg rounded-tl-none border bg-white text-sm dark:text-white"
                >
                  <div class="contents" role="row">
                    <div class="dark:bg-jacarta-600 bg-light-base sticky top-0 py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >Price</span
                      >
                    </div>
                    <div class="dark:bg-jacarta-600 bg-light-base sticky top-0 py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >USD Price</span
                      >
                    </div>
                    <div class="dark:bg-jacarta-600 bg-light-base sticky top-0 py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >Floor Difference</span
                      >
                    </div>
                    <div class="dark:bg-jacarta-600 bg-light-base sticky top-0 py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >Expiration</span
                      >
                    </div>
                    <div class="dark:bg-jacarta-600 bg-light-base sticky top-0 py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >From</span
                      >
                    </div>
                  </div>
                  <div class="contents" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">30 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      $90,136.10
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      70% below
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      in 5 months
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">ViviGiallo</a>
                    </div>
                  </div>
                  <div class="contents" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">15.5 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      $45,458.10
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      70% below
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      in 5 months
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">DB96DB</a>
                    </div>
                  </div>
                  <div class="contents" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">0.9 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      $2,347.90
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      98% below
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      in 5 months
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">myc_nc</a>
                    </div>
                  </div>
                  <div class="contents" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">1.2 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      $4,568.40
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      100% below
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      in 6 months
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">MetaRDnA</a>
                    </div>
                  </div>
                  <div class="contents" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">0.5 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      $1,699.10
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      100% below
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      in 6 months
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">Karafuru</a>
                    </div>
                  </div>
                  <div class="contents" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">4.7 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      $13,966.64
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      40% above
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      in 2 months
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">seekortelur</a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Properties -->
              <div class="tab-pane fade show active" id="properties" role="tabpanel" aria-labelledby="properties-tab">
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 rounded-t-2lg rounded-b-2lg rounded-tl-none border bg-white p-6 md:p-10">
                  <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 md:grid-cols-4">
                    @forelse ($single_item->getProperty as $property)
                    <a
                    href="#"
                    class="dark:bg-jacarta-800 dark:border-jacarta-600 bg-light-base rounded-2lg border-jacarta-100 flex flex-col space-y-2 border p-5 text-center transition-shadow hover:shadow-lg"
                    >
                        <span class="text-accent text-sm uppercase">{{ $property->name ?? ''}}</span>
                        <span class="text-jacarta-700 text-base dark:text-white">{{ $property->type ?? ''}}</span>
                        <span class="text-jacarta-400 text-sm">{{ $property->trait ?? '0'}}% have this trait</span>
                    </a>
                    @empty
                    <p style="color: #f6851b">No Property</p>
                    @endforelse
                  </div>

                </div>
              </div>

              <!-- Details -->
              <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 rounded-t-2lg rounded-b-2lg rounded-tl-none border bg-white p-6 md:p-10"
                >
                  <div class="mb-2 flex items-center">
                    <span class="dark:text-jacarta-300 mr-2 min-w-[9rem]">Contract Address:</span>
                    <a href="#" class="text-accent">0x1cBB182322Aee8ce9F4F1f98d7460173ee30Af1F</a>
                  </div>
                  <div class="mb-2 flex items-center">
                    <span class="dark:text-jacarta-300 mr-2 min-w-[9rem]">Token ID:</span>
                    <span
                      class="js-copy-clipboard text-jacarta-700 cursor-pointer select-none dark:text-white"
                      data-tippy-content="Copy"
                      >7714</span
                    >
                  </div>
                  <div class="mb-2 flex items-center">
                    <span class="dark:text-jacarta-300 mr-2 min-w-[9rem]">Token Standard:</span>
                    <span class="text-jacarta-700 dark:text-white">ERC-721</span>
                  </div>
                  <div class="flex items-center">
                    <span class="dark:text-jacarta-300 mr-2 min-w-[9rem]">Blockchain:</span>
                    <span class="text-jacarta-700 dark:text-white">Ethereum</span>
                  </div>
                </div>
              </div>

              <!-- Activity -->
              <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                <!-- Filter -->
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 bg-light-base border border-b-0 px-4 pt-5 pb-2.5"
                >
                  <div class="flex flex-wrap">
                    <button
                      class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M10.9 2.1l9.899 1.415 1.414 9.9-9.192 9.192a1 1 0 0 1-1.414 0l-9.9-9.9a1 1 0 0 1 0-1.414L10.9 2.1zm.707 2.122L3.828 12l8.486 8.485 7.778-7.778-1.06-7.425-7.425-1.06zm2.12 6.364a2 2 0 1 1 2.83-2.829 2 2 0 0 1-2.83 2.829z"
                        ></path>
                      </svg>
                      <span class="text-2xs font-medium">Listing</span>
                    </button>
                    <button
                      class="dark:hover:bg-accent-dark hover:bg-accent-dark bg-accent mr-2.5 mb-2.5 inline-flex items-center rounded-xl border border-transparent px-4 py-3"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="mr-2 h-4 w-4 fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M14 20v2H2v-2h12zM14.586.686l7.778 7.778L20.95 9.88l-1.06-.354L17.413 12l5.657 5.657-1.414 1.414L16 13.414l-2.404 2.404.283 1.132-1.415 1.414-7.778-7.778 1.415-1.414 1.13.282 6.294-6.293-.353-1.06L14.586.686zm.707 3.536l-7.071 7.07 3.535 3.536 7.071-7.07-3.535-3.536z"
                        ></path>
                      </svg>
                      <span class="text-2xs font-medium text-white">Bids</span>
                    </button>
                    <button
                      class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M16.05 12.05L21 17l-4.95 4.95-1.414-1.414 2.536-2.537L4 18v-2h13.172l-2.536-2.536 1.414-1.414zm-8.1-10l1.414 1.414L6.828 6 20 6v2H6.828l2.536 2.536L7.95 11.95 3 7l4.95-4.95z"
                        ></path>
                      </svg>
                      <span class="text-2xs font-medium">Transfers</span>
                    </button>
                    <button
                      class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z"
                        ></path>
                      </svg>
                      <span class="text-2xs font-medium">Sales</span>
                    </button>
                  </div>
                </div>

                <div
                  role="table"
                  class="scrollbar-custom dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 max-h-72 w-full overflow-y-auto rounded-lg rounded-tl-none border bg-white text-sm dark:text-white"
                >
                  <div class="dark:bg-jacarta-600 bg-light-base sticky top-0 flex" role="row">
                    <div class="w-[17%] py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >Event</span
                      >
                    </div>
                    <div class="w-[17%] py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >Price</span
                      >
                    </div>
                    <div class="w-[22%] py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >From</span
                      >
                    </div>
                    <div class="w-[22%] py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >To</span
                      >
                    </div>
                    <div class="w-[22%] py-2 px-4" role="columnheader">
                      <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                        >Date</span
                      >
                    </div>
                  </div>
                  <div class="flex" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[17%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M14 20v2H2v-2h12zM14.586.686l7.778 7.778L20.95 9.88l-1.06-.354L17.413 12l5.657 5.657-1.414 1.414L16 13.414l-2.404 2.404.283 1.132-1.415 1.414-7.778-7.778 1.415-1.414 1.13.282 6.294-6.293-.353-1.06L14.586.686zm.707 3.536l-7.071 7.07 3.535 3.536 7.071-7.07-3.535-3.536z"
                        ></path>
                      </svg>
                      Bid
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[17%] items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">30 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">AD496A</a>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">Polymorph: MORPH Token</a>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a
                        href="#"
                        class="text-accent flex flex-wrap items-center"
                        target="_blank"
                        rel="nofollow noopener"
                        title="Opens in a new window"
                        data-tippy-content="March 13 2022, 2:32 pm"
                      >
                        <span class="mr-1">19 days ago</span>
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="h-4 w-4 fill-current"
                        >
                          <path fill="none" d="M0 0h24v24H0z" />
                          <path
                            d="M10 6v2H5v11h11v-5h2v6a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h6zm11-3v8h-2V6.413l-7.793 7.794-1.414-1.414L17.585 5H13V3h8z"
                          />
                        </svg>
                      </a>
                    </div>
                  </div>
                  <div class="flex" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[17%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M16.05 12.05L21 17l-4.95 4.95-1.414-1.414 2.536-2.537L4 18v-2h13.172l-2.536-2.536 1.414-1.414zm-8.1-10l1.414 1.414L6.828 6 20 6v2H6.828l2.536 2.536L7.95 11.95 3 7l4.95-4.95z"
                        ></path>
                      </svg>
                      Transfer
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[17%] items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">.00510 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">The_vikk</a>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">Polymorph: MORPH Token</a>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="dark:text-jacarta-300 mr-1">16 days ago</span>
                    </div>
                  </div>
                  <div class="flex" role="row">
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[17%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z"
                        ></path>
                      </svg>
                      Sale
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[17%] items-center whitespace-nowrap border-t py-4 px-4"
                      role="cell"
                    >
                      <span class="-ml-1" data-tippy-content="ETH">
                        <svg
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          x="0"
                          y="0"
                          viewBox="0 0 1920 1920"
                          xml:space="preserve"
                          class="mr-1 h-4 w-4"
                        >
                          <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                          <path
                            fill="#62688F"
                            d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                          ></path>
                          <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                          <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                          <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg>
                      </span>
                      <span class="text-green text-sm font-medium tracking-tight">1.50 ETH</span>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">CryptoGuysNFT</a>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a href="#" class="text-accent">Polymorph: MORPH Token</a>
                    </div>
                    <div
                      class="dark:border-jacarta-600 border-jacarta-100 flex w-[22%] items-center border-t py-4 px-4"
                      role="cell"
                    >
                      <a
                        href="#"
                        class="text-accent flex flex-wrap items-center"
                        target="_blank"
                        rel="nofollow noopener"
                        title="Opens in a new window"
                        data-tippy-content="March 13 2022, 2:32 pm"
                      >
                        <span class="mr-1">19 days ago</span>
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="h-4 w-4 fill-current"
                        >
                          <path fill="none" d="M0 0h24v24H0z" />
                          <path
                            d="M10 6v2H5v11h11v-5h2v6a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h6zm11-3v8h-2V6.413l-7.793 7.794-1.414-1.414L17.585 5H13V3h8z"
                          />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Price History -->
              <div class="tab-pane fade" id="price-history" role="tabpanel" aria-labelledby="price-history-tab">
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 rounded-t-2lg rounded-b-2lg rounded-tl-none border bg-white p-6"
                >
                  <!-- Period / Stats -->
                  <div class="mb-10 flex flex-wrap items-center">
                    <select
                      class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 mr-8 min-w-[12rem] rounded-lg py-3.5 text-sm dark:text-white"
                    >
                      <option value="7-days">Last 7 Days</option>
                      <option value="14-days">Last 14 Days</option>
                      <option value="30-days">Last 30 Days</option>
                      <option value="60-days">Last 60 Days</option>
                      <option value="90-days" selected>Last 90 Days</option>
                      <option value="last-year">Last Year</option>
                      <option value="all-time">All Time</option>
                    </select>

                    <div class="py-2">
                      <span class="mr-4 inline-block align-middle">
                        <span class="block text-sm font-bold dark:text-white">90 Day Avg. Price:</span>
                        <span class="text-green block text-sm font-bold">Ξ7.0633</span>
                      </span>

                      <span class="inline-block align-middle">
                        <span class="block text-sm font-bold dark:text-white">90 Day Volume:</span>
                        <span class="text-green block text-sm font-bold">Ξ24,085.6957</span>
                      </span>
                    </div>
                  </div>

                  <!-- Chart -->
                  <div class="chart-container relative h-80 w-full">
                    <canvas id="activityChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- end tab content -->
          </div>
        </div>
        <!-- end tabs -->
      </div>
    </section>
    <!-- end item -->

    <!-- Related -->
    <section class="dark:bg-jacarta-800 bg-light-base py-24">
      <div class="container">
        <h2 class="font-display text-jacarta-700 mb-8 text-center text-3xl dark:text-white">
          {{ __('More from this collection') }}
        </h2>

        <div class="relative">
          <!-- Slider -->
          <div class="swiper card-slider-4-columns !py-5">
            <div class="swiper-wrapper">
              <!-- Slides -->
              @forelse ($related_items as $related)
              <div class="swiper-slide">
                <article>
                  <div
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                  >
                    <figure>
                      <a href="{{ route('item_details', $related->slug) }}">
                        <img
                          src="{{ asset('uploads/items') }}/{{ $related->image }}"
                          alt="item 1" style="height: 230px"
                          class="w-full rounded-[0.625rem]"
                          loading="lazy"
                        />
                      </a>
                    </figure>
                    <div class="mt-4 flex items-center justify-between">
                      <a href="{{ route('item_details', $related->slug) }}">
                        <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                          >{{ $related->name }}</span
                        >
                      </a>
                      <span
                        class="dark:border-jacarta-600 border-jacarta-100 flex items-center whitespace-nowrap rounded-md border py-1 px-2"
                      >
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
                            <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z" />
                            <path
                              fill="#62688F"
                              d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                            />
                            <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z" />
                            <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z" />
                            <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z" />
                          </svg>
                        </span>
                        <span class="text-green text-sm font-medium tracking-tight">{{ $related->price }} {{ $single_item->blockchain }}</span>
                      </span>
                    </div>
                    @php
                        $latest_bid = App\Models\PlaceBid::where('item_id',$related->id)->latest('id')->first();
                    @endphp
                    <div class="mt-2 text-sm">
                      <span class="dark:text-jacarta-300">Current Bid:</span>
                      <span class="dark:text-jacarta-100 text-jacarta-700">@if ($latest_bid) {{ $latest_bid->bid_amount }} @else 0 @endif {{ $single_item->blockchain }}</span>
                    </div>

                    <div class="mt-8 flex items-center justify-between">
                      <button
                        type="button"
                        class="text-accent font-display text-sm font-semibold"
                        data-bs-toggle="modal"
                        data-bs-target="#placeBidModal_{{ $related->id }}"
                      >
                        Place bid
                      </button>

                      <div class="flex items-center space-x-1">
                        @php
                            $like_exist = App\Models\Like::where('item_id', $related->id)->where('user_id',Auth::id())->first();
                            $like_count = App\Models\Like::where('item_id', $related->id)->count();
                        @endphp
                        @if(Auth::check())
                        <a style="cursor: pointer" class="like_btn" item_id="{{ $related->id }}">
                            <span class="like_icon{{ $related->id }}">
                                @if($like_exist)
                                <i class="fa fa-heart"></i>
                                @else
                                <i class="fa-regular fa-heart"></i>
                                @endif
                            </span>
                        </a>
                        <span class="dark:text-jacarta-200 text-sm likeCount{{ $related->id }}">{{ $like_count }}</span>
                        @else
                        <a style="cursor: pointer"
                        data-bs-toggle="modal"
                        data-bs-target="#loginModal{{ $related->id }}">
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                        </a>
                        <span class="dark:text-jacarta-200 text-sm">{{ $like_count }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </article>
              </div>

                @php
                    $latest_bid = App\Models\PlaceBid::where('item_id',$related->id)->latest('id')->first();
                @endphp

                @push('modals')
                 <!-- Place Bid Modal -->
                <div class="modal testModal fade" id="placeBidModal_{{ $related->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
                    <form>
                        <div class="modal-dialog max-w-2xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="placeBidLabel">Place a bid</h5>
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
                                        <div>
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Current Bid: </span>{{ $latest_bid->bid_amount ?? '0' }}
                                        </div>
                                        <div
                                            class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border"
                                        >
                                            <div class="border-jacarta-100 bg-jacarta-50 flex flex-1 items-center self-stretch border-r px-2">
                                            <span>
                                                <svg
                                                version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                x="0"
                                                y="0"
                                                viewBox="0 0 1920 1920"
                                                xml:space="preserve"
                                                class="mr-1 h-5 w-5"
                                                >
                                                <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                                                <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                                                <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                                                <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                                                <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                                                </svg>
                                            </span>
                                            <span class="font-display text-jacarta-700 text-sm">ETH</span>
                                            </div>
                                            <input type="hidden" class="item_id{{ $related->id }}" name="item_id" value="{{ $related->id }}">
                                            <input
                                            type="text" name="bid_amount"
                                            class="bid_amount{{ $related->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                            placeholder="Amount"
                                            />
                                            <div class="bg-jacarta-50 border-jacarta-100 flex flex-1 justify-end self-stretch border-l">
                                                <span class="self-center px-2 text-sm">${{ $related->price }}</span>
                                            </div>
                                        </div>

                                        <!-- Terms -->
                                        @auth
                                        @else
                                        <h3 style="color: red">Please
                                            <a

                                                style="color: blue; cursor:pointer"
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal{{ $related->id }}"
                                             >
                                             Login
                                            </a>
                                             First
                                            </h3>
                                        @endauth
                                        <div class="mt-4 flex items-center space-x-2">
                                            <input
                                            type="checkbox"
                                            name="check"
                                            class="terms checked:bg-accent dark:bg-jacarta-600 text-accent border-jacarta-200 focus:ring-accent/20 dark:border-jacarta-500 h-5 w-5 self-start rounded focus:ring-offset-0"
                                            />
                                            <label for="terms" class="dark:text-jacarta-200 text-sm"
                                            >By checking this box, I agree to Xhibiter's <a href="{{ route('terms_of_services') }}" class="text-accent">Terms of Service</a></label
                                            >
                                        </div>
                                        <div class="checkBoxError"></div>
                                    </div>
                                <!-- end body -->

                                <div class="modal-footer">
                                    @auth
                                    <div class="flex items-center justify-center space-x-4">
                                        <a
                                            data-id="{{ $related->id }}"
                                            style="cursor:pointer"
                                            class="placeBidBtn bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                                            >
                                            {{ __('Place Bid') }}
                                        </a>
                                    </div>
                                    @else
                                    <div class="flex items-center justify-center space-x-4">
                                        <a

                                            style="cursor:pointer"
                                            data-bs-toggle="modal"
                                            data-bs-target="#loginModal{{ $related->id }}"
                                            class=" bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                                            >
                                            {{ __('Place Bid') }}
                                        </a>
                                    </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endpush

                {{-- login modal --}}
                @push('modals')
                <div class="modal loginModal fade" id="loginModal{{ $related->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
                    <form>
                        <div class="modal-dialog max-w-2xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Login</h5>
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
                                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                        <div class="mb-2 flex items-center justify-between">
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Email</span>
                                        </div>

                                        <div
                                            class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                            <input
                                            type="email"
                                            name="email"
                                            class="email{{ $related->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                            placeholder="Email"
                                            />
                                        </div>
                                        <div class="mb-2 flex items-center justify-between">
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Password</span>
                                        </div>

                                        <div
                                            class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                            <input
                                            type="password"
                                            name="password"
                                            class="password{{ $related->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                            placeholder="Password"
                                            />
                                        </div>
                                        <div class="flex items-center justify-center space-x-4">
                                            <a
                                                data_id="{{ $related->id }}"
                                                id='loginFromBid'
                                                style="cursor:pointer"
                                                class="placeBidBtn loginFromBid bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                                                >
                                                {{ __('Login') }}
                                            </a>
                                        </div>

                                        </form>
                                </div>
                                <!-- end body -->
                                <div class="modal-footer">
                                    <div class="flex items-center justify-end mt-4">
                                        <a href="{{ route('register') }}">
                                            Not Registered Yet ?  <b>{{ __('Register Here') }}</b>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endpush

              @empty
              <div><span style="color:red;">No Items Available</span></div>
              @endforelse
            </div>
          </div>

          <!-- Slider Navigation -->
          <div
            class="group swiper-button-prev shadow-white-volume absolute top-1/2 -left-4 z-10 -mt-6 flex h-12 w-12 cursor-pointer items-center justify-center rounded-full bg-white p-3 text-base sm:-left-6"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="fill-jacarta-700 group-hover:fill-accent"
            >
              <path fill="none" d="M0 0h24v24H0z" />
              <path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z" />
            </svg>
          </div>
          <div
            class="group swiper-button-next shadow-white-volume absolute top-1/2 -right-4 z-10 -mt-6 flex h-12 w-12 cursor-pointer items-center justify-center rounded-full bg-white p-3 text-base sm:-right-6"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="fill-jacarta-700 group-hover:fill-accent"
            >
              <path fill="none" d="M0 0h24v24H0z" />
              <path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z" />
            </svg>
          </div>
        </div>
      </div>
    </section>
    <!-- end related -->
  </main>

  <!-- Wallet Modal -->
  <div class="modal fade testModal" id="walletModal" tabindex="-1" aria-labelledby="walletModalLabel" aria-hidden="true">
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
  <div class="modal fade testModal" id="buyNowModal" tabindex="-1" aria-labelledby="buyNowModalLabel" aria-hidden="true">
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
              <a href="#" class="text-accent text-sm">Elon Musk #709</a>
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
              >{{ __("By checking this box, I agree to Xhibiter's") }} <a href="#" class="text-accent">{{ __("Terms of Service") }}</a></label
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
              {{ __('Confirm Checkout') }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')

    <script>
        $(document).ready(function(){
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
                        // console.log(response)
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
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.placeBidBtn').on('click', function (){
                let data_id = $(this).attr('data-id');
                let item_id = $('.item_id'+data_id).val();
                let bid_amount = $('.bid_amount'+data_id).val();
                // alert(item_id);
                if ($('.terms').is(":checked")){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('place_bid.store') }}",
                        type: "POST",
                        data: {
                            item_id: item_id,
                            bid_amount: bid_amount,
                        },
                        success: function(response){
                            console.log(response)
                            if(response.status == 500){
                                alertify.set('notifier','position', 'top-right');
                                alertify.error(response.message);
                            }else{
                                if(response.status == 400){
                                    alertify.set('notifier','position', 'top-right');
                                    alertify.error(response.message);
                                }else{
                                    alertify.set('notifier','position', 'top-right');
                                    alertify.success(response.message);
                                    $(".checkBoxError").html("");
                                    $('.bid_amount').val('');
                                    $('.testModal').modal('hide');
                                    location.reload();
                                }
                            }
                        },
                        error: function(reject){
                            alertify.set('notifier','position', 'top-right');
                            alertify.error(reject.responseJSON.errors.bid_amount[0]);
                        },
                    });
                }else{
                    $(".checkBoxError").html("<p class='mt-2' style='color:red'>Please Check The Box</p>");
                }
            });
        });
    </script>

    <script>
        $('#refreshMetadata').on('click', function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('refresh_metadata') }}",
                type: "GET",
                success: function(response){
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(response.message);
                },
            });
        });
    </script>

    <script>
        $(document).ready(function () {
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
                        // console.log(response)
                        $('.loginModal').modal('hide');
                        location.reload();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.submitReport').on('click', function (){
                // let data_id = $(this).attr('data-id');
                let item_id = $('.item_id').val();
                let user_id = $('.user_id').val();
                let report_id = $('.report_id').val();
                // alert(report_id);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('ItemReport.problemStore') }}",
                        type: "POST",
                        data: {
                            item_id: item_id,
                            user_id: user_id,
                            report_id: report_id,
                        },
                        success: function(response){
                            // console.log(response)
                            if(response.status==200){
                                alertify.set('notifier','position', 'top-right');
                                alertify.success(response.message);
                                location.reload()
                            }else{
                                alertify.set('notifier','position', 'top-right');
                                alertify.error(response.message);
                            }
                        },
                    });
            });
        });
    </script>

@endsection
