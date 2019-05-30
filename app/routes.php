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

Router::post('/file/share','FilesController@createShareLink');

Router::get('/file/share/{id}','FilesController@shareView');

Router::post('/file/checkpass/{id}','FilesController@checkPass');

Router::get('/file/sharedl/{id}','FilesController@downloadShare');

Router::get('/file/myshare','FilesController@myShare');

Router::get('/file/grabage','FilesController@grabage');

Router::get('/admin','AdminController@index');
Router::get('/admin/index','AdminController@index');
Router::get('/admin/home','AdminController@index');

Router::get('/admin/login','AdminController@login');
Router::post('/admin/login', 'AdminController@login_check');
Router::get('/admin/logout','AdminController@logout');

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

