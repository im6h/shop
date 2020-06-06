@extends('admin::layouts.master')
@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
		  <li><a href="{{route('admin.get.list.supplier')}}" title="Danh mục">Nhà cung cấp</a></li>
		  <li class="active">Thêm mới</li>
		</ol>
	</div>
	<div class="">
		@include ("admin::supplier.form")
	</div>
@stop