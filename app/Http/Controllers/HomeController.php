<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view("home.index");
    }
    public function logout()
    {
        if(Auth::guard("admin")->check())
        {
            Auth::guard("admin")->logout();
        }
        return response()->redirectToRoute("home");
    }
    public function getField($urlField)
    {

            return view("home.field",["field" => Field::where("url",$urlField)->first()]);
    }
    public function getTopic($url_field,$url_topic)
    {
        $topic = Field::where('url',$url_field)->first()->topic->where('url',$url_topic)->first();

        return view("home.topic",['topic' => $topic]);
    }
}
