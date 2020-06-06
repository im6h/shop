@extends('admin::layouts.master')
@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="#">Trang chủ</a></li>
		  <li><a href="#">Admin</a></li>
		  <li class="active">Danh sách</li>
		</ol>
	</div>
	<div class="table-responsive">
	<h2>Danh sách Admin <a href="{{route('admin.get.create.authenticate')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên admin</th>
                <th>Hình ảnh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($authenticates))
                @foreach($authenticates as $authenticate)
                    <tr>
                        <td>{{$authenticate->id}}</td>
                        <td>{{$authenticate->name}}</td>
                        <td>
                             <img src="{{pare_url_file($authenticate->avatar)}}" class="img img-responsive" style="width: 80px; height: 80px;" alt="">
                        </td>
                        <td>{{$authenticate->email}}</td>
                        <td>{{$authenticate->phone}}</td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.get.edit.authenticate',$authenticate->id)}}"><i class="fas fa-edit" style="font-size: 11px;" ></i> Cập nhật</a>
                            <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.get.action.authenticate',['delete',$authenticate->id])}}"><i class="fas fa-trash-alt" style="font-size: 11px;"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop