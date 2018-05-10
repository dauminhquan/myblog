<?php


Route::get('/',["uses" => "HomeController@index","as" =>"home"]);
Route::group(["prefix" => "blog","as" => "home.blog."],function (){
   Route::get("/{url_field}",["as" => "field","uses" => "HomeController@getField"]);
    Route::get("/{url_field}/{topic}",["as" =>"topic","uses" => "HomeController@getTopic"]);
});
Route::get('/logout',["as" => "logout","uses" => "HomeController@logout"]);
Route::group(["prefix" => "admin","as" => "admin."],function (){
    Route::group(["middleware" => "auth.admin"],function(){
        Route::get("/",["as" => "index","uses" => "AdminController@index"]);
        //Quan ly bai dang
        Route::group(["prefix" => "quan-ly-bai-dang"],function (){
            Route::get("/",["as" => "topicManage","uses" => "AdminController@topicManage"]);
            Route::get("{id}",["as" => "topicManage.info","uses" => "AdminController@topicManage_info"])->where('id', '[0-9]+');
            Route::post("{id}",["as" => "topicManage.info.post","uses" => "AdminController@topicManage_info_post"])->where('id', '[0-9]+');
            Route::get('/them-moi',["as" => "topicManage.add","uses" => "AdminController@topicManage_add"]);
            Route::post('/them-moi',["as" => "topicManage.add.post","uses" => "AdminController@topicManage_add_post"]);
        });
        Route::group(["prefix" => "quan-ly-nguoi-dung"],function (){
            Route::get("/",["as" => "userManage","uses" => "AdminController@userManage"]);
            Route::get("{id}",["as" => "userManage.info","uses" => "AdminController@userManage_info"])->where('id', '[0-9]+');
            Route::post("{id}",["as" => "userManage.info.post","uses" => "AdminController@userManage_info_post"])->where('id', '[0-9]+');
            Route::get('/them-moi',["as" => "userManage.add","uses" => "AdminController@userManage_add"]);
            Route::post('/them-moi',["as" => "userManage.add.post","uses" => "AdminController@userManage_add_post"]);
        });
    });

    Route::get('login',["as" => "login","uses" => "AdminController@login"]);
    Route::post('/login',["as" => "post.login","uses" => "AdminController@post_login"]);

});