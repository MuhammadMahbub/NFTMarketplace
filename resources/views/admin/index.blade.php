@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }}
@endsection

{{-- Menu Active --}}
@section('dashboard')
    active
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">{{ __('Admin Dashboard') }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
            </li>
        </ol>
    </div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/charts/chart-apex.css') }}">
<style>
    /* Hide scrollbar for Chrome, Safari and Opera */
    .example::-webkit-scrollbar {
    display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .example {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
    }
    .apexcharts-legend-text, .apexcharts-legend{
        display: none !important;
    }

</style>
@endsection

{{-- Content --}}
@section('content')


<section id="dashboard-analytics">

    {{-- <div class="row match-height">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">l
                    <img src="{{ asset('dashboard_assets/app-assets/images/elements/decore-left.png') }}" class="congratulations-img-left" alt="card-img-left" />
                    <img src="{{ asset('dashboard_assets/app-assets/images/elements/decore-right.png') }}" class="congratulations-img-right" alt="card-img-right" />
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <i data-feather="award" class="font-large-1"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white">{{ __('Congratulations') }} {{ Auth::user()->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card pb-4">
                <div class="card-header flex-column align-items-start">
                    <h4 class="card-title mb-75">{{ __('Total Items') }}</h4>
                    <span class="card-subtitle text-muted">{{ __('Statistics of total NFT') }} </span>
                </div>
                <div class="card-body">
                    <div id="items_chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12 pb-0">
            <div class="card">
                <div class="card-header flex-column align-items-start">
                    <h4 class="card-title mb-75">{{ __('Total Users') }}</h4>
                    <span class="card-subtitle text-muted">{{ __('Statistic of total Users') }}</span>
                </div>
                <div class="card-body">
                    <div id="userChart"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-12 pb-0">
            <div class="card">
                <div class="card-header flex-column align-items-start">
                    <h4 class="card-title mb-75">{{ __('Todays Activity') }}</h4>
                    <span class="card-subtitle text-muted">{{ __('Statistics of Activity') }}</span>
                </div>
                <div class="card-body">
                    <div style="margin-left:80px" id="simplePieChart"></div>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection

@section('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
<script src="{{ asset('dashboard_assets/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/app-assets/vendors/js/charts/chart-apex.js') }}"></script>
<script src="{{ asset('dashboard_assets/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>

<script>
    var options = {
            series: [{
                name: 'Item Created',
                data: @json($total_items)
                }],
            chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false,
            }
        },
        xaxis: {
          categories: ['{{ __("January") }}', '{{ __("Fabruary") }}', '{{ __("March") }}', '{{ __("April") }}', '{{ __("May") }}', '{{ __("June") }}', '{{ __("July") }}', '{{ __("August") }}', '{{ __("September") }}', '{{ __("October") }}', '{{ __("November") }}', '{{ __("December") }}'],
        }
    };

    var chart = new ApexCharts(document.querySelector("#items_chart"), options);
    chart.render();
</script>
<script>
    var options = {
          series:[{
                    name: 'Total User',
                    data: @json($monthly_users)
                    }
                ],
          chart: {
          type: 'bar',
          height: 350
        },
        annotations: {
          xaxis: [{
            x: 500,
            borderColor: '#00E396',
            label: {
              borderColor: '#00E396',
              style: {
                color: '#fff',
                background: '#00E396',
              },
            }
          }]
        },
        plotOptions: {
          bar: {
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        xaxis: {
            categories: ['{{ __("January") }}', '{{ __("Fabruary") }}', '{{ __("March") }}', '{{ __("April") }}', '{{ __("May") }}', '{{ __("June") }}', '{{ __("July") }}', '{{ __("August") }}', '{{ __("September") }}', '{{ __("October") }}', '{{ __("November") }}', '{{ __("December") }}'],
        },
        grid: {
          xaxis: {
            lines: {
              show: true
            }
          }
        },
        yaxis: {
          reversed: true,
          axisTicks: {
            show: true
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#userChart"), options);
        chart.render();
</script>
<script>
    var options = {
          series: [@json($total_bid), @json($total_report), @json($today_likes)],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Total Bid', 'All Report', 'All Like'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#simplePieChart"), options);
        chart.render();
</script>
{{-- <script>
    var options = {
          series: [
            @json($test1)
          , @json($test2), @json($test3)],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['All BID', 'All Like', 'All Report'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#itemActivityChart"), options);
        chart.render();
</script> --}}
@endsection
