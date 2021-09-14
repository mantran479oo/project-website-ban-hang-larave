@extends('master.layout')
@section('noidung')
                <div class="inner-header">
                		<div class="container">
                			<div class="pull-left">
                				<h6 class="inner-title">Tài khoản cá nhân</h6>
                			</div>
                			<div class="pull-right">
                				<div class="beta-breadcrumb font-large">
                					<a href="{{ route('index') }}">Trang chủ</a> / <span>Tài khoản cá nhân</span>
                				</div>
                			</div>
                			<div class="clearfix"></div>
                		</div>
                	</div>
                	
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                  <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a data-toggle="tab" href="#profile">Hồ sơ của tôi</a></li>
                                    <li><a data-toggle="tab" href="#buy">Đơn mua</a></li>
                                    <li><a data-toggle="tab" href="#payment">Ngân hàng</a></li>
                                    <li><a data-toggle="tab" href="#address">Địa chỉ</a></li>
                                  </ul>
                                </div>
                            <div class="col-md-9">
                          <div class="tab-content">
                            <div id="profile" class="tab-pane fade in active">
                              <h3>Thông tin tài khoản</h3>
                              <hr>
                              <div class="row">
                                <div class="col-9 profile">
                                    {{-- <form class="form-horizontal" action="/action_page.php"> --}}
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="email">Tên:</label>
                                        <div class="col-sm-9">
                                            {{ $user->full_name }}
                                            <a data-toggle="collapse" data-target="#name"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <div id="name" class="collapse">
                                           <input type="text" class="form-control input-sm" placeholder="Nhập tên">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Email:</label>
                                        <div class="col-sm-9">
                                            {{ $user->email }}
                                            <a data-toggle="collapse" data-target="#email"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <div id="email" class="collapse">
                                            <input type="email" class="form-control input-sm"  placeholder="Nhập email"> 
                                            </div>
                                          
                                        </div>
                                      </div>
                                       <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Số điện thoại:</label>
                                        <div class="col-sm-9">
                                            {{ $user->phone }}
                                             <a data-toggle="collapse" data-target="#phone"><button type="button" class="btn btn-primary btn-xs">Thêm</button></a>
                                            <div id="phone" class="collapse">
                                            <input type="number" class="form-control input-sm" placeholder="Nhập số điện thoại">
                                            </div>
                                          {{--  --}}
                                        </div>
                                      </div>
                                       <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd"> Giới tính:</label>
                                        <div class="col-sm-9">
                                           
                                            <label class="radio-inline">
                                              <input type="radio"  name="optradio" >Nam
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="optradio">Nữ
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="optradio">Khác
                                            </label> 
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Ngày sinh:</label>
                                        <div class="col-sm-9">
                            
                                         <input type="date" class="form-control"  placeholder="Enter password"> 
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-9">
                                          <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                      </div>
                                    {{-- </form> --}}
                                </div>
                                <div class="col-3">
                                    <div class="imgcontainer">
                                    <img src="{{ asset('images/products/cart/1.png')}}" alt="Avatar" class="avatar">
                                  </div>
                                <input type="file" id="file" style="display: none;" accept=".jpg,.png">
                              <label class="avt" for="file">Chọn ảnh</label>
                                </div>
                              </div>
                            </div>
                            <div id="buy" class="tab-pane fade profile">
                              <h3>Đơn hàng</h3>
                              <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Sản phẩm</th>
                                            <th>Tên đơn hàng</th>
                                             <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Ngày mua</th>
                                            <th>Trạng thái</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listOrder as $order)
                                        <tr>
                                            <td>1</td>
                                            <td><img style="height: 65px; width: 72px;border-radius: 10px" src="{{asset('product/'.$order->image)}}" alt=""></td>
                                            <td>{{ $order->name }}</td>
                                            <td >
                                                <div class="buttons_added">
                                                  <input class="minus is-form"  type="button" value="-">
                                                  <input aria-label="quantity" id="quantity"  class="input-qty" max="10" min="1" type="number" value="1">
                                                  <input class="plus is-form" type="button" value="+">
                                                </div>
                                                </td>
                                            <td>{{ number_format( $order->totals) }} đồng</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>@if($order->status==0)
                                                Đang xử lý ...
                                                @elseif($order->status ==1)
                                                Đã nhận đơn hàng
                                                @elseif($order->status==2)
                                                Đang giao hàng
                                                @else
                                                Đã giao hàng
                                                @endif
                                            </td>
                                        
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="payment" class="tab-pane fade">
                              <h3>Menu 2</h3>
                              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                            <div id="address" class="tab-pane fade">
                              <h3>Địa chỉ của tôi</h3>
                              <hr>
                              <div class="row">
                                <div class="col-md-6">
                                   <table class="table table-striped orders">
                                   
                                    <tbody>
                                      <tr>
                                        <td>Họ và tên</td>
                                        <td>sad</td>
                                       
                                      </tr>
                                      <tr>
                                        <td>Số điện thoại</td>
                                        <td>011</td>
                                   
                                      </tr>
                                     
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
             
                       {{--  <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                            <h4> Chào
                                <%=user.ten%>
                            </h4>
                            <p>
                                Đây là trang quản lý tài khoản của bạn.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Product Name</td>
                                            <td>01 Jan 2020</td>
                                            <td>$99</td>
                                            <td>Approved</td>
                                            <td><button class="btn">View</button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Product Name</td>
                                            <td>01 Jan 2020</td>
                                            <td>$99</td>
                                            <td>Approved</td>
                                            <td><button class="btn">View</button></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Product Name</td>
                                            <td>01 Jan 2020</td>
                                            <td>$99</td>
                                            <td>Approved</td>
                                            <td><button class="btn">View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                            <h4>Payment Method</h4>
                            
                       <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Địa Chỉ</h5>
                                    <p>Đại Học Công Nghệ GTVT </p>
                                    <p>Mobile: 012-345-6789</p>
                                    <button class="btn">Sửa địa chỉ</button>
                                </div>

                            </div>
                        </div>
                       <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>Chi Tiết Tài Khoản</h4>
                            <form action="/users/update" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ho">Họ</label>
                                        <input id="ho" name="ho" value="<%=user.ho%>" class="form-control" type="text" placeholder="Họ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ten">Tên</label>
                                        <input id="ten" name="ten" value="<%=user.ten%>" class="form-control" type="text" placeholder="Tên">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Số điện thoại</label>
                                        <input id="phone" name="phone" value="<%=user.phone%>" class="form-control" type="text" placeholder="Số Điện Thoại">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" value="<%=user.email%>" class="form-control" type="text" placeholder="Email">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="address">Địa chỉ</label>
                                        <input name="address" value="<%=user.address%>" class="form-control" type="text" placeholder="Địa Chỉ">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Cập Nhật Tài Khoản</button>
                                        <br><br>
                                    </div>
                                </div>
                            </form>
                            <h4>Đổi Mật Khẩu</h4>
                            <form action="/users/doi-mat-khau" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="password" class="form-control" type="password" placeholder="Mật khẩu hiện tại">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="newPassword" class="form-control" type="text" placeholder="Mật khẩu mới">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="confirmPassword" class="form-control" type="text" placeholder="Xác nhận mật khẩu mới">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                   {{--  </div>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
@endsection
@section('scri')
<script>
$('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
       d += 1
    }
    $this.attr('value', d).val(d)
  })
})


</script>
<script type="text/javascript">
    document.getElementByClassName("is-form").onclick = function() {myFunction()};
    function myFunction() {
     alert('1');
}
</script>
@endsection