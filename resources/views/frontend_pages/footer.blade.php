<!-- Footer -->
<footer class="dark:bg-jacarta-900 page-footer bg-white">
    <div class="container">
      <div class="grid grid-cols-6 gap-x-7 gap-y-14 pt-24 pb-12 md:grid-cols-12">
        <div class="col-span-3 md:col-span-4">
          <!-- Logo -->
          <a href="{{ url('/') }}" class="mb-6 inline-block">
            <img src="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->logo }}" class="max-h-7 dark:hidden" alt="Xhibiter | NFT Marketplace" />
            <img src="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->logo_dark }}" class="hidden max-h-7 dark:block" alt="Xhibiter | NFT Marketplace" />
          </a>
          <p class="dark:text-jacarta-300 mb-12">
            {{ generalsettings()->footer_description }}
          </p>
          <!-- Socials -->
          <div class="flex space-x-5">
            <a href="{{ socialurls()->fb_url }}" class="group">
              <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fab"
                data-icon="facebook"
                class="group-hover:fill-accent fill-jacarta-300 h-5 w-5 dark:group-hover:fill-white"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
              >
                <path
                  d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
                ></path>
              </svg>
            </a>
            <a href="{{ socialurls()->twitter_url }}" class="group">
              <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fab"
                data-icon="twitter"
                class="group-hover:fill-accent fill-jacarta-300 h-5 w-5 dark:group-hover:fill-white"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
              >
                <path
                  d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                ></path>
              </svg>
            </a>
            <a href="{{ socialurls()->instagram_url }}" class="group">
              <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fab"
                data-icon="instagram"
                class="group-hover:fill-accent fill-jacarta-300 h-5 w-5 dark:group-hover:fill-white"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"
              >
                <path
                  d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                ></path>
              </svg>
            </a>
            {{-- <a href="{{ socialurls()->linkedin_url }}" class="group">
              <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fab"
                data-icon="linked_in"
                class="group-hover:fill-accent fill-jacarta-300 h-5 w-5 dark:group-hover:fill-white"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 512"
              >
                <path
                  d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z"
                ></path>
              </svg>
            </a> --}}
            {{-- <a href="{{ socialurls()->youtube_url }}" class="group">
              <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fab"
                data-icon="youtube"
                class="group-hover:fill-accent fill-jacarta-300 h-5 w-5 dark:group-hover:fill-white"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"
              >
                <path
                  d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"
                ></path>
              </svg>
            </a> --}}
          </div>
        </div>

        <div class="col-span-full sm:col-span-3 md:col-span-2 md:col-start-7">
          <h3 class="font-display text-jacarta-700 mb-6 text-sm dark:text-white">Marketplace</h3>
          <ul class="dark:text-jacarta-300 flex flex-col space-y-1">
            {{-- <li>
              <a href="#" class="hover:text-accent dark:hover:text-white">All NFTs</a>
            </li> --}}
            @foreach (nftCategories() as $cat)
            <li>
                <a href="{{ route('collection', $cat->id) }}" class="hover:text-accent dark:hover:text-white">{{ $cat->name }}</a>
              </li>
            @endforeach

          </ul>
        </div>

        <div class="col-span-full sm:col-span-3 md:col-span-2">
          <h3 class="font-display text-jacarta-700 mb-6 text-sm dark:text-white">Company</h3>
          <ul class="dark:text-jacarta-300 flex flex-col space-y-1">
            <li>
              <a href="{{ route('explore_collections') }}" class="hover:text-accent dark:hover:text-white">Explore</a>
            </li>
            <li>
              <a href="{{ route('about') }}" class="hover:text-accent dark:hover:text-white">About</a>
            </li>
            <li>
              <a href="{{ route('contact') }}" class="hover:text-accent dark:hover:text-white">Contact Us</a>
            </li>
            <li>
              <a href="{{ route('blog') }}" class="hover:text-accent dark:hover:text-white">Our Blog</a>
            </li>
            <li>
              <a href="{{ route('help_center') }}" class="hover:text-accent dark:hover:text-white">FAQ</a>
            </li>
          </ul>
        </div>

        @auth
        <div class="col-span-full sm:col-span-3 md:col-span-2">
            <h3 class="font-display text-jacarta-700 mb-6 text-sm dark:text-white">{{ __("My Account") }}</h3>
            <ul class="dark:text-jacarta-300 flex flex-col space-y-1">
              {{-- <li>
                <a href="#" class="hover:text-accent dark:hover:text-white">{{ __('Authors') }}</a>
              </li> --}}
              {{-- <li>
                <a href="#" class="hover:text-accent dark:hover:text-white">{{ __('Collection') }}</a>
              </li> --}}
              <li>
                <a href="{{ route('user', Auth::id()) }}" class="hover:text-accent dark:hover:text-white">{{ __('Author Profile') }}</a>
              </li>
              <li>
                <a href="{{ route('create') }}" class="hover:text-accent dark:hover:text-white">{{ __('Create Item') }}</a>
              </li>
            </ul>
        </div>
        @endauth
      </div>
      <div class="flex flex-col items-center justify-between space-y-2 py-8 sm:flex-row sm:space-y-0">
        <span class="dark:text-jacarta-400 text-sm"
          >&copy;
          <script>
            document.write(new Date().getFullYear())
          </script>
          {{ generalsettings()->app_title }} — {{ __('Made by') }}
          <a href="{{ generalsettings()->designer_route }}" class="hover:text-accent">{{ generalsettings()->site_designer }}</a></span
        >
        <ul class="dark:text-jacarta-400 flex flex-wrap space-x-4 text-sm">
          <li>
            <a href="{{ route('terms_of_services') }}" class="hover:text-accent">{{ __('Terms and Services') }}</a>
          </li>
          {{-- <li><a href="#" class="hover:text-accent">{{ __('Privacy policy') }}</a></li> --}}
        </ul>
      </div>
    </div>
</footer>
