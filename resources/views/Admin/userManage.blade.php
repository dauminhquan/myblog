@extends("admin.layout")
@section('page-content')
    <div class="page-title">

        <div class="title_right" style="float: right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Quản lý người dùng</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Thời gian tạo</th>
                        <th>Quyền người dùng</th>
                    </tr>
                    </thead>


                    <tbody>

                    @foreach($users as $item)
                        @if($item->id == Auth::guard('admin')->user()->id)
                            @continue
                        @endif
                        <tr>
                            <td><a href="{{route("admin.userManage.info",["id" => $item->id])}}">{{$item->name}}</a></td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>@if($item->auth == 1) Quản trị @else Khách hàng @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset("vendors/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
    <script src="{{asset("vendors/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
    <script>
        $("#datatable-buttons").DataTable({
            dom: "Blfrtip",
            buttons: [
                {
                    text: 'Thêm mới người dùng',
                    className: 'btn btn-info right',
                    action: function ( e, dt, node, config ) {
                        window.open('/admin/quan-ly-nguoi-dung/them-moi','_blank');
                    }
                }
            ],
            responsive: true
        });
    </script>
@endsection