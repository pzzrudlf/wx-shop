<?php
//use think\Url;
//think\Url::root('index.php?s=');
use think\Route;
//Route::rule('路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）');
//301 重定向到后台管理系统
Route::get('/', function(){
    header("location:http://wx-mini-shop.dev.com/admin");
});
//Route::get('/demo', 'api/v1.Banner/demo');
// 后台管理模块
Route::group('admin', function(){
//    后台首页
    Route::get('/', 'admin/Index/index');
    Route::get('/index', 'admin/Index/index');
    Route::get('/index/index', 'admin/Index/index');
    Route::rule('/login/index', 'admin/Login/index', 'GET|POST');
    Route::get('/logout/index', 'admin/Logout/index');
//    Admin
    Route::get('/admin/index', 'admin/Admin/index');
    Route::get('/admin/view/id/:id', 'admin/Admin/view');
    Route::rule('/admin/create', 'admin/Admin/create', 'GET|POST');
    Route::rule('/admin/edit/:id', 'admin/Admin/edit', 'GET|POST');
    Route::post('/admin/delete/:id', 'admin/Admin/delete');
//   角色
    Route::get('/role/index', 'admin/Role/index');
    Route::get('/role/view/:id', 'admin/Role/view');
    Route::rule('/role/create', 'admin/Role/create', 'GET|POST');
    Route::rule('/role/edit/:id', 'admin/Role/edit', 'GET|POST');
    Route::post('/role/delete/:id', 'admin/Role/delete');
//    权限
    Route::get('/permission/index', 'admin/Permission/index');
    Route::get('/permission/view/:id', 'admin/Permission/view');
    Route::rule('/permission/create', 'admin/Permission/create', 'GET|POST');
    Route::rule('/permission/edit/:id', 'admin/Permission/edit', 'GET|POST');
    Route::post('/permission/delete/:id', 'admin/Permission/delete');
//    Banner
    Route::get('/banner/index', 'admin/Banner/index');
    Route::get('/banner/view/:id', 'admin/Banner/view');
    Route::rule('/banner/create', 'admin/Banner/create', 'GET|POST');
    Route::rule('/banner/edit/:id', 'admin/Banner/edit', 'GET|POST');
    Route::post('/banner/delete/:id', 'admin/Banner/delete');
//    Theme
    Route::get('/theme/index', 'admin/Theme/index');
    Route::get('/theme/view/:id', 'admin/Theme/view');
    Route::rule('/theme/create', 'admin/Theme/create', 'GET|POST');
    Route::rule('/theme/edit/:id', 'admin/Theme/edit', 'GET|POST');
    Route::post('/theme/delete/:id', 'admin/Theme/delete');
//    Category
    Route::get('/category/index', 'admin/Category/index');
    Route::get('/category/view/:id', 'admin/Category/view');
    Route::rule('/category/create', 'admin/Category/create', 'GET|POST');
    Route::rule('/category/edit/:id', 'admin/Category/edit', 'GET|POST');
    Route::post('/category/delete/:id', 'admin/Category/delete');
});

// 前台api模块
Route::group('api/:version', function(){
    # 根据ID获取Banner
    # /banner/id/1
    # 1
    Route::get('/banner/id/:id', 'api/:version.Demo/getBannerByID', [], ['id' => '\d+']);
    # 根据name获取Banner
    # /banner/name/b-1
    # b-1 || b-2
    Route::get('/banner/name/:name', 'api/:version.Demo/getBannerByName', [], []);
    # 获取一组专题
    # /theme/by/names?names=t-1,t-2,t-3,t-4,t-5,t-6
    Route::get('/theme/by/names', 'api/:version.Demo/getThemesByName');
    # 获取单个专题的详情（含Spu数据）
    # /theme/name/t-1/with_spu
    # t-1 t-2 t-3 t-4 t-5 t-6
    Route::get('/theme/name/:name/with_spu', 'api/:version.Demo/getThemeWithSpuByName', [], []);
    # 获取活动(不包含优惠券数据)
    # /activity/name/a-2
    # a-1 || a-2
    Route::get('/activity/name/:name', 'api/:version.Demo/getActivityByName', [], []);
    # 获取活动（携带优惠券数据）
    # /activity/name/t-4/with_spu
    # t-4
    Route::get('/activity/name/:name/with_spu', 'api/:version.Demo/getActivityByNameWithSpu', [], []);
    /**
     * 获取某个二级分类的可用优惠券
     * /coupon/by/category/2
     * 2
     */
    Route::get('/coupon/by/category/:cid', 'api/:version.Demo/getCouponsByCategoryID', [], ['cid' => '\d+']);
    /** 获取全场通用优惠券
     */
    Route::get('/coupon/whole_store', 'api/:version.Demo/getCouponsInWholeStore');
    /**
     * 获取我的优惠券
     * 优惠券有三种状态，分别是：
     * 可使用，值为1
     * 已使用，值为2
     * 已过期，值为3
     * /v1/coupon/myself/by/status/3
     * 3
     */
    Route::get('/coupon/myself/by/status/:status', 'api/:version.Demo/getMyselfCouponByStatus', [], ['status' => '\d+']);
    /**
     * 获取我可用的优惠券(带分类数据)
     * 此接口用于下单时检验用户的优惠券是否可以使用，所以需要携带分类数据
     * /coupon/myself/available/with_category
     */
    Route::get('/coupon/myself/available/with_category', 'api/:version.Demo/getCouponAvailableWithCategory');
    /**
     * 领取优惠券
     * /coupon/collect/3
     * 3
     */
    Route::get('/coupon/collect/:id', 'api/:version.Demo/getCouponCollect', [], ['id' => '\d+']);
    /**
     * 获取全部分类数据（1级和2级）
     * /category/all
     */
    Route::get('/category/all', 'api/:version.Demo/getAllCategory');
    /**
     * 获取六宫格数据
     * /category/grid/all
     */
    Route::get('/category/grid/all', 'api/:version.Demo/getAllGrid');
    /**
     * SaleExplain 商品补充说明
     * 获取固定说明
     */
    Route::get('/sale_explain/fixed', 'api/:version.Demo/getFixedSaleExplain');
    /**
     * Search 商品搜索
     * 搜索商品的简要信息（不包含详情数据）
     * 该接口支持分页参数
     * /search?q={keyword}&start=0&count=10
     * /search?q=林白
     * 等价于
     * /search?q=林白&start=0&count=10
     */
    Route::get('/search', 'api/:version.Demo/getSearch');
    /**
     * 获取Tag标签
     * /tag/type/{type}
     * 目前仅支持获取搜索Tag 搜索Tag类型值为 1
     */
    Route::get('/tag/type/:type', 'api/:version.Demo/getTagByType', [], ['type' => '\d+']);
    /**
     * Spu 商品
     * 获取商品详情
     * /spu/id/2/detail
     */
    Route::get('/spu/id/:id/detail', 'api/:version.Demo/getSpuProductByID', [], ['id' => '\d+']);
    /**
     * 获取商品列表（最新）
     * /spu/latest
     */
    Route::get('/spu/latest', 'api/:version.Demo/getLatestSpuProductList');
    /**
     * 按分类获取商品
     * /spu/by/category/32
     * 32
     */
    Route::get('/spu/by/category/:id', 'api/:version.Demo/getSpuProductByCategoryID', [], ['id' => '\d+']);
});
