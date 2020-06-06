@extends('admin::layouts.master')
@section('content')
<h1 class="page-header">Cập nhật mật khẩu</h1>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="post">
                @csrf
                <div class="form-group" style="position: relative;">
                  <label for="name">Mật khẩu củ: </label>
                  <input type="password" class="form-control"  placeholder="********" name="password_old" value="">
                  <a href="javascript::void(0)" style="position: absolute; top: 54%; right: 10px; color: #333"><i class="fa fa-eye"></i></a>
                  @if($errors->has('password_old'))
                    <span class="error-text">
                      {{$errors->first('password_old')}}
                    </span>
                  @endif
                </div>
                 <div class="form-group" style="position: relative;">
                  <label for="name">Mật khẩu mới: </label>
                  <input type="password" class="form-control"  placeholder="********" name="password_new" value="">
                  <a href="javascript::void(0)" style="position: absolute; top: 54%; right: 10px; color: #333"><i class="fa fa-eye"></i></a>
                  @if($errors->has('password_new'))
                    <span class="error-text">
                      {{$errors->first('password_new')}}
                    </span>
                  @endif
                </div>
                 <div class="form-group" style="position: relative;">
                  <label for="name">Nhập lại mật khẩu mới: </label>
                  <input type="password" class="form-control"  placeholder="********" name="password_confirm" value="">
                  <a href="javascript::void(0)" style="position: absolute; top: 54%; right: 10px; color: #333"><i class="fa fa-eye"></i></a>
                  @if($errors->has('password_confirm'))
                    <span class="error-text">
                      {{$errors->first('password_confirm')}}
                    </span>
                  @endif
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>  Cập nhật
                </button>
            </form>
            {{-- avascript:void(0)  sẽ khiến trình duyệt dừng ở lại trang hiện tại vì giá trị trả về không phải là một URL. --}}
        </div>
    </div>
@stop
{{-- hien thi mat khau khi cap nhat mat khau
 --}}
 @section('script')
  <script>
    $(function(){
      $(".form-group a").click(function(){
          let $this = $(this);
          if($this.hasClass('active'))
          {
            $this.parents('.form-group').find('input').attr('type','password')
            $this.removeClass('active');
          }
          else
          {
            $this.parents('.form-group').find('input').attr('type','text');
            $this.addClass('active');
          }  
      });
    });
  </script>
@stop