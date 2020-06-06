@extends('admin::layouts.master')
@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="#">Trang chủ</a></li>
		  <li><a href="#">Nhà cung cấp </a></li>
		  <li class="active">Danh sách</li>
		</ol>
	</div>
	<div class="table-responsive">
	<h2>Quản lý nhà cung cấp <a href="{{route('admin.get.create.supplier')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên nhà cung cấp</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($suppliers))
                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{$supplier->s_name}}</td>
                        <td>{{$supplier->s_email}}</td>
                        <td>{{$supplier->s_phone}}</td>
                        <td>{{$supplier->s_address}}</td>
                        <td>
                             <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.get.edit.supplier',$supplier->id)}}"><i class="fas fa-edit" style="font-size: 11px;" ></i> Cập nhật</a>
                             <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.action.supplier',['delete',$supplier->id])}}"><i class="fas fa-trash-alt" style="font-size: 11px;"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
        @endif
        </tbody>
    </table>
@stop
