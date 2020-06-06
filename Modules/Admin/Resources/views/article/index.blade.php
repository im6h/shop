@extends('admin::layouts.master')
@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="#">Trang chủ</a></li>
		  <li><a href="#">Bài viết</a></li>
		  <li class="active">Danh sách</li>
		</ol>
	</div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" action="" style="margin-bottom: 20px">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Tên bài viết..." name="name" value="{{\Request::get('name')}}">
                   {{-- {{\Request::get('name')}} de giu lai gia tri name khi user click nut search --}}
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
	<div class="table-responsive">
	<h2>Quản lý bài viết <a href="{{route('admin.get.create.article')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 16%">Tên bài viết</th>
                <th style="width: 100px;">Hình ảnh</th>
                <th style="width: 297px;">Mô tả</th>
                 <th style="width: 64px">Nổi bật</th>
                <th style="width: 84px">Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($articles))
                @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>
                        {{$article->a_name}}
                    </td>
                    <td>
                        <img src="{{pare_url_file($article->a_avatar)}}" class="img img-responsive" style="width: 80px; height: 80px;" alt="">
                        {{-- pare_url_file trong ham helper/function.php --}}
                    </td>
                    <td>{{$article->a_description}}</td>
                    <td>
                        <a href="{{route('admin.get.action.article',['hot',$article->id])}}" class="label {{$article->getHot($article->a_hot)['class']}}">{{$article->getHot($article->a_hot)['name']}}</a>
                        {{--ham active($active,$id).getStatus tra ve 1 mang, trong mang bao gom name va class  --}}
                    </td>
                    <td>
                        <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="label {{$article->getStatus($article->a_active)['class']}}">{{$article->getStatus($article->a_active)['name']}}</a>
                        {{--ham active($active,$id).getStatus tra ve 1 mang, trong mang bao gom name va class  --}}
                    </td>
                    <td>
                        {{$article->created_at}} {{-- lay ngay gio --}}
                    </td>
                    <td>
                        <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.get.edit.article',$article->id)}}"><i class="fas fa-edit" style="font-size: 11px;" ></i> Cập nhật</a>
                        <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;" href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="fas fa-trash-alt" style="font-size: 11px;"></i> Xóa</a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$articles->links()}}
@stop