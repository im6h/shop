@extends('admin::layouts.master')
@section('content')
    <style type="text/css">
        .rating .active
        {
            color: #ff9705 !important;
        }
        .table-responsive .active{
            color: red;
        }
    </style>
    <div class="page-header">
        <ol class="breadcrumb">
          <li><a href="#">Trang chủ</a></li>
          <li><a href="#">Kho</a></li>
          <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" action="" style="margin-bottom: 20px">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Tên sản phẩm..." name="name" value="{{\Request::get('name')}}">
                </div>
                <div class="form-group">
                    <select name="cate" id="" class="form-control">
                        <option value="">Danh mục</option>
                        @if (isset($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{\Request::get('cate') == $category->id ? "selected = 'selected'" : ""}}>{{$category->c_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
    <h2>Quản lý sản phẩm <a href="?type=inventory" class="{{Request::get('type') == "inventory" || !Request::get('type')  ? "active" : ""}}" >Hàng tồn</a> - <a href="?type=pay" class="{{Request::get('type') == "pay" ? "active" : ""}}">Bán chạy</a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Nổi bật</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($products))
                @foreach($products as $product)
                <?php 
                    $age = 0;
                    if ($product->pro_total_rating)
                     {
                        $age = round($product->pro_total_number/$product->pro_total_rating,2);
                    }
                ?>
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        {{$product->pro_name}}
                        <ul style="padding-left: 15px; list-style-type: none;">
                            <li>Giá cả: <span>{{number_format($product->pro_price,0,',','.')}}</span> VNĐ</li>
                            <li>Sale: <span>{{$product->pro_sale}} %</span></li>
                            <li><span>Đánh giá: </span>
                               <span class="rating">
                                    @for($i = 1; $i <=5; $i++)
                                        <i class="fa fa-star {{$i<=$age ? 'active' : ''}}" style="color: #999"></i>
                                    @endfor
                               </span>
                               <span>{{$age}}</span>
                            </li>
                            <li><span>Số lượng: </span><span>{{$product->pro_number}}</span></li>
                            <li><span>Số lần bán: </span><span>{{$product->pro_pay}}</span></li>
                        </ul>
                    </td>
                    <td>{{isset($product->category->c_name) ? $product->category->c_name : '[N\A]'}}
                    </td>{{-- ??  can giai thich--}}
                    <td>
                        <img src="{{pare_url_file($product->pro_avatar)}}" class="img img-responsive" style="width: 80px; height: 80px;" alt="">
                        {{-- pare_url_file trong ham helper/function.php --}}
                    </td>
                    <td>
                        <a href="{{route('admin.get.action.product',['active',$product->id])}}" class="label {{$product->getStatus($product->pro_active)['class']}}">{{$product->getStatus($product->pro_active)['name']}}</a>
                    </td>
                    <td>
                        <a href="{{route('admin.get.action.product',['hot',$product->id])}}" class="label {{$product->getHot($product->pro_hot)['class']}}">{{$product->getHot($product->pro_hot)['name']}}</a>
                    </td>
                    <td>
                        <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.get.edit.product',$product->id)}}"><i class="fas fa-edit" style="font-size: 11px;" ></i> Cập nhật</a>
                        <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.get.action.product',['delete',$product->id])}}"><i class="fas fa-trash-alt" style="font-size: 11px;"></i> Xóa</a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$products->links()}}
@stop