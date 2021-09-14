<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Laravel </title>

	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/colorbox/example3/colorbox.css')}}">
	<link rel="stylesheet" href="{{asset('rs-plugin/css/settings.css')}}">
	<link rel="stylesheet" href="{{asset('rs-plugin/css/responsive.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('css/huong-style.css')}}">

@yield('hed')
</head>
<body>
<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i>@foreach($information as $information) {{ $information->wards }} , {{ $information->dstrict }} , {{ $information->city }}</a></li>
						<li><a href=""><i class="fa fa-phone"></i> {{ $information->phone }} @endforeach</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
						<li><a href="{{ route('my-account') }}"><i class="fa fa-user"></i>Tài khoản của {{ Auth::user()->full_name }}</a></li>
						<li><a href="{{ route('logout') }}">Đăng xuất</a></li>
						@else
						<li><a href="{{ route('dangky') }}">Đăng kí</a></li>
						<li><a href="{{ route('dangnhap') }}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="row">
				 <div class=" col-md-6 pull-left">
					{{-- <a href="{{ route('index') }}" id="logo"><img src="{{asset('images/logo-cake.png')}}" width="200px" alt=""></a> --}}
				 </div>
				 <div class="col-md-6">
				 	<div class="col-sm-6 ">
				  <div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					    <div class="beta-comp">
							<form role="search" method="get" id="searchform" action="{{ route('seach') }}">
					        	<input type="text"  name="seach" id="s" placeholder="Nhập từ khóa..." />
					        	<button class="fa fa-search" type="submit" id="searchsubmit"></button>
							</form>
						</div>
                	  </div> 
                  </div>
                  <div class="col-sm-6">
					<div class=" dropdown" id="listcarts" style="margin-top: 42px;" >
						<button class="btn btn-default dropdown-toggle " type="button" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(session()->has('cart')){{ count($cart)}} @else 0 @endif)
						   </button>
						<div class="dropdown-menu cart-body " style="width: 300px;">
						    <div class="row " style="width:350px;">
						        <div class="cart-item">
						        	@if($cart)
									@php $totals = 0;@endphp	
									@foreach($cart as $cart)
									@php $totals += $cart['quantity']*$cart['prices'] @endphp
							          <div class="media">
							      	    <a class="pull-left" href="" style="margin-left: 15px;"><img src="{{asset('/product/'.$cart['img'])}}"></a>
							        	<div class="media-body" style="margin-left: 113px;">
								         	<span class="cart-item-title">{{ $cart['name'] }}</span>
								      	    <span class="cart-item-options">ádas</span>
								      	    <span class="cart-item-amount">{{ $cart['quantity'] }} * <span>{{ number_format($cart['prices']) }}</span>
							      	    </div>
							           </div>
							           <hr style="width: 276px;margin: 16px;">
							         @endforeach
							         </div>
							       </div>
	                                  <div class="cart-caption">
										<div class="cart-total text-right">Tổng tiền:{{ number_format($totals) }}   đồng <span class="cart-total-value"></span></div>
										<div class="clearfix"></div>

	                                    <div class="center b">
											<div class="space10">&nbsp;</div>
											<a href="{{ route('shoppingcart')}}" style="float: left;" class="beta-btn primary text-center">Giỏ hàng<i class="fa fa-chevron-right"></i></a>
										<div class="center b">
											<div class="space10">&nbsp;</div>
											<a href="{{ route('checkout')}}" style="float: right;margin-top: -11px;" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
										</div>
						    		</div>
								</div>
								@else
								<strong style="margin: 99px;">Giỏ hàng trống</strong>
								@endif
				  			</div>
				 		</div> 
				 		</div>
					</div>
				</div>
			</div>
		</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{ route('index') }}">Trang chủ</a></li>
						<li><a href="">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loai_san_pham as $loai_sp)
								<li><a href="{{ route('products',['type'=>$loai_sp->id]) }}">{{ $loai_sp->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{ route('gioithieu') }}">Tin Tức</a></li>
						<li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->


@yield('noidung')



<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Instagram Feed</h4>
						<div id="beta-instagram-feed"><div></div></div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Information</h4>
						<div>
							<ul>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web Design</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web development</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Marketing</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Tips</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Resources</a></li>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Illustrations</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
				 <div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">Contact Us</h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								{{-- @foreach($information as $information) 
								{{ $information->wards }} , {{ $information->dstrict }} ,
								 {{ $information->city }} 
								@endforeach --}}
							</div>
						</div>
					</div>
				  </div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Newsletter Subscribe</h4>
						<form action="#" method="post">
							<input type="email" name="your_email">
							<button class="pull-right" type="submit">Subscribe <i class="fa fa-chevron-right"></i></button>
						</form>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #footer -->
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2014</p>
			<p class="pull-right pay-options">
				<a href="#"><img src="{{asset('images/pay/master.jpg')}}" alt="" /></a>
				<a href="#"><img src="{{asset('images/pay/pay.jpg')}}" alt="" /></a>
				<a href="#"><img src="{{asset('images/pay/visa.jpg')}}" alt="" /></a>
				<a href="#"><img src="{{asset('images/pay/paypal.jpg')}}" alt="" /></a>
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div>

   {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script src="{{asset('/js/jquery.js')}}"></script>
	<script src="{{asset('/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js')}}"></script>
{{-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> --}}
	<script src="{{asset('/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
	<script src="{{asset('/vendors/colorbox/jquery.colorbox-min.js')}}"></script>
	<script src="{{asset('/vendors/animo/Animo.js')}}"></script>
	<script src="{{asset('/vendors/dug/dug.js')}}"></script>
	<script src="{{asset('/js/scripts.min.js')}}"></script>
	<script src="{{asset('/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
	<script src="{{asset('/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
	<script src="{{asset('/js/waypoints.min.js')}}"></script>
	<script src="{{asset('/js/wow.min.js')}}"></script>
	<script src="{{asset('/js/custom2.js')}}"></script>
  
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<script>
	$(document).ready(function($) {
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
@yield('scri')
</body>
</html>
