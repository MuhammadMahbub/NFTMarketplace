@extends('layouts.app')

@section('content')
<main>
    <!-- Create -->
    <section class="relative">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <div class="container">
        <h1 class="font-display text-jacarta-700 py-16 text-center text-4xl font-medium dark:text-white">Update Item</h1>

        <form action="{{ route('user_item_update',$item->id ?? '') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")
            <div class="mx-auto max-w-[48.125rem]">
              <!-- File Upload -->
              <div class="mb-6">
                <label class="font-display text-jacarta-700 mb-2 block dark:text-white"
                  >Image</label
                >
                <p class="dark:text-jacarta-300 text-2xs mb-3">Drag or choose your file to upload</p>

                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 group relative flex max-w-md flex-col items-center justify-center rounded-lg border-2 border-dashed bg-white py-20 px-5 text-center"
                >
                  <div class="relative z-10 cursor-pointer">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-500 mb-4 inline-block dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M16 13l6.964 4.062-2.973.85 2.125 3.681-1.732 1-2.125-3.68-2.223 2.15L16 13zm-2-7h2v2h5a1 1 0 0 1 1 1v4h-2v-3H10v10h4v2H9a1 1 0 0 1-1-1v-5H6v-2h2V9a1 1 0 0 1 1-1h5V6zM4 14v2H2v-2h2zm0-4v2H2v-2h2zm0-4v2H2V6h2zm0-4v2H2V2h2zm4 0v2H6V2h2zm4 0v2h-2V2h2zm4 0v2h-2V2h2z"
                      />
                    </svg>
                    <p class="dark:text-jacarta-300 mx-auto max-w-xs text-xs">
                      JPEG, JPG, PNG, GIF
                    </p>
                  </div>
                  <div
                    class="dark:bg-jacarta-600 bg-jacarta-50 absolute inset-4 cursor-pointer rounded opacity-0 group-hover:opacity-100"
                  ></div>
                  <input
                    type="file" name="image"
                    id="file-upload"
                    class="absolute inset-0 z-20 cursor-pointer opacity-0"
                  />
                </div>
                <div class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 group relative flex max-w-md flex-col items-center justify-center rounded-lg border-2 border-dashed bg-white  text-center mt-2">
                    <img src="" alt="" id="item_output" width="200">
                </div>
              </div>
              <!-- File Upload -->
              <div class="mb-6">
                <label class="font-display text-jacarta-700 mb-2 block dark:text-white"
                  >Previous Image</label
                >

                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 group relative flex max-w-md flex-col items-center justify-center rounded-lg border-2 border-dashed bg-white py-20 px-5 text-center"
                >
                  <div class="relative z-10 cursor-pointer">
                    <img style="height:100px; width: 100px" src="{{ asset('uploads/items') }}/{{ $item->image }}" alt="item Image">
                  </div>
                </div>
              </div>

              <!-- Name -->
              <div class="mb-6">
                <label for="item-name" class="font-display text-jacarta-700 mb-2 block dark:text-white"
                  >Name<span class="text-red">*</span></label
                >
                <input
                  type="text" name="name"
                  id="item-name"
                  class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white"
                  placeholder="Item name" value="{{ $item->name }}"
                />
              </div>
              <!-- Description -->
              <div class="mb-6">
                <label for="item-description" class="font-display text-jacarta-700 mb-2 block dark:text-white"
                  >Description<span class="text-red">*</span></label
                >
                <p class="dark:text-jacarta-300 text-2xs mb-3">
                  The description will be included on the item's detail page underneath its image. Markdown syntax is
                  supported.
                </p>
                <input id="description" type="hidden" name="description" value="{!! $item->description ?? ''!!}" />
                <trix-editor input="description" class="trix-content"></trix-editor>
              </div>



              <!-- Collection -->
              <div class="relative">
                <div>
                  <label class="font-display text-jacarta-700 mb-2 block dark:text-white">Category<span class="text-red">*</span></label>
                  <div class="mb-3 flex items-center space-x-2">
                    <p class="dark:text-jacarta-300 text-2xs">
                      This is the Category where your item will appear.
                      <span
                        class="inline-block"
                        data-tippy-content="Moving items to a different collection may take up to 30 minutes."
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-300 fill-jacarta-500 ml-1 -mb-[3px] h-4 w-4"
                        >
                          <path fill="none" d="M0 0h24v24H0z"></path>
                          <path
                            d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM11 7h2v2h-2V7zm0 4h2v6h-2v-6z"
                          ></path>
                        </svg>
                      </span>
                    </p>
                  </div>
                </div>

                <div class="dropdown my-1 cursor-pointer">
                  <select
                      class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 dark:text-jacarta-300 flex items-center justify-between rounded-lg border bg-white py-3 px-3 w-full"
                      name="category_id"
                      >
                      @foreach (nftCategories() as $cat)
                          <option value="{{ $cat->id }}" {{ $cat->id == $item->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                      @endforeach
                      </select>
                      @error('category_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                </div>
              </div>

              <!-- Properties -->
              <div class="dark:border-jacarta-600 border-jacarta-100 relative border-b py-6">
                <div class="flex items-center justify-between">
                  <div class="flex">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 mr-2 mt-px h-4 w-4 shrink-0 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M8 4h13v2H8V4zM5 3v3h1v1H3V6h1V4H3V3h2zM3 14v-2.5h2V11H3v-1h3v2.5H4v.5h2v1H3zm2 5.5H3v-1h2V18H3v-1h3v4H3v-1h2v-.5zM8 11h13v2H8v-2zm0 7h13v2H8v-2z"
                      />
                    </svg>

                    <div>
                      <label class="font-display text-jacarta-700 block dark:text-white">Properties </label>
                      <p class="dark:text-jacarta-300">Textual traits that show up as rectangles.</p>
                    </div>
                  </div>
                  <button
                    class="group dark:bg-jacarta-700 hover:bg-accent border-accent flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border bg-white hover:border-transparent"
                    type="button"
                    id="item-properties"
                    data-bs-toggle="modal"
                    data-bs-target="#propertiesModal"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-accent group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" />
                    </svg>
                  </button>
                </div>
              </div>

              <!-- Levels -->
              {{-- <div class="dark:border-jacarta-600 border-jacarta-100 relative border-b py-6">
                <div class="flex items-center justify-between">
                  <div class="flex">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 mr-2 mt-px h-4 w-4 shrink-0 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z"
                      />
                    </svg>

                    <div>
                      <label class="font-display text-jacarta-700 block dark:text-white">Levels</label>
                      <p class="dark:text-jacarta-300">Numerical traits that show as a progress bar.</p>
                    </div>
                  </div>
                  <button
                    class="group dark:bg-jacarta-700 hover:bg-accent border-accent flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border bg-white hover:border-transparent"
                    type="button"
                    id="item-levels"
                    data-bs-toggle="modal"
                    data-bs-target="#levelsModal"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-accent group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" />
                    </svg>
                  </button>
                </div>
              </div> --}}

              <!-- Stats -->
              {{-- <div class="dark:border-jacarta-600 border-jacarta-100 relative border-b py-6">
                <div class="flex items-center justify-between">
                  <div class="flex">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 mr-2 mt-px h-4 w-4 shrink-0 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M2 13h6v8H2v-8zM9 3h6v18H9V3zm7 5h6v13h-6V8z" />
                    </svg>

                    <div>
                      <label class="font-display text-jacarta-700 block dark:text-white">Stats</label>
                      <p class="dark:text-jacarta-300">Numerical traits that just show as numbers.</p>
                    </div>
                  </div>
                  <button
                    class="group dark:bg-jacarta-700 hover:bg-accent border-accent flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border bg-white hover:border-transparent"
                    type="button"
                    id="item-stats"
                    data-bs-toggle="modal"
                    data-bs-target="#levelsModal"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-accent group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" />
                    </svg>
                  </button>
                </div>
              </div> --}}

              <!-- Unlockable Content -->
              {{-- <div class="dark:border-jacarta-600 border-jacarta-100 relative border-b py-6">
                <div class="flex items-center justify-between">
                  <div class="flex">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-accent mr-2 mt-px h-4 w-4 shrink-0"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M7 10h13a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V11a1 1 0 0 1 1-1h1V9a7 7 0 0 1 13.262-3.131l-1.789.894A5 5 0 0 0 7 9v1zm-2 2v8h14v-8H5zm5 3h4v2h-4v-2z"
                      />
                    </svg>

                    <div>
                      <label class="font-display text-jacarta-700 block dark:text-white">Unlockable Content</label>
                      <p class="dark:text-jacarta-300">
                        Include unlockable content that can only be revealed by the owner of the item.
                      </p>
                    </div>
                  </div>
                  <input
                    type="checkbox"
                    value="checkbox"
                    name="check"
                    class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-6 w-[2.625rem] cursor-pointer appearance-none rounded-full border-none after:absolute after:top-[0.1875rem] after:left-[0.1875rem] after:h-[1.125rem] after:w-[1.125rem] after:rounded-full after:transition-all checked:bg-none checked:after:left-[1.3125rem] checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                  />
                </div>
              </div> --}}

              <!-- Explicit & Sensitive Content -->
              {{-- <div class="dark:border-jacarta-600 border-jacarta-100 relative mb-6 border-b py-6">
                <div class="flex items-center justify-between">
                  <div class="flex">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 mr-2 mt-px h-4 w-4 shrink-0 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M12.866 3l9.526 16.5a1 1 0 0 1-.866 1.5H2.474a1 1 0 0 1-.866-1.5L11.134 3a1 1 0 0 1 1.732 0zM11 16v2h2v-2h-2zm0-7v5h2V9h-2z"
                      />
                    </svg>

                    <div>
                      <label class="font-display text-jacarta-700 dark:text-white">Explicit & Sensitive Content</label>

                      <p class="dark:text-jacarta-300">
                        Set this item as explicit and sensitive content.<span
                          class="inline-block"
                          data-tippy-content="Setting your asset as explicit and sensitive content, like pornography and other not safe for work (NSFW) content, will protect users with safe search while browsing Xhibiter."
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="dark:fill-jacarta-300 fill-jacarta-500 ml-2 -mb-[2px] h-4 w-4"
                          >
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                              d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM11 7h2v2h-2V7zm0 4h2v6h-2v-6z"
                            ></path>
                          </svg>
                        </span>
                      </p>
                    </div>
                  </div>
                  <input
                    type="checkbox"
                    value="checkbox"
                    name="check"
                    class="checked:bg-accent checked:focus:bg-accent checked:hover:bg-accent after:bg-jacarta-400 bg-jacarta-100 relative h-6 w-[2.625rem] cursor-pointer appearance-none rounded-full border-none after:absolute after:top-[0.1875rem] after:left-[0.1875rem] after:h-[1.125rem] after:w-[1.125rem] after:rounded-full after:transition-all checked:bg-none checked:after:left-[1.3125rem] checked:after:bg-white focus:ring-transparent focus:ring-offset-0"
                  />
                </div>
              </div> --}}

              <!-- Supply -->
              <div class="mb-6">
                <label for="item-supply" class="font-display text-jacarta-700 mb-2 block dark:text-white">Price<span class="text-red">*</span></label>

                <div class="mb-3 flex items-center space-x-2">
                  <p class="dark:text-jacarta-300 text-2xs">
                    The price of the items must be number or 2 d.p.!
                    <span
                      class="inline-block"
                      data-tippy-content="Setting your asset as explicit and sensitive content, like pornography and other not safe for work (NSFW) content, will protect users with safe search while browsing Xhibiter."
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="dark:fill-jacarta-300 fill-jacarta-500 ml-1 -mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM11 7h2v2h-2V7zm0 4h2v6h-2v-6z"
                        ></path>
                      </svg>
                    </span>
                  </p>
                </div>

                <input
                  type="number" step="0.01"
                  id="item-supply" name="price"
                  class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white" value="{{ $item->price }}"
                  placeholder/>
              </div>

              <div class="mb-6">
                <label for="item-supply" class="font-display text-jacarta-700 mb-2 block dark:text-white">Quantity<span class="text-red">*</span></label>

                <div class="mb-3 flex items-center space-x-2">
                  <p class="dark:text-jacarta-300 text-2xs">
                    The number of items that can be minted. No gas cost to you!
                    <span
                      class="inline-block"
                      data-tippy-content="Setting your asset as explicit and sensitive content, like pornography and other not safe for work (NSFW) content, will protect users with safe search while browsing Xhibiter."
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="dark:fill-jacarta-300 fill-jacarta-500 ml-1 -mb-[3px] h-4 w-4"
                      >
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                          d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM11 7h2v2h-2V7zm0 4h2v6h-2v-6z"
                        ></path>
                      </svg>
                    </span>
                  </p>
                </div>

                <input
                  type="number"
                  id="item-supply" name="quantity"
                  class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white" value="{{ $item->quantity }}"
                  placeholder/>
              </div>

               <!-- Expire Date -->
               <div class="mb-6">
                <label for="item-name" class="font-display text-jacarta-700 mb-2 block dark:text-white">Expire Date<span class="text-red">*</span></label
                >
                <input
                  type="date" name="expire_date"
                  id="item-date"
                  class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white" value="{{ $item->expire_date }}"
                />
              </div>

              <!-- Blockchain -->
              <div class="mb-6">
                <label for="item-supply" class="font-display text-jacarta-700 mb-2 block dark:text-white">Blockchain <span class="text-red">*</span></label>

                <div class="dropdown relative mb-4 cursor-pointer">
                    <input type="hidden" name="blockchain" value="{{ $item->blockchain }}" class="dropdown-input">
                  <div
                    class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 flex items-center justify-between rounded-lg border bg-white py-3.5 px-3 text-base dark:text-white"
                    role="button"
                    id="item-blockchain"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="flex items-center">
                      <img src="{{ asset('frontend_assets') }}/img/chains/ETH.png" alt="eth" class="mr-2 h-5 w-5 rounded-full dropdown-toggle__image" />
                      <span class="dropdown-toggle__text">{{ $item->blockchain }}</span>
                    </span>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-500 h-4 w-4 dark:fill-white">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
                    </svg>
                  </div>

                  <div
                    class="dropdown-menu dark:bg-jacarta-800 z-10 hidden w-full whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                    aria-labelledby="item-blockchain"
                  >
                    <button type="button"
                      class="dropdown-item text-jacarta-700 dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-base transition-colors dark:text-white"
                    >
                      <span class="flex items-center">
                        <img src="{{ asset('frontend_assets') }}/img/chains/ETH.png" alt="eth" class="mr-2 h-5 w-5 rounded-full dropdown-item__image" />
                        Ethereum
                      </span>
                    </button>
                    <button  type="button"
                      class="dropdown-item dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-base transition-colors dark:text-white"
                    >
                      <span class="flex items-center">
                        <img src="{{ asset('frontend_assets') }}/img/chains/FLOW.png" alt="flow" class="mr-2 h-5 w-5 rounded-full dropdown-item__image" />
                        Flow
                      </span>
                    </button>

                    <button type="button"
                      class="dropdown-item dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-base transition-colors dark:text-white"
                    >
                      <span class="flex items-center">
                        <img src="{{ asset('frontend_assets') }}/img/chains/FUSD.png" alt="fusd" class="mr-2 h-5 w-5 rounded-full dropdown-item__image" />
                        FUSD
                      </span>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Freeze metadata -->
              {{-- <div class="mb-6">
                <div class="mb-2 flex items-center space-x-2">
                  <label for="item-freeze-metadata" class="font-display text-jacarta-700 block dark:text-white"
                    >Freeze metadata</label
                  >
                  <span
                    class="inline-block"
                    data-tippy-content="Setting your asset as explicit and sensitive content, like pornography and other not safe for work (NSFW) content, will protect users with safe search while browsing Xhibiter."
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="dark:fill-jacarta-300 fill-jacarta-500 mb-[2px] h-5 w-5"
                    >
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM11 7h2v2h-2V7zm0 4h2v6h-2v-6z"
                      ></path>
                    </svg>
                  </span>
                </div>

                <p class="dark:text-jacarta-300 text-2xs mb-3">
                  Freezing your metadata will allow you to permanently lock and store all of this item's content in
                  decentralized file storage.
                </p>

                <input
                  type="text"
                  disabled
                  id="item-freeze-metadata"
                  class="dark:bg-jacarta-700 bg-jacarta-50 border-jacarta-100 dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 dark:text-white"
                  placeholder="To freeze your metadata, you must create your item first."
                />
              </div> --}}

              <!-- Submit -->
              <button type="submit"
                class="bg-accent-lighter bg-black cursor-default rounded-full py-3 px-8 text-center font-semibold text-white transition-all" style="cursor: pointer">
                Update
              </button>
            </div>

            <!-- Properties Modal -->
            <div class="modal fade" id="propertiesModal" tabindex="-1" aria-labelledby="addPropertiesLabel" aria-hidden="true">
                <div class="modal-dialog max-w-2xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addPropertiesLabel">Add properties</h5>
                    <small class="text-red ml-2">(Please put all info if select)</small>
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
                    <p class="dark:text-jacarta-300 mb-8">
                        Item Properties show up underneath your item, are clickable, and can be filtered in your collection's
                        sidebar.
                    </p>

                    @forelse ($properties as $property)
                        <div class="relative my-3 flex items-center new_properties">
                            <button type="button"
                            class="dark:bg-jacarta-700 dark:border-jacarta-600 hover:bg-jacarta-100 border-jacarta-100 bg-jacarta-50 flex h-12 w-12 shrink-0 items-center justify-center self-end rounded-l-lg border border-r-0 remove--new_properties"
                            >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                width="24"
                                height="24"
                                class="fill-jacarta-500 dark:fill-jacarta-300 h-6 w-6"
                            >
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
                                ></path>
                            </svg>
                            </button>

                            <div class="flex-1">
                            <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                                >Name</label
                            >
                            <input
                                type="text" name="propertyname[]"
                                class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full rounded-r-lg border focus:ring-inset dark:text-white propertyName" value="{{ $property->name }}"
                            />
                            </div>

                            <div class="flex-1">
                            <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                                >Type</label
                            >
                            <input
                                type="text" name="propertytype[]"
                                class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full border border-r-0 focus:ring-inset dark:text-white propertyType" value="{{ $property->type }}"
                            />
                            </div>

                            <div class="flex-1">
                            <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                                >Trait</label
                            >
                            <input
                                type="number" name="propertytrait[]"
                                class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full border border-r-0 focus:ring-inset dark:text-white propertyTrait" value="{{ $property->trait }}"
                            />
                            </div>
                        </div>
                    @empty
                    <div class="relative my-3 flex items-center new_properties">
                        <button type="button"
                        class="dark:bg-jacarta-700 dark:border-jacarta-600 hover:bg-jacarta-100 border-jacarta-100 bg-jacarta-50 flex h-12 w-12 shrink-0 items-center justify-center self-end rounded-l-lg border border-r-0 remove--new_properties"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            width="24"
                            height="24"
                            class="fill-jacarta-500 dark:fill-jacarta-300 h-6 w-6"
                        >
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                            d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
                            ></path>
                        </svg>
                        </button>

                        <div class="flex-1">
                        <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                            >Name</label
                        >
                        <input
                            type="text" name="propertyname[]"
                            class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full rounded-r-lg border focus:ring-inset dark:text-white propertyName"
                            placeholder="Skin"
                        />
                        </div>

                        <div class="flex-1">
                        <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                            >Type</label
                        >
                        <input
                            type="text" name="propertytype[]"
                            class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full border border-r-0 focus:ring-inset dark:text-white propertyType"
                            placeholder="Type"
                        />
                        </div>

                        <div class="flex-1">
                        <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                            >Trait</label
                        >
                        <input
                            type="number" min="0" name="propertytrait[]"
                            class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full border border-r-0 focus:ring-inset dark:text-white propertyTrait"
                            placeholder="0"
                        />
                        </div>
                    </div>
                    @endforelse

                    <div class="properties-container"></div>

                    <button type="button"
                        class="hover:bg-accent border-accent text-accent mt-2 rounded-full border-2 py-2 px-8 text-center text-sm font-semibold transition-all hover:text-white" id="add_more">
                        Add More
                    </button>
                    </div>
                    <!-- end body -->

                    <div class="modal-footer">
                    <div class="flex items-center justify-center space-x-4">
                        <button
                        type="button" id="save_property"
                        class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
                        >
                        Save
                        </button>
                    </div>
                    </div>
                </div>
                </div>
            </div>

        </form>
      </div>
    </section>
    <!-- end create -->
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



  <!-- Levels Modal -->
  <div class="modal fade" id="levelsModal" tabindex="-1" aria-labelledby="addLevelsLabel" aria-hidden="true">
    <div class="modal-dialog max-w-2xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addLevelsLabel">Add levels</h5>
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
          <p class="dark:text-jacarta-300 mb-8">
            Levels show up underneath your item, are clickable, and can be filtered in your collection's sidebar.
          </p>

          <div class="relative my-3 flex items-center">
            <button
              class="dark:bg-jacarta-700 dark:border-jacarta-600 hover:bg-jacarta-100 border-jacarta-100 bg-jacarta-50 flex h-12 w-12 shrink-0 items-center justify-center self-end rounded-l-lg border border-r-0"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="fill-jacarta-500 dark:fill-jacarta-300 h-6 w-6"
              >
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path
                  d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
                ></path>
              </svg>
            </button>

            <div class="w-1/2">
              <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                >Name</label
              >
              <input
                type="text"
                class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full border border-r-0 focus:ring-inset dark:text-white"
                placeholder="Speed"
              />
            </div>

            <div class="flex w-1/2 items-end">
              <div class="flex-1">
                <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                  >Value</label
                >
                <input
                  type="number"
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full border focus:ring-inset dark:text-white"
                  placeholder="0"
                />
              </div>

              <div
                class="dark:bg-jacarta-800 dark:text-jacarta-400 dark:border-jacarta-600 bg-jacarta-50 border-jacarta-100 flex h-12 w-12 items-center justify-center self-end border-y px-2"
              >
                Of
              </div>

              <div class="flex-1 self-end">
                <input
                  type="number"
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full rounded-r-lg border focus:ring-inset dark:text-white"
                  placeholder="0"
                />
              </div>
            </div>
          </div>

          <button
            class="hover:bg-accent border-accent text-accent mt-2 rounded-full border-2 py-2 px-8 text-center text-sm font-semibold transition-all hover:text-white"
          >
            Add More
          </button>
        </div>
        <!-- end body -->

        <div class="modal-footer">
          <div class="flex items-center justify-center space-x-4">
            <button
              type="button"
              class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
            >
              Save
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
        $('#add_more').click(function (){
            // alert('hi');
            let new_properties_html =
            `<div class="relative my-3 flex items-center new_properties">
                <button
                class="dark:bg-jacarta-700 dark:border-jacarta-600 hover:bg-jacarta-100 border-jacarta-100 bg-jacarta-50 flex h-12 w-12 shrink-0 items-center justify-center self-end rounded-l-lg border border-r-0 remove--new_properties">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="fill-jacarta-500 dark:fill-jacarta-300 h-6 w-6">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                    d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path>
                </svg>
                </button>

                <div class="flex-1">
                <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white">Name</label>
                <input
                    type="text" name="propertyname[]"
                    class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full rounded-r-lg border focus:ring-inset dark:text-white"
                    placeholder="Skin"/>
                </div>

                <div class="flex-1">
                <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white">Type</label>
                <input
                    type="text" name="propertytype[]"
                    class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full border border-r-0 focus:ring-inset dark:text-white"
                    placeholder="Type"/>
                </div>

                <div class="flex-1">
                <label class="font-display text-jacarta-700 mb-3 block text-base font-semibold dark:text-white"
                  >Trait</label
                >
                <input
                  type="number" name="propertytrait[]"
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 focus:ring-accent border-jacarta-100 dark:placeholder-jacarta-300 h-12 w-full border border-r-0 focus:ring-inset dark:text-white"
                  placeholder="0"
                />
              </div>
            </div>`;

            $('.properties-container').append(new_properties_html);
        });

        $(document).on('click', '.remove--new_properties', function(){
            $(this).closest(".new_properties").remove();
        })

        $('body').on('click', '#save_property', function(){
            $('#propertiesModal').modal('hide');
        })

    });
  </script>

    {{-- <script>
        $(document).ready(function(){
            $('#save_property').on('click', function (){
                $('.propertiesModal').modal('hide')
            });
        });
    </script> --}}

    <script>
        $(document).ready(function () {
            $(".dropdown .dropdown-item").on("click", function(){
                $(this).closest(".dropdown").find(".dropdown-input").val($.trim($(this).text()));
                $(this).closest(".dropdown").find(".dropdown-toggle__text").text($(this).text());
                $(this).closest(".dropdown").find(".dropdown-toggle__image").attr("src", $(this).find(".dropdown-item__image").attr("src"));
                console.log($(this).closest(".dropdown").find(".dropdown-input").val())
            });
        });
    </script>

<script>
    document.getElementById('file-upload').onchange = function() {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('item_output').src = src
    }
  </script>

<script>
    $(document).ready(function () {
    var today = new Date().toISOString().split('T')[0];
    $("#item-date").attr('min', today);
});
</script>

@endsection
