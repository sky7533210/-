<?php

/*
 * 路由加载
 *
 * 使用 Router::get
 *      Router::post
 *      Router::put
 *      Router::delete
 * 
 * 参数
 * 第一个 路由uri
 * 第二个 该路由对应的控制器以及处理操作 或者回调函数
 */
Router::get('/', 'FilesController@index');


Router::get('/login', 'UsersController@login');
Router::post('/login', 'UsersController@login_check');
Router::get('/logout','UsersController@logout');
Router::get('/findpsw','UsersController@findPsw');
Router::post('/updatepsw','UsersController@updatePsw');
Router::get('/register','UsersController@register');
Router::post('/register','UsersController@register_action');
Router::post('/getsmscode','UsersController@sendSmsCode');
Router::post('/updateinfo','UsersController@updateinfo');


Router::get('/home', 'FilesController@index');
Router::post('/upload','FilesController@upload');
Router::post('/upload/list','FilesController@index');
Router::get('/file/list','FilesController@fileList');
Router::get('/file/upload','FilesController@checkUpload');
Router::post('/file/upload','FilesController@upload');
Router::post('/file/checkmd5','FilesController@checkMd5');
Router::post('/file/createdir','FilesController@createDir');
Router::get('/file/delete','FilesController@delete');
Router::post('/file/rename','FilesController@rename');
Router::post('/file/move','FilesController@move');
Router::get('/file/download/{id}','FilesController@download');



Router::get('/share','ShareController@index');
Router::get('/share/home','ShareController@index');
Router::get('/share/cancle','ShareController@cancle');
Router::post('/share/checkpass/{id}','ShareController@checkPass');
Router::get('/share/download/{id}','ShareController@download');
Router::post('/share/createlink','ShareController@createShareLink');
Router::get('/share/{id}','ShareController@shareView');
Router::post('/share/save','ShareController@save');



Router::get('/grabage','GrabageController@index');
Router::get('/grabage/home','GrabageController@index');
Router::get('/grabage/delete','GrabageController@delete');
Router::get('/grabage/restore','GrabageController@restore');


Router::get('/admin','AdminController@index');
Router::get('/admin/index','AdminController@index');
Router::get('/admin/home','AdminController@index');
Router::get('/admin/login','AdminController@login');
Router::post('/admin/login', 'AdminController@login_check');
Router::get('/admin/logout','AdminController@logout');
Router::get('/admin/welcome','AdminController@welcome');
Router::get('/admin/memberlist','AdminController@memberlist');

//in app/routes.php 路由 /captcha
Router::get('/captcha', function(){
    (new CaptchaService())->entry();//通过/captcha获取验证码
});
Router::post('/checkCaptcha', function(){
    $code=$_POST['code'];
    d($code);
    if((new CaptchaService())->check($code)){
        dd('检验通过');
    }else{
        dd('检验失败');
    }
});

Router::get('/document', function(){
    $document = htmlspecialchars(file_get_contents('README.md'));
    return view('app/pages/document',compact('document'));
});

