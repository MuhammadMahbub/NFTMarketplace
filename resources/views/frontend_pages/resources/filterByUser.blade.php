@forelse ($user_items as $item)
<article>
  <div
    class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
  >
    <figure class="relative">
      <a href="{{ route('item_details', $item->slug ?? '') }}">
        <img style="width: 230px; height: 230px"
          src="{{ asset('uploads/items') }}/{{ $item->image ?? 'default.jpg'}}"
          alt="item 5"
          class="w-full rounded-[0.625rem]"
          loading="lazy"
        />
      </a>
      <div class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2">
        @php
            $like_exist = App\Models\Like::where('item_id', $item->id)->where('user_id', Auth::id())->first();
            $like_count = App\Models\Like::where('item_id', $item->id)->count()
        @endphp
        @if (Auth::check())
        <a style="cursor: pointer" class="like_btn" item_id="{{ $item->id }}">
            <span class="like_icon{{ $item->id }}">
                @if($like_exist)
                    <i class="fa fa-heart"></i>
                @else
                    <i class="fa-regular fa-heart"></i>
                @endif
            </span>
            <span class="dark:text-jacarta-200 text-sm likeCount{{ $item->id }}">{{ $like_count }}</span>
        </a>
        @else
        <a
            style="cursor: pointer"
            data-bs-toggle="modal"
            data-bs-target="#loginModal{{ $item->id }}">
            <span>
                <i class="fa-regular fa-heart"></i>
            </span>
        </a>
        <span class="dark:text-jacarta-200 text-sm">{{ $like_count }}</span>
        @endif
      </div>
      <div class="absolute left-3 -bottom-3">
        <div class="flex -space-x-2">
          <a href="{{ route('user',$item->get_creator->id ?? '') }}">
            <img
              src="{{ asset('uploads/images/users') }}/{{ $item->get_creator->profile_photo_path ?? 'default.jpg'}}"
              alt="creator"
              class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
              data-tippy-content="Creator: {{ $item->get_creator->name ?? "N/A"}}"
            />
          </a>
          <a href="#">
            <img
              src="{{ asset('uploads/images/users') }}/{{ $item->get_owner->profile_photo_path ?? 'default.jpg' }}"
              alt="owner"
              class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
              data-tippy-content="Owner: {{ $item->get_owner->name ?? 'N/A' }}"
            />
          </a>
        </div>
      </div>
    </figure>
    <div class="mt-7 flex items-center justify-between">
      <a href="{{ route('item_details', $item->slug ?? '') }}">
        <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
          >{{ $item->name ?? "N/A"}}</span
        >
      </a>
      <div class="dark:hover:bg-jacarta-600 dropup hover:bg-jacarta-100 rounded-full">
        <a
          href="#"
          class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm"
          role="button"
          id="itemActions"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <svg
            width="16"
            height="4"
            viewBox="0 0 16 4"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="dark:fill-jacarta-200 fill-jacarta-500"
          >
            <circle cx="2" cy="2" r="2" />
            <circle cx="8" cy="2" r="2" />
            <circle cx="14" cy="2" r="2" />
          </svg>
        </a>
        <div
          class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
          aria-labelledby="itemActions"
        >
        @auth
        @if ($item->creator_id != Auth::id())
        <button data-bs-toggle="modal" data-bs-target="#placeBidModal_{{ $item->id }}" class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
            New bid
          </button>
          <hr class="dark:bg-jacarta-600 bg-jacarta-100 my-2 mx-4 h-px border-0" />
        @endauth
        @endif

        @push('modals')
        <!-- Place Bid Modal -->
        <div class="modal testModal fade" id="placeBidModal_{{ $item->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
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
                                <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Body -->
                            <div class="modal-body p-6">
                                @php
                                    $latest_bid = App\Models\PlaceBid::where('item_id',$item->id)->latest('id')->first();
                                @endphp
                                <div>
                                    <span class="font-display text-jacarta-700 text-sm font-semibold dark:text-white">Current Bid: </span>{{ $latest_bid->bid_amount ?? '' }}
                                </div>

                                <div class="dark:border-jacarta-600 border-jacarta-100 relative mb-2 flex items-center overflow-hidden rounded-lg border" >
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
                                    <input type="hidden" class="item_id{{ $item->id }}" name="item_id" value="{{ $item->id }}">
                                    <input
                                    type="text" name="bid_amount"
                                    class="bid_amount{{ $item->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                    placeholder="Amount"
                                    />
                                    <div class="bg-jacarta-50 border-jacarta-100 flex flex-1 justify-end self-stretch border-l">
                                        <span class="self-center px-2 text-sm">${{ $item->price }}</span>
                                    </div>
                                </div>

                                <!-- Terms -->
                                @auth
                                @else
                                <h3 style="color: red">Please
                                    <a style="color: blue; cursor:pointer"
                                        data-bs-toggle="modal"
                                        data-bs-target="#loginModal{{ $item->id }}" >
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
                                    data-id="{{ $item->id }}"
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
                                    data-bs-target="#loginModal{{ $item->id }}"
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

          @auth
          @if ($item->get_creator->id==Auth::id())
          <a type="button" href="{{ route('user_edit_item', $item->slug ?? '') }}"
            class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
            Edit Item
          </a>
          @endif
          @endauth
          <button
            class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white">
            Refresh Metadata
          </button>
          <button
            class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
          >
            Share
          </button>
          {{-- <button data-bs-toggle="modal"
          data-bs-target="#ReportModal{{ $item->id }}"
            class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 block w-full rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
          >
            Report
          </button> --}}
        </div>
      </div>
    </div>
    <div class="mt-2 text-sm">
      <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">{{ $item->price ?? ''}} ETH</span>
      <span class="dark:text-jacarta-300 text-jacarta-500">{{ $item->quantity ?? ''}}</span> Available
    </div>

    <div class="mt-8 flex items-center justify-between">
      <button
        class="text-accent font-display text-sm font-semibold"
        data-bs-toggle="modal"
        data-bs-target="#buyNowModal"
      >
      {{ $item->buy_button_text ?? 'N/A'}}
      </button>
      <a href="{{ route('item_details', $item->slug ?? '') }}" class="group flex items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          width="24"
          height="24"
          class="group-hover:fill-accent dark:fill-jacarta-200 fill-jacarta-500 mr-1 mb-[3px] h-4 w-4"
        >
          <path fill="none" d="M0 0H24V24H0z" />
          <path
            d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.25 4 6.824 5.387 5.385 7.5H8v2H2v-6h2V6c1.824-2.43 4.729-4 8-4zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"
          />
        </svg>
        <span class="group-hover:text-accent font-display dark:text-jacarta-200 text-sm font-semibold"
          >{{ $item->view_button_text ?? "N/A"}}</span
        >
      </a>
    </div>
  </div>
