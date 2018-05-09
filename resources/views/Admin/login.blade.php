<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>


    <link href="{{asset("vendors/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet">

    <link href="{{asset("vendors/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">

    <link href="{{asset("vendors/nprogress/nprogress.css")}}" rel="stylesheet">

    <link href="{{asset("vendors/animate.css/animate.min.css")}}" rel="stylesheet">

    <link href="{{asset("build/css/custom.min.css")}}" rel="stylesheet">
</head>

<body class="login">
<div>

    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post">
                    <h1>Form Đăng nhập</h1>
                    @if(isset($fail))
                        @if($fail->has("email"))
                            @foreach ($fail_reg->get('email') as $message)
                                <p style="color: red;text-align: center">{{$message}}</p>
                            @endforeach
                        @endif
                        @if($fail->has("password"))
                            @foreach ($fail_reg->get('password') as $message)
                                <p style="color: red;text-align: center">{{$message}}</p>
                            @endforeach
                        @endif
                        <p style="color: red;text-align: center">{{$fail->first("email")}}</p>
                    @endif
                    @if(isset($fail_pass))
                        <p style="color: red;text-align: center">{{$fail_pass}}</p>
                    @endif
                    <div>
                        <input type="email" class="form-control" placeholder="Username" name="email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    </div>
                    {!! csrf_field() !!}
                    <div>
                        <button class="btn btn-default submit" name="login" type="submit">Đăng nhập</button>
                        <a class="reset_pass" href="#">Quên mật khẩu?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Thành viên mới?
                            <a href="#signup" class="to_register">Tạo tài khoản </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form method="post">
                    <h1>Tạo tài khoản</h1>
                    @if(isset($fail_reg))
                        @if($fail_reg->has("email"))
                            @foreach ($fail_reg->get('email') as $message)
                                <p style="color: red;text-align: center">{{$message}}</p>
                            @endforeach
                        @endif
                        @if($fail_reg->has("password"))
                            @foreach ($fail_reg->get('password') as $message)
                                <p style="color: red;text-align: center">{{$message}}</p>
                            @endforeach
                        @endif
                        @if($fail_reg->has("con_password"))
                            @foreach ($fail_reg->get('con_password') as $message)
                                <p style="color: red;text-align: center">{{$message}}</p>
                            @endforeach
                        @endif
                        @if($fail_reg->has("name"))
                            @foreach ($fail_reg->get('name') as $message)
                                <p style="color: red;text-align: center">{{$message}}</p>
                            @endforeach
                        @endif
                    @endif
                    <div>
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="text" class="form-control" name="name" placeholder="Name" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="con_password" required="" />
                    </div>
                    {!! csrf_field() !!}
                    <div>
                        <button class="btn btn-default submit" name="reg" type="submit">Đăng ký</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Đã có tài khoản ?
                            <a href="#signin" class="to_register"> Đăng nhập </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
