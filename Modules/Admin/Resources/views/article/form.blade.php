<form action="" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="col-sm-8 col-sm-offset-2">
    	<div class="form-group">
	      <label for="a_name">Tên bài viết</label>
	      <input type="text" class="form-control"  placeholder="Tên bài viết" name="a_name" value="{{old('a_name',isset($article->a_name) ? $article->a_name : '')}}"> {{-- nhan lai cac gia tri khi nguoi dung nhap loi o file create va giu cac gia tri cu o file update --}}
	       @if($errors->has('a_name'))
    			<span class="error-text">
        		{{$errors->first('a_name')}} {{-- first xuat ra loi dau tien  --}}
    			</span>
			@endif
    	</div>
	    <div class="form-group">
	      <label for="name">Mô tả</label>
	      <textarea id="" name="a_description" class="form-control" cols="30" rows="3" placeholder="Mô tả bài viết" >{{old('a_description',isset($article->a_description) ? $article->a_description : '')}}</textarea>
	      @if($errors->has('a_description'))
    			<span class="error-text">
        		{{$errors->first('a_description')}}
    			</span>
			@endif
	    </div>
	    <div class="form-group">
	      <label for="name">Nội dung</label>
	      <textarea id="" name="a_content" class="form-control" cols="30" rows="3" placeholder="Nội dung" >{{old('a_content',isset($article->a_content) ? $article->a_content : '')}}</textarea>
	       @if($errors->has('a_content'))
    			<span class="error-text">
        		{{$errors->first('a_content')}}
    			</span>
			@endif
	    </div>
	    <div class="form-group">
	      <label for="name">Meta Title</label>
	      <input type="text" class="form-control"  placeholder="Meta Title" name="a_title_seo" value="{{old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '')}}">
	    </div>
	    <div class="form-group">
	      <label for="name">Meta Description</label>
	      <input type="text" class="form-control"  placeholder="Meta Description" name="a_description_seo" value="{{old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '')}}">
	    </div>
	    <div class="form-group">
	      <label for="name">Avatar</label>
	      <input type="file" name="avatar" class="form-control">
	    </div>
	    <button type="submit" class="btn btn-success">Lưu thông tin</button>
    </div>
    </div>
</form>
@section('script')
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript">
		 CKEDITOR.replace( 'a_content' );
	</script>
@stop