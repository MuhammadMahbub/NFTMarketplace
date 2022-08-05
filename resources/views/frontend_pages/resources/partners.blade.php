@extends('layouts.app')

@section('content')
<main class="pt-[5.5rem] lg:pt-24">
    <!-- Benefits -->
    <section class="relative pt-32 pb-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{asset('frontend_assets/img')}}/gradient.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <picture class="pointer-events-none absolute inset-0 -z-10 hidden dark:block">
        <img src="{{asset('frontend_assets/img')}}/gradient_dark.jpg" alt="gradient dark" class="h-full w-full" />
      </picture>
      <div class="container">
        <div class="mx-auto max-w-xl text-center">
          <h1 class="font-display text-jacarta-700 mb-6 text-center text-4xl font-medium dark:text-white">
            {{ $partnerTitles->title1 }}
          </h1>
          <p class="dark:text-jacarta-200 mb-16 text-lg leading-normal">
            {{ $partnerTitles->description1 }}
          </p>
        </div>

        <div class="grid gap-7 md:grid-cols-3">
          <div
            class="dark:bg-jacarta-800 rounded-2.5xl bg-white p-[3.75rem] text-center transition-shadow hover:shadow-xl"
          >
          <style>

          </style>
            <div class="mb-6 inline-flex rounded-full bg-[#CDBCFF] p-2.5">
              <div style="color: #fff !important;" class="bg-accent inline-flex h-[4.25rem] w-[4.25rem] items-center justify-center rounded-full">
                <span class="partner-i nftSvgColor">{!! $partnerTopSection->icon1 !!}</span>
              </div>
            </div>
            <h3 class="font-display text-jacarta-700 mx-auto mb-4 max-w-[9.625rem] text-lg dark:text-white">
              {{ App\Models\Item::all()->count(); }}{{ $partnerTopSection->text1 }}
            </h3>
          </div>

          <div
            class="dark:bg-jacarta-800 rounded-2.5xl bg-white p-[3.75rem] text-center transition-shadow hover:shadow-xl"
          >
            <div class="mb-6 inline-flex rounded-full bg-[#CDBCFF] p-2.5">
              <div style="color: #fff !important;" class="bg-accent inline-flex h-[4.25rem] w-[4.25rem] items-center justify-center rounded-full">
                <span class="partner-i nftSvgColor">{!! $partnerTopSection->icon2 !!}</span>
              </div>
            </div>
            <h3 class="font-display text-jacarta-700 mx-auto mb-4 max-w-[9.625rem] text-lg dark:text-white">
              {{ $partnerTopSection->text2 }}
            </h3>
          </div>

          <div
            class="dark:bg-jacarta-800 rounded-2.5xl bg-white p-[3.75rem] text-center transition-shadow hover:shadow-xl"
          >
            <div class="mb-6 inline-flex rounded-full bg-[#CDBCFF] p-2.5">
              <div style="color: #fff !important;" class="bg-accent inline-flex h-[4.25rem] w-[4.25rem] items-center justify-center rounded-full">
                <span class="partner-i nftSvgColor">{!! $partnerTopSection->icon3 !!}</span>
              </div>
            </div>
            <h3 class="font-display text-jacarta-700 mx-auto mb-4 max-w-[9.625rem] text-lg dark:text-white">
                {{ App\Models\User::all()->count(); }}{{ $partnerTopSection->text3 }}
            </h3>
          </div>
        </div>
      </div>
    </section>
    <!-- end benefits -->

    <!-- Process -->
    <section class="relative py-24">
      <div class="container">
        <div class="mx-auto mb-20 max-w-xl text-center">
          <h2 class="font-display text-jacarta-700 mb-6 text-center text-3xl font-medium dark:text-white">
            {{ $partnerTitles->title2 }}
          </h2>
          <p class="dark:text-jacarta-300">
            {{ $partnerTitles->description2 }}
          </p>
        </div>

        <div class="grid gap-7 md:grid-cols-3">
          @foreach ($partnerServices as $partnerService)
          <div
            class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 rounded-2.5xl mb-12 border bg-white p-8 pt-0 text-center transition-shadow hover:shadow-xl"
          >
            <div class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 mb-9 -mt-8 inline-flex h-[5.5rem] w-[5.5rem] items-center justify-center rounded-full border bg-white">
                <span class="partner-i">{!! $partnerService->icon !!}</span>
            </div>

            <h3 class="font-display text-jacarta-700 mb-4 text-lg dark:text-white">{{ $partnerService->title }}</h3>
            <p class="dark:text-jacarta-300">
              {{ $partnerService->description }}
            </p>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- end process -->

    <!-- Partner collections / FAQ / ` -->
    <section class="relative py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{asset('frontend_assets/img')}}/gradient_light.jpg" alt="gradient" class="h-full" />
      </picture>
      <div class="container">
        <div class="mx-auto mb-8 max-w-xl text-center">
          <h2 class="font-display text-jacarta-700 mb-6 text-center text-3xl font-medium dark:text-white">
            {{ $partnerTitles->title3 }}
          </h2>
          <p class="dark:text-jacarta-300">
            {{ $partnerTitles->description3 }}
          </p>
        </div>

        <!-- Collections Slider -->
        <div class="relative">
          <!-- Slider -->
          <div class="swiper collections-slider !py-5">
            <div class="swiper-wrapper">
              <!-- Slides -->
              <div class="swiper-slide">
                <article>
                  <div
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                  >
                    <a href="collection.html" class="flex space-x-[0.625rem]">
                      <span class="w-[74.5%]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_1_1.jpg"
                          alt="item 1"
                          class="h-full w-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                      <span class="flex w-1/3 flex-col space-y-[0.625rem]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_1_2.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_1_3.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_1_4.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                    </a>

                    <a
                      href="collection.html"
                      class="font-display hover:text-accent dark:hover:text-accent text-jacarta-700 mt-4 block text-base dark:text-white"
                    >
                      Art Me Outside
                    </a>

                    <div class="mt-2 flex items-center justify-between text-sm font-medium tracking-tight">
                      <div class="flex flex-wrap items-center">
                        <a href="user.html" class="mr-2 shrink-0">
                          <img src="{{asset('frontend_assets/img')}}/avatars/owner_5.png" alt="owner" class="h-5 w-5 rounded-full" />
                        </a>
                        <span class="dark:text-jacarta-400 mr-1">by</span>
                        <a href="user.html" class="text-accent">
                          <span>Wow Frens</span>
                        </a>
                      </div>
                      <span class="dark:text-jacarta-300 text-sm">10K Items</span>
                    </div>
                  </div>
                </article>
              </div>
              <div class="swiper-slide">
                <article>
                  <div
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                  >
                    <a href="collection.html" class="flex space-x-[0.625rem]">
                      <span class="w-[74.5%]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_2_1.jpg"
                          alt="item 1"
                          class="h-full w-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                      <span class="flex w-1/3 flex-col space-y-[0.625rem]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_2_2.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_2_3.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_2_4.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                    </a>

                    <a
                      href="collection.html"
                      class="font-display hover:text-accent dark:hover:text-accent text-jacarta-700 mt-4 block text-base dark:text-white"
                    >
                      PankySkal
                    </a>

                    <div class="mt-2 flex items-center justify-between text-sm font-medium tracking-tight">
                      <div class="flex flex-wrap items-center">
                        <a href="user.html" class="mr-2 shrink-0">
                          <img src="{{asset('frontend_assets/img')}}/avatars/owner_9.png" alt="owner" class="h-5 w-5 rounded-full" />
                        </a>
                        <span class="dark:text-jacarta-400 mr-1">by</span>
                        <a href="user.html" class="text-accent">
                          <span>NFT stars</span>
                        </a>
                      </div>
                      <span class="dark:text-jacarta-300 text-sm">2.8K Items</span>
                    </div>
                  </div>
                </article>
              </div>
              <div class="swiper-slide">
                <article>
                  <div
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                  >
                    <a href="collection.html" class="flex space-x-[0.625rem]">
                      <span class="w-[74.5%]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_3_1.jpg"
                          alt="item 1"
                          class="h-full w-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                      <span class="flex w-1/3 flex-col space-y-[0.625rem]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_3_2.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_3_3.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_3_4.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                    </a>

                    <a
                      href="collection.html"
                      class="font-display hover:text-accent dark:hover:text-accent text-jacarta-700 mt-4 block text-base dark:text-white"
                    >
                      VR Space_287
                    </a>

                    <div class="mt-2 flex items-center justify-between text-sm font-medium tracking-tight">
                      <div class="flex flex-wrap items-center">
                        <a href="user.html" class="mr-2 shrink-0">
                          <img src="{{asset('frontend_assets/img')}}/avatars/owner_4.png" alt="owner" class="h-5 w-5 rounded-full" />
                        </a>
                        <span class="dark:text-jacarta-400 mr-1">by</span>
                        <a href="user.html" class="text-accent">
                          <span>Origin Morish</span>
                        </a>
                      </div>
                      <span class="dark:text-jacarta-300 text-sm">8K Items</span>
                    </div>
                  </div>
                </article>
              </div>
              <div class="swiper-slide">
                <article>
                  <div
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                  >
                    <a href="collection.html" class="flex space-x-[0.625rem]">
                      <span class="w-[74.5%]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_4_1.jpg"
                          alt="item 1"
                          class="h-full w-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                      <span class="flex w-1/3 flex-col space-y-[0.625rem]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_4_2.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_4_3.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_4_4.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                    </a>

                    <a
                      href="collection.html"
                      class="font-display hover:text-accent dark:hover:text-accent text-jacarta-700 mt-4 block text-base dark:text-white"
                    >
                      Metasmorf
                    </a>

                    <div class="mt-2 flex items-center justify-between text-sm font-medium tracking-tight">
                      <div class="flex flex-wrap items-center">
                        <a href="user.html" class="mr-2 shrink-0">
                          <img src="{{asset('frontend_assets/img')}}/avatars/owner_10.png" alt="owner" class="h-5 w-5 rounded-full" />
                        </a>
                        <span class="dark:text-jacarta-400 mr-1">by</span>
                        <a href="user.html" class="text-accent">
                          <span>Lazy Panda</span>
                        </a>
                      </div>
                      <span class="dark:text-jacarta-300 text-sm">1.5K Items</span>
                    </div>
                  </div>
                </article>
              </div>
              <div class="swiper-slide">
                <article>
                  <div
                    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                  >
                    <a href="collection.html" class="flex space-x-[0.625rem]">
                      <span class="w-[74.5%]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_5_1.jpg"
                          alt="item 1"
                          class="h-full w-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                      <span class="flex w-1/3 flex-col space-y-[0.625rem]">
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_5_2.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_5_3.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                        <img
                          src="{{asset('frontend_assets/img')}}/collections/collection_5_4.jpg"
                          alt="item 1"
                          class="h-full rounded-[0.625rem] object-cover"
                          loading="lazy"
                        />
                      </span>
                    </a>

                    <a
                      href="collection.html"
                      class="font-display hover:text-accent dark:hover:text-accent text-jacarta-700 mt-4 block text-base dark:text-white"
                    >
                      3Landers
                    </a>

                    <div class="mt-2 flex items-center justify-between text-sm font-medium tracking-tight">
                      <div class="flex flex-wrap items-center">
                        <a href="user.html" class="mr-2 shrink-0">
                          <img src="{{asset('frontend_assets/img')}}/avatars/owner_11.png" alt="owner" class="h-5 w-5 rounded-full" />
                        </a>
                        <span class="dark:text-jacarta-400 mr-1">by</span>
                        <a href="user.html" class="text-accent">
                          <span>051_Hart</span>
                        </a>
                      </div>
                      <span class="dark:text-jacarta-300 text-sm">15K Items</span>
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>

          <!-- Slider Navigation -->
          <div
            class="group swiper-button-prev-2 shadow-white-volume absolute top-1/2 -left-4 z-10 -mt-6 flex h-12 w-12 cursor-pointer items-center justify-center rounded-full bg-white p-3 text-base sm:-left-6"
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
            class="group swiper-button-next-2 shadow-white-volume absolute top-1/2 -right-4 z-10 -mt-6 flex h-12 w-12 cursor-pointer items-center justify-center rounded-full bg-white p-3 text-base sm:-right-6"
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
        <!-- end collections slider -->

        <!-- FAQ -->
        <div class="pt-20 pb-24">
          <h2 class="font-display text-jacarta-700 mb-10 text-center text-xl font-medium dark:text-white">
            Frequently asked questions
          </h2>
          <p class="dark:text-jacarta-300 mx-auto mb-10 max-w-md text-center text-lg">
            Join our community now to get free updates and also alot of freebies are waiting for you or
            <a href="{{ route('contact') }}" class="text-accent">Contact Support</a>
          </p>

          <div class="accordion mx-auto max-w-[35rem]" id="accordionFAQ">
            @foreach ($faqs as $faq)
            <div
            class="accordion-item dark:border-jacarta-600 border-jacarta-100 mb-5 overflow-hidden rounded-lg border"
            >
                <h2 class="accordion-header" id="faq-heading-{{ $faq->id }}">
                <button
                    class="accordion-button dark:bg-jacarta-700 font-display text-jacarta-700 collapsed relative flex w-full items-center justify-between bg-white px-4 py-3 text-left dark:text-white"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#faq-{{ $faq->id }}"
                    aria-expanded="false"
                    aria-controls="faq-1"
                >
                    <span>{{ $faq->question }}</span>
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="accordion-arrow fill-jacarta-700 h-4 w-4 shrink-0 transition-transform dark:fill-white"
                    >
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
                    </svg>
                </button>
                </h2>
                <div
                id="faq-{{ $faq->id }}"
                class="accordion-collapse collapse"
                aria-labelledby="faq-heading-{{ $faq->id }}"
                data-bs-parent="#accordionFAQ"
                >
                <div
                    class="accordion-body dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 border-t bg-white p-4"
                >
                    <p class="dark:text-jacarta-200">
                    {{ $faq->answer }}
                    </p>
                </div>
                </div>
            </div>
        @endforeach
          </div>
        </div>

        <!-- Testimonials -->

        <div class="slick">
            @foreach ($partnerReviews as $partnerReview)
            <div style="display: flex !important" class="dark:bg-jacarta-700 slider_iiner rounded-2.5xl flex flex-wrap bg-white p-10 md:flex-nowrap md:space-x-8 md:p-[4.25rem] lg:space-x-16">
                <div
                class="bg-accent mb-8 flex h-16 w-16 shrink-0 items-center justify-center rounded-full md:mb-0 md:w-16"
                >
                <svg width="22" height="19" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-white">
                    <path
                    d="M6.027 18.096c-.997 0-1.813-.204-2.448-.612a5.147 5.147 0 01-1.564-1.564 5.729 5.729 0 01-.952-2.38C.927 12.679.86 11.976.86 11.432c0-2.221.567-4.239 1.7-6.052C3.693 3.567 5.461 2.093 7.863.96l.612 1.224c-1.405.59-2.606 1.519-3.604 2.788-1.042 1.27-1.564 2.561-1.564 3.876 0 .544.068 1.02.204 1.428a3.874 3.874 0 012.516-.884c1.179 0 2.199.385 3.06 1.156.862.77 1.292 1.836 1.292 3.196 0 1.27-.43 2.312-1.292 3.128-.861.816-1.881 1.224-3.06 1.224zm11.56 0c-.997 0-1.813-.204-2.448-.612a5.148 5.148 0 01-1.564-1.564 5.73 5.73 0 01-.952-2.38c-.136-.861-.204-1.564-.204-2.108 0-2.221.567-4.239 1.7-6.052 1.134-1.813 2.902-3.287 5.304-4.42l.612 1.224c-1.405.59-2.606 1.519-3.604 2.788-1.042 1.27-1.564 2.561-1.564 3.876 0 .544.068 1.02.204 1.428a3.874 3.874 0 012.516-.884c1.179 0 2.199.385 3.06 1.156.862.77 1.292 1.836 1.292 3.196 0 1.27-.43 2.312-1.292 3.128-.861.816-1.881 1.224-3.06 1.224z"
                    />
                </svg>
                </div>

                <div class="mb-4 md:mb-0">
                <p class="text-jacarta-700 text-lg leading-normal dark:text-white">
                   {{ $partnerReview->comment }}
                </p>
                <span class="text-jacarta-700 font-display text-md mt-12 block font-medium dark:text-white">{{ $partnerReview->name }}</span>
                <span class="dark:text-jacarta-400 text-2xs font-medium tracking-tight">{{ $partnerReview->designation }}</span>
                </div>
                <img src="{{ asset('uploads/images/partner/partnerReview') }}/{{ $partnerReview->image }}" style="height:200px;width:210px" class="rounded-2.5xl w-28 self-start lg:w-auto" />
            </div>
            @endforeach
        </div>
    </div>


      </div>
    </section>
    <!-- end partner collections / faq / testimonials -->

    <!-- CTA -->
    <section class="bg-accent py-28">
      <div class="container">
        <div class="mx-auto max-w-2xl text-center">
          <h2 class="font-display mx-auto mb-8 max-w-sm text-3xl text-white">
            {{ $signUpData->title }}
          </h2>
          <p class="mb-10 text-lg leading-normal text-white">
            {{ $signUpData->meta_title }}
          </p>
          <a
            href="{{ route('register') }}"
            class="text-accent hover:bg-accent-dark inline-block rounded-full bg-white py-3 px-8 text-center font-semibold transition-all hover:text-white"
            >{{ $signUpData->btn_text }}</a
          >
        </div>
      </div>
    </section>
    <!-- end cta -->

    <!-- Partners -->
    <div class="dark:bg-jacarta-800 bg-light-base">
      <div class="container">
        <div class="grid grid-cols-2 py-8 sm:grid-cols-5">
            @foreach ($partnerImages as $partnerImage)
                <a href="#"><img src="{{ asset('uploads/images/partner/brand') }}/{{ $partnerImage->image }}" alt="partner image" /> </a>
            @endforeach
        </div>
      </div>
    </div>
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
              <img src="{{asset('frontend_assets/img')}}/avatars/avatar_2.jpg" alt="avatar 2" class="rounded-2lg" loading="lazy" />
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
{{-- js for slick slider --}}
<script>
    $('.slick').slick({
        infinite: true,
        speed: 300,
        fade: true,
        cssEase: 'linear',
        arrows: false,
        autoplay: true
    });
</script>
@endsection
