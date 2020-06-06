@if(!empty($productSuggest))
<div class="">
   <div class="container">
      <!-- area title start -->
      <div class="area-title">
         <h2>Sản phẩm cùng danh mục bạn đã mua</h2>
      </div>
      <!-- area title end -->
      <!-- our-product area start -->
      <div class="row">
         <div class="col-md-12">
            <div class="features-tab">
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="home">
                     <div class="row">
                           @foreach($productSuggest as $product)
                           <div class="col-lg-3 col-md-3">
                              <!-- single-product start -->
                              <div class="single-product first-sale" >
                                 <div class="product-img" style="margin-bottom: 25px;">
                                    @if($product->pro_number == 0)
                                       <span style="position: absolute; background: #f28902; color: white; padding: 2px 6px; border-radius: 5px; font-size: 10px; z-index: 2;" >Tạm hết hàng</span>
                                    @endif
                                    @if($product->pro_sale >0)
                                       <span style=" position:absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 5px; padding: 2px 6px; color: white; font-size: 10px; right: 0; z-index: 2;" >Giảm {{$product->pro_sale}}%</span>
                                    @endif
                                    <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">
                                    <img class="primary-image" src="{{pare_url_file($product->pro_avatar)}}" alt="" />
                                    <img class="secondary-image" src="{{pare_url_file($product->pro_avatar)}}" alt="" />
                                    </a>
                                    <div class="action-zoom">
                                       <div class="add-to-cart">
                                          <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                       </div>
                                    </div>
                                    <div class="actions">
                                       <div class="action-buttons">
                                          <div class="add-to-links">
                                             <div class="add-to-wishlist">
                                                <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                             </div>
                                             <div class="compare-button">
                                                <a href="{{route('add.shopping.cart',$product->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                             </div>
                                          </div>
                                          <div class="quickviewbtn">
                                             <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="price-box">
                                       <span class="new-price">{{number_format($product->pro_price,0,',','.')}} đ</span>
                                       {{-- ham number_format: Hiển thị số thực với 0 số cuối là phần thập phân quy tròn, có dấy chấm phân cách phần ngàn, dấy phẩy phân cách phần thập phân. --}}
                                    </div>
                                 </div>
                                 <div class="product-content" >
                                    <h2 class="product-name"><a href="#">{{$product->pro_name}}</a></h2>
                                    <p>{{$product->pro_description}}</p>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           <!-- single-product end -->
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endif