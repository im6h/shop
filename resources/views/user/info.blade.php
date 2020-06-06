@extends('user.layout')
@section('content')
<h1 class="page-header">Cập nhật thông tin</h1>
<img src="{{pare_url_file($user->avatar)}}" style="border-radius: 50%; width: 50px; height: 50px; margin-top: -223px;">
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Họ tên:</label>
                  <input type="text" class="form-control"  placeholder="Họ tên" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                  <label for="email">Email: </label>
                  <input type="email" class="form-control"  placeholder="Email" name="email"  value="{{$user->email}}">
                </div>
                <div class="form-group">
                  <label for="phone">Số điện thoại</label>
                  <input type="number" class="form-control"  placeholder="Phone" name="phone" value="{{$user->phone}}">
                </div>
                <div class="form-group">
                  <label for="email">Địa chỉ: </label>
                  <input type="text" class="form-control"  placeholder="Địa chỉ" name="address" value="{{$user->address}}">
                </div>
                <div class="form-group">
                  <img src="{{asset('images/no_image.png')}}" alt="" style="width: 300px; height: 300px;" id="output_img">
                </div>
                <div class="form-group">
                  <label for="name">Avatar</label>
                  <input type="file" name="avatar" class="form-control" id="input_img">
                </div>
                <div class="form-group">
                  <label for="pwd">Giới thiệu bản thân:</label>
                  <textarea rows="5" cols="30" id="" class="form-control" name="about" placeholder="Mô tả bản thân" >{{$user->about}}</textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>  Cập nhật
                </button>
            </form>
        </div>
    </div>
@stop