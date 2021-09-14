@extends('master.layout')
@section('noidung')
<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img style="height: 220px" src="{{asset('product/'.$sp->image)}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{ $sp->name }}</h2></p>
								<p class="single-item-price">
									@if($sp ->promotion_price ==0)
										<span class="flash-sale">{{ number_format($sp->unit_price) }} đồng</span>
									@else
										<span class="flash-del">{{number_format($sp->unit_price)}} đồng</span>
										<span class="flash-sale">{{number_format($sp->promotion_price)}} đồng</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{ $sp->description }}</p>
							</div>
							<div class="space20">&nbsp;</div>
                         <form action="{{ route('buy') }}" method="post">	
                         @csrf	
               					<p>Số lượng:</p>
							<div class="single-item-options">
								<div  name="color">
									<input type="hidden" name="rowid" value="{{ $sp->id }}">
                                        <input type="number" name="quantitys" value="1" style="border: 1px solid #e1e1e1;"class="wc-select" id="quantity" min="1" >
								</div>
								<button type="submit" class="btn-primary" style="width: 50px; height: 35px;" ><i class="fa fa-shopping-cart"></i></button>
								<div class="clearfix"></div>
							</div>
						</form>

						</div>
					</div>

					<div class="space40">&nbsp;</div>

				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#home">Mô tả</a></li>
				    <li><a data-toggle="tab" href="#menu1">Bình luận()</a></li>
				  </ul>

		<div class="tab-content">
				    <div id="home" class="tab-pane fade in active comments">
				    	<br>
				      <p>{{ $sp->description }}</p>
				    </div>
				  <div id="menu1" class="tab-pane fade">
				  	<div class="container mt-5">
				  		<div class="row d-flex justify-content-center">
								<div class="col-md-8 comments">
				  	 @if($comment)	
					    @foreach($comment as $comment)
				    <div class="card p-3" id="comments">
				     	<div class="d-flex justify-content-between align-items-center">
						    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">{{$comment->name }}</small> <small class="font-weight-bold">{{ $comment->content }}</small></span> </div> <small>{{$comment->create_at }}</small>
						  </div>
						   <div class="action d-flex justify-content-between mt-2 align-items-center">
						       <div class="reply px-4"> <small onclick="remove({{$comment->id}})">Xóa</small> </div>
						        <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
						    </div>
						</div><br>
						@endforeach
						@endif
						@if(Auth::check())
						  <div class="input-group row">
                  <form>
						        <div class="col-sm-6 comment">
										  <input type="text" style="border-radius: 17px;width: 249px;margin-left: 8px;" class="form-control input-sm sends" placeholder="Bình luận">
										</div>
										<div class="col-sm-3 " style="margin-left: 72px;;">
										  <div class="input-group-btn">
										    <button type="button" onclick="comments({{ $sp->id }})" class="btn btn-info" style="border-radius: 7px;"><i class="glyphicon glyphicon-send"></i></button>
									    </div>
										</div>
								  </form>
						 </div>
						 @endif
				  </div>
				</div>
			</div>
		</div>
</div>				
				<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
							@foreach($sptt as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img style="height: 220px" src="{{asset('product/'.$sptt->image)}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $sptt->name }}</p>
										<p class="single-item-price">
											@if($sptt ->promotion_price ==0)
										<span class="flash-sale">{{ number_format($sptt->unit_price) }} đồng</span>
									@else
										<span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
										<span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
									@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('chitiet',$sptt->id )}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('chitiet',$sptt->id )}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset('images/products/sales/1.png')}}" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset('images/products/sales/2.png')}}" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset('images/products/sales/3.png')}}" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset('images/products/sales/4.png')}}" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset('images/products/sales/1.png')}}" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset('images/products/sales/2.png')}}" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset('images/products/sales/3.png')}}" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset('images/products/sales/4.png')}}" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
@section('scri')
<script type="text/javascript">
	function updatecart(qty,rowId){
	
	 $.get('/quantity' ,{"quantity":qty,"id":rowId},function(data){
	 	alert(rowId);
          //$("#listcart").load("http://localhost:8000 #listcarts");
      });
}
</script>
<script type="text/javascript">
	function comments(id){
		var a = $('.sends').val();
		 $.get('{{ route('comments') }}',{"id":id,"comment":a},function(data){
          $("#comments").load("{{ route('chitiet',$sp->id) }} #comments");
	});
}
</script>
<script type="text/javascript">
	function remove(id){
      $.get('{{ route('remove') }}',{"id":id},function(data){
        $("#comments").load("{{ route('chitiet',$sp->id) }} #comments");
      });
}
</script>
@endsection