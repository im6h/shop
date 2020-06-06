<form action="" method="POST" enctype="multipart/form-data">
			@csrf
		    <div class="form-group">
		      <label for="name">Tên admin:</label>
		      <input type="text" class="form-control"  placeholder="Tên admin..." name="names" value="{{old('name',isset($authenticate->name) ? $authenticate->name : '')}}" required="">
		       @if($errors->has('name'))
        			<span class="error-text">
            		{{$errors->first('name')}}
        			</span>
    			@endif
		    </div>
		    <div class="form-group">
		      <label for="name">Email:</label>
		      <input type="text" class="form-control" id="email" placeholder="Email..." value="{{old('email',isset($authenticate->email) ? $authenticate->email : '')}}" name="email" required="">
		       @if($errors->has('email'))
        			<span class="error-text">
            		{{$errors->first('email')}}
        			</span>
    			@endif
		    </div>
		    <div class="form-group">
		      <label for="name">Phone: </label>
		      <input type="text" class="form-control" id="phone" placeholder="Số điện thoại..." name="phone" value="{{old('phone',isset($authenticate->phone) ? $authenticate->phone : '')}}" required="">
		    </div>
		     <div class="form-group">
	      <img src="{{asset('images/no_image.png')}}" alt="" style="width: 300px; height: 300px;" id="output_img">
	    </div>
	    <div class="form-group">
	      <label for="name">Avatar</label>
	      <input type="file" name="avatar" class="form-control" id="input_img">
	    </div>
		    <button type="submit" class="btn btn-success">Lưu thông tin</button>
  		</form>