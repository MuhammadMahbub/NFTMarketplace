@extends('layouts.app')

@section('content')

<main>
    <!-- Rankings -->
    <section class="relative">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <div class="container">
        <h1 class="font-display text-jacarta-700 py-16 text-center text-4xl font-medium dark:text-white">Rankings</h1>

        <!-- Filters -->
        <div class="mb-8 flex flex-wrap items-center justify-between">
          <div class="flex flex-wrap items-center">
            <!-- Categories -->
            <div class="my-1 mr-2.5">
              <button
                class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                id="categoriesFilter"
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
                <span>All Categories</span>
              </button>
              <div
                class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                aria-labelledby="categoriesFilter"
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

            <!-- Chains -->
            <div class="my-1 mr-2.5">
              <button
                class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                id="blockchainFilter"
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
                    d="M20 16h2v6h-6v-2H8v2H2v-6h2V8H2V2h6v2h8V2h6v6h-2v8zm-2 0V8h-2V6H8v2H6v8h2v2h8v-2h2zM4 4v2h2V4H4zm0 14v2h2v-2H4zM18 4v2h2V4h-2zm0 14v2h2v-2h-2z"
                  />
                </svg>
                <span>All Chains</span>
              </button>
              <div
                class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                aria-labelledby="blockchainFilter"
              >
                <ul class="flex flex-col flex-wrap">
                  <li>
                    <a
                      href="#"
                      class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                    >
                      <span class="text-jacarta-700 dark:text-white">Ethereum</span>
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
                      Polygon
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                    >
                      Flow
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                    >
                      Tezos
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="dropdown relative my-1 cursor-pointer">
            <div
              class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 inline-flex w-48 items-center justify-between rounded-lg border bg-white py-2 px-3 text-sm dark:text-white"
              role="button"
              id="sortOrdering"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="font-display">Last 7 Days</span>
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
              class="dropdown-menu dark:bg-jacarta-800 z-10 hidden w-full whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
              aria-labelledby="sortOrdering"
            >
              <button
                class="dropdown-item font-display text-jacarta-700 dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
              >
                Last 7 Days
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
                Last 14 Days
              </button>
              <button
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
              >
                Last 30 Days
              </button>
              <button
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
              >
                Last 60 Days
              </button>
              <button
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
              >
                Last 90 Days
              </button>
              <button
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
              >
                Last Year
              </button>
              <button
                class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
              >
                All Time
              </button>
            </div>
          </div>

          <!--  -->
        </div>
        <!-- end filters -->

        <!-- Table -->
        <div class="scrollbar-custom overflow-x-auto">
          <div
            role="table"
            class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 lg:rounded-2lg w-full min-w-[736px] border bg-white text-sm dark:text-white"
          >
            <div class="dark:bg-jacarta-600 bg-jacarta-50 rounded-t-2lg flex" role="row">
              <div class="w-[28%] py-3 px-4" role="columnheader">
                <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                  >Collection</span
                >
              </div>
              <div class="w-[12%] py-3 px-4" role="columnheader">
                <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                  >Volume</span
                >
              </div>
              <div class="w-[12%] py-3 px-4" role="columnheader">
                <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis">24h %</span>
              </div>
              <div class="w-[12%] py-3 px-4" role="columnheader">
                <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis">7d %</span>
              </div>
              <div class="w-[12%] py-3 px-4" role="columnheader">
                <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                  >Floor Price</span
                >
              </div>
              <div class="w-[12%] py-3 px-4" role="columnheader">
                <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis"
                  >Owners</span
                >
              </div>
              <div class="w-[12%] py-3 px-4" role="columnheader">
                <span class="text-jacarta-700 dark:text-jacarta-100 w-full overflow-hidden text-ellipsis">Items</span>
              </div>
            </div>
            <a href="user.html" class="flex transition-shadow hover:shadow-lg" role="row">
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[28%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="mr-2 lg:mr-4">1</span>
                <figure class="relative mr-2 w-8 shrink-0 self-start lg:mr-5 lg:w-12">
                  <img src="{{ asset('frontend_assets') }}/img/avatars/avatar_1.jpg" alt="avatar 1" class="rounded-2lg" loading="lazy" />
                  <div
                    class="dark:border-jacarta-600 bg-green absolute -right-2 -bottom-1 flex h-6 w-6 items-center justify-center rounded-full border-2 border-white"
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
                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">
                  NFT Funny Cat
                </span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center whitespace-nowrap border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">30,643.01</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-red">-35.75%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-red">-49.99%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">15.49</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>3.5K</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>10.0K</span>
              </div>
            </a>
            <a href="user.html" class="flex transition-shadow hover:shadow-lg" role="row">
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[28%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="mr-2 lg:mr-4">2</span>
                <figure class="relative mr-2 w-8 shrink-0 self-start lg:mr-5 lg:w-12">
                  <img src="{{ asset('frontend_assets') }}/img/avatars/avatar_2.jpg" alt="avatar 2" class="rounded-2lg" loading="lazy" />
                </figure>
                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white"> Cryptopank </span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center whitespace-nowrap border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">18,973.17</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-green">+25.79%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-red">-10.28%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">7.57</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>6.2K</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>8.2K</span>
              </div>
            </a>
            <a href="user.html" class="flex transition-shadow hover:shadow-lg" role="row">
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[28%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="mr-2 lg:mr-4">3</span>
                <figure class="relative mr-2 w-8 shrink-0 self-start lg:mr-5 lg:w-12">
                  <img src="{{ asset('frontend_assets') }}/img/avatars/avatar_5.jpg" alt="avatar 5" class="rounded-2lg" loading="lazy" />
                </figure>
                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white"> Bored Bunny </span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center whitespace-nowrap border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">13,503.09</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-green">+71.77%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-red">-61.16%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">3.31</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>11.8K</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>6.2K</span>
              </div>
            </a>
            <a href="user.html" class="flex transition-shadow hover:shadow-lg" role="row">
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[28%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="mr-2 lg:mr-4">4</span>
                <figure class="relative mr-2 w-8 shrink-0 self-start lg:mr-5 lg:w-12">
                  <img src="{{ asset('frontend_assets') }}/img/avatars/avatar_9.jpg" alt="avatar 9" class="rounded-2lg" loading="lazy" />
                </figure>
                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white"> NFT stars </span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center whitespace-nowrap border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">6,098.71</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-red">-35.75%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-green">+27.79%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">7.57</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>5K</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>8.2K</span>
              </div>
            </a>
            <a href="user.html" class="flex transition-shadow hover:shadow-lg" role="row">
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[28%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="mr-2 lg:mr-4">5</span>
                <figure class="relative mr-2 w-8 shrink-0 self-start lg:mr-5 lg:w-12">
                  <img src="{{ asset('frontend_assets') }}/img/avatars/avatar_13.jpg" alt="avatar 13" class="rounded-2lg" loading="lazy" />
                </figure>
                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Arcahorizons</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center whitespace-nowrap border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">4,689.20</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-red">-73.64%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-green">+97.87%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">0.55</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>3.4K</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>5.2K</span>
              </div>
            </a>
            <a href="user.html" class="flex transition-shadow hover:shadow-lg" role="row">
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[28%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="mr-2 lg:mr-4">6</span>
                <figure class="relative mr-2 w-8 shrink-0 self-start lg:mr-5 lg:w-12">
                  <img src="{{ asset('frontend_assets') }}/img/avatars/avatar_6.jpg" alt="avatar 6" class="rounded-2lg" loading="lazy" />
                </figure>
                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Wow Frens</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center whitespace-nowrap border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">4,342.51</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-red">-8.65%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-green">+58.15%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">1.84</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>5.4K</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>6.2K</span>
              </div>
            </a>
            <a href="user.html" class="flex transition-shadow hover:shadow-lg" role="row">
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[28%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="mr-2 lg:mr-4">7</span>
                <figure class="relative mr-2 w-8 shrink-0 self-start lg:mr-5 lg:w-12">
                  <img src="{{ asset('frontend_assets') }}/img/avatars/avatar_10.jpg" alt="avatar 10" class="rounded-2lg" loading="lazy" />
                  <div
                    class="dark:border-jacarta-600 bg-green absolute -right-2 -bottom-1 flex h-6 w-6 items-center justify-center rounded-full border-2 border-white"
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
                <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Asumitsu</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center whitespace-nowrap border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">3,156.28</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-green">+40.79%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span class="text-red">-55.40%</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
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
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"></path>
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z"></path>
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z"></path>
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z"></path>
                  </svg>
                </span>
                <span class="text-sm font-medium tracking-tight">3.75</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>2.1K</span>
              </div>
              <div
                class="dark:border-jacarta-600 border-jacarta-100 flex w-[12%] items-center border-t py-4 px-4"
                role="cell"
              >
                <span>10.1K</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- end rankings -->
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

