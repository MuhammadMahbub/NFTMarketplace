@extends('layouts.app')

@section('content')
<main>
    <!-- Page title -->
    <section class="relative pt-24 lg:pb-96">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <div class="container">
        <!-- Page Title -->
        <div class="mx-auto max-w-2xl py-16 text-center">
          <h1 class="font-display text-jacarta-700 mb-8 text-4xl font-medium dark:text-white">{{ $aboutHeader->title }}</h1>
          <p class="dark:text-jacarta-300 text-lg leading-normal">
            {{ $aboutHeader->meta_title }}
          </p>
        </div>
      </div>
    </section>

    <!-- Intro / Statistics -->
    <section class="pb-24">
      <div class="container">
        <!-- Video Lightbox -->
        <figure
          class="before:bg-jacarta-900/25 relative mt-16 overflow-hidden rounded-3xl before:absolute before:inset-0 lg:-mt-96"
        >
          <img src="{{ asset('frontend_assets') }}/img/about/video_cover.jpg" class="w-full" alt="video" />
          <a
            href="{{ $aboutHeader->video_url }}"
            data-toggle="lightbox"
            class="absolute top-1/2 left-1/2 flex h-24 w-24 -translate-y-1/2 -translate-x-1/2 items-center justify-center rounded-full border-2 border-white transition-transform will-change-transform hover:scale-90"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="h-8 w-8 fill-white"
            >
              <path fill="none" d="M0 0h24v24H0z" />
              <path
                d="M19.376 12.416L8.777 19.482A.5.5 0 0 1 8 19.066V4.934a.5.5 0 0 1 .777-.416l10.599 7.066a.5.5 0 0 1 0 .832z"
              />
            </svg>
          </a>
        </figure>

        <!-- Statistics -->
        <div class="pt-24">
          <h2 class="font-display text-jacarta-700 mb-16 text-center text-3xl dark:text-white">{{ $countInfo->title }}</h2>

          <div class="grid grid-cols-2 md:grid-cols-4">
            <div class="mb-10 text-center">
              <span class="font-display text-jacarta-700 block text-5xl dark:text-white">{{ $countInfo->founded_value }}</span>
              <span class="dark:text-jacarta-300 block">{{ $countInfo->founded }}</span>
            </div>
            <div class="mb-10 text-center">
              <span class="font-display text-jacarta-700 block text-5xl dark:text-white">{{ $countInfo->trading_volume_value }}</span>
              <span class="dark:text-jacarta-300 block">{{ $countInfo->trading_volume }}</span>
            </div>
            <div class="mb-10 text-center">
              <span class="font-display text-jacarta-700 block text-5xl dark:text-white">{{ $countInfo->nft_created_value }}</span>
              <span class="dark:text-jacarta-300 block">{{ $countInfo->nft_created }}</span>
            </div>
            <div class="mb-10 text-center">
              <span class="font-display text-jacarta-700 block text-5xl dark:text-white">{{ $countInfo->total_users_value }}</span>
              <span class="dark:text-jacarta-300 block">{{ $countInfo->total_users }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end intro / statistics -->

    <!-- Story -->
    <section class="dark:bg-jacarta-800 relative py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>

      <div class="container">
        <div class="lg:flex lg:justify-between">
          <!-- Image -->
          <div class="lg:w-[55%]">
            <div class="relative">
              <svg
                viewbox="0 0 200 200"
                xmlns="http://www.w3.org/2000/svg"
                class="mx-auto mt-8 w-[80%] rotate-[8deg]"
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
                  <image href="{{ asset('uploads/images/about/teamBanner') }}/{{ $teamBanner->image }}" width="200" height="200" clip-path="url(#clipping)" />
                </g>
              </svg>
              <img src="{{ asset('frontend_assets') }}/img/hero/3D_elements.png" alt="" class="animate-fly absolute top-0" />
            </div>
          </div>

          <!-- Info -->
          <div class="py-20 lg:w-[45%] lg:pl-16">
            <h2 class="text-jacarta-700 font-display mb-6 text-2xl dark:text-white">
              {{ $teamBanner->title }}
            </h2>
            <p class="dark:text-jacarta-300 mb-8 text-lg leading-normal">
              {{ $teamBanner->meta_title }}
            </p>
            <p class="dark:text-jacarta-300 mb-10">
              {{ $teamBanner->description }}
            </p>
            <div class="flex space-x-4 sm:space-x-10">
              <div class="flex space-x-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  class="fill-accent h-8 w-8 shrink-0"
                >
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z"
                  />
                </svg>
                <div>
                  <span class="font-display text-jacarta-700 block text-xl dark:text-white">{{ $teamBanner->launch_product_text_value }}</span>
                  <span class="dark:text-jacarta-300 text-jacarta-700">{{ $teamBanner->launch_product_text }}</span>
                </div>
              </div>
              <div class="flex space-x-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  class="fill-accent h-8 w-8 shrink-0"
                >
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z"
                  />
                </svg>
                <div>
                  <span class="font-display text-jacarta-700 block text-xl dark:text-white">{{ $teamBanner->satisfaction_rate_value }}</span>
                  <span class="dark:text-jacarta-300 text-jacarta-700">{{ $teamBanner->satisfaction_rate }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end story -->

    <!-- Team -->
    <section class="py-24">
      <div class="container">
        <h2 class="font-display text-jacarta-700 mb-12 text-center text-3xl dark:text-white">
          {{ __('Meet Our Amazing Team') }}
        </h2>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 md:gap-[1.875rem] lg:grid-cols-5">
          @foreach ($teams as $team)
          <div class="dark:bg-jacarta-700 rounded-2lg dark:border-jacarta-600 border-jacarta-100 border bg-white p-8 text-center transition-shadow hover:shadow-lg">
            <img src="{{ asset('uploads/images/about/team') }}/{{ $team->image }}" class="rounded-2.5xl mx-auto mb-6 h-[8.125rem] w-[8.125rem]" alt="team" />
            <h3 class="font-display text-jacarta-700 text-md dark:text-white">{{ $team->name }}</h3>
            <span class="text-jacarta-400 text-2xs font-medium tracking-tight">{{ $team->designation }}</span>

            <div class="mt-3 flex justify-center space-x-5">
              <a href="#" class="group">
                <svg
                  aria-hidden="true"
                  focusable="false"
                  data-prefix="fab"
                  data-icon="linkedin"
                  class="group-hover:fill-accent fill-jacarta-300 h-4 w-4 dark:group-hover:fill-white"
                  role="img"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512"
                >
                  <path
                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                  ></path>
                </svg>
              </a>
              <a href="#" class="group">
                <svg fill="#a1a2b3" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
              </a>

              <a href="#" class="group">
                <svg
                  aria-hidden="true"
                  focusable="false"
                  data-prefix="fab"
                  data-icon="twitter"
                  class="group-hover:fill-accent fill-jacarta-300 h-4 w-4 dark:group-hover:fill-white"
                  role="img"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                  ></path>
                </svg>
              </a>
            </div>
          </div>
          @endforeach
        </div>
        <a
            href="{{ route('contact') }}"
            class="my-5 dark:bg-jacarta-700 rounded-2lg dark:border-jacarta-600 border-jacarta-100 flex items-center justify-center border bg-white p-8 text-center transition-shadow hover:shadow-lg"
          >
            <span class="font-display text-jacarta-700 text-md dark:text-white">{{ __('Join us') }}!</span>
          </a>
      </div>
    </section>
    <!-- end team -->

    <!-- Partners -->
    <div class="container">
      <div class="grid grid-cols-2 py-8 sm:grid-cols-5">
        @foreach ($partnerBrand as $logo)
        <a href="#"><img src="{{ asset('uploads/images/partner/brand') }}/{{ $logo->image }}" alt="partner 1" /></a>
        @endforeach
      </div>
    </div>

    <!-- Latest Posts -->
    <section class="relative py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <div class="container">
        <h2 class="font-display text-jacarta-700 mb-12 text-center text-3xl dark:text-white">
          You Might Have Read About Us In The News
        </h2>
        <div class="grid grid-cols-1 gap-[1.875rem] sm:grid-cols-2 md:grid-cols-3">
            @foreach ($blogs as $blog)
            <article>
              <div class="rounded-2.5xl overflow-hidden transition-shadow hover:shadow-lg">
                <figure class="group overflow-hidden">
                  <a href="{{ route('single_post', $blog->slug) }}">
                    <img
                      src="{{asset('uploads/images/blog')}}/{{ $blog->main_image }}"
                      alt="post 2"
                      class="h-full w-full object-cover transition-transform duration-[1600ms] will-change-transform group-hover:scale-105"
                    />
                  </a>
                </figure>

                <!-- Body -->
                <div class="dark:border-jacarta-600 dark:bg-jacarta-700 border-jacarta-100 rounded-b-[1.25rem] border border-t-0 bg-white p-[10%]">
                  <!-- Meta -->
                  <div class="mb-3 flex flex-wrap items-center space-x-1 text-xs">
                    <a href="#" class="dark:text-jacarta-200 text-jacarta-700 font-display hover:text-accent"
                      >{{ $blog->author_name }}</a
                    >
                    <span class="dark:text-jacarta-400">in</span>
                    <span class="text-accent inline-flex flex-wrap items-center space-x-1">
                      <a href="{{ route('single_post', $blog->slug) }}">{{ $blog->relationToBlogCategory->category_name }}</a>
                    </span>
                  </div>

                  <h2
                    class="font-display text-jacarta-700 dark:hover:text-accent hover:text-accent mb-4 text-xl dark:text-white"
                  >
                    <a href="{{ route('single_post', $blog->slug) }}">{{ $blog->title }}</a>
                  </h2>
                  <p class="dark:text-jacarta-200 mb-8">
                      {{ $blog->subtitle }}
                  </p>

                  <!-- Date / Time -->
                  <div class="text-jacarta-400 flex flex-wrap items-center space-x-2 text-sm">
                    <span><time datetime="2022-02-05">{{ $blog->created_at->diffForHumans() }}</time></span>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
        </div>
      </div>
    </section>
    <!-- end latest posts -->
  </main>
@endsection
