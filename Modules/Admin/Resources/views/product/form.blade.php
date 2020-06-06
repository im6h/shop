<form action="" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="col-sm-8">
		<div class="form-group">
	      <label for="pro_name">Tên sản phẩm</label>
	      <input type="text" class="form-control"  placeholder="Tên sản phẩm" name="pro_name" value="{{old('pro_name',isset($product->pro_name) ? $product->pro_name : '')}}">
	       @if($errors->has('pro_name'))
				<span class="error-text">
	    		{{$errors->first('pro_name')}}
				</span>
			@endif
		</div>
	    <div class="form-group">
	      <label for="name">Mô tả</label>
	      <textarea id="" name="pro_description" class="form-control" cols="30" rows="3" placeholder="Mô tả ngắn sản phẩm" >{{old('pro_description',isset($product->pro_description) ? $product->pro_description : '')}}</textarea>
	      @if($errors->has('pro_description'))
				<span class="error-text">
	    		{{$errors->first('pro_description')}}
				</span>
			@endif
	    </div>
	    <div class="form-group">
	      <label for="name">Nội dung</label>
	      <textarea id="" name="pro_content" class="form-control" cols="30" rows="3" placeholder="Nội dung" >{{old('pro_content',isset($product->pro_content) ? $product->pro_content : '')}}</textarea>
	       @if($errors->has('pro_content'))
				<span class="error-text">
	    		{{$errors->first('pro_content')}}
				</span>
			@endif
	    </div>
	    <div class="form-group">
	      <label for="name">Meta Title</label>
	      <input type="text" class="form-control"  placeholder="Meta Title" name="pro_title_seo" value="{{old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '')}}">
	    </div>
	    <div class="form-group">
	      <label for="name">Meta Description</label>
	      <input type="text" class="form-control"  placeholder="Meta Description" name="pro_description_seo" value="{{old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '')}}">
	    </div>
	    <button type="submit" class="btn btn-success">Lưu thông tin</button>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	      <label for="pro_category_id">Loại sản phẩm</label>
	      <select name="pro_category_id"  class="form-control">
	      	<option value="">--Chọn loại sản phẩm--</option>
	      	@if(isset($categories))
	      		@foreach($categories as $category)
	      			<option value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '')==$category->id ? "selected = 'selected'": ""}}>{{$category->c_name}}</option>
	      		@endforeach
	      	@endif
	      </select>
	      @if($errors->has('pro_category_id'))
				<span class="error-text">
	    		{{$errors->first('pro_category_id')}}
				</span>
			@endif
	    </div>
		<div class="form-group">
	      <label for="pro_supplier_id">Nhà cung cấp</label>
	      <select name="pro_supplier_id"  class="form-control">
	      	<option value="">--Chọn nhà cung cấp--</option>
	      	@if(isset($suppliers))
	      		@foreach($suppliers as $supplier)
	      			<option value="{{$supplier->id}}" {{old('pro_supplier_id',isset($product->pro_supplier_id) ? $product->pro_supplier_id : '')==$supplier->id ? "selected = 'selected'": ""}}>{{$supplier->s_name}}</option>
	      		@endforeach
	      	@endif
	      </select>
	      @if($errors->has('pro_supplier_id'))
				<span class="error-text">
	    		{{$errors->first('pro_supplier_id')}}
				</span>
			@endif
	    </div>
	    <div class="form-group">
	      <label for="pro_price">Giá sản phẩm</label>
	      <input type="number"  placeholder="Giá sản phẩm" class="form-control" name="pro_price" value="{{old('pro_price',isset($product->pro_price) ? $product->pro_price : '')}}">
	       @if($errors->has('pro_price'))
				<span class="error-text">
	    		{{$errors->first('pro_price')}}
				</span>
			@endif
	    </div>
	    <div class="form-group">
	      <label for="name">% Khuyến mãi</label>
	      <input type="number" name="pro_sale" placeholder="% giảm giá" class="form-control" value="{{old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '0')}}">
	    </div>
	     <div class="form-group">
	      <label for="name">Số lượng sản phẩm</label>
	      <input type="number" name="pro_number" placeholder="10" class="form-control" value="{{old('pro_number',isset($product->pro_number) ? $product->pro_number : '0')}}">
	    </div>
	    <div class="form-group">
	      <img src="{{asset('images/no_image.png')}}" alt="" style="width: 300px; height: 300px;" id="output_img">
	    </div>
	    <div class="form-group">
	      <label for="name">Avatar</label>
	      <input type="file" name="avatar" class="form-control" id="input_img">
	    </div>
		<div class="form-group">
	    	<div class="checkbox">
			    <label><input type="checkbox" name="hot"> Nổi bật</label>
			 </div>
		</div>
	</div>
</form>
@section('script')
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript">
		 CKEDITOR.replace( 'pro_content' );
	</script>
@stop
{{-- nhúng trình soạn thảo ckeditor vào phần nội dung --}}
