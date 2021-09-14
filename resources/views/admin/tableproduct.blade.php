
@extends('master.admin')
@section('noidung')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Quản Lý Sản Phẩm</h4>
                  @if(session('sus'))
                  <h5 class="alert alert-success">{{ session('sus') }}</h5>
                  @endif
                    <button type="button" style=" float: right;background-color: cornflowerblue;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thêm</button>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="news">
                      <thead class=" text-primary" >
                        <th>
                          New
                        </th>
                        
                        <th>
                          Sản phẩm
                        </th>
                        <th>
                          Tên sản phẩm
                        </th>
                        <th>
                          Giá sản phẩm
                        </th>
                        <th>
                          Giảm giá
                        </th>
                      </thead>
                      @foreach($lists as $list)
                      <tbody >
                        <tr>
                          <td >
                            <input type="checkbox" id="check_{{ $list->id }}" value="{{ $list->new }}" onclick="check({{$list->id}}) "@if($list->new === 1) checked  @endif>
                          </td>
                          
                          <td>
                            <div class="conter">
                           <img style="height: 50px;width: 60px" src="{{asset('product/'.$list->image)}}" >
                           </div>
                          </td>
                          <td>
                            {{ $list->name }}
                          </td>
                          <td class="text-primary">
                            {{ number_format( $list->unit_price) }} đồng
                          </td>
                           <td>
                            {{ number_format($list->promotion_price) }} đồng
                          </td>
                          <td>
                            <button type="button" class="btn btn-primary btn-sm" onclick="edit()">Sửa</button>
                                 <div class="modal fade" id="myModal1">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Modal Heading</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body row">
                                     <div class="col-md-2"></div>
                                     <div class="col-md-4">
                                       <img src="">
                                     </div>
                                     <div class="col-md-4"></div>
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                          </td>
                          <td><button type="button" onclick="deletes({{ $list->id }})" class="btn btn-danger btn-sm">Xóa</button></td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                    <div class="pagination">{{$lists->links()}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0">Quản Lý Tài Khoản Khách Hàng</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>
                          ID
                        </th>
                        <th>
                          Họ tên
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Địa chỉ
                        </th>
                        <th>
                          Số điện thoại
                        </th>
                      </thead>
                      @php $a = 1;@endphp
                      @foreach($users as $users)
                      <tbody>
                        <tr>
                          <td>
                            {{ $a++ }}
                          </td>
                          <td>
                            {{ $users->full_name }}
                          </td>
                          <td>
                            {{ $users->email }}
                          </td>
                          <td>
                            {{ $users->address }}
                          </td>
                          <td>
                            {{ $users->phone }}
                          </td>
                        </tr>
                       
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('script')
 <div class="modal" id="myModal" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title" style="text-align: center;">Thêm sản phẩm</h4>
                </div>
                <div class="card-body">
               <strong id="danger"></strong>
                  <form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="nameproduct" class="form-control" placeholder="Tên sản phẩm" required>
                        </div>
                      </div>
                      <div class="col-md-3">

                         <input type="file" id="file_upload" name="upload" accept=".jpg, .png" class="form-control-file border" style=" margin-top: 17px;width: 75px;"required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                         
                          <input type="number" name="prices" class="form-control" required placeholder="Giá sản phẩm">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="number" name="amount" value="1" class="form-control" placeholder="Số lượng" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                  
                          <input type="number" min="0" max="100" name="sale" class="form-control"  placeholder="Sale(%)" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                         <select name="types" class="form-control">
                          @foreach($list_type as $lis)
                          <option value="{{ $lis->id }}">{{ $lis->name }}</option>
                          @endforeach
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" name="description" placeholder="Mô tả sản phẩm"></textarea>
                        </div>
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
          </div>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" id="btn_add" style="display:block;" class="btn btn-primary pull-right">Thêm</button>
          </form>
          <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Thoát</button>
        </div>
        
      </div>
    </div>



<script type="text/javascript">
      function check(id){
        sl = $("#check_"+id).val();
        $.get('{{route('news') }}',{"id":id,"value":sl},function(data){
             $("#news").load("{{ route('admin.table') }} #news");
        });
      }

  function deletes(id){
    $.get('{{ route('deletes') }}',{"id":id},function(data){
         if(data.code == 200){
          $("#news").load("{{ route('admin.table') }} #news");
          alertify.success('Xóa thành công !!');
         }else{
           alertify.error('Xóa không thành công');
         }
    });
  }
 function edit(){
     var modal = document.getElementById('myModal');
    
          modal.style.display = "block";
        
}
 
</script>
<script>
      $(document).ready(function(){
      $("#file_upload").change(function() {
      var modals = document.getElementById('btn_add');
       var myElement = $("#danger");
      var test_value = $("#file_upload  ").val();
      var extension = test_value.split('.').pop().toLowerCase();
      if ($.inArray(extension, ['png', 'gif', 'jpeg', 'jpg']) == -1) {
      modals.style.display="none";
      myElement.text("File không hợp lệ");
      document.getElementById("danger").style.color = "red";
      } else {
      modals.style.display="block";
      myElement.text("");
      }
      });
      });
</script>

@endsection

{{-- $(document).ready(function(){
  $("#btn1").click(function(){
   var a = $('#as').val();
    $("p").html(a);
  });
  });

 $(function(){
    var inputVal = $('input').val(200);

});
</script>
</head>
<body>

<p>This is a paragraph.</p>
<input type="text" id="as">

<button id="btn1">Append text</button>
<button id="btn2">Append list items</button> --}}