</article>

    {{-- login modal --}}
    @push('modals')
    <div class="modal loginModal fade" id="loginModal{{ $item->id }}" tabindex="-1" aria-labelledby="placeBidLabel" aria-hidden="true">
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
                                class="email{{ $item->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
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
                                class="password{{ $item->id }} focus:ring-accent h-12 w-full flex-[3] border-0 focus:ring-inset"
                                placeholder="Password"
                                />
                            </div>
                            <div class="flex items-center justify-center space-x-4">
                                <a
                                    data_id="{{ $item->id }}"
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

    {{-- @push('modals')
    <div class="modal fade" id="ReportModal{{ $item->id }}" tabindex="-1" aria-labelledby="walletModalLabel" aria-hidden="true">
        <div class="modal-dialog max-w-2xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="walletModalLabel">Report this collection</h5>
            </div>
            <div class="modal-body p-6 text-center">
                <form action="{{ route('ItemReport.problemStore') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" class="user_id{{ $item->id }}" value="{{ Auth::id() }}">
                    <input type="hidden" name="item_id" class="item_id{{ $item->id }}" value="{{ $item->id }}">
                    <div class="dropdown my-1 cursor-pointer">
                        <select
                            class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 dark:text-jacarta-300 flex items-center justify-between rounded-lg border bg-white py-3 px-3 w-full report_id{{ $item->id }}"
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
                        <button type="button" data-id="{{ $item->id }}"
                            style="margin-top: 20px"
                            class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all submitReport"
                            >
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    @endpush --}}

@empty
    <p style="color: #f6851b">No Items Available</p>
@endforelse
