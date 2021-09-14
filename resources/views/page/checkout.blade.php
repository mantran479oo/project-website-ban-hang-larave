@extends('master.layout')
@section('noidung')
<div class="container">
		<div id="content">
			
			<form action="{{ route('orders')}}" method="post" class="beta-form-checkout">
                @csrf
				<div class="row">
					<div class="col-sm-6">
						<h4>Địa chỉ giao hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_first_name">Họ tên*</label>
							<input type="text" name="name" id="your_first_name" required>
						</div>

						<div class="form-block">
							<label  for="phone">Số điện thoại*</label>
							<input type="text" id="phone" name="phone"  required>
						</div>

						<div class="form-block">
							<label for="town_city">Địa chỉ*</label>
							<select id="town_city" onchange="citys()" name="city" class="form-control" style="margin-block-end: 23px;">
				        <option  selected>Tỉnh</option>
				        @foreach($city as  $city)
				        <option value="{{ $city->matp }}">{{ $city->name }}</option>
				        @endforeach
				      </select>
				      <div class=" district">
				      <select id="inputState" class="form-control">
				      	@foreach($district as $district)
				        <option selected>Quận/Huyện</option>
				        <option value="{{ $district->maqh }}">{{ $district->name }}</option>
				        @endforeach
				      </select>
				    </div>
				    <div class=" wards ">
				      <select id="inputState" class="form-control">
				      	@foreach($wards as $wards)
				        <option selected>Xã/Phường</option>
				        <option value="{{ $wards->xaid }}">{{ $wards->name }}</option>
				        @endforeach
				      </select>
				    </div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										{{-- <div class="media">
											//<img width="35%" src="{{asset('images/shoping1.jpg')}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">Men's Belt</p>
												<span class="color-gray your-order-info">Color: Red</span>
												<span class="color-gray your-order-info">Size: M</span>
												<span class="color-gray your-order-info">Qty: 1</span>
											</div>
										</div> --}}
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="coupon">
									<label for="coupon_code">Mã giảm giá :</label> 
									<input type="text" name="coupon_code" value="" placeholder="Nhập mã ..."> 
									<button type="submit" class="beta-btn primary" name="apply_coupon">Áp dụng <i class="fa fa-chevron-right"></i></button>
								</div>
									{{-- <div class="pull-left"><p class="your-order-f18">Tổng đơn hàng:</p></div>
									<div class="pull-right"><h5 class="color-black">$235.00</h5></div>
									<div class="clearfix"></div> --}}
								</div>
							</div>
							<div class="your-order-head"><h5>Payment Method</h5></div>
							
							<div class="your-order-body ">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio"  value="ATM" name="payment" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs"> Thanh toán thẻ </label>
										{{-- <div class="payment_box payment_method_bacs" style="display: block;">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
										</div>		 --}}				
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" name="payment" class="input-radio"  value="COD" data-order_button_text="">
										<label for="payment_method_cheque">Thanh toán khi nhận hàng </label>
										{{-- <div class="payment_box payment_method_cheque" style="display: none;">
											Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
										</div>	 --}}					
									</li>
									
									<li class="payment_method_paypal">
										<div id="paypal-button"></div>				
									</li>
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng<i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
@section('scri')
{{-- <script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AVSpnj982o7fweJm2cVEUrAgSZJ3nLFwD3CggYLi-EPx07yQlBt5mhHtn_iOiWGQkYqFXlHO6o8REP0P',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '0.01',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Cảm ơn bạn đã mua hàng!');
      });
    }
  }, '#paypal-button');

</script> --}}


<script type="text/javascript">
	function citys(){
		var value = $('#town_city').val();
		$.get('{{ route('city') }}'  ,{"id":value},function(data){
			//var obj = JSON.parse(data);
			console.log();
			
          // $("#listcarts").load("{{ route('index') }} #listcarts");             
         });
	}
</script>
@endsection