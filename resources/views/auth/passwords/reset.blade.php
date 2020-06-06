@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="container-inner">
               <ul>
                  <li class="home">
                     <a href="{{route('home')}}">Trang chủ</a>
                     <span><i class="fa fa-angle-right"></i></span>
                  </li>
                  <li class="category3"><span>Lấy lại mật khẩu</span></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="main-contact-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" autofocus>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Xác nhận mật khẩu</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirm" >
                                    @if ($errors->has('password_confirm'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
