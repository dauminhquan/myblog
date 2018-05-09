<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Topic;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }

    //login
    public function login()
    {
        return view("admin.login");
    }
    public function post_login(Request $request)
    {
        if($request->has("login"))
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ],
                [
                    'email.required' => 'Vui lòng điền thông tin email',
                    'password.required' => 'Không có password',
                ]
            );
            if ($validator->fails()) {
                $err = $validator->errors();
                return view("admin.login",["fail" => $err]);
            }
            if(Auth::guard("admin")->attempt(["email" => $request->email,"password" => $request->password],$request->has("remember")))
            {
                return response()->redirectToRoute('admin.index');
            }
            return view("admin.login",["fail_pass" => "Tài khoản hoặc mật khẩu không đúng"]);
        }
        if($request->has("reg"))
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users|max:255',
                'password' => 'required',
                "name" => "required",
                'con_password' => 'required|same:password'
            ],
                [
                    'email.required' => 'Vui lòng điền thông tin email',
                    'email.unique' => 'Email đã tồn tại',
                    'password.required' => 'Không có password',
                    'con_password.same' => 'Mật khẩu nhập lại không đúng',
                    "name.required" => "Nhập tên"
                ]
            );
            if ($validator->fails()) {
                $err = $validator->errors();
                return view("admin.login",["fail_reg" => $err]);
            }
            $user = new Users();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->name = $request->name;
            $user->save();
            Auth::guard("admin")->attempt(["email" => $request->email,"password" => $request->password],$request->has("remember"));
            return response()->redirectToRoute('admin.index');
        }
        return view("admin.login");
    }
    // quan ly bai dang
    public function quanlybaidang()
    {
        $topic = Topic::join("users","users.id","topics.user_id")->join("fields","fields.id","topics.field_id")->select("topics.*","users.name",DB::raw("concat(fields.url,'/',topics.url) as url"))->get();
        return view("admin.quanlybaidang",["data" => $topic]);
    }
    public function quanlybaidang_themmoi()
    {
        $field = new Field();


        return view("admin.quanlybaidang_themmoi",["fields" => $field->get()]);
    }
    public function post_quanlybaidang_themmoi(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:topics',
            'url' => 'required|unique:topics|max:255',
            "summary" => "required",
            'content' => 'required',
            "field_id" => "required"
        ],
            [
                'title.required' => 'Vui lòng điền tiêu đề',
                'url.unique' => 'Url đã tồn tại',
                'summary.required' => 'Không tóm tắt',
                'content.required' => 'Không có nội dung',
                "title.unique" => "Tiêu đề đã tồn tại",
                "field_id.required" => "Chọn một lĩnh vực để đăng"
            ]
        );
        if ($validator->fails()) {
            $err = $validator->errors();
            $field = new Field();
            return view("admin.quanlybaidang_themmoi",["fields" => $field->get(),"fail" => $err]);
        }
        $topic = new Topic();
        $topic->title = $request->title;
        $topic->field_id = $request->field_id;
        $topic->summary = $request->summary;
        $topic->content = $request->input("content");
        $topic->url = strtolower($request->url);
        $topic->user_id = Auth::guard("admin")->user()->id;
        $topic->save();
        return response()->redirectToRoute("home");
    }
}
