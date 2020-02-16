<?php
use think\Route;
//use think\Url;
//think\Url::root('index.php?s=');

//Route::rule('路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）');
Route::get('/', function(){
    return json([
        'msg' => '你好',
    ]);
});

/**
 * api模块
 */
Route::group('api/:version', function(){
    Route::get('/banner/:id', 'api/:version.Banner/getOne', [], ['id' => '\d+']);

    Route::get('/theme', 'api/:version.Theme/getAllThemes');
    Route::get('/theme/:id', 'api/:version.Theme/getComplexOne', [], ['id' => '\d+']);

    Route::get('/product/:id', 'api/:version.Product/getOne', [], ['id' => '\d+']);
    Route::get('/product/recent', 'api/:version.Product/getRecent');
    Route::get('/product/by_category', 'api/:version.Product/getAllInCategory');

    Route::get('/category/all', 'api/:version.Category/getAllCategories');

    Route::post('/token/user', 'api/:version.Token/getUserToken');
    Route::post('/token/app', 'api/:version.Token/getAppToken') ;
    Route::post('/token/verify', 'api/:version.Token/verifyToken');

    Route::post('/address', 'api/:version.Address/createOrUpdateAddress');
    Route::get('/address', 'api/:version.Address/getUserAddress');

    Route::post('/order', 'api/:version.Order/placeOrder');
    Route::get('/order/:id', 'api/:version.Order/getDetail', [], ['id' => '\d+']);
    Route::get('/order/by_user', 'api/:version.Order/getSummaryByUser');
    Route::get('/order/paginate', 'api/:version.Order/getSummary');

    Route::post('/pay/pre_order', 'api/:version.Pay/getPreOrder');
    Route::post('/pay/notify', 'api/:version.Pay/receiveNotify');//微信支付回调

    //微信支付回调接口--PHPStorm的xdebug调试的接口
//    Route::post('/pay/re_notify', 'api/:version.Pay/redirectNotify');
});

/**
 * admin后台管理模块
 */
Route::group('admin', function(){
    Route::get('/', 'admin/Index/index');
    Route::get('/index', 'admin/Index/index');
    Route::get('/ad/index', 'admin/Ad/index');
    Route::get('/admin/index', 'admin/Admin/index');
    Route::get('/user/index', 'admin/User/index');
});

