<?php
namespace app\admin\controller;
use app\common\controller\Base;
use think\Db;
use think\Config;
use redis\Redis;
use think\Cookie;


class Index extends Base{

	

	public function initialize(){
		parent::initialize();
	}

    /**
    @SWG\Post(
        path = "/admin/Index/checkLogin",
        summary = "检查登录",
        description = "检查登录",
        tags = {"Admin/Index(后台/公共接口)"},
        @SWG\Parameter(
            name = "username",
            type = "string",
            required = true,
            in = "formData",
            description = "用户名",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function checkLogin(){
        //获取数据
        $param = $this->request->param();
        if(empty($param['user_id'])){
        	return json(['code'=>0,'info'=>'未登录']);
        }
        $user_id = $param['user_id'];
        Redis::open();
        $db_id = Redis::get('ADMIN_ID_'.$user_id.'_DB');

        //查询用户是否存在登录信息
        $userToken = Db::connect('db_config'.$db_id)->name('UserToken')->where('user_id',$user_id)->find();
        //判断信息是否过期
        $expire_time = $userToken['expire_time'];
        if($expire_time < time()){
            return json(['code'=>0,'info'=>'未登录']);
        }
        //获取cookie保存的登录最大期限
        $login_expire_time = Cookie::get('login_expire_time');
        //获取redis保存的登录用户id
        $check_redis = Redis::get($userToken['token']);
        if($expire_time < time() && empty($check_redis)){
        	return json(['code'=>0,'info'=>'未登录']);
        }else if($login_expire_time != $userToken['create_time']){
            return json(['code'=>0,'info'=>'已在其他地方登陆']);
        }else{
        	return json(['code'=>1,'info'=>'已登录','token'=>$userToken['token']]);
        }
    }


    /*public function checkLogin(){
        //dump(parent::$db_id);exit;
        //获取数据
        $param = $this->request->param();
        if(empty($param['username'])){
            return json(['code'=>0,'info'=>'未登录']);
        }
        $username = $param['username'];
        //查询用户是否存在登录信息
        $userid = Db::connect('db_config'.parent::$db_id)->name('UserToken')->where('username',$username)->value('user_id');
        //判断信息是否过期
        $expire_time = $userToken['expire_time'];
        if($expire_time < time()){
            return json(['code'=>0,'info'=>'未登录']);
        }
        //获取cookie保存的登录最大期限
        $login_expire_time = Cookie::get('login_expire_time');
        //获取redis保存的登录用户id
        Redis::open();
        $check_redis = Redis::get($userToken['token']);
        //
        if($expire_time < time() && empty($check_redis)){
            return json(['code'=>0,'info'=>'未登录']);
        }else if($login_expire_time != $userToken['create_time']){
            return json(['code'=>0,'info'=>'已在其他地方登陆']);
        }else{
            return json(['code'=>1,'info'=>'已登录','token'=>$userToken['token']]);
        }
    }*/

} 