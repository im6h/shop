<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>User</title>
        <link href="{{asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet">
         <link href="{{asset('theme_admin/css/test.css')}}" rel="stylesheet">
        
        <link href="{{asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">
        
        <script src="https://kit.fontawesome.com/ae67b41446.js" crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <style type="text/css">
          h1{font-size: 31px;}
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('home')}}">HOME</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('get.logout.user')}}" title="Đăng xuất">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="{{\Request::route()->getName() == 'user.dashboard' ? 'active' : ''}}"><a href="{{route('user.dashboard')}}">Trang Tổng Quan</a></li>
                        <li class="{{\Request::route()->getName() == 'user.update.info' ? 'active' : ''}}"><a href="{{route('user.update.info')}}">Cập nhật thông tin</a></li>
                        <li class="{{\Request::route()->getName() == 'user.update.password' ? 'active' : ''}}"><a href="{{route('user.update.password')}}">Cập nhật mật khẩu</a></li>
                        <li class="{{\Request::route()->getName() == 'user.care.product' ? 'active' : ''}}"><a href="{{route('user.care.product')}}">Sản phẩm vừa xem</a></li>
                        <li class="{{\Request::route()->getName() == 'user.list.product' ? 'active' : ''}}"><a href="{{route('user.list.product')}}">Sản phẩm bán chạy</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                     <a class="navbar-brand" href="#" style="margin-left: 45px;font-size: 22px;color: #dc4b2b;">{{get_data_user('web','name')}}</a>
                     <br><br><br>
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" style="position: fixed; right: 20px; z-index: 999999;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Thành công!</strong> {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('danger'))
                    <div class="alert alert-danger alert-dismissible" style="position: fixed; right: 20px; z-index: 999999;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Thành công!</strong> {{Session::get('danger')}}
                    </div>    
                    @endif
                    @if(Session::has('info'))
                    <div class="alert alert-info alert-dismissible" style="position: fixed; right: 20px; z-index: 9999999;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Thành công!</strong> {{Session::get('info')}}
                    </div> 
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{asset('theme_admin/js/bootstrap.min.js')}}"></script>
        <script>
            function readURL(input) 
            {
              if (input.files && input.files[0]) 
              {
                var reader = new FileReader();
                reader.onload = function(e) 
                {
                $('#output_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
              }
            }

             $("#input_img").change(function() {
              readURL(this);
            });
        </script>
       {{--  ham readURL tren de Preview an image before it is uploaded ben file form.blade.php o phan avatar, ham nay lay tren mang --}}
       @yield('script')
    </body>
</html>