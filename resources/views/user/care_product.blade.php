@extends('user.layout')
@section('content')
<style type="text/css">
    .product-img a img{
        max-width: 77%;
        margin-left: -12px;
    }
    .secondary-image , .action, .fa-search-plus,.fa-heart,.fa-retweet{display: none;}
    h2{font-size: 17px; line-height: 18px; width: 240px;}
    .price-box{margin-top: 23px; margin-left: 18%;}
    .product-img .giam{ right: 76px !important }
    .col-sm-12{margin-left: -30px;}
    .area-title h2{margin-top: 21px;
    margin-bottom: 34px;}
</style>
<div class="row">
    <div class="col-sm-12">
        <h2 style="width: 100%;">Danh sách sản phẩm bán bạn quan tâm</h2>
        <div id="product_view">
        </div>
    </div>
</div>
@stop
@section('script')
<script >
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });
     let  routeRenderProduct = '{{route('post.product.view')}}';
         checkRenderProduct = false;
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
</script>
@stop