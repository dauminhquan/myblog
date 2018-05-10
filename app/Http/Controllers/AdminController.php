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
use Illuminate\Validation\Rule;

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
    public function topicManage()
    {

        $topic = Topic::join("users","users.id","topics.user_id")->join("fields","fields.id","topics.field_id")->select("topics.*","users.name",DB::raw("concat(fields.url,'/',topics.url) as url"))->get();
        return view("admin.topicManage",["data" => $topic]);
    }
    public function topicManage_add()
    {
        $field = new Field();
        return view("admin.topicManage_add",["fields" => $field->get()]);
    }
    public function topicManage_add_post(Request $request){

//        return ["sc" => $request->hasFile("avatar")];
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:topics',
            'url' => 'required|unique:topics|max:255',
            "summary" => "required",
            'content' => 'required',
            "field_id" => "required",
            'avatar' => "required|image"
        ],
            [
                'title.required' => 'Vui lòng điền tiêu đề',
                'url.unique' => 'Url đã tồn tại',
                'summary.required' => 'Không tóm tắt',
                'content.required' => 'Không có nội dung',
                "title.unique" => "Tiêu đề đã tồn tại",
                "field_id.required" => "Chọn một lĩnh vực để đăng",
                "avatar.required" => "Chọn một file",
                "avatar.image" =>"Chỉ chấp nhận file ảnh"
            ]
        );
        if ($validator->fails()) {
            $err = $validator->errors();
            $field = new Field();
            return view("admin.topicManage_add",["fields" => $field->get(),"fail" => $err]);
        }
        $topic = new Topic();
        $topic->title = $request->title;
        $topic->field_id = $request->field_id;
        $topic->summary = $request->summary;
        $topic->content = $request->input("content");
        $topic->url = strtolower($request->url);
        $topic->user_id = Auth::guard("admin")->user()->id;

        $topic->save();
        $topic->avatar = substr($request->file("avatar")->storeAs('public','avatar_topic_'.$topic->id.'.'.$request->file('avatar')->getClientOriginalExtension()),7);
        $topic->update();
        return response()->redirectToRoute("home");
    }
    public function topicManage_info($id)
    {
        try{
            return view("admin.topicManage_info",["fields" => Field::get(),"data" => Topic::find($id)]);
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function topicManage_info_post(Request $request,$id)
    {

        $topic = Topic::findOrFail($id);

        if($request->has("update"))
        {
            try{
                $validator = Validator::make($request->all(), [
                    'title' => ['required',Rule::unique('topics')->ignore($topic->id)],
                    'url' => ['required',Rule::unique('topics')->ignore($topic->id)],
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
            }catch (\Exception $exception)
            {
                return $exception->getMessage();
            }
            if ($validator->fails()) {
                $err = $validator->errors();
                $field = new Field();
                return view("admin.topicManage_info",["fields" => $field->get(),"fail" => $err,"data" => Topic::find($id)]);
            }

            try{


                $topic->title = $request->title;
                $topic->field_id = $request->field_id;
                $topic->summary = $request->summary;
                $topic->content = $request->input("content");
                $topic->url = strtolower($request->url);
                $topic->user_id = Auth::guard("admin")->user()->id;
                if($request->hasFile("avatar"))
                {

                    $validator = Validator::make($request->all(),[
                        "avatar" => "image"
                    ],[
                        "avatar.image" => "Chỉ chấp nhận file ảnh"
                    ]);
                    if($validator->failed())
                    {
                        $err = $validator->errors();
                        $field = new Field();
                        return view("admin.topicManage_info",["fields" => $field->get(),"fail" => $err,"data" => Topic::find($id)]);
                    }
                    $topic->avatar = substr($request->file("avatar")->storeAs('public','avatar_topic_'.$topic->id.'.'.$request->file('avatar')->getClientOriginalExtension()),7);

                }
                $topic->update();
            }catch (\Exception $exception)
            {
                return $exception->getMessage();
            }
            try{
                return view("admin.topicManage_info",["fields" => Field::get(),"data" => Topic::find($id)]);
            } catch (\Exception $e)
            {
                return $e->getMessage();
            }
        }
        if($request->has("delete"))
        {
            $topic->delete();
            return response()->redirectToRoute("admin.topicManage");
        }
    }

    //quanly user
    public function userManage(){
        return view("admin.userManage",["users" => Users::get()]);
    }
    public function userManage_add(){
        return view("admin.userManage_add");
    }
    public function userManage_add_post(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password' => 'required|max:255',
            "con_password" => "required|same:password",
            "name" => "required",
        ],
            [
                'email.required' => 'Vui lòng điền email',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Nhập password',
                'con_password.required' => "Nhập lại password trống",

                'con_password.same' => "Mật khẩu không giống nhau",
                "name.required" => "Tên không được để trống",
            ]
        );
        if ($validator->fails()) {
            $err = $validator->errors();
            $field = new Field();
            return view("admin.userManage_add",["fields" => $field->get(),"fail" => $err]);
        }
        $user = new Users();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->name = $request->name;
        if($request->has("auth"))
        {
            $user->auth = (int) $request->auth;
        }
        $user->save();
        return response()->redirectToRoute("home");
    }
    public function userManage_info($id)
    {
        try{
            return view("admin.userManage_info",["user" => Users::find($id)]);
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function userManage_info_post(Request $request,$id)
    {
        $user = Users::findOrFail($id);

        if($request->has("update"))
        {
            try{
                $validator = Validator::make($request->all(), [
                    'email' => ['required',Rule::unique("users")->ignore($user->id)],
                    "name" => "required",
                ],
                    [
                        'email.required' => 'Vui lòng điền email',
                        'email.unique' => 'Email đã tồn tại',
                        "name.required"  => "Nhập tên của bạn"
                    ]
                );

                if ($validator->fails()) {
                    $err = $validator->errors();
                    $field = new Field();
                    return view("admin.userManage_info",["user"=> $user,"fields" => $field->get(),"fail" => $err]);
                }

                if($request->has("old_password") && $request->old_password != null)
                {

                    $validator = Validator::make($request->all(),[
                       "old_password" => ["required"],
                        "new_password" => "required",
                        "con_new_password" => "required|same:new_password"
                    ],[
                        "old_password.required" => "Vui lòng điền mật khẩu cũ",
                        "new_password.required" =>  "Vui lòng điền mật khẩu mới",
                        "con_new_password.required" =>  "Vui lòng nhập lại mật khẩu mới",
                        "con_new_password.same" =>  "Mật khẩu nhập lại không đúng",
                    ]);
                    if ($validator->fails()) {
                        $err = $validator->errors();

                        return view("admin.userManage_info",["user"=> $user,"fail" => $err]);
                    }
                    if(!Hash::check($request->old_password,$user->password))
                    {
                        return view("admin.userManage_info",["user"=> $user,"err_pass" => 'Mật khẩu cũ không đúng']);
                    }

                }

                $user->email = $request->email;
                $user->password = Hash::make($request->new_password);
                $user->name = $request->name;
                if($request->has("auth"))
                {
                    $user->auth = (int) $request->auth;
                }
                $user->update();



                return view("admin.userManage_info",["user" => Users::find($id)]);
            }catch (\Exception $exception)
            {
                return $exception->getMessage();
            }
        }
        if($request->has("delete"))
        {
            $user->delete();
            return response()->redirectToRoute("admin.userManage");
        }
    }
}
