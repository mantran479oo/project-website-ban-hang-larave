@extends('master.layout')
@section('noidung')
	
	<div class="container">
		<div id="content">
			
			<form action="{{ route('postregister') }}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng ký</h4><br>
						 @if(count($errors)>0)
					   <div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}
						@endforeach
					</div>
					@endif
					@if(session()->has('successful'))
					<div class="alert alert-success">{{session()->get('successful'); }}</div>
					@endif
						<div class="space20">&nbsp;</div>
						
						<div class="form-block">
							<label for="email">Email *</label>
							<input type="email" name="email" id="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Họ tên *</label>
							<input type="text" name="fullname" id="your_last_name" required>
						</div>

						<div class="form-block">
							<label for="phone">Mật khẩu *</label>
							<input type="password" name="password" id="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu *</label>
							<input type="password" name="repassword" id="phone" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection