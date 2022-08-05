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

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none !important;
        }
        .copyURL{
            position: relative;
        }
        .copyURL__input{
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none;
            opacity: 0;
        }
        #notify-icon{
            position: absolute;
            right:-4px;
            top:-10px;
            color:aliceblue;
            padding: 2px 7px;
            background: rgba(244, 42, 42, 0.808);
            border-radius: 50%;
        }

        .bg_shade_color{
            background: rgb(216, 216, 216);
        }
    </style>

    @stack('css')

  </head>

  <body class="dark:bg-jacarta-900 font-body text-jacarta-500 overflow-x-hidden" itemscope itemtype="http://schema.org/WebPage">

    @include('frontend_pages.header')

    <section class="py-24">
        @yield('content')
    </section>

    @include('frontend_pages.footer')

    @stack('modals')


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


    @yield('js')

    <script>
        $(document).ready(function () {
            $('#loginFromUpload').on('click', function (){
                let email = $('#emailUpload').val();
                let password = $('#passwordUpload').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('login') }}",
                    type: "POST",
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function (response){
                        $('.loginModalUpload').modal('hide');
                        location.reload();
                    }
                });
            });
        });
    </script>

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

    <script>
        $(document).ready(function(){
            $(".copyURL").on("click", function(){
                let pageURL = window.location.href;
                $(this).find(".copyURL__input").remove();
                $(this).append('<input type="text" name="url" class="copyURL__input">');
                $(this).find(".copyURL__input").val(pageURL);
                $(this).find(".copyURL__input").select();
                document.execCommand("copy");
                console.log(pageURL);
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $(".notify_msg").on("click", function(){
                let notify_id = $(this).attr('data-id')
            //    alert(notify_id)
               $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('notification_seen') }}",
                    type: "POST",
                    data: {
                        notify_id: notify_id,
                    },
                    success: function (response){
                        window.location.href= "{{ url('/notification-view') }}/" + notify_id
                    },
                });
            });
        });
    </script>

  </body>
</html>
