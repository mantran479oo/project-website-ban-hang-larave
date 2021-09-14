@extends('master.layout')
@section('noidung')
	
	<div class="container">
		<div id="content">
			
			<form action="{{ route('postlogin') }}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4><br>
						 @if(Session::has('err'))
						 <div class="alert alert-danger">{{ Session::get('err') }}</div>
						 @endif
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="email">Email *</label>
							<input type="email" name="email" id="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu *</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

	@endsection