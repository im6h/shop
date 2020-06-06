@extends('user.layout')
@section('content')
<h1 class="page-header">Tổng quan</h1>
<div class="row placeholders">
    <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4 style="position: absolute;top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); margin: 0; color: white; ">{{$totalTransaction}} đơn hàng</h4>
    </div>
    <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4  style="position: absolute;top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); margin: 0;color: white; ">{{$totalTransactionDone}} đã xử lý</h4>
    </div>
    <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4  style="position: absolute;top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); margin: 0;color: white; ">{{$totalTransaction - $totalTransactionDone}} chưa xử lý</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h2>Danh sách đơn hàng của bạn</h2>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($transactions))
                @foreach($transactions as $transaction)
                    <tr>
                        <td>#{{$transaction->id}}</td>
                        <td>{{$transaction->tr_address}}</td>
                        <td>{{$transaction->tr_phone}}</td>
                        <td>{{number_format($transaction->tr_total,0,',','.')}} VNĐ</td>
                        <td>
                           @if($transaction->tr_status == 1)
                                <a href="#" class="label label-success">Đã xử lý</a>
                           @else
                                <a href="#" class="label label-default">Chờ xử lý</a>     
                           @endif
                        </td>
                        <td>{{$transaction->created_at->format('d-m-Y')}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </div>
</div>
@stop