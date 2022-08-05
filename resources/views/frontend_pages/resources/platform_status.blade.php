@extends('layouts.app')

@section('content')

<main class="pt-[5.5rem] lg:pt-24">
    <!-- Page Title -->
    <section
      class="after:bg-jacarta-900/60 relative bg-cover bg-center bg-no-repeat py-24 after:absolute after:inset-0 md:py-32"
      style="background-image: url('{{asset('uploads/images/platfrom')}}/{{ $platforms->image }}')"
    >
      <div class="container relative z-10">
        <h1 class="font-display text-center text-4xl font-medium text-white">{{ $platforms->title }}</h1>
      </div>
    </section>

    <!-- Platform Status -->
    <section class="relative py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{asset('frontend_assets/img')}}/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <div class="container">
        <div class="mx-auto max-w-[53.125rem]">
          <div class="bg-green font-display text-md mb-16 rounded-lg p-4 font-medium text-white">
            <span>{{ $platforms->operation_title }}</span>
          </div>

          <!-- Table -->
          <div
            class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 dark:divide-jacarta-600 divide-jacarta-100 mb-14 divide-y overflow-hidden rounded-lg border bg-white"
          >
            <div class="flex items-center justify-between py-4 px-5">
              <span class="text-jacarta-700 font-medium dark:text-white">API</span>
              <span class="text-green">Operational</span>
            </div>
            <div class="flex items-center justify-between py-4 px-5">
              <span class="text-jacarta-700 font-medium dark:text-white">Desktop Application</span>
              <span class="text-green">Operational</span>
            </div>
            <div class="flex items-center justify-between py-4 px-5">
              <span class="text-jacarta-700 font-medium dark:text-white">Website</span>
              <span class="text-green">Operational</span>
            </div>
            <div class="flex items-center justify-between py-4 px-5">
              <span class="text-jacarta-700 font-medium dark:text-white">Mobile Application</span>
              <span class="text-orange-bright">Active Incident</span>
            </div>
            <div class="flex items-center justify-between py-4 px-5">
              <div class="flex items-center space-x-2">
                <span class="text-jacarta-700 font-medium dark:text-white">Support Services</span>
                <span
                  class="inline-block"
                  data-tippy-content="Setting your asset as explicit and sensitive content, like pornography and other not safe for work (NSFW) content, will protect users with safe search while browsing Xhibiter."
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="dark:fill-jacarta-300 fill-jacarta-500 h-4 w-4"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.501 3.501 0 1 1 13 13.355z"
                    />
                  </svg>
                </span>
              </div>
              <span class="text-green">Operational</span>
            </div>
            <div class="flex items-center justify-between py-4 px-5">
              <span class="text-jacarta-700 font-medium dark:text-white">Emails</span>
              <span class="text-green">Operational</span>
            </div>
          </div>

          <h2 class="font-display text-jacarta-700 mb-6 text-xl dark:text-white">{{ $platforms->history_title }}</h2>

          <div class="mb-8">
            <div
              class="dark:border-jacarta-600 border-jacarta-100 text-jacarta-700 mb-4 border-b pb-4 text-lg font-medium dark:text-white"
            >
              Apr 8, 2022
            </div>
            <p class="dark:text-jacarta-300">No incidents reported today.</p>
          </div>

          <div class="mb-8">
            <div
              class="dark:border-jacarta-600 border-jacarta-100 text-jacarta-700 mb-4 border-b pb-4 text-lg font-medium dark:text-white"
            >
              Apr 7, 2022
            </div>
            <p class="dark:text-jacarta-300">No incidents reported today.</p>
          </div>

          <div class="mb-8">
            <div
              class="dark:border-jacarta-600 border-jacarta-100 text-jacarta-700 mb-4 border-b pb-4 text-lg font-medium dark:text-white"
            >
              Apr 6, 2022
            </div>
            <p class="dark:text-jacarta-300">No incidents reported today.</p>
          </div>

          <div class="mb-8">
            <div
              class="dark:border-jacarta-600 border-jacarta-100 text-jacarta-700 mb-4 border-b pb-4 text-lg font-medium dark:text-white"
            >
              Apr 5, 2022
            </div>
            <p class="text-orange-bright mb-4 font-medium">Database connectivity issues</p>
            <div class="mb-6">
              <p class="dark:text-jacarta-300">
                <strong class="text-jacarta-700 dark:text-white">Resolved</strong> - This incident has been resolved.
              </p>
              <time class="dark:text-jacarta-300 text-sm">Apr 5, 16:53 UTC</time>
            </div>
            <div class="mb-6">
              <p class="dark:text-jacarta-300">
                <strong class="text-jacarta-700 dark:text-white">In progress</strong> - Scheduled maintenance is
                currently in progress. We will provide updates as necessary.
              </p>
              <time class="dark:text-jacarta-300 text-sm">Apr 5, 16:52 UTC</time>
            </div>
            <div class="mb-6">
              <p class="dark:text-jacarta-300">
                <strong class="text-jacarta-700 dark:text-white">Investigating</strong> - We are experiencing
                intermittent database connectivity issues. The team is currently investigating.
              </p>
              <time class="dark:text-jacarta-300 text-sm">Apr 5, 16:45 UTC</time>
            </div>
          </div>

          <div class="mb-8">
            <div
              class="dark:border-jacarta-600 border-jacarta-100 text-jacarta-700 mb-4 border-b pb-4 text-lg font-medium dark:text-white"
            >
              Apr 4, 2022
            </div>
            <p class="dark:text-jacarta-300">No incidents reported today.</p>
          </div>

          <div
            class="dark:border-jacarta-600 border-jacarta-100 text-2xs mt-12 flex items-center justify-between border-t pt-4"
          >
            <a href="#" class="text-blue flex items-center space-x-1">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-4 w-4 fill-current"
              >
                <path fill="none" d="M0 0h24v24H0z" />
                <path d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z" />
              </svg>
              <span>Incident History</span>
            </a>
            <a href="https://deothemes.com" class="dark:text-jacarta-300 hover:text-blue">Powered by DeoThemes</a>
          </div>
        </div>
      </div>
    </section>
    <!-- end platform status -->
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
