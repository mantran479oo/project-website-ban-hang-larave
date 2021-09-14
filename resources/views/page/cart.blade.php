@extends('master.layout')
@section('noidung')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Shopping Cart</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Shopping Cart</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			@if($carts)
			@php $total =0; $gia=0;@endphp
			<div class="table-responsive" >
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0" id="cartx">
					<thead>
						<tr>
							<th class="product-status">Sản phẩm</th>
							<th class="product-name">Tên sản phẩm</th>
							<th class="product-price">Giá sản phẩm</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Tổng giá sản phẩm</th>
							<th class="product-remove">Xóa</th>
						</tr>
					</thead>
					<tbody>
					@foreach($carts as $listcart)
					@php $gia =$listcart['quantity']*$listcart['prices'] @endphp
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" width="100px" src="{{asset('product/'.$listcart['img'])}}" alt="">
									
								</div>
							</td>
                            <td class="product-status">
								<div class="media-body">
									<p class="font-large table-title">{{$listcart['name'] }}</p>
	
								</div>
							</td>
							<td class="product-price">
								<span class="amount">{{number_format($listcart['prices']) }} đồng</span>
							</td>

							
                            <td class="product-quantity">
								<input class="form-qty" id="quantity_{{$listcart['id'] }}" type="number" onchange="updatecart({{ $listcart['id'] }})" value="{{ $listcart['quantity'] }}" name="product-qty">
							</td>

							<td class="product-subtotal">
								<span class="amount">{{ number_format($gia) }} đồng</span>
							</td>

							<td class="product-remove">
							
								<a href="javascript:" onclick="detelecart({{$listcart['id']}})" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
				
							</td>
							@php $total +=$gia @endphp
						</tr>

						@endforeach
					</tbody>
               
					<tfoot>
						<tr>
							<td colspan="6" class="actions">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền: {{number_format($total )}} đồng</p></div>
								<a href="{{ route('checkout')}}" class="beta-btn primary" style="float: right;" name="proceed"> Đặt hàng<i class="fa fa-chevron-right"></i></a>
							</td>
							
						</tr>
					</tfoot>
				</table>
				 @endif
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">

				{{-- <form class="shipping_calculator pull-left" action="#" method="post">
					<h2><a href="#" class="shipping-calculator-button">Calculate Shipping <span>↓</span></a></h2>

					<section class="shipping-calculator-form " style="display: none;">

						<p class="form-row form-row-wide">
							<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" style="padding:10px;" rel="calc_shipping_state">
								<option value="">Select a country…</option>
								<option value="AX">Åland Islands</option><option value="AF">Afghanistan</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="PW">Belau</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo (Brazzaville)</option><option value="CD">Congo (Kinshasa)</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CW">CuraÇao</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="CI">Ivory Coast</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao S.A.R., China</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territory</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="QA">Qatar</option><option value="IE">Republic of Ireland</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="ST">São Tomé and Príncipe</option><option value="BL">Saint Barthélemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="SX">Saint Martin (Dutch part)</option><option value="MF">Saint Martin (French part)</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="SM">San Marino</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia/Sandwich Islands</option><option value="KR">South Korea</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB" selected="selected">United Kingdom (UK)</option><option value="US">United States (US)</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="WS">Western Samoa</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option>			
							</select>
						</p>

						<p class="form-row form-row-wide">
							<input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="State / county">
						</p>
						<p class="form-row form-row-wide">
							<input type="text" class="input-text" value="" placeholder="Postcode / Zip" name="calc_shipping_postcode" id="calc_shipping_postcode">
						</p>
						<p><button type="submit" name="calc_shipping" value="1" class="beta-btn primary pull-right">Update Totals</button></p>
					</section>
				</form> --}}

				{{-- <div class="cart-totals pull-right">
					<div class="cart-totals-row"><h5 class="cart-total-title">Đơn hàng</h5></div>
					<div class="cart-totals-row"><span>Tổng giá đơn hàng:</span> <span>$188.00</span></div>
					<div class="cart-totals-row"><span>Phí ship:</span> <span>Free Shipping</span></div>
					<div class="cart-totals-row"><span>Tổng:</span> <span>$188.00</span></div>
				</div> --}}

				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
@section('scri')
<script type="text/javascript">
	function detelecart(id){
          $.get("{{ route('delete')}}",{"id":id},function(data){
          // alert(id);
           $("#cartx").load("{{ route('shoppingcart') }} #cartx");
         	
          });
	}
</script>
<script type="text/javascript">
	function updatecart(id){
       sl = $("#quantity_"+id).val();
       $.get("{{ route('updatecart') }}",{"id":id,"quantity":sl},function(data){
       	if(data.code==200){
         	  // alertify.success('Thêm sản phẩm thành công');
         	  $("#cartx").load("{{ route('shoppingcart') }} #cartx");
         	}
        
      });
	}
</script>
@endsection