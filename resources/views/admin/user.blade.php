@extends('master.admin')
@section('noidung')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title" style="text-align: center;">Thông tin</h4>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Địa chỉ Email</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Số điện thoại</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      {{-- <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="email" class="form-control">
                        </div>
                      </div> --}}
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tài khoản</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mật khẩu</label>
                          <input type="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Địa chỉ</label>
                          <input type="text" class="form-control" placeholder="Xã/Phường">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="text" class="form-control" placeholder="Quận/Huyện">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="text" class="form-control" placeholder="Tỉnh/Thành phố">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Sửa</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="{{asset('admin/img/faces/marc.jpg')}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Quản lý trang website</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Đừng sợ sự thật vì chúng ta cần khởi động lại nền tảng con người trong sự thật Và tôi yêu bạn như Kanye yêu Kanye Tôi yêu thiết kế giường của Rick Owens nhưng mặt sau là ...
                  </p>
                  <a href="javascript:;" class="btn btn-primary btn-round">Theo dõi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection