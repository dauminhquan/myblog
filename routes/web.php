<?php


Route::get('/',["uses" => "HomeController@index","as" =>"home"]);
Route::get('/logout',["as" => "logout","uses" => "HomeController@logout"]);
Route::group(["prefix" => "admin","as" => "admin."],function (){
    Route::group(["middleware" => "auth.admin"],function(){
        Route::get("/",["as" => "index","uses" => "AdminController@index"]);
        //Quan ly bai dang
        Route::group(["prefix" => "quan-ly-bai-dang"],function (){
            Route::get("/",["as" => "quanlybaidang","uses" => "AdminController@quanlybaidang"]);
            Route::get('/them-moi',["as" => "quanlybaidang.themmoi","uses" => "AdminController@quanlybaidang_themmoi"]);
            Route::post('/them-moi',["as" => "post.quanlybaidang.themmoi","uses" => "AdminController@post_quanlybaidang_themmoi"]);
        });
    });

    Route::get('login',["as" => "login","uses" => "AdminController@login"]);
    Route::post('/login',["as" => "post.login","uses" => "AdminController@post_login"]);

});