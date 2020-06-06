@extends('admin::layouts.master')
@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
		  <li><a href="{{route('admin.get.list.category')}}" title="Danh mục">Danh mục</a></li>
		  <li class="active">Thêm mới</li>
		</ol>
	</div>
	<div class="">
		@include ("admin::category.form")
	</div>
@stop