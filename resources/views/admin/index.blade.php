@extends('master.admin')
@section('noidung')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Used Space</p>
                  <h3 class="card-title">49/50
                    <small>GB</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="javascript:;">Get More Space...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Doanh thu</p>
                  <h3 class="card-title">$34,245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Fixed Issues</p>
                  <h3 class="card-title">75</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Ng?????i truy c???p</p>
                  <h3 class="card-title">+245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Daily Sales</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Email Subscriptions</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Completed Tasks</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Danh s??ch h??a ????n</h4>
                  <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>Stt</th>
                      <th>S???n ph???m</th>
                      <th>T??n kh??ch h??ng</th>
                      <th>Email kh??ch h??ng</th>
                      <th>S??? l?????ng</th>
                      <th>T???ng gi?? ti???n</th>
                      <th>Tr???ng th??i</th>
                      <th>Thanh to??n</th>
                    </thead>
                    <tbody>
                      @foreach($order as $orders)
                      <tr>
                        <td>1</td>
                        <td><img style="height: 55px;width:55px;" src="{{asset('product/'.$orders->imgorders)}}" alt=""></td>
                        <td>{{ $orders->full_name }}</td>
                        <td>{{ $orders->email }}</td>
                        <td>{{ $orders->quantity }}</td>
                        <td>{{number_format( $orders->totals) }} ?????ng</td>
                        <td class="form-group">
                            <select onchange="status({{ $orders->id }})" class="form-control" id="status_{{$orders->id}}">
                              @if($orders->status == 0)
                              <option value="0">??ang x??? l??...</option>
                              <option value="1">???? nh???n ????n h??ng</option>
                              <option value="2">??ang giao</option>
                              <option value="3">???? giao</option>
                              @elseif($orders->status == 1)
                              <option value="1">???? nh???n ????n h??ng</option>
                              <option value="0">??ang x??? l??...</option>
                              <option value="2">??ang giao</option>
                              <option value="3">???? giao</option>
                              @elseif($orders->status == 2)
                              <option value="2">??ang giao</option>
                               <option value="0">??ang x??? l??...</option>
                              <option value="1">???? nh???n ????n h??ng</option>
                              <option value="3">???? giao</option>
                              @elseif($orders->status == 3)
                              <option value="3">???? giao</option>
                               <option value="0">??ang x??? l??...</option>
                              <option value="1">???? nh???n ????n h??ng</option>
                              <option value="2">??ang giao</option>
                              @endif
                            </select>
                        </td>
                        <td>Niger</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('script')
<script type="text/javascript">
  function status(id){
     var a =('#status_'+ id).val();
    alert(a);
  }
</script>
@endsection