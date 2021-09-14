@extends('master.admin')
@section('noidung')
  <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Thông Tin Website</h4>
              <p class="card-category">Created using Roboto Font Family</p>
            </div>
            <div class="card-body">
              <div id="typography">
                <div class="card-title">
                  <h2>Lịch sử phát triển</h2>
                </div>
                  <div class="container">           
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th>Năm</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($contex as $contex)
                          <tr>
                            <td>{{ $contex->times }}</td>
                            <td>{{ $contex->title }}</td>
                            <td>{{ $contex->history }}</td>
                            <td class="btn-group btn-group-sm"> <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button></td>
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
      </div>
@endsection