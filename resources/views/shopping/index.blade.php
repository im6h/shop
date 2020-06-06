@extends('layouts.app')
@section('content')
<div class="our-product-area">
   <div class="container">
      <!-- area title start -->
	  <div class="area-title">
	     <h2>Giỏ hàng của bạn</h2>
	  </div>
      <table class="table">
	    <thead>
	      <tr>
	        <th>STT</th>
	        <th>Tên sản phẩm</th>
	        <th>Hình ảnh</th>
	        <th>Giá</th>
	        <th>Số lượng</th>
	        <th>Giảm giá</th>
	        <th>Thành tiền</th>
	        <th>Thao Tác</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php $i = 1; ?>	
	    	@foreach($products as $key => $product)
	      <tr>
	      	<td>#{{$i}}</td>
	        <td><a href="">{{$product->name}}</a></td>
	        <td>
	        	<img src="{{pare_url_file($product->options->avatar)}}" alt="" style="height: 60px; width: 80px;">
	        </td>
	        <td>{{number_format($product->options->price_old,0,',','.')}}đ</td>
	        <td class="text-center">  
	        <div style="margin-left: -57px">                      
              @if($product->qty > 1)
              <a href="{{route('get.quantity.cart',[$product->id,$product->rowId,$product->qty,'down'])}}"><span class="glyphicon glyphicon-minus" style="color: green"></span></a> 
              @else
                <a href="#"><span class="glyphicon glyphicon-minus" style="color: green"></span></a> 
              @endif
              <input type="text" class="qty text-center" value=" {!!$product->qty!!}" style="width:30px; font-weight:bold; font-size:15px; color:blue;" > 
            <a href="{{route('get.quantity.cart',[$product->id,$product->rowId,$product->qty,'up'])}}"><span class="glyphicon glyphicon-plus-sign" style="color: red;"></span></a>
        	</div>
          </td>
          	<td>{{$product->options->sale}} %</td>
	        <td>{{number_format(($product->price*$product->qty),0,',','.')}}đ</td>
	        <td>
	        	<a href="{{route('delete.shopping.cart',$key)}}"><i class="fa fa-trash-o"></i> Delete</a>
	        	{{-- xoa theo key cua san pham --}}
	        </td>
	      </tr>
	     <?php $i++; ?>	
	    	@endforeach
	    </tbody>
      </table>
      <h5 class="pull-right">Tổng tiền cần thanh toán :  {{ Cart::subtotal() }}      <a  style="margin-left: 30px" href="{{route('get.form.pay')}}" class="btn-success btn">Thanh toán</a></h5>
    </div>
</div>      
@stop
