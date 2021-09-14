<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" title="style" href="{{asset('css/formsingup.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body style="  background: #39a8ca;">

<div class="header"></div>
<div class="container">
	<div class="row">
		<div class="col-sm-7"></div>
		<div class="col-sm-4">
			<div class="formre">
				<div class="contex">
					<span>Đăng ký</span>
				</div>
				   <div class="roms">
				      <form method="POST">
					      <div class="input-group mb-3">
					          <input type="text" class="form-control">
					      </div>
					      <button type="submit" class="btn btn-danger btn-block">Tiếp theo</button>
					    </form>
          </div>
          <p class="divider-text">
             <span class="bg-lights">Hoặc</span>
          </p>
			</div>
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>
<div class="footer"></div>
{{-- <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="" class="form-control input_user" value="" placeholder="username">
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="button" name="button" class="btn login_btn">Tiếp theo</button>
				   </div>
					</form>
				</div>
					<p class="divider-text">
        <span class="bg-lights">Hoặc</span>
              </p>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
					 
                    </div>
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
</body>
</html>
