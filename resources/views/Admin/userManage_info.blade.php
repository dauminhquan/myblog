@extends("admin.layout")
@section('page-content')
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Điền thông tin</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- start form for validation -->
                <form method="post" >

                    <label for="">Email * :</label>
                    @if(isset($fail))
                        @if($fail->has("email"))
                            @foreach ($fail->get('email') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif
                    <input type="email" value="{{$user->email}}" id="Tiêu đề" class="form-control" name="email" required />



                    <label >Tên người dùng * :</label>
                    @if(isset($fail))
                        @if($fail->has("name"))
                            @foreach ($fail->get('name') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif
                    <input type="text"  value="{{$user->name}}" class="form-control" name="name" data-parsley-trigger="change" required />


                    <label>Mật khẩu cũ :</label>

                    @if(isset($fail))
                        @if($fail->has("old_password"))
                            @foreach ($fail->get('old_password') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif
                    @if(isset($err_pass))
                        <p style="color: red;">{{$err_pass}}</p>
                    @endif

                    <input type="password"  class="form-control" name="old_password" data-parsley-trigger="change"  />


                    <label>Mật khẩu mới *:</label>

                    @if(isset($fail))
                        @if($fail->has("new_password"))
                            @foreach ($fail->get('new_password') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif

                    <input type="password" id="summary" class="form-control" name="new_password" data-parsley-trigger="change"  />

                    <label for="message">Nhập lại mật khẩu *</label>

                    @if(isset($fail))
                        @if($fail->has("con_new_password"))
                            @foreach ($fail->get('con_new_password') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif
                    <input type="password"  class="form-control" name="con_new_password" data-parsley-trigger="change"  />

                    <label>Chọn quyền tài khoản * :</label>
                    <select name="auth" class="form-control" required>
                        <option selected></option>
                       @if($user->auth == 0)
                            <option value="0" selected>Khách hàng</option>
                            <option value="1">Quản trị viên</option>
                           @else
                            <option value="0">Khách hàng</option>
                            <option value="1" selected>Quản trị viên</option>
                            @endif
                    </select>

                    <br/>
                    {!! csrf_field() !!}
                    <button class="btn btn-primary" name="update" value="update" type="submit">Lưu thông tin người dùng</button>
                    <button class="btn btn-danger" name="delete" value="ok" type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa người dùng?')"> Xóa người dùng</button>
                </form>


            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection