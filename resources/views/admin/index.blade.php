
@extends('admin.layout.master')

@section('title', 'Home')

@section('body')
<base href="{{asset('/')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
    <style>
        /*Số liệu*/
        /* .placeholders {
            margin-bottom: 30px;
            text-align: center;
        }
        .row {
            margin-right: -15px;
            margin-left: -15px;
            margin-bottom: 20px
        }
        .col-sm-3, .col-sm-6{
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
        .placeholders {
            margin-bottom: 30px;
            text-align: center;
        }
        .placeholder img {
            display: inline-block;
            border-radius: 50%;
        }
        .img-responsive{
            display: block;
            max-width: 100%;
            height: auto;
        }
        .placeholders img {
            vertical-align: middle;
        }
        .placeholders {
            margin-bottom: 30px;
            text-align: center;
        }

        @media (min-width: 768px){
            .col-sm-3 {
                width: 25%;
            }
        } */


        /*biểu đồ*/
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Home
                        <div class="page-title-subheading">
                            OVERVIEW
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">


                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalOrder }}</h3>

                            <p>Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="./admin/order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalProduct }}<sup style="font-size: 20px"></sup></h3>

                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-nuclear"></i>
                        </div>
                        <a href="./admin/product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalUser }}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="./admin/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalReview }}</h3>

                            <p>Reviews</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-chatbox"></i>
                        </div>
                        <a href="./admin/review" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <!-- <div class="row placeholders">
                    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{ $totalProduct }} Products</h4>
                        {{-- <span class="text-muted">Something else</span> --}}
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{ $totalUser }} Members</h4>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{ $totalBlog }} Blogs</h4>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4 style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{ $totalReview }} Reviews</h4>
                    </div>
                </div> -->
            </div>

            <div class="col-sm-6">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <center>
                        <p class="highcharts-description">
                            Bảng thống kê
                        </p>
                    </center>
                </figure>
            </div>
            <div class="col-sm-6">
                <div class="table-responsive">
                    <h2>New Order List</h2>
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center text-muted">#{{ $order->id }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $order->first_name . ' ' . $order->last_name }}</div>
                                                <div class="widget-subheading opacity-7" style="font-size: 13.5px;">

                                                    {{ $order->orderDetails[0]->product->name }}

                                                    @if(count($order->orderDetails) > 1)
                                                        (and {{ count($order->orderDetails) }} other products)
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $order->street_address . ' - ' . $order->town_city }}
                                </td>
                                <td class="text-center">
                                    {{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}đ
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-dark">
                                        {{ \App\Utilities\Constant::$order_status[$order->status] }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'Thống kê doanh thu của cửa hàng.'
            },
            subtitle: {
                align: 'left',
                text: 'Click the columns to view versions. Source: <a href="./" target="_blank">TXT ShoesShop</a>'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total percent market share'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f} VNĐ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: "TXT ShoesShop",
                    colorByPoint: true,
                    data: [
                        {
                            name: "Doanh thu ngày",
                            y: {{ $moneyDay }},
                            drilldown: "Doanh thu ngày"
                        },
                        {
                            name: "Doanh thu tháng",
                            y: {{ $moneyMonth }},
                            drilldown: "Doanh thu tháng"
                        },
                        {
                            name: "Doanh thu năm",
                            y: {{ $moneyYear }},
                            drilldown: "Doanh thu năm"
                        },
                    ]
                }
            ],
        });
    </script>
@endsection
