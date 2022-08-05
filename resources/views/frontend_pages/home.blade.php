@extends('layouts.app')

@push('css')
    <style>
        .categories-list__item .active{
            transition-duration: .15s;
            transition-property: color,background-color,border-color,text-decoration-color,fill,stroke,-webkit-text-decoration-color;
            transition-timing-function: cubic-bezier(.4,0,.2,1);
            --tw-text-opacity: 1;
            color: rgba(19,23,64,var(--tw-text-opacity));
            font-weight: 600;
            font-size: .875rem;
            line-height: normal;
            font-family: CalSans-SemiBold,sans-serif;
            padding-left: 1rem;
            padding-right: 1rem;
            --tw-bg-opacity: 1;
            background-color: rgba(231,232,236,var(--tw-bg-opacity));
            border-radius: 0.5rem;
            justify-content: center;
            align-items: center;
            height: 2.25rem;
            display: flex;
            text-decoration: inherit;
            border-width: 1px;
        }

        .dropdown .dropdown-item.active{
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%238358ff' class='bi bi-check-lg' viewBox='0 0 16 16'%3E%3Cpath d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z'/%3E%3C/svg%3E");
            background-repeat: no-repeat no-repeat;
            background-position: 90% center;
            background-size: 18px;
        }

        html:not(.dark) .dropdown .dropdown-item.active{
            color: rgb(19 23 64/var(--tw-text-opacity));
        }
    </style>
@endpush

@section('content')

