@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
          <li><a href="#">Trang chủ</a></li>
          <li><a href="#">Đánh giá</a></li>
          <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
    <h2>Quản lý đánh giá</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên thành viên</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
                <th>Rating</th>
                <th>Thao tác</th>
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
                        {{$rating->ra_content}}
                    </td>
                    <td>
                        {{$rating->ra_number}}
                    </td>
                    <td>
                        <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.action.rating',['delete',$rating->id])}}"><i class="fas fa-trash-alt" style="font-size: 11px;"></i> Xóa</a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop