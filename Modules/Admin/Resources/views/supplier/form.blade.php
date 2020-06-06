<form action="" method="POST">
			@csrf
		    <div class="form-group">
		      <label for="name">Tên nhà cung cấp:</label>
		      <input type="text" class="form-control" id="email" placeholder="Tên nhà cung cấp" name="s_name" value="{{old('s_name',isset($supplier->s_name) ? $supplier->s_name : '')}}">
		       @if($errors->has('s_name'))
        			<span class="error-text">
            		{{$errors->first('s_name')}}
        			</span>
    			@endif
		    </div>
		    <div class="form-group">
		      <label for="name">Email</label>
		      <input type="text" class="form-control" id="email" placeholder="linhnn829@gmail.com" value="{{old('s_email',isset($supplier->s_email) ? $supplier->s_email : '')}}" name="s_email">
		       @if($errors->has('s_email'))
        			<span class="error-text">
            		{{$errors->first('s_email')}}
        			</span>
    			@endif
		    </div>
		    <div class="form-group">
		      <label for="name">Số điện thoại</label>
		      <input type="text" class="form-control" id="email" placeholder="0942926840" name="s_phone" value="{{old('s_phone',isset($supplier->s_phone) ? $supplier->s_phone : '')}}">
              @if($errors->has('s_phone'))
        			<span class="error-text">
            		{{$errors->first('s_phone')}}
        			</span>
    			@endif
		    </div>
		    <div class="form-group">
		      <label for="name">Địa chỉ</label>
		      <input type="text" class="form-control" id="email" placeholder="20 Nguyễn Tất Tháng" name="s_address" value="{{old('s_address',isset($supplier->s_address) ? $supplier->s_address : '')}}">
              @if($errors->has('s_address'))
        			<span class="error-text">
            		{{$errors->first('s_address')}}
        			</span>
    			@endif
		    </div>
		    <button type="submit" class="btn btn-success">Lưu thông tin</button>
  		</form>