<main>
    <!-- Hero -->
    <section class="relative pb-10 pt-20 md:pt-32 lg:h-[88vh]">
      <picture class="pointer-events-none absolute inset-x-0 top-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient.jpg" alt="gradient" />
      </picture>
      <picture class="pointer-events-none absolute inset-x-0 top-0 -z-10 hidden dark:block">
        <img src="{{ asset('frontend_assets') }}/img/gradient_dark.jpg" alt="gradient dark" />
      </picture>

      <div class="container h-full">
        <div class="grid h-full items-center gap-4 md:grid-cols-12">
          <div class="col-span-6 flex h-full flex-col items-center justify-center py-10 md:items-start md:py-20 xl:col-span-4" >
            <h1
              class="text-jacarta-700 font-display mb-6 text-center text-5xl dark:text-white md:text-left lg:text-6xl xl:text-7xl" >
              {{ $banner->title }}
            </h1>
            <p class="dark:text-jacarta-200 mb-8 text-center text-lg md:text-left">
              {{ $banner->sub_title }}
            </p>
            <div class="flex space-x-4">
              @auth
              <a href="{{ route($banner->btn1_url) }}"
                class="bg-accent shadow-accent-volume hover:bg-accent-dark w-36 rounded-full py-3 px-8 text-center font-semibold text-white transition-all" >
                {{ $banner->btn1_text }}
              </a>
              @else
              <a style="cursor:pointer"
                data-bs-toggle="modal"
                data-bs-target="#loginFromBannerModal"
                class="bg-accent shadow-accent-volume hover:bg-accent-dark w-36 rounded-full py-3 px-8 text-center font-semibold text-white transition-all" >
                {{ $banner->btn1_text }}
              </a>
              @endauth
              <a href="{{ route($banner->btn2_url) }}"
                class="text-accent shadow-white-volume hover:bg-accent-dark hover:shadow-accent-volume w-36 rounded-full bg-white py-3 px-8 text-center font-semibold transition-all hover:text-white" >
                {{ $banner->btn2_text }}
              </a>
            </div>
          </div>
          {{-- login from banner modal --}}
          @push('modals')
          <div class="modal fade" id="loginFromBannerModal" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
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
                                  class="fill-jacarta-700 h-6 w-6 dark:fill-white" >
                                  <path fill="none" d="M0 0h24v24H0z" />
                                  <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
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
                                      class="loginFromBannerEmail email focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
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
                                      id="loginFromBannerPassword"
                                      class="loginFromBannerPassword focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                      placeholder="Password"
                                      />
                                  </div>
                                  <span id="errorPass"></span>
                                  <div class="flex items-center justify-center space-x-4">
                                      <a
                                          style="cursor:pointer"
                                          class="loginFromBannerModal bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
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
          <!-- Hero image -->
          <div class="col-span-6 xl:col-span-8">
            <div class="relative text-center md:pl-8 md:text-right">
              <svg
                viewbox="0 0 200 200"
                xmlns="http://www.w3.org/2000/svg"
                class="mt-8 inline-block w-72 rotate-[8deg] sm:w-full lg:w-[24rem] xl:w-[35rem]"
              >
                <defs>
                  <clipPath id="clipping" clipPathUnits="userSpaceOnUse">
                    <path
                      d="
                  M 0, 100
                  C 0, 17.000000000000004 17.000000000000004, 0 100, 0
                  S 200, 17.000000000000004 200, 100
                      183, 200 100, 200
                      0, 183 0, 100
              "
                      fill="#9446ED"
                    ></path>
                  </clipPath>
                </defs>
                <g clip-path="url(#clipping)">
                  <!-- Bg image -->
                  <image href="{{ asset('uploads/images/banner') }}/{{ $banner->image }}" width="200" height="200" clip-path="url(#clipping)" />
                </g>
              </svg>
              <img src="{{ asset('frontend_assets') }}/img/hero/3D_elements.png" alt="" class="animate-fly absolute top-0 md:-right-[10%]" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end hero -->

    <!-- Hot Bids -->
    <section class="pt-10 pb-24">
      <div class="container">
        <h2 class="font-display text-jacarta-700 mb-8 text-center text-3xl dark:text-white">
          <span
            class="mr-1 inline-block h-6 w-6 bg-contain bg-center text-xl"
            style="
              background-image: url(https://cdn.jsdelivr.net/npm/emoji-datasource-apple@7.0.2/img/apple/64/1f525.png);
            "
          ></span>
          Hot Bids
        </h2>

        <div class="relative">
          <!-- Slider -->
          <div class="swiper card-slider-4-columns !py-5">
            <div class="swiper-wrapper">
              <!-- Slides -->
              @foreach ($latest_items as $latest)

                @php
                    $latest_bid = App\Models\PlaceBid::where('item_id',$latest->id)->latest('id')->first();
                @endphp

              <div class="swiper-slide">
                <article>
                  <div
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                  >
                    <figure>
                      <a href="{{ route('item_details', $latest->slug) }}">
                        <img
                          src="{{ asset('uploads/items') }}/{{ $latest->image }}"
                          alt="item 1"
                          width="230"
                          height="230"
                          class="w-full rounded-[0.625rem]"
                          loading="lazy" style="height: 230px"
                        />
                      </a>
                    </figure>
                    <div class="mt-4 flex items-center justify-between">
                      <a href="{{ route('item_details', $latest->slug) }}">
                        <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                          >{{ $latest->name }}</span
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
                        <span class="text-green text-sm font-medium tracking-tight">{{ $latest->price }} {{ $latest->blockchain }}</span>
                      </span>
                    </div>
                    <div class="mt-2 text-sm">
                        <span class="dark:text-jacarta-300 mr-2">Current Bid:</span>
                        <span class="dark:text-jacarta-100 text-jacarta-700"> {{ $latest_bid->bid_amount ?? "0" }} {{ $latest->blockchain }}</span>
                      </div>

                    <div class="mt-8 flex items-center justify-between">
                        @if ($latest->creator_id != Auth::id())
                        <button
                          type="button"
                          class="text-accent font-display text-sm font-semibold"
                          data-bs-toggle="modal"
                          data-bs-target="#placeBidModal_{{ $latest->id }}"
                        >
                          Place bid
                        </button>
                        @endif

                      <!-- Likes / Actions -->
                        @php
                            $like_exist = App\Models\Like::where('item_id', $latest->id)->where('user_id',Auth::id())->first();
                            $like_count = App\Models\Like::where('item_id', $latest->id)->count();
                        @endphp
                        <div class="ml-auto flex space-x-2">
                            @if (Auth::check())
                            <div class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 flex items-center space-x-1 rounded-xl border bg-white py-2 px-4">
                                <a style="cursor: pointer" class="like_btn" item_id="{{ $latest->id }}">
                                    <span class="like_icon{{ $latest->id }}">
                                        @if($like_exist)
                                        <i class="fa fa-heart"></i>
                                        @else
                                        <i class="fa-regular fa-heart"></i>
                                        @endif
                                    </span>
                                </a>
                                <span class="dark:text-jacarta-200 text-sm likeCount{{ $latest->id }}">{{ $like_count }}</span>
                            </div>
                            @else
                            <div class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 flex items-center space-x-1 rounded-xl border bg-white py-2 px-4">
                                <a
                                    style="cursor: pointer"
                                    data-bs-toggle="modal"
                                    data-bs-target="#loginModal{{ $latest->id }}">
                                    <span>
                                        <i class="fa-regular fa-heart"></i>
                                    </span>
                                </a>
                                <span class="dark:text-jacarta-200 text-sm">{{ $like_count }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                  </div>
                </article>
              </div>


                @push('modals')
                 <!-- Place Bid Modal -->
                <div class="modal testModal fade" id="placeBidModal_{{ $latest->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
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
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Current Bid: </span>{{ $latest_bid->bid_amount ?? '' }}
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
                                            <input type="hidden" class="item_id{{ $latest->id }}" name="item_id" value="{{ $latest->id }}">
                                            <input
                                            type="text" name="bid_amount"
                                            class="bid_amount{{ $latest->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                            placeholder="Amount"
                                            />
                                            <div class="bg-jacarta-50 border-jacarta-100 flex flex-1 justify-end self-stretch border-l">
                                                <span class="self-center px-2 text-sm">${{ $latest->price }}</span>
                                            </div>
                                        </div>

                                        <!-- Terms -->
                                        @auth
                                        @else
                                        <h3 style="color: red">Please
                                            <a style="color: blue; cursor:pointer"
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal{{ $latest->id }}" > Login
                                            </a> First
                                        </h3>
                                        @endauth
                                        <div class="mt-4 flex items-center space-x-2">
                                            <input type="checkbox"
                                            name="check"
                                            class="terms checked:bg-accent dark:bg-jacarta-600 text-accent border-jacarta-200 focus:ring-accent/20 dark:border-jacarta-500 h-5 w-5 self-start rounded focus:ring-offset-0" />
                                            <label for="terms" class="dark:text-jacarta-200 text-sm">By checking this box, I agree to Xhibiter's <a href="{{ route('terms_of_services') }}" class="text-accent">Terms of Service</a>
                                            </label>
                                        </div>
                                        <div class="checkBoxError"></div>
                                    </div>
                                <!-- end body -->

                                <div class="modal-footer">
                                    @auth
                                    <div class="flex items-center justify-center space-x-4">
                                        <a data-id="{{ $latest->id }}"
                                            style="cursor:pointer"
                                            class="placeBidBtn bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all" >
                                            {{ __('Place Bid') }}
                                        </a>
                                    </div>
                                    @else
                                    <div class="flex items-center justify-center space-x-4">
                                        <a style="cursor:pointer"
                                            data-bs-toggle="modal"
                                            data-bs-target="#loginModal{{ $latest->id }}"
                                            class=" bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all" >
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

                @push('modals')
                <div class="modal loginModal fade" id="loginModal{{ $latest->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
                    <form>
                        <div class="modal-dialog max-w-2xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Login</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                        class="fill-jacarta-700 h-6 w-6 dark:fill-white" >
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Body -->
                                <div class="modal-body p-6">
                                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                        <div class="mb-2 flex items-center justify-between">
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Email</span>
                                        </div>

                                        <div class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                            <input type="email" name="email" class="email{{ $latest->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset" placeholder="Email" />
                                        </div>
                                        <div class="mb-2 flex items-center justify-between">
                                            <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Password</span>
                                        </div>

                                        <div class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                            <input type="password" name="password" data-id="{{ $latest->id }}" class="login__Input password{{ $latest->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset" placeholder="Password" />
                                        </div>
                                        <span id="errorPass"></span>
                                        <div class="flex items-center justify-center space-x-4">
                                            <a data_id="{{ $latest->id }}"
                                                id='loginFromBid'
                                                style="cursor:pointer"
                                                class="placeBidBtn loginFromBid loginFrom__Bid{{ $latest->id }} bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all" >
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
              @endforeach
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
    <!-- end hot bids -->

    <!-- Top Collections -->
    <section class="dark:bg-jacarta-800 relative py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full" />
      </picture>
      <div class="container">
        <div class="font-display text-jacarta-700 mb-12 text-center text-3xl dark:text-white">
          <h2 class="inline">
            {{ $homeTitle->collection_title }}
          </h2>
          <div class="dropdown inline cursor-pointer">
            <button class="dropdown-toggle text-accent inline-flex items-center dropdown-toggle__text"
              type="button"
              id="collectionSort"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              All
              <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="fill-accent h-8 w-8" >
                <path fill="none" d="M0 0h24v24H0z" />
                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
              </svg>
            </button>
            <div class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
              aria-labelledby="collectionSort">
              <a class="search_by_last dropdown-item dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block rounded-xl px-5 py-2 text-sm transition-colors" day="1" >Last 24 Hours</a>
              <a class="search_by_last dropdown-item dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block rounded-xl px-5 py-2 text-sm transition-colors" day="7" >Last 7 Days</a>
              <a class="search_by_last dropdown-item dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block rounded-xl px-5 py-2 text-sm transition-colors" day="30" >Last 30 Days</a>
            </div>
          </div>
        </div>


    <div id="filtered_data" class="grid grid-cols-1 gap-3 md:grid-cols-2 md:gap-[1.875rem] lg:grid-cols-3">

        @include('frontend_pages.resources.searchByDay')

    </div>
    <div class="mt-10 text-center">
    <a
        href="#"
        class="bg-accent shadow-accent-volume hover:bg-accent-dark inline-block rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
        >Go to Rankings</a
    >
    </div>
    </div>
    </section>
    <!-- end top collections -->

    <!-- Trending Categories -->
    <section class="py-24">
      <div class="container">
        <h2 class="font-display text-jacarta-700 mb-8 text-center text-3xl dark:text-white">
          <span
            class="mr-1 inline-block h-6 w-6 bg-contain bg-center text-xl"
            style="
              background-image: url(https://cdn.jsdelivr.net/npm/emoji-datasource-apple@7.0.2/img/apple/64/26a1.png);
            "
          ></span>
          {{ $homeTitle->category_title }}
        </h2>

        <!-- Filter -->
        <div class="mb-8 flex flex-wrap items-center justify-between">
          <ul class="flex flex-wrap items-center categories-list">
            <li class="my-1 mr-2.5 categories-list__item">
              <a style="cursor: pointer" id="allItems" cat-id="all"
                class="filter__active active dark:border-jacarta-600 dark:bg-jacarta-900 dark:hover:bg-accent group hover:bg-accent border-jacarta-100 font-display text-jacarta-500 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent dark:hover:text-white active chech_active"
                >All</a
              >
            </li>
            @foreach (nftCategories() as $cat)
              <li class="my-1 mr-2.5 categories-list__item">
                <a style="cursor:pointer" cat-id="{{ $cat->id }}" class="filter__active filterByCategory dark:border-jacarta-600 dark:bg-jacarta-900  dark:hover:bg-accent group hover:bg-accent border-jacarta-100 font-display text-jacarta-500 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent dark:hover:text-white chech_active">
                  <span class="mr-2">{!! $cat->icon !!}</span>
                  <span>{{ $cat->name }}</span>
                </a>
              </li>
              @endforeach
          </ul>
          <div class="dropdown my-1 cursor-pointer">
            <div class=" dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 inline-flex w-48 items-center justify-between rounded-lg border bg-white py-2 px-3 text-sm dark:text-white" role="button" id="categoriesSort" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="font-display sort_by__text">Sort By</span>
              <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="fill-jacarta-500 h-4 w-4 dark:fill-white">
                <path fill="none" d="M0 0h24v24H0z" />
                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
              </svg>
            </div>

            <div class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl" aria-labelledby="categoriesSort">
              <button class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white sort__text" id="RecentlyAdded">
                Recently Added
              </button>
              <button class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white sort__text" id="LowToHigh">
                Price: Low to High
              </button>

              <button class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white sort__text" id="HighToLow">
                Price: High to Low
              </button>

              {{-- <button
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                Auction ending soon
              </button>
              <span class="font-display text-jacarta-300 block px-5 py-2 text-sm font-semibold">Options</span>
              <div
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                <span class="flex items-center justify-between">
                  <span>Verified Only</span>
                  <input
                    type="checkbox"
                    value="checkbox"
                    name="check"
                    checked
                    class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none shadow-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"/>
                </span>
              </div>
              <div
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                <span class="flex items-center justify-between">
                  <span>NFSW Only</span>
                  <input
                    type="checkbox"
                    value="checkbox"
                    name="check"
                    class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none shadow-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"/>
                </span>
              </div>
              <div
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
                <span class="flex items-center justify-between">
                  <span>Show Lazy Minted</span>
                  <input
                    type="checkbox"
                    value="checkbox"
                    name="check"
                    class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-4 w-7 cursor-pointer appearance-none rounded-lg border-none shadow-none after:absolute after:top-0.5 after:left-0.5 after:h-3 after:w-3 after:rounded-full after:transition-all checked:bg-none checked:after:left-3.5 checked:after:bg-white focus:ring-transparent focus:ring-offset-0"/>
                </span>
              </div> --}}
            </div>
          </div>
        </div>

        <!-- Grid -->
        <div id="filterByCategory" class="grid grid-cols-1 gap-[1.875rem] md:grid-cols-2 lg:grid-cols-4">

          @include('frontend_pages.resources.filterByCategory')

        </div>
      </div>
    </section>
    <!-- end trending categories -->

    <!-- Process / Newsletter -->
    <section class="dark:bg-jacarta-800 relative py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full" />
      </picture>
      <div class="container">
        <h2 class="font-display text-jacarta-700 mb-16 text-center text-3xl dark:text-white">
            {{ $homeTitle->module_title }}
        </h2>
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
          @foreach ($nftModules as $nftModule)
          <div class="text-center">
            <div class="mb-6 inline-flex rounded-full bg-[#CDBCFF] p-3">
              <div class="bg-accent inline-flex h-12 w-12 items-center justify-center rounded-full">
                <span class="partner-i nftSvgColor module-icon-color"> {!! $nftModule->icon !!}</span>
              </div>
            </div>
            <h3 class="font-display text-jacarta-700 mb-4 text-lg dark:text-white">{{ $nftModule->title }}</h3>
            <p class="dark:text-jacarta-300">
              {{ $nftModule->description }}
            </p>
          </div>
          @endforeach
        </div>

        <p class="text-jacarta-700 mx-auto mt-20 max-w-2xl text-center text-lg dark:text-white">
          {{ $newsletter->meta_title }}
        </p>

        <div class="mx-auto mt-7 max-w-md text-center">
          <form action="{{ route('subscribe.store') }}" method="POST" class="relative">
            @csrf
            <input
              type="email"
              name="email"
              placeholder="Email address"
              class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 w-full rounded-full border py-3 px-4 dark:text-white dark:placeholder-white"
            />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            <button
              class="hover:bg-accent-dark font-display bg-accent absolute top-2 right-2 rounded-full px-6 py-2 text-sm text-white"
            >
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </section>
    <!-- end process / newsletter -->
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
            <span class="font-display text-jacarta-700 hover:text-accent font-semibold dark:text-white">Total</span>
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
    $(document).ready(function(){

        $('.search_by_last').click(function(){
            let day = $(this).attr('day');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('collections.filter') }}",
                type: "post",
                data: {
                    day: day,
                },
                success: function(data){
                    $('#filtered_data').html(data.data);
                }
            });
        });

        $('.filterByCategory').click(function (){
            $('.filter__active').removeClass('active');
            $(this).addClass('active');
            let cat_id = $(this).attr('cat-id');
            // alert(cat_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('filterByCategory') }}",
                type: "POST",
                data: {
                    cat_id: cat_id,
                },
                success: function(data){
                    $('#filterByCategory').html(data.data);
                    $('#RecentlyAdded').removeClass('active');
                    $('#LowToHigh').removeClass('active');
                    $('#HighToLow').removeClass('active');
                    $(".sort_by__text").text('Sort By');
                },

            });
        });

        $('#allItems').click(function (){
            $('.filter__active').removeClass('active');
            $(this).addClass('active');
            // alert('cat_id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('allItems') }}",
                type: "POST",
                success: function(data){
                    $('#filterByCategory').html(data.data);
                    $('#RecentlyAdded').removeClass('active');
                    $('#LowToHigh').removeClass('active');
                    $('#HighToLow').removeClass('active');
                },

            });
        });

        $('#RecentlyAdded').click(function (){

            let category_id= '';
            $('.chech_active').each(function(){
                if($(this).hasClass('active')){
                    category_id = $(this).attr('cat-id');
                    return false;
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('RecentlyAdded') }}",
                type: "POST",
                data:{
                    category_id:category_id,
                },
                success: function(data){
                    $('#filterByCategory').html(data.data);
                },

            });
        });

        $('#LowToHigh').click(function (){
            let category_id= '';
            $('.chech_active').each(function(){
                if($(this).hasClass('active')){
                    category_id = $(this).attr('cat-id');
                    return false;
                }
            });
            // console.log(category_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('LowToHigh') }}",
                type: "POST",
                data:{
                    category_id:category_id,
                },
                success: function(data){
                    $('#filterByCategory').html(data.data);
                },

            });
        });

        $('#HighToLow').click(function (){

            let category_id= '';
            $('.chech_active').each(function(){
                if($(this).hasClass('active')){
                    category_id = $(this).attr('cat-id');
                    return false;
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('HighToLow') }}",
                type: "POST",
                data: {
                    category_id : category_id,
                },
                success: function(data){
                    $('#filterByCategory').html(data.data);
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
                    // console.log(response.item_id)
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

        $('.placeBidBtn').on('click', function (){
            let data_id    = $(this).attr('data-id');
            let item_id    = $('.item_id'+data_id).val();
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
                        item_id   : item_id,
                        bid_amount: bid_amount,
                    },
                    success: function(response){
                        // console.log(response)
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
                $(".checkBoxError").html("<p class='mt-2' style='color:#fa3232'>Please Check The Box</p>");
            }
        });

        $('.loginFromBid').on('click', function (){
            let data_id = $(this).attr('data_id');
            let email = $('.email'+data_id).val();
            let password = $('.password'+data_id).val();
            if(email == ''){
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please provide valid email");
            }
            if(password == ''){
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please provide valid password");
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
                },
                error: function(){
                    $('#errorPass').html('<p style="color:#fa3232;font-weight:bold">Please provide valid Informaition</p>');
                },
            });
        });

        $(".login__Input").keypress(function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                var id = $(this).attr('data-id');
                $('.loginFrom__Bid'+id).trigger('click');
            }
        });

        $("#loginFromBannerPassword").keypress(function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                $('.loginFromBannerModal').trigger('click');
            }
        });

        $('.loginFromBannerModal').on('click', function (){
            let email = $('.loginFromBannerEmail').val();
            let password = $('.loginFromBannerPassword').val();
            if(email == ''){
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please provide valid email");
            }
            if(password == ''){
                alertify.set('notifier','position', 'top-right');
                alertify.error("Please provide valid password");
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
                    $('#loginFromBannerModal').modal('hide');
                    location.reload();
                },
                error: function(){
                    $('#errorPass').html('<p style="color:#fa3232;font-weight:bold">Please provide valid Informaition</p>');
                },
            });
        });

        $(".dropdown .dropdown-item").on("click", function(){
            $(this).closest(".dropdown").find(".dropdown-toggle__text").text($(this).text());
            $(".dropdown .dropdown-item").removeClass("active");
            $(this).addClass("active");
        });
        $(".sort__text").on("click", function(){
            $('.sort_by__text').text($(this).text());
            $(".sort_by__text").removeClass("active");
            $(this).addClass("active");
        });

        $('.submitReport').on('click', function (){
            let data_id = $(this).attr('data-id');
            let item_id = $('.item_id'+data_id).val();
            let user_id = $('.user_id'+data_id).val();
            let report_id = $('.report_id'+data_id).val();
            // alert(data_id);
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
    });
  </script>

@endsection
