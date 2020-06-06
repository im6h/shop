@extends('user.layout')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>Danh sách sản phẩm bán chạy</h2>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 17%;">Tên sản phẩm</th>
                <th style="padding-left: 35px;">Hình ảnh</th>
                <th>Giá tiền</th>
                <th>Lượt bán</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($products))
                @foreach($products as $product)
                    <tr>
                        <td>#{{$product->id}}</td>
                        <td>
                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}" target="_blank">{{$product->pro_name}}</a>
                        </td>
                        <td>
                            <img src="{{pare_url_file($product->pro_avatar)}}" alt="" style="width: 100px; height: 80px; padding-left: 35px;">
                        </td>
                        <td style="padding-left: 0px">{{number_format($product->pro_price,0,',','.')}} VNĐ</td>
                        <td style="padding-left: 36px;">
                            {{$product->pro_pay}}
                        </td>    
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </div>
</div>
@stop