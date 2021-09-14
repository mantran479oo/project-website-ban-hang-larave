@extends('master.layout')
@section('noidung')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							<li><a href="#">Typography</a></li>
							<li><a href="#">Buttons</a></li>
							<li><a href="#">Dividers</a></li>
							<li><a href="#">Columns</a></li>
							<li><a href="#">Icon box</a></li>
							<li><a href="#">Notifications</a></li>
							<li><a href="#">Progress bars and Skill meter</a></li>
							<li><a href="#">Tabs</a></li>
							<li><a href="#">Testimonial</a></li>
							<li><a href="#">Video</a></li>
							<li><a href="#">Social icons</a></li>
							<li><a href="#">Carousel sliders</a></li>
							<li><a href="#">Custom List</a></li>
							<li><a href="#">Image frames &amp; gallery</a></li>
							<li><a href="#">Google Maps</a></li>
							<li><a href="#">Accordion and Toggles</a></li>
							<li class="is-active"><a href="#">Custom callout box</a></li>
							<li><a href="#">Page section</a></li>
							<li><a href="#">Mini callout box</a></li>
							<li><a href="#">Content box</a></li>
							<li><a href="#">Computer sliders</a></li>
							<li><a href="#">Pricing &amp; Data tables</a></li>
							<li><a href="#">Process Builders</a></li>
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($listProduct)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($listProduct as $listP)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('chitiet',$listP->id )}}"><img style="height: 231px;" src="{{asset('product/'.$listP->image)}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $listP->name }}</p>
											<p class="single-item-price">
												@if($listP ->promotion_price ==0)
												<span class="flash-sale">{{ number_format($listP->unit_price) }} đồng</span>
												@else
												<span class="flash-del">{{number_format($listP->unit_price)}} đồng</span>
											    <span class="flash-sale">{{number_format($listP->promotion_price)}} đồng</span>
											    @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" onclick="addcart({{ $listP->id }})" href="javascript:"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitiet',$listP->id )}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$listProduct->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($listPr)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($listPr as $List  )
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img style="height: 231px;" src="{{asset('product/'.$List->image)}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $List->name }}</p>
											<p class="single-item-price">
												@if($List ->promotion_price ==0)
												<span class="flash-sale">{{ number_format($List->unit_price) }} đồng</span>
												@else
												<span class="flash-del">{{number_format($List->unit_price)}} đồng</span>
											    <span class="flash-sale">{{number_format($List->promotion_price)}} đồng</span>
											    @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" onclick="addcart({{ $List->id }})" href="javascript:"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitiet',$List->id )}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$listPr->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
@section('scri')
<script type="text/javascript">
	function addcart(id){
         $.get('{{ route('addcart') }}'  ,{"id":id},function(data){
         	if(data.code==200){
          $("#listcarts").load("{{ route('products',['type'=>$type]) }} #listcarts");
         	   alertify.success('Thêm sản phẩm thành công');

         	}
             
         });
	}
</script>
@endsection