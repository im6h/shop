@extends('admin::layouts.master')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<h1 class="page-header">Tổng quan</h1>
<div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4 style="position: absolute;top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); margin: 0; color: white; ">{{$users}}  thành viên</h4>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4  style="position: absolute;top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); margin: 0;color: white; ">{{$products}} sản phẩm</h4>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4  style="position: absolute;top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); margin: 0;color: white; ">{{$articles}} bài viết</h4>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4  style="position: absolute;top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); margin: 0 ;color: white;">{{$rating}} lượt đánh giá</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
       <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-sm-8">
        <h2>Danh sách đơn hàng mới</h2>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
           @foreach($transactionNews as $transactionNew)
            <tr>
                <td>#{{$transactionNew->id}}</td>
                <td>{{isset($transactionNew->user->name) ? $transactionNew->user->name : '[N\A]'}}
                </td>
                <td>{{$transactionNew->tr_phone}}</td>
                <td>{{number_format($transactionNew->tr_total,0,',','.')}} VNĐ</td>
                <td>
                    <a href="{{route('admin.action.transaction',['active',$transactionNew->id])}}" class="label {{$transactionNew->getStatus($transactionNew->tr_status)['class']}}">{{$transactionNew->getStatus($transactionNew->tr_status)['name']}}</a>
                </td>
                <td>{{$transactionNew->created_at->format('d-m-Y')}}</td>
            </tr>
           @endforeach
        </tbody>
    </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <h2 class="sub-header">Danh sách liên hệ mới nhất</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Họ tên</th>
                        <th>Nội dung</th>
                        <th style="width: 100px">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($contacts))
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->c_title}}</td>
                            <td>
                                {{$contact->c_name}}
                            </td>
                            <td>
                               {{$contact->c_content}}
                            </td>
                            <td>
                                <a href="{{route('admin.action.contact',['active',$contact->id])}}" class="label {{$contact->getStatus($contact->c_status)['class']}}">{{$contact->getStatus($contact->c_status)['name']}}</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6">
        <h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
        <div class="table-responsive">
            <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên thành viên</th>
                <th>Sản phẩm</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($ratings))
                @foreach($ratings as $rating)
                <tr>
                    <td>{{$rating->id}}</td>
                    <td>
                        {{isset($rating->user->name) ? $rating->user->name : 'N\A'}}
                    </td>
                    <td>
                        <a href="">
                            {{isset($rating->product->pro_name) ? $rating->product->pro_name : 'N\A'}}
                        </a>
                    </td>
                    <td>
                        {{$rating->ra_number}}
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
        </div>
    </div>
</div>
@stop
@section('script')
    <script>
        // Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Biểu đồ doanh thu ngày và tháng'
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
            text: 'Mức độ'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} VNĐ'
    },

    series: [
        {
            name: "Doanh thu",
            colorByPoint: true,
            data: [
                {
                    name: "Doanh thu ngày",
                    y: {{$moneyDay}},
                    drilldown: "Doanh thu ngày"
                },
                {
                    name: "Doanh thu tháng",
                    y: {{$moneyMonth}},
                    drilldown: "Doanh thu tháng"
                },   
            ]
        }
    ]   
});
    </script>
@stop