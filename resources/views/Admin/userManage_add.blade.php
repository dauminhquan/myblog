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
                <form method="post">

                    <label for="">Email * :</label>
                    @if(isset($fail))
                        @if($fail->has("email"))
                            @foreach ($fail->get('email') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif
                    <input type="email" id="Tiêu đề" class="form-control" name="email" required />



                    <label >Tên người dùng * :</label>
                    @if(isset($fail))
                        @if($fail->has("name"))
                            @foreach ($fail->get('name') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif
                    <input type="text"  class="form-control" name="name" data-parsley-trigger="change" required />


                    <label>Mật khẩu mới *:</label>

                    @if(isset($fail))
                        @if($fail->has("password"))
                            @foreach ($fail->get('password') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif

                    <input type="password" id="summary" class="form-control" name="password" data-parsley-trigger="change" required />

                    <label for="message">Nhập lại mật khẩu *</label>

                    @if(isset($fail))
                        @if($fail->has("con_password"))
                            @foreach ($fail->get('con_password') as $message)
                                <p style="color: red;">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif
                    <input type="password"  class="form-control" name="con_password" data-parsley-trigger="change" required />

                    <label>Chọn quyền tài khoản * :</label>
                    <select name="auth" class="form-control" required>
                        <option selected></option>
                        <option value="0">Khách hàng</option>
                        <option value="1">Quản trị viên</option>
                    </select>

                    <br/>
                    {!! csrf_field() !!}
                    <button class="btn btn-primary" type="submit">Tạo mới người dùng</button>

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