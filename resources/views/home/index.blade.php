@extends('layouts.app')
@section('content')
@include('components.slider')
<!-- slider end-->
<!-- end home slider -->
<!-- product section start -->
<style type="text/css">
     .active
   {
      color: #ff9705;
   }
</style>
<div class="our-product-area new-product">
   <div class="container">
      <!-- area title start -->
      <div class="area-title">
         <h2>SẢN PHẨM NỔI BẬT</h2>
      </div>
      <!-- area title end -->
      <!-- our-product area start -->
      <div class="row">
         <div class="col-md-12">
            <div class="features-tab">
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="home">
                     <div class="row">
                        @if(isset($productHots))
                        <div class="features-curosel">
                           @foreach($productHots as $productHot)
                           <div class="col-lg-12 col-md-12">
                              <!-- single-product start -->
                              <div class="single-product first-sale" >
                                 <div class="product-img" >
                                    @if($productHot->pro_number == 0)
                                       <span style="position: absolute; background: #f28902; color: white; padding: 2px 6px; border-radius: 5px; font-size: 10px; z-index: 2;">Tạm hết hàng</span>
                                    @endif
                                    @if($productHot->pro_sale >0)
                                       <span style=" position:absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 5px; padding: 2px 6px; color: white; font-size: 10px; right: 0; z-index: 2;">Giảm {{$productHot->pro_sale}}%</span>
                                    @endif
                                    <a href="{{route('get.detail.product',[$productHot->pro_slug,$productHot->id])}}">
                                    <img class="primary-image" src="{{pare_url_file($productHot->pro_avatar)}}" alt="" />
                                    <img class="secondary-image" src="{{pare_url_file($productHot->pro_avatar)}}" alt="" />
                                    </a>
                                    <div class="action-zoom">
                                       <div class="add-to-cart">
                                          <a href="{{route('get.detail.product',[$productHot->pro_slug,$productHot->id])}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                       </div>
                                    </div>
                                    <div class="actions">
                                       <div class="action-buttons">
                                          <div class="add-to-links">
                                             <div class="add-to-wishlist">
                                                <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                             </div>
                                             <div class="compare-button">
                                                <a href="{{route('add.shopping.cart',$productHot->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                             </div>
                                          </div>
                                          <div class="quickviewbtn">
                                             <a href="{{route('get.detail.product',[$productHot->pro_slug,$productHot->id])}}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="price-box">
                                       <span class="new-price">{{number_format($productHot->pro_price,0,',','.')}} đ</span>
                                       {{-- ham number_format: Hiển thị số thực với 0 số cuối là phần thập phân quy tròn, có dấy chấm phân cách phần ngàn, dấy phẩy phân cách phần thập phân. --}}
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <h2 class="product-name"><a href="#">{{$productHot->pro_name}}</a></h2>
                                    <p>{{$productHot->pro_description}}</p>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           <!-- single-product end -->
                        </div>
                        @endif
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include('components.product_suggest')
<div id="product_view"></div>
@if(isset($articleNews))
<div class="latest-post-area">
   <div class="container">
      <div class="area-title">
         <h2>BÀI VIẾT MỚI</h2>
      </div>
      <div class="row">
         <div class="all-singlepost">
            <!-- single latestpost start -->
            @foreach($articleNews as $articleNew)
            <div class="col-md-4 col-sm-4 col-xs-12">
               <div class="single-post" style="margin-bottom: 40px;">
                  <div class="post-thumb">
                     <a href="{{route('get.detail.article',[$articleNew->a_slug,$articleNew->id])}}">
                     <img src="{{pare_url_file($articleNew->a_avatar)}}" alt="" style="width: 370px; height: 280px;" />
                     </a>
                  </div>
                  <div class="post-thumb-info">
                     <div class="postexcerpt">
                        <p>{{$articleNew->a_name}}</p>
                        <a href="{{route('get.detail.article',[$articleNew->a_slug,$articleNew->id])}}" class="read-more">Xem thêm</a>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            <!-- single latestpost end -->
         </div>
      </div>
   </div>
</div>
@endif
<!-- latestpost area end -->
<!-- block category area start -->
<div class="block-category">
   <div class="container">
      <div class="row">
         @if(isset($categoriesHome ))
         @foreach($categoriesHome as $categoriHome)
         <div class="col-md-4">
            <!-- block title start -->
            <div class="block-title">
               <h2>{{$categoriHome->c_name}}</h2>
            </div>
            <!-- block title end -->
            <!-- block carousel start -->
            @if(isset($categoriHome->products))
               <div class="block-carousel">
                  @foreach($categoriHome->products as $product)
                      <?php 
                         $ageDetail = 0;
                         if ($product->pro_total_rating)
                          {
                             $ageDetail = round($product->pro_total_number/$product->pro_total_rating,2);
                         }
                     ?> 
                     <div class="block-content">
                        <!-- single block start -->
                        <div class="single-block">
                           <div class="block-image pull-left">
                              <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><img src="{{pare_url_file($product->pro_avatar)}}" style="width: 170px; height: 200px;" alt="" /></a>
                           </div>
                           <div class="category-info">
                              <h3><a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a></h3>
                              <p>{{$product->pro_description}}</p>
                              <div class="cat-price">{{number_format($product->pro_price,0,',','.')}} đ <span class="old-price">{{number_format($product->pro_price,0,',','.')}} đ </span></div>
                              <div class="cat-rating">
                                 @for($i=1;$i<=5;$i++)
                                    <a href="#"><i class="fa fa-star {{$i <= $ageDetail ? 'active' : ''}}"></i></a>
                                 @endfor
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            @endif
            <!-- block carousel end -->
         </div>
         @endforeach
         @endif
      </div>
   </div>
</div>
<!-- block category area end -->
<!-- testimonial area start -->
<div class="testimonial-area lap-ruffel">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="crusial-carousel">
               <div class="crusial-content">
                  <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                  <span>BootExperts</span>
               </div>
               <div class="crusial-content">
                  <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                  <span>Lavoro Store!</span>
               </div>
               <div class="crusial-content">
                  <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                  <span>MR Selim Rana</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- testimonial area end -->
<!-- Brand Logo Area Start -->
<div class="brand-area">
   <div class="container">
      <div class="row">
         <div class="brand-carousel">
            <div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
            <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
            <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
            <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
            <div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
            <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
            <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
            <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
         </div>
      </div>
   </div>
</div>
<!-- Brand Logo Area End -->
<!-- FOOTER START -->
@stop
@section('script')
   <script>
      $(function(){
          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });
         let  routeRenderProduct = '{{route('post.product.view')}}';
         checkRenderProduct = false;
         $(document).on('scroll',function(){

            if ($(window).scrollTop() > 150 && checkRenderProduct == false)
             {
               checkRenderProduct = true;
               let products = localStorage.getItem('products');
               products = $.parseJSON(products);

                if (products.length > 0)
                 {
                     $.ajax({
                           url: routeRenderProduct,//gửi ajax đến ham renderProductView o HomeController 
                           method : "POST",
                           data : {id : products},//danh sach cac id se duoc gui di
                           success : function(result)
                           {
                              //Sau khi gửi và kết quả trả về thành công thì
                              $("#product_view").html('').append(result.data);
                              //The html() method sets or returns the content (innerHTML) of the selected elements.
                              //append la tra ve view o #product_view
                           }
                     });
                 }
             }
         })
      })
   </script>
@stop