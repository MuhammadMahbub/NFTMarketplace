@extends('layouts.app')

@section('content')
<main>
    <!-- Page Title -->
    <section class="after:bg-jacarta-900/60 relative bg-cover bg-center bg-no-repeat py-32 after:absolute after:inset-0"
      style="background-image: url('{{ asset('uploads/images/contactUs') }}/{{ $contactUsTitles->image }}')" >
      <div class="container relative z-10">
        <h1 class="font-display text-center text-4xl font-medium text-white">{{ $contactUsTitles->title }}</h1>
      </div>
    </section>

    <!-- Contact -->
    <section class="dark:bg-jacarta-800 relative py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="{{ asset('frontend_assets') }}/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <div class="container">
        <div class="lg:flex">
          <!-- Contact Form -->
          <div class="mb-12 lg:mb-0 lg:w-2/3 lg:pr-12">
            <h2 class="font-display text-jacarta-700 mb-4 text-xl dark:text-white">{{ $contactUsTitles->form_title }}</h2>
            <p class="dark:text-jacarta-300 mb-16 text-lg leading-normal">
                {{ $contactUsTitles->form_meta_title }}
            </p>
            <form id="contact-form" method="POST" action="{{ route('guest.user') }}">
                @csrf
              @auth
              <div class="mb-4">
                <label for="message" class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white"
                  >Message<span class="text-red">*</span></label
                >
                <textarea
                  id="message"
                  class="contact-form-input dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white"
                  required
                  name="message"
                  rows="5"
                >{{ old('message') }}</textarea>
              </div>
              @else
              <div class="flex space-x-7">
                <div class="mb-6 w-1/2">
                  <label for="name" class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white"
                    >Name<span class="text-red">*</span></label
                  >
                  <input
                    name="name"
                    class="contact-form-input dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white"
                    id="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                  />
                </div>

                <div class="mb-6 w-1/2">
                  <label for="email" class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white"
                    >Email<span class="text-red">*</span></label
                  >
                  <input
                    name="email"
                    class="contact-form-input dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white"
                    id="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                  />
                </div>
              </div>

              <div class="mb-4">
                <label for="message" class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white"
                  >Message<span class="text-red">*</span></label
                >
                <textarea
                  id="message"
                  class="contact-form-input dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white"
                  required
                  name="message"
                  rows="5"
                >{{ old('message') }}</textarea>
              </div>
              @endauth

              <div class="mb-6 flex items-center space-x-2">
                <input
                  type="checkbox"
                  id="contact-form-consent-input"
                  name="agree-to-terms"
                  class="checked:bg-accent dark:bg-jacarta-600 text-accent border-jacarta-200 focus:ring-accent/20 dark:border-jacarta-500 h-5 w-5 self-start rounded focus:ring-offset-0"
                />
                <label for="contact-form-consent-input" class="dark:text-jacarta-200 text-sm"
                >{{ __('I agree to the') }} <a href="{{ route('terms_of_services') }}" class="text-accent">{{ __('Terms of Service') }}</a></label
                >
              </div>
              <div>
                  <div id="errorText" class="text-muted mb-2"><p style="color: rgba(248, 140, 140, 0.93)"></p></div>
               </div>

              <button
                type="button"
                id="submitMessage"
                class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all"
              >
                Submit
              </button>

              <div
                id="contact-form-notice"
                class="relative mt-4 hidden rounded-lg border border-transparent p-4"
              ></div>
            </form>
          </div>

          <!-- Info -->
          <div class="lg:w-1/3 lg:pl-5">
            <h2 class="font-display text-jacarta-700 mb-4 text-xl dark:text-white">{{ $contactUsTitles->address_title }}</h2>
            <p class="dark:text-jacarta-300 mb-6 text-lg leading-normal">
                {{ $contactUsTitles->address_meta_title }}
            </p>

            <div
              class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 rounded-2.5xl border bg-white p-10"
            >
              <div class="mb-6 flex items-center space-x-5">
                <span
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 bg-light-base flex h-11 w-11 shrink-0 items-center justify-center rounded-full border"
                >
                {!! $contactAddress->phone_icon !!}
                </span>

                <div>
                  <span class="font-display text-jacarta-700 block text-base dark:text-white">{{ $contactAddress->phone_title }}</span>
                  <a href="tel:123-123-456" class="hover:text-accent dark:text-jacarta-300 text-sm">{{ $contactAddress->phone }}</a>
                </div>
              </div>
              <div class="mb-6 flex items-center space-x-5">
                <span
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 bg-light-base flex h-11 w-11 shrink-0 items-center justify-center rounded-full border"
                >
                  {!! $contactAddress->address_icon !!}
                </span>

                <div>
                  <span class="font-display text-jacarta-700 block text-base dark:text-white">{{ $contactAddress->address_title }}</span>
                  <address class="dark:text-jacarta-300 text-sm not-italic">{{ $contactAddress->address }}</address>
                </div>
              </div>
              <div class="flex items-center space-x-5">
                <span
                  class="dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 bg-light-base flex h-11 w-11 shrink-0 items-center justify-center rounded-full border"
                >
                  {!! $contactAddress->email_icon !!}
                </span>

                <div>
                  <span class="font-display text-jacarta-700 block text-base dark:text-white">{{ $contactAddress->email_title }}</span>
                  <a
                    href="mailto:office@xhibiter.com"
                    class="hover:text-accent dark:text-jacarta-300 text-sm not-italic"
                    >{{ $contactAddress->email }}</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end contact -->
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
@endsection
@section('js')
  <script>
    $(document).ready(function () {
        $('#submitMessage').on('click', function (){
           let checkbox = $('#contact-form-consent-input');
           if(checkbox.is(':checked')){
            let name = $('#name').val();
            let email = $('#email').val();
            let message = $('#message').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('guest.user') }}",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message,
                },
                success: function (response){
                    let name = $('#name').val('');
                    let email = $('#email').val('');
                    let message = $('#message').val('');
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(response.success);
                },
                error: function(reject){
                        alertify.set('notifier','position', 'top-right');
                        alertify.error(reject.responseJSON.errors.name[0]);
                        alertify.error(reject.responseJSON.errors.email[0]);
                        alertify.error(reject.responseJSON.errors.message[0]);
                    },
            });
           }else{
            $('#errorText').html('<p style="color:red;font-weight:bold">Please Check the box</p>');
           }
        });
    });
  </script>
@endsection
