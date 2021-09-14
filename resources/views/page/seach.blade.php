@extends('master.layout')
@section('noidung')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($Products)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($Products as $list)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('chitiet',$list->id )}}"><img style="height: 231px;" src="{{asset('product/'.$list->image)}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $list->name }}</p>
											<p class="single-item-price">
												@if($list ->promotion_price ==0)
												<span class="flash-sale">{{ number_format($list->unit_price) }} đồng</span>
												@else
												<span class="flash-del">{{number_format($list->unit_price)}} đồng</span>
											    <span class="flash-sale">{{number_format($list->promotion_price)}} đồng</span>
											    @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" onclick="addcart({{ $list->id }})" href="javascript:"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                              @endforeach
							</div>
						   <div class="row">{{$Products->links()}}</div>
                                  </div>
						<div class="space50">&nbsp;</div>
                            
							</div>
						</div> 
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
	@endsection