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
                <form method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullname">Chọn lĩnh vực:</label>
                        @if(isset($fail))
                            @if($fail->has("field_id"))
                                @foreach ($fail->get('field_id') as $message)
                                    <p style="color: red;">{{$message}}</p>
                                @endforeach
                            @endif
                        @endif
                        <select name="field_id" class="form-control" required>
                            @foreach($fields as $item)
                                <option selected></option>
                                @if($data->field->id == $item->id)
                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                   <div class="form-group">
                       <label for="">Tiêu đề bài viết * :</label>
                       @if(isset($fail))
                           @if($fail->has("title"))
                               @foreach ($fail->get('title') as $message)
                                   <p style="color: red;">{{$message}}</p>
                               @endforeach
                           @endif
                       @endif
                       <input type="text" id="Tiêu đề" class="form-control" value="{{$data->title}}" name="title" required />


                   </div>

                    <div class="form-group">
                        <label>Url * :</label>
                        @if(isset($fail))
                            @if($fail->has("url"))
                                @foreach ($fail->get('url') as $message)
                                    <p style="color: red;">{{$message}}</p>
                                @endforeach
                            @endif
                        @endif
                        <input type="text" value="{{$data->url}}"  class="form-control" name="url" data-parsley-trigger="change" required />



                    </div>

                    <div class="form-group">
                        <label>Tóm tắt *:</label>

                        @if(isset($fail))
                            @if($fail->has("summary"))
                                @foreach ($fail->get('summary') as $message)
                                    <p style="color: red;">{{$message}}</p>
                                @endforeach
                            @endif
                        @endif

                        <input type="text" id="summary" value="{{$data->summary}}" class="form-control" name="summary" data-parsley-trigger="change" required />
                    </div>

                    <div class="form-group"><img src="{{asset("storage/".$data->avatar)}}" style="width: 350px;height: 220px;" alt="Thiên nhiên"></div>
                    <div class="form-group">
                        @if(isset($fail))
                            @if($fail->has("avatar"))
                                @foreach ($fail->get('avatar') as $message)
                                    <p style="color: red;">{{$message}}</p>
                                @endforeach
                            @endif
                        @endif
                        <label>Tải ảnh nền mới</label>
                        <input type="file" name="avatar" accept="image/*">
                    </div>


                    <div class="form-group">
                        <label for="message">Nội dung bài viết *</label>

                        @if(isset($fail))
                            @if($fail->has("content"))
                                @foreach ($fail->get('content') as $message)
                                    <p style="color: red;">{{$message}}</p>
                                @endforeach
                            @endif
                        @endif
                        <textarea id="text_content" required class="form-control" name="content" placeholder="Nội dung hiển thị"
                                  rows="100">{{$data->content}}</textarea>
                        <br/>
                    </div>
                    {!! csrf_field() !!}
                    <button class="btn btn-primary" name="update" value="ok" type="submit">Lưu bài viết</button>
                    <button class="btn btn-danger" name="delete" value="ok" type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết chứ?')"> Xóa bài viết</button>
                </form>


            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="http://nightly.ckeditor.com/18-05-10-06-04/full/ckeditor.js"></script>
    <script>
        CKEDITOR.config.height = 800
        CKEDITOR.replace( 'content' );
    </script>
@endsection