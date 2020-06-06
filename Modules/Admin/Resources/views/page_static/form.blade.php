<form action="" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="col-sm-8 col-sm-offset-2">
    	<div class="form-group">
	      <label for="a_name">Tiêu đề trang:</label>
	      <input type="text" class="form-control" required  placeholder="Tiêu đề trang" name="ps_name" value="{{old('ps_name',isset($page->ps_name) ? $page->ps_name : '')}}"> {{-- nhan lai cac gia tri khi nguoi dung nhap loi o file create va giu cac gia tri cu o file update --}}
    	</div>
    	<div class="form-group">
	      <label for="a_name">Chọn trang:</label>
	      <select name="type" class="form-control">
	      	<option value="1">Về chúng tôi</option>
	      	<option value="2">Thông tin giao hàng</option>
	      	<option value="3">Chính sách bảo hành</option>
	      	<option value="4">Điều khoản sử dụng</option>
	      </select>
    	</div>
	    <div class="form-group">
	      <label for="name">Nội dung</label>
	      <textarea id="" name="ps_content" class="form-control" required cols="30" rows="3" placeholder="Nội dung" >{{old('ps_content',isset($page->ps_content) ? $page->ps_content : '')}}</textarea>
	    </div>
	    <button type="submit" class="btn btn-success">Lưu thông tin</button>
    </div>
    </div>
</form>
@section('script')
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript">
		 CKEDITOR.replace( 'ps_content' );
	</script>
@stop