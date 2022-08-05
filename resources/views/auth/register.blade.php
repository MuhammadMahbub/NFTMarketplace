<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Xhibiter @yield('title') </title>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/toastr.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/> --}}

    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <!-- Dark Mode JS -->
    <script src="{{ asset('frontend_assets') }}/js/darkMode.bundle.js"></script>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->favicon }}" />
    <link rel="apple-touch-icon" href="{{ asset('frontend_assets') }}/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend_assets') }}/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend_assets') }}/img/apple-touch-icon-114x114.png" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/plugin/slick-slider/css/slick.css') }}">
    @stack('css')
  </head>

  <body class="dark:bg-jacarta-900 font-body text-jacarta-500 overflow-x-hidden" itemscope itemtype="http://schema.org/WebPage">

    <main>
        @php
            $loginData = App\Models\LoginSignUpPage::first();
        @endphp
        <!-- Login -->
        <section class="relative h-screen">
            <div class="lg:flex">
                <!-- Left -->
                <div class="relative text-center lg:w-1/2">
                <img src="{{ asset('uploads/login') }}/{{ $loginData->banner_image }}" alt="login" class="absolute h-full w-full object-cover" />
                <!-- Logo -->
                <a href="{{ url('/') }}" class="relative inline-block py-36">
                    <img src="{{ asset('uploads/login') }}/{{ $loginData->logo }}" style="width:100%" class="inline-block max-h-7" alt="Xhibiter | NFT Marketplace" />
                </a>
                </div>

                <!-- Right -->
                <div class="relative flex items-center justify-center p-[10%] lg:w-1/2">
                <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
                    <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
                </picture>

                <div class="w-full max-w-[25.625rem] text-center">
                    <h1 class="text-jacarta-700 font-display mb-6 text-4xl dark:text-white">{{ $loginData->login_title }}</h1>
                    <p class="dark:text-jacarta-300 mb-10 text-lg leading-normal">
                        {{ $loginData->login_sub_title }}
                    </p>

                    <!-- Tabs Nav -->
                    <ul
                    class="nav nav-tabs scrollbar-custom dark:border-jacarta-600 border-jacarta-100 mb-12 flex items-center justify-start overflow-x-auto overflow-y-hidden border-b pb-px md:justify-center"
                    role="tablist"
                    >
                    <li class="nav-item" role="presentation">
                        <button
                        class="nav-link active hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
                        id="ethereum-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#ethereum"
                        type="button"
                        role="tab"
                        aria-controls="ethereum"
                        aria-selected="true"
                        >
                        {{-- <svg
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            x="0"
                            y="0"
                            viewBox="0 0 1920 1920"
                            xml:space="preserve"
                            class="mr-1 mb-[2px] h-4 w-4 fill-current"
                        >
                            <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z"></path>
                            <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                            <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                            <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                            <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                        </svg> --}}

                        <span class="font-display text-base font-medium">Register</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                        class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
                        id="torus-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#torus"
                        type="button"
                        role="tab"
                        aria-controls="torus"
                        aria-selected="false"
                        >
                        {{-- <svg
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="mr-1 mb-[2px] h-4 w-4 fill-current"
                        >
                            <path d="M9.35098 3H4V5.93692H9.35098V3Z" fill="#0364FF" />
                            <path d="M9.35028 3.00403H6.44531V12.74H9.35028V3.00403Z" fill="#0364FF" />
                            <path
                            d="M11.5221 5.93554C12.3239 5.93554 12.9739 5.27842 12.9739 4.46777C12.9739 3.65715 12.3239 3 11.5221 3C10.7203 3 10.0703 3.65715 10.0703 4.46777C10.0703 5.27842 10.7203 5.93554 11.5221 5.93554Z"
                            fill="#0364FF"
                            />
                        </svg> --}}

                        <span class="font-display text-base font-medium">Torus</span>
                        </button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button
                        class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
                        id="wallet-connect-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#wallet-connect"
                        type="button"
                        role="tab"
                        aria-controls="wallet-connect"
                        aria-selected="false"
                        >
                        <svg
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="mr-1 mb-[2px] h-4 w-4 fill-current"
                        >
                            <path
                            d="M4.08889 5.34343C6.30052 3.1588 9.8863 3.1588 12.0979 5.34343L12.3641 5.60635C12.4747 5.71559 12.4747 5.89269 12.3641 6.0019L11.4536 6.90132C11.3983 6.95594 11.3086 6.95594 11.2534 6.90132L10.8871 6.5395C9.34416 5.01545 6.84265 5.01545 5.29974 6.5395L4.90747 6.92698C4.85219 6.9816 4.76256 6.9816 4.70726 6.92698L3.79674 6.02756C3.68616 5.91835 3.68616 5.74125 3.79674 5.63201L4.08889 5.34343ZM13.981 7.20351L14.7914 8.00397C14.9019 8.11321 14.9019 8.29031 14.7914 8.39953L11.1374 12.009C11.0268 12.1182 10.8475 12.1182 10.7369 12.009C10.7369 12.009 10.7369 12.009 10.7369 12.009L8.14348 9.44724C8.11583 9.41995 8.07101 9.41995 8.04336 9.44724L5.45 12.009C5.33945 12.1182 5.16015 12.1182 5.04957 12.009C5.04957 12.009 5.04957 12.009 5.04957 12.009L1.39544 8.39947C1.28485 8.29026 1.28485 8.11316 1.39544 8.00392L2.2058 7.20346C2.31638 7.09422 2.49568 7.09422 2.60626 7.20346L5.1997 9.7652C5.22735 9.79253 5.27217 9.79253 5.29982 9.7652L7.89312 7.20346C8.00371 7.09422 8.183 7.09422 8.29359 7.20343C8.29359 7.20346 8.29359 7.20346 8.29359 7.20346L10.887 9.7652C10.9147 9.79253 10.9595 9.79253 10.9871 9.7652L13.5806 7.20351C13.6911 7.09427 13.8704 7.09427 13.981 7.20351Z"
                            fill="#3C99FC"
                            />
                        </svg>

                        <span class="font-display text-base font-medium">Mobile Wallet</span>
                        </button>
                    </li> --}}
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                    <!-- Ethereum -->
                    <div class="tab-pane fade show active" id="ethereum" role="tabpanel" aria-labelledby="ethereum-tab">
                        <form class="bg-dark shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('register') }}">
                            @csrf
                            {{-- Name --}}
                            <div class="mb-2 flex items-center justify-between">
                                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">{{ __('Name') }}</span>
                            </div>

                            <div
                                class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                <input
                                type="text"
                                name="name"
                                class="focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                placeholder="Name"
                                value="{{ old('name') }}"
                                />
                            </div>

                            {{-- User Name --}}
                            <div class="mb-2 flex items-center justify-between">
                                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">{{ __('User Name') }}</span>
                            </div>

                            <div
                                class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                <input
                                type="text"
                                name="username"
                                class="email focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                placeholder="Username"
                                value="{{ old('username') }}"
                                />
                            </div>


                            {{-- email --}}
                            <div class="mb-2 flex items-center justify-between">
                                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">{{ __('Email') }}</span>
                            </div>

                            <div
                                class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                <input
                                type="email"
                                name="email"
                                class="email focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                placeholder="Email"
                                value="{{ old('email') }}"
                                />
                            </div>

                            {{-- Password --}}
                            <div class="mb-2 flex items-center justify-between">
                                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">{{ __('Password') }}</span>
                            </div>

                            <div
                                class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                <input
                                type="password"
                                name="password"
                                class="focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                placeholder="Password"
                                />
                            </div>

                            {{--Confirm Password --}}
                            <div class="mb-2 flex items-center justify-between">
                                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">{{ __('Confirm Password') }}</span>
                            </div>

                            <div
                                class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border">
                                <input
                                type="password"
                                name="password_confirmation"
                                class="focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                placeholder="Re-enter your password"
                                />
                            </div>
                            <div class="flex items-center justify-center space-x-4">
                                <button
                                    type="submit"
                                    style="cursor:pointer"
                                    class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                                    >
                                    {{ __('Register') }}
                            </button>
                            </div>
                            <div class="flex items-center justify-center mt-4">
                                <a href="{{ route('login') }}">
                                  Already have an Account ?  <b>{{ __('Login Here') }}</b>
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- end ethereum -->

                    <!-- Torus -->
                    <div class="tab-pane fade" id="torus" role="tabpanel" aria-labelledby="torus-tab">
                        <button
                    class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-white py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <img src="{{ asset('frontend_assets') }}/img/wallets/torus_24.svg" class="mr-2.5 inline-block h-6 w-6" alt="" />
                    <span>Torus</span>
                  </button>

                  <button
                    class="js-wallet dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-white py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                    data-bs-toggle="modal"
                    data-bs-target="#walletModal"
                  >
                    <img src="{{ asset('frontend_assets') }}/img/wallets/metamask_24.svg" class="mr-2.5 inline-block h-6 w-6" alt="" />
                    <span>Sign in with Metamask</span>
                  </button>

                  <button
                    class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-white py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <img src="{{ asset('frontend_assets') }}/img/wallets/wallet_connect_24.svg" class="mr-2.5 inline-block h-6 w-6" alt="" />
                    <span>Mobile Wallet</span>
                  </button>

                  <button
                    class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-white py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <span>Show more options</span>
                  </button>
                </div>
                <!-- end torus -->

                <!-- Wallet Connect -->
                <div class="tab-pane fade" id="wallet-connect" role="tabpanel" aria-labelledby="wallet-connect-tab">
                  <button
                    class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-white py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <img src="{{ asset('frontend_assets') }}/img/wallets/wallet_connect_24.svg" class="mr-2.5 inline-block h-6 w-6" alt="" />
                    <span>Mobile Wallet</span>
                  </button>

                  <button
                    class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-white py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <img src="{{ asset('frontend_assets') }}/img/wallets/torus_24.svg" class="mr-2.5 inline-block h-6 w-6" alt="" />
                    <span>Torus</span>
                  </button>

                  <button
                    class="js-wallet dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-white py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                    data-bs-toggle="modal"
                    data-bs-target="#walletModal"
                  >
                    <img src="img/wallets/metamask_24.svg" class="mr-2.5 inline-block h-6 w-6" alt="" />
                    <span>Sign in with Metamask</span>
                  </button>

                  <button
                    class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-white py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <span>Show more options</span>
                  </button>
                    </div>
                    <!-- end torus -->

                    <!-- Wallet Connect -->
                    <div class="tab-pane fade" id="wallet-connect" role="tabpanel" aria-labelledby="wallet-connect-tab">
                        {{-- <button
                        class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-dark py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                        >
                        <img src="{{ asset('frontend_assets/img/wallets/wallet_connect_24.svg') }}" class="mr-2.5 inline-block h-6 w-6" alt="" />
                        <span>Mobile Wallet</span>
                        </button>

                        <button
                        class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-dark py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                        >
                        <img src="img/wallets/torus_24.svg" class="mr-2.5 inline-block h-6 w-6" alt="" />
                        <span>Torus</span>
                        </button>

                        <button
                        class="js-wallet dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-dark py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                        data-bs-toggle="modal"
                        data-bs-target="#walletModal"
                        >
                        <img src="img/wallets/metamask_24.svg" class="mr-2.5 inline-block h-6 w-6" alt="" />
                        <span>Sign in with Metamask</span>
                        </button>

                        <button
                        class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:hover:bg-accent hover:bg-accent text-jacarta-700 mb-4 flex w-full items-center justify-center rounded-full border-2 bg-dark py-4 px-8 text-center font-semibold transition-all hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                        >
                        <span>Show more options</span>
                        </button> --}}
                    </div>
                    <!-- end wallet connect -->
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- end login -->
  </main>
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

   @yield('js')

    <script>
       toastr.options = {
           "closeButton": true,
           "debug": false,
           "newestOnTop": false,
           "progressBar": true,
           "positionClass": "toast-top-right",
           "preventDuplicates": true,
           "onclick": null,
           "showDuration": "300",
           "hideDuration": "1000",
           "timeOut": "3000",
           "extendedTimeOut": "1000",
           "showEasing": "swing",
           "hideEasing": "linear",
           "showMethod": "fadeIn",
           "hideMethod": "fadeOut"
       }
   </script>
   @if ($errors->any())
   @foreach ($errors->all() as $error)
       <script>
           toastr.error('{{ $error }}');
       </script>
   @endforeach
   @endif

   @if (session()->get('error'))
       <script>
           toastr.error('{{ session()->get('warning') }}');
       </script>
   @endif

   @if (session()->get('success'))
       <script>
           toastr.success('{{ session()->get('success') }}');
       </script>
   @endif

 </body>
</html>





