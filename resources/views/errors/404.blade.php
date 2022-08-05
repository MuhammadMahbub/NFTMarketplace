
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/toastr.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/> --}}

    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    {{-- trix --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"/>

    <!-- Dark Mode JS -->
    <script src="{{ asset('frontend_assets') }}/js/darkMode.bundle.js"></script>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->favicon }}" />
    <link rel="apple-touch-icon" href="{{ asset('frontend_assets') }}/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend_assets') }}/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend_assets') }}/img/apple-touch-icon-114x114.png" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/plugin/slick-slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css" />

  </head>

  <body class="dark:bg-jacarta-900 font-body text-jacarta-500 overflow-x-hidden" itemscope itemtype="http://schema.org/WebPage">

    <!-- Header -->
<header class="js-page-header fixed top-0 z-20 w-full backdrop-blur transition-colors">
    <div class="flex items-center px-6 py-6 xl:px-24">
      <!-- Logo -->
      <a href="{{ route('home') }}" class="shrink-0">
        <img src="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->logo }}" class="max-h-7 dark:hidden" alt="Xhibiter | NFT Marketplace" />
        <img src="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->logo_dark }}" class="hidden max-h-7 dark:block" alt="Xhibiter | NFT Marketplace" />
      </a>

      <!-- Menu / Actions -->
      <div class="js-mobile-menu dark:bg-jacarta-800 invisible fixed inset-0 z-10 ml-auto items-center bg-white opacity-0 lg:visible lg:relative lg:inset-auto lg:flex lg:bg-transparent lg:opacity-100 dark:lg:bg-transparent">
        <!-- Mobile Logo / Menu Close -->
        <div class="t-0 dark:bg-jacarta-800 fixed left-0 z-10 flex w-full items-center justify-between bg-white p-6 lg:hidden">
          <!-- Mobile Logo -->
          <a href="index.html" class="shrink-0">
            <img src="{{ asset('frontend_assets') }}/img/logo.png" class="max-h-7 dark:hidden" alt="Xhibiter | NFT Marketplace" />
            <img src="{{ asset('frontend_assets') }}/img/logo_white.png" class="hidden max-h-7 dark:block" alt="Xhibiter | NFT Marketplace" />
          </a>

          <!-- Mobile Menu Close -->
          <button class="js-mobile-close border-jacarta-100 hover:bg-accent focus:bg-accent group dark:hover:bg-accent ml-2 flex h-10 w-10 items-center justify-center rounded-full border bg-white transition-colors hover:border-transparent focus:border-transparent dark:border-transparent dark:bg-white/[.15]"
            aria-label="close mobile menu" >
            <svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="fill-jacarta-700 h-4 w-4 transition-colors group-hover:fill-white group-focus:fill-white dark:fill-white" >
              <path fill="none" d="M0 0h24v24H0z" />
              <path
                d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
            </svg>
          </button>
        </div>

        <!-- Mobile Search -->
        <form action="search" class="relative mt-24 mb-8 w-full lg:hidden">
          <input type="search"
            class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full rounded-2xl border py-3 px-4 pl-10 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
            placeholder="Search" />
          <span class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl">
            <svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="fill-jacarta-500 h-4 w-4 dark:fill-white" >
              <path fill="none" d="M0 0h24v24H0z" />
              <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" />
            </svg>
          </span>
        </form>

        <!-- Primary Nav -->
        <nav class="navbar w-full">
          <ul class="flex flex-col lg:flex-row">
            <li class="js-nav-dropdown group relative">
              <a href="{{ route('home') }}"
                class="dropdown-toggle text-jacarta-700 font-display hover:text-accent focus:text-accent dark:hover:text-accent dark:focus:text-accent flex items-center justify-between py-3.5 text-base dark:text-white lg:px-5"
                id="navDropdown-1"
                aria-expanded="false"
                role="button"
                {{-- data-bs-toggle="dropdown" --}} >Home
                <i class="lg:hidden">
                  <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="h-4 w-4 dark:fill-white" >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                  </svg>
                </i>
              </a>
            </li>
            <li class="js-nav-dropdown group relative">
              <a href="#"
                class="dropdown-toggle text-jacarta-700 font-display hover:text-accent focus:text-accent dark:hover:text-accent dark:focus:text-accent flex items-center justify-between py-3.5 text-base dark:text-white lg:px-5"
                id="navDropdown-2"
                aria-expanded="false"
                role="button"
                data-bs-toggle="dropdown" >Pages
                <i class="lg:hidden">
                  <svg  xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="h-4 w-4 dark:fill-white" >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                  </svg>
                </i>
              </a>
              <ul class="dropdown-menu dark:bg-jacarta-800 left-0 top-[85%] z-10 hidden min-w-[200px] gap-x-4 whitespace-nowrap rounded-xl bg-white transition-all will-change-transform group-hover:visible group-hover:opacity-100 lg:invisible lg:absolute lg:grid lg:translate-y-4 lg:py-4 lg:px-2 lg:opacity-0 lg:shadow-2xl lg:group-hover:translate-y-2"
                aria-labelledby="navDropdown-2" >
                {{-- <li>
                  <a
                    href="{{ route('item_details') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors"
                  >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Item Details</span>
                  </a>
                </li> --}}
                {{-- <li>
                  <a
                    href=""
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors"
                  >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Explore</span>
                  </a>
                </li> --}}
                {{-- <li>
                  <a
                    href="{{ route('collection') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors"
                  >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Collection</span>
                  </a>
                </li> --}}
                <li>
                  <a href="{{ route('activity') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Activity</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('rankings') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Rankings</span>
                  </a>
                </li>

                <li>
                  <a href="{{ route('about') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">About</span>
                  </a>
                </li>

                <li>
                  <a href="{{ route('contact') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Contact</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('wallet') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Wallet</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('terms_of_services') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Terms of Service</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="js-nav-dropdown nav-item dropdown group relative">
                <a href="collections.html" class="dropdown-toggle text-jacarta-700 font-display hover:text-accent focus:text-accent dark:hover:text-accent dark:focus:text-accent flex items-center justify-between py-3.5 text-base dark:text-white lg:px-5" id="navDropdown-3" aria-expanded="false" role="button" data-bs-toggle="dropdown">Explore
                  <i class="lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 dark:fill-white">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
                    </svg>
                  </i>
                </a>
                <ul class="dropdown-menu dark:bg-jacarta-800 -left-6 top-[85%] z-10 hidden grid-flow-col grid-rows-5 gap-x-4 whitespace-nowrap rounded-xl bg-white transition-all will-change-transform group-hover:visible group-hover:opacity-100 lg:invisible lg:absolute lg:!grid lg:translate-y-4 lg:py-8 lg:px-5 lg:opacity-0 lg:shadow-2xl lg:group-hover:translate-y-2" aria-labelledby="navDropdown-1">
                    <li>
                        <a href="{{ route('explore_collections') }}" class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors">
                          <span class="bg-light-base mr-3 rounded-xl p-[0.375rem]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-jacarta-700 h-4 w-4">
                              <path fill="none" d="M0 0h24v24H0z"></path>
                              <path d="M22 12.999V20a1 1 0 0 1-1 1h-8v-8.001h9zm-11 0V21H3a1 1 0 0 1-1-1v-7.001h9zM11 3v7.999H2V4a1 1 0 0 1 1-1h8zm10 0a1 1 0 0 1 1 1v6.999h-9V3h8z"></path>
                            </svg>
                          </span>
                          <span class="font-display text-jacarta-700 text-sm dark:text-white">All NFTs</span>
                        </a>
                      </li>
                  @foreach (nftCategories() as $cat)
                  <li>
                    <a href="{{ route('cat_search_item',$cat->id) }}" class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors">
                      <span class="bg-light-base mr-3 rounded-xl p-[0.375rem]">
                        {!! $cat->icon !!}
                      </span>
                      <span class="font-display text-jacarta-700 text-sm dark:text-white">{{ $cat->name }}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>

            <li class="js-nav-dropdown group relative">
              <a href="#"
                class="dropdown-toggle text-jacarta-700 font-display hover:text-accent focus:text-accent dark:hover:text-accent dark:focus:text-accent flex items-center justify-between py-3.5 text-base dark:text-white lg:px-5"
                id="navDropdown-4"
                aria-expanded="false"
                role="button"
                data-bs-toggle="dropdown">Resources
                <i class="lg:hidden">
                  <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="h-4 w-4 dark:fill-white" >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                  </svg>
                </i>
              </a>
              <ul class="dropdown-menu dark:bg-jacarta-800 left-0 top-[85%] z-10 hidden min-w-[200px] gap-x-4 whitespace-nowrap rounded-xl bg-white transition-all will-change-transform group-hover:visible group-hover:opacity-100 lg:invisible lg:absolute lg:grid lg:translate-y-4 lg:py-4 lg:px-2 lg:opacity-0 lg:shadow-2xl lg:group-hover:translate-y-2"
                aria-labelledby="navDropdown-4" >
                <li>
                  <a href="{{ route('help_center') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Help Center</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('platform_status') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Platform Status</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('partners') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors">
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Partners</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('blog') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Blog</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('newsletter') }}"
                    class="dark:hover:bg-jacarta-600 hover:text-accent focus:text-accent hover:bg-jacarta-50 flex items-center rounded-xl px-5 py-2 transition-colors" >
                    <span class="font-display text-jacarta-700 text-sm dark:text-white">Newsletter</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>


        <!-- Actions -->
        <div class="ml-8 hidden lg:flex xl:ml-12">

          <!-- Dark Mode -->
          <a href="#" class="border-jacarta-100 hover:bg-accent focus:bg-accent group dark:hover:bg-accent js-dark-mode-trigger ml-2 flex h-10 w-10 items-center justify-center rounded-full border bg-white transition-colors hover:border-transparent focus:border-transparent dark:border-transparent dark:bg-white/[.15]" >
            <svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="fill-jacarta-700 dark-mode-light h-4 w-4 transition-colors group-hover:fill-white group-focus:fill-white dark:hidden" >
              <path fill="none" d="M0 0h24v24H0z" />
              <path
                d="M11.38 2.019a7.5 7.5 0 1 0 10.6 10.6C21.662 17.854 17.316 22 12.001 22 6.477 22 2 17.523 2 12c0-5.315 4.146-9.661 9.38-9.981z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="fill-jacarta-700 dark-mode-dark hidden h-4 w-4 transition-colors group-hover:fill-white group-focus:fill-white dark:block dark:fill-white" >
              <path fill="none" d="M0 0h24v24H0z" />
              <path d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Mobile Menu Actions -->
      <div class="ml-auto flex lg:hidden">
        <!-- Profile -->
        <a href="edit-profile.html"
          class="border-jacarta-100 hover:bg-accent focus:bg-accent group dark:hover:bg-accent ml-2 flex h-10 w-10 items-center justify-center rounded-full border bg-white transition-colors hover:border-transparent focus:border-transparent dark:border-transparent dark:bg-white/[.15]"
          aria-label="profile" >
          <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            class="fill-jacarta-700 h-4 w-4 transition-colors group-hover:fill-white group-focus:fill-white dark:fill-white" >
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M11 14.062V20h2v-5.938c3.946.492 7 3.858 7 7.938H4a8.001 8.001 0 0 1 7-7.938zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z" />
          </svg>
        </a>

        <!-- Dark Mode -->
        <a href="#" class="js-dark-mode-trigger border-jacarta-100 hover:bg-accent dark:hover:bg-accent focus:bg-accent group ml-2 flex h-10 w-10 items-center justify-center rounded-full border bg-white transition-colors hover:border-transparent focus:border-transparent dark:border-transparent dark:bg-white/[.15]" >
          <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            class="fill-jacarta-700 dark-mode-light h-4 w-4 transition-colors group-hover:fill-white group-focus:fill-white dark:hidden" >
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M11.38 2.019a7.5 7.5 0 1 0 10.6 10.6C21.662 17.854 17.316 22 12.001 22 6.477 22 2 17.523 2 12c0-5.315 4.146-9.661 9.38-9.981z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            class="fill-jacarta-700 dark-mode-dark hidden h-4 w-4 transition-colors group-hover:fill-white group-focus:fill-white dark:block dark:fill-white" >
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z" />
          </svg>
        </a>

        <!-- Mobile Menu Toggle -->
        <button
          class="js-mobile-toggle border-jacarta-100 hover:bg-accent dark:hover:bg-accent focus:bg-accent group ml-2 flex h-10 w-10 items-center justify-center rounded-full border bg-white transition-colors hover:border-transparent focus:border-transparent dark:border-transparent dark:bg-white/[.15]"
          aria-label="open mobile menu" >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            class="fill-jacarta-700 h-4 w-4 transition-colors group-hover:fill-white group-focus:fill-white dark:fill-white" >
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M18 18v2H6v-2h12zm3-7v2H3v-2h18zm-3-7v2H6V4h12z" />
          </svg>
        </button>
      </div>
    </div>

  </header>

    <main class="pt-[5.5rem] lg:pt-24">
        <!-- 404 -->
        <section class="dark:bg-jacarta-800 relative py-16 md:py-24">
          <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
            <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
          </picture>
          <div class="container">
            <div class="mx-auto max-w-lg text-center">
              <img src="{{ asset('frontend_assets') }}/img/404.png" alt="" class="mb-16 inline-block" />
              <h1 class="text-jacarta-700 font-display mb-6 text-4xl dark:text-white md:text-6xl">Page Not Found!</h1>
              <p class="dark:text-jacarta-300 mb-12 text-lg leading-normal">
                Oops! The page you are looking for does not exist. It might have been moved or deleted.
              </p>
              <a
                href="{{ route('home') }}"
                class="bg-accent shadow-accent-volume hover:bg-accent-dark inline-block rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                >Navigate Back Home</a
              >
            </div>
          </div>
        </section>
        <!-- end 404 -->
      </main>

    @include('frontend_pages.footer')


    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/app.bundle.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/toastr.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/countdown.bundle.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
     {{-- tostar --}}

     {{-- font-awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend_assets/plugin/slick-slider/js/slick.min.js') }}"></script>
    {{-- trix --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

  </body>
</html>

