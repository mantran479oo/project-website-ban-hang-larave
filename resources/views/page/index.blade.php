@extends('master.layout')
@section('noidung')
<div class="rev-slider">
	<div class="fullwidthbanner-container">
				<div class="fullwidthbanner">
					<div class="bannercontainer" >
					    <div class="banner" >
							<ul>
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{asset('images/thumbs/1.jpg')}}" data-src="{{asset('images/thumbs/1.jpg')}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{asset('images/thumbs/1.jpg')}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
										</div>
									</div>

						        </li>
								<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						          <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
												<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{asset('images/thumbs/1.jpg')}}" data-src="{{asset('images/thumbs/1.jpg')}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{asset('images/thumbs/1.jpg')}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
										</div>
									</div>
								</li>

								<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{asset('images/thumbs/1.jpg')}}" data-src="{{asset('images/thumbs/1.jpg')}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{asset('images/thumbs/1.jpg')}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
										</div>
									</div>
						        </li>

								<li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
											<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="   cover" data-bgposition="center center" data-bgrepeat="no-repeat"  data-lazydone="undefined" src="{{asset('images/thumbs/1.jpg')}}" data-src="{{asset('images/thumbs/1.jpg')}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{asset('images/thumbs/1.jpg')}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
										</div>
									</div>
						        </li>
							</ul>
						</div>
					</div>
				<div class="tp-bannertimer"></div>
			</div>
		</div>
	</div>		


	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
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
											<a class="beta-btn primary" href="{{ route('chitiet',$list->id )}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                              @endforeach
							</div>
						   <div class="row">{{$Products->links()}}</div>
                                  </div>
						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm giảm giá</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($Sales)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($Sales as $listsave)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('chitiet',$listsave->id )}}"><img style="height: 231px;" src="{{asset('product/'.$listsave->image)}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $listsave->name }} </p>
											<p class="single-item-price">
												<span class="flash-del">{{ $listsave->unit_price }} đồng</span>
											    <span class="flash-sale">{{ $listsave->promotion_price }} đồng</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" onclick="addcart({{ $listsave->id }})" href="javascript:"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitiet',$listsave->id )}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                            @endforeach
							</div>
							 <div class="row ">{{$Products->links()}}</div>
						</div> 
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
          $("#listcarts").load("{{ route('index') }} #listcarts");
         	   alertify.success('Thêm sản phẩm thành công');

         	}
             
         });
	}
</script>
@endsection