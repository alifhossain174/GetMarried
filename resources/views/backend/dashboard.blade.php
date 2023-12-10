@extends('backend.master')

@section('header_css')
    <script src="{{ url('backend_assets') }}/libs/apexcharts/apexcharts.min.js"></script>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <span class="text-muted text-uppercase fs-12 fw-bold">Biodata of Brides</span>
                            <h3 class="mb-0">
                                {{ number_format($biodataBrides) }}
                            </h3>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            {{-- <div id="top-chart-{{$product->id}}-init" class="apex-charts"></div> --}}
                            <span class="text-success fw-bold fs-13">
                                <i class="uil uil-users-alt" style="font-size: 30px; color: #5369f8;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <span class="text-muted text-uppercase fs-12 fw-bold">Biodata of Grooms</span>
                            <h3 class="mb-0">
                                {{ number_format($biodataGrooms) }}
                            </h3>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            {{-- <div id="top-chart-102-init" class="apex-charts"></div> --}}
                            <span class="text-success fw-bold fs-13">
                                <i class="bi bi-person-badge" style="font-size: 30px; color: #ffbe0b;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <span class="text-muted text-uppercase fs-12 fw-bold">Quesrions for Biodata</span>
                            <h3 class="mb-0">
                                {{ number_format($biodataQuestions) }}
                            </h3>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            {{-- <div id="top-chart-{{$product->id}}-init" class="apex-charts"></div> --}}
                            <span class="text-success fw-bold fs-13">
                                <i class="bi bi-question-circle" style="font-size: 30px; color: #43d39e;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <span class="text-muted text-uppercase fs-12 fw-bold">Total Users</span>
                            <h3 class="mb-0">
                                {{ number_format($totalCustomers) }}
                            </h3>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            {{-- <div id="top-chart-{{$product->id}}-init" class="apex-charts"></div> --}}
                            <span class="text-success fw-bold fs-13">
                                <i class="bi-people" style="font-size: 30px; color: #25c2e3;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // var options2 = {
            //     chart: {
            //         type: 'area',
            //         height: 45,
            //         width: 90,
            //         sparkline: {
            //             enabled: true
            //         }
            //     },
            //     series: [{
            //         data: [10, 20, 30, 10]
            //     }],
            //     stroke: {
            //         width: 2,
            //         curve: 'smooth'
            //     },
            //     markers: {
            //         size: 0
            //     },
            //     colors: ["#727cf5"],
            //     tooltip: {
            //         fixed: {
            //             enabled: false
            //         },
            //         x: {
            //             show: false
            //         },
            //         y: {
            //             title: {
            //                 formatter: function (seriesName) {
            //                     return 'asasdad'
            //                 }
            //             }
            //         },
            //         marker: {
            //             show: false
            //         }
            //     },
            //     fill: {
            //         type: 'gradient',
            //         gradient: {
            //             type: "vertical",
            //             shadeIntensity: 1,
            //             inverseColors: false,
            //             opacityFrom: 0.45,
            //             opacityTo: 0.05,
            //             stops: [45, 100]
            //         },
            //     }
            // }

            // new ApexCharts(document.querySelector("#top-chart-"+1+"-init"), options2).render();
        </script>
    </div>

    <!-- stats + charts -->
    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="p-3">
                        <h5 class="card-title header-title mb-0">Overview</h5>
                    </div>

                    <!-- stat 1 -->
                    <div class="d-flex p-3 border-bottom">
                        <div class="flex-grow-1">
                            <h4 class="mt-0 mb-1 fs-22">{{ number_format($totalLiked) }}</h4>
                            <span class="text-muted">Total Liked Biodata</span>
                        </div>
                        {{-- <i data-feather="users" class="align-self-center icon-dual icon-md"></i> --}}
                        <i class="bi-hand-thumbs-up" style="font-size: 25px;"></i>
                    </div>

                    <!-- stat 2 -->
                    <div class="d-flex p-3 border-bottom">
                        <div class="flex-grow-1">
                            <h4 class="mt-0 mb-1 fs-22">{{ number_format($totalDisLiked) }}</h4>
                            <span class="text-muted">Total Disliked Biodata</span>
                        </div>
                        {{-- <i data-feather="film" class="align-self-center icon-dual icon-md"></i> --}}
                        <i class="bi-hand-thumbs-down" style="font-size: 25px;"></i>
                    </div>

                    <!-- stat 3 -->
                    <div class="d-flex p-3 border-bottom">
                        <div class="flex-grow-1">
                            <h4 class="mt-0 mb-1 fs-22">{{ number_format($totalPaidView) }}</h4>
                            <span class="text-muted">Total Paid View</span>
                        </div>
                        {{-- <i data-feather="mouse-pointer" class="align-self-center icon-dual icon-md"></i> --}}
                        <i class="bi-eye" style="font-size: 25px;"></i>
                    </div>

                    <a href="" class="p-2 d-block text-end">&nbsp;</a>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0 header-title">Biodata View Graph</h5>
                    <div id="revenue-chart" class="apex-charts mt-3" dir="ltr"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="p-3">
                        <h5 class="card-title header-title mb-0">Overview</h5>
                    </div>

                    <!-- stat 1 -->
                    <div class="d-flex p-3 border-bottom">
                        <div class="flex-grow-1">
                            <h4 class="mt-0 mb-1 fs-22">{{ number_format($totalPricingPackages) }}</h4>
                            <span class="text-muted">Pricing Packages</span>
                        </div>
                        {{-- <i data-feather="layout" class="align-self-center icon-dual icon-md"></i> --}}
                        <i class="bi-credit-card-2-back" style="font-size: 25px;"></i>
                    </div>

                    <!-- stat 2 -->
                    <div class="d-flex p-3 border-bottom">
                        <div class="flex-grow-1">
                            <h4 class="mt-0 mb-1 fs-22">{{ number_format($totalPurchasedCount) }}</h4>
                            <span class="text-muted">Purchased Packages</span>
                        </div>
                        {{-- <i data-feather="film" class="align-self-center icon-dual icon-md"></i> --}}
                        <i class="bi-currency-exchange" style="font-size: 25px;"></i>
                    </div>

                    <!-- stat 3 -->
                    <div class="d-flex p-3 border-bottom">
                        <div class="flex-grow-1">
                            <h4 class="mt-0 mb-1 fs-22">{{ number_format($totalPurchasedAmount) }}</h4>
                            <span class="text-muted">Total Spent (BDT)</span>
                        </div>
                        {{-- <i data-feather="mouse-pointer" class="align-self-center icon-dual icon-md"></i> --}}
                        <i class="bi-cash-coin" style="font-size: 25px;"></i>
                    </div>

                    <a href="" class="p-2 d-block text-end">&nbsp;</a>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->

    <!-- notices -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-0 mb-0 header-title">Recent Pending Biodata Requests</h5>

                    <div class="table-responsive mt-2">
                        <table class="table table-hover table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">SL</th>
                                    <th scope="col" class="text-center">Type</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Marital Condition</th>
                                    <th scope="col" class="text-center">Birth Date</th>
                                    <th scope="col" class="text-center">Height</th>
                                    <th scope="col" class="text-center">Skin Tone</th>
                                    <th scope="col" class="text-center">Weight</th>
                                    <th scope="col" class="text-center">Blood Group</th>
                                    <th scope="col" class="text-center">Go to</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 1;
                                @endphp
                                @if (count($pendingBiodatas) > 0)
                                    @foreach ($pendingBiodatas as $biodata)
                                        <tr>
                                            <td class="text-center">{{ $sl }}</td>
                                            <td class="text-center">{{ $biodata->biodata_type }}</td>
                                            <td class="text-center">{{ $biodata->name }}</td>
                                            <td class="text-center">{{ $biodata->marital_condition }}</td>
                                            <td class="text-center">
                                                {{ $biodata ? date('jS F, Y', strtotime($biodata->created_at)) : '' }}</td>
                                            <td class="text-center">
                                                {{ $biodata->height_foot . '′' }}
                                                {{ $biodata->height_inch . '″' }}
                                            </td>
                                            <td class="text-center">
                                                @if ($biodata && $biodata->skin_tone == 1)
                                                    {{ __('label.skin_tone_black') }}
                                                @elseif ($biodata && $biodata->skin_tone == 2)
                                                    {{ __('label.skin_tone_brown') }}
                                                @elseif ($biodata && $biodata->skin_tone == 3)
                                                    {{ __('label.skin_tone_bright_brown') }}
                                                @elseif ($biodata && $biodata->skin_tone == 4)
                                                    {{ __('label.skin_tone_white') }}
                                                @elseif ($biodata && $biodata->skin_tone == 5)
                                                    {{ __('label.skin_tone_bright_white') }}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $biodata ? $biodata->weight : '' }}</td>
                                            <td class="text-center">
                                                @if ($biodata && $biodata->blood_group == 1)
                                                    A+
                                                @elseif ($biodata && $biodata->blood_group == 2)
                                                    A-
                                                @elseif ($biodata && $biodata->blood_group == 3)
                                                    B+
                                                @elseif ($biodata && $biodata->blood_group == 4)
                                                    B-
                                                @elseif ($biodata && $biodata->blood_group == 5)
                                                    AB+
                                                @elseif ($biodata && $biodata->blood_group == 6)
                                                    AB-
                                                @elseif ($biodata && $biodata->blood_group == 7)
                                                    O+
                                                @elseif ($biodata && $biodata->blood_group == 8)
                                                    O-
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('edit/biodata') }}/{{ $biodata->slug }}"
                                                    class="d-inline-block btn btn-sm btn-info rounded py-1"><b>Edit
                                                        Biodata</b></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="10" class="text-center">No Pending Biodata Found</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
@endsection

@section('footer_js')
    <script src="{{ url('backend_assets') }}/js/pages/dashboard.init.js"></script>
    <script>
        var now = new Date();
        var labels = <?php echo json_encode($months); ?> //['Jul-23', 'Aug-23', 'Sep-23', 'Oct-23', 'Nov-23', 'Dec-23'];

        var options = {
            chart: {
                height: 329,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            series: [{
                    name: "Bride's Biodata",
                    data: <?php echo json_encode($bridesBiodataViews); ?>
                },
                {
                    name: "Groom's Biodata",
                    data: <?php echo json_encode($groomsBiodataViews); ?>
                },
            ],
            zoom: {
                enabled: false
            },
            legend: {
                show: true
            },
            colors: ['#43d39e', '#6489e8'],
            xaxis: {
                type: 'string',
                categories: labels,
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false
                },
                labels: {

                }
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        // return val + "k"
                        return val
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    type: "vertical",
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [45, 100]
                },
            },
        }

        var chart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            options
        );

        chart.render();
    </script>
@endsection
