@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="container-inner">
               <ul>
                  <li class="home">
                     <a href="index.html">Home</a>
                     <span><i class="fa fa-angle-right"></i></span>
                  </li>
                  <li class="category3"><span>Chính sách bảo mật</span></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="main-contact-area">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="contact-us-area">
              <h2>{{isset($page) ? $page->ps_name : 'Đang cập nhật'}}</h2> 
              <div>{!!isset($page) ? $page->ps_content : 'Đang cập nhật'!!}</div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop