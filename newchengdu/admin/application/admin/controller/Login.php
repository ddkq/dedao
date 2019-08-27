<?php
namespace app\admin\controller;
use app\common\controller\Base;
use think\Db;
use think\captcha\Captcha;
use redis\Redis;
use think\Cookie;

/**
* 后台登录类
*/
class Login extends Base{

	public function initialize(){
		parent::initialize();
	}

	/**
    @SWG\Post(
        path = "/admin/Login/captcha",
        summary = "生成验证码图片",
        description = "生成验证码图片",
        tags = {"Admin/Login(后台/登录)"},
     
        @SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Property(
				property = "img",
				type = "string",
				description = "验证码图片",
			),
        ),
    ),
     */
	public function captcha(){
		$config =  [
			//验证码宽度
		    'imageW' => 320,
		];
		$captcha = new Captcha($config);
        return $captcha->entry();
	}

	/**
	@SWG\Post(
		path = "/admin/Login/doLogin",
		summary = "后台登录接口",
		description = "后台登录接口",
		tags = {"Admin/Login(后台/登录)"},
		@SWG\Parameter(
			name = "username",
			type = "string",
			required = true,
			in = "formData",
			description = "用户名",
		),
		@SWG\Parameter(
			name = "password",
			type = "string",
			required = true,
			in = "formData",
			description = "密码",
		),
		@SWG\Parameter(
			name = "captcha",
			type = "string",
			required = true,
			in = "formData",
			description = "验证码",
		),
		@SWG\Parameter(
			name = "db",
			type = "integer",
			required = true,
			in = "formData",
			description = "区域id(1：成都,2：深圳)",
		),
		@SWG\Response(
			response = "200",
			description = "登录信息",
			@SWG\Schema(
				required = {"info"},
				@SWG\Property(
					property = "code",
					type = "integer",
					description = "状态码",
				),
				@SWG\Property(
					property = "info",
					type = "string",
					description = "提示信息",
				),
				@SWG\Property(
					property = "db_name",
					type = "string",
					description = "登录地区",
				),
				@SWG\Property(
					property = "website",
					type = "string",
					description = "登录地区首页域名",
				),
				@SWG\Property(
					property = "token",
					type = "string",
					description = "登录token",
				),
				@SWG\Property(
					property = "user_id",
					type = "integer",
					description = "登录用户id",
				),
			),
		),
	),
     */
	public function doLogin(){
		$username = $this->request->param('username');
		if(empty($username)){
			$this->info(0,'用户名不能为空');
		}

		$password = $this->request->param('password');
		if(empty($password)){
			$this->info(0,'密码不能为空');
		}

		$captcha = $this->request->param('captcha');
		if(empty($captcha)){
			$this->info(0,'验证码不能为空！');
		}
		if(!captcha_check($captcha)){
			$this->info(0,'验证码错误！');
		}

		//多数据库操作,获取db_id
		$db_id = intval($this->request->param('db'));
		//dump($db_id);exit;
		if(empty($db_id)){
			return json(['code'=>0,'info'=>'非法操作']);
		}

		//获取用户信息
		$user = Db::connect('db_config'.$db_id)->name('user')->where('user_login',$username)->find();
		//判断是否为管理员账号
		if(!empty($user) && $user['user_type'] == 1){
			//判断密码是否正确
			if(cmf_compare_password($password,$user['user_pass'])){
				//判断是否有权限登录
				$groups = Db::connect('db_config'.$db_id)
						->name('RoleUser')
						->alias("a")
	                    ->join('__ROLE__ b', 'a.role_id =b.id')
	                    ->where(["user_id" => $user["id"], "status" => 1])
	                    ->value("role_id");
	            if($user['id'] != 1 && (empty($groups) || empty($user['user_status']))){
	            	$this->info(0,'当前用户已被禁止登录，请联系管理员');
	            }

	            //判断用户所选数据库,并写进redis
				$returnArr['db_name'] = $this->getDbName($db_id);
				$returnArr['website'] = $this->getWebsite($db_id);
				Redis::set('ADMIN_ID_'.$user['id'].'_DB',$db_id);

	            //token操作
	            $data['user_id'] = $user['id'];
	            //读取是否存在token
	            $isLogin = Db::connect('db_config'.$db_id)->name('UserToken')->where(['user_id'=>$user['id']])->find();
	            //获取当前ip
	            $currentIp = get_client_ip(0, true);

	            if(empty($isLogin)){
					$data['username'] = $username;
		            $data['create_time'] = time();
		            $data['expire_time'] = time()+10800;
		            $data['token'] = md5(uniqid(md5(microtime(true)),true));
		            $data['ip'] = $currentIp;
		            $returnArr['token'] = $data['token'];
		            Redis::set($data['token'],$user['id']);
		            $returnArr['expire_time'] = date('Y-m-d H:i:s',$data['expire_time']);
		            Db::connect('db_config'.$db_id)->name('UserToken')->insert($data);
	            }else{
	            	if($isLogin['expire_time'] > time()){
		            	Db::connect('db_config'.$db_id)->name('UserToken')->where('user_id',$user['id'])->update(['expire_time'=>time()+10800,'ip'=>$currentIp,'create_time'=>time()]);
		            	Redis::set($isLogin['token'],$user['id']);
		            	Cookie::set('login_expire_time',time());
		            	return json(['code'=>1,'info'=>'已登录','token'=>$isLogin['token'],'user_id'=>$user['id'],'db_name'=>$returnArr['db_name'],'website'=>$returnArr['website']]);
	            	}else{
						Db::connect('db_config'.$db_id)->name('UserToken')->where('user_id',$user['id'])->update(['expire_time'=>time()+10800,'ip'=>$currentIp,'create_time'=>time()]);
		            	$returnArr['token'] = $isLogin['token'];
		            	$returnArr['expire_time'] = date('Y-m-d H:i:s',$isLogin['expire_time']);
		            	Redis::set($isLogin['token'],$user['id']);
	            	}
	            }

	            
	            $user['last_login_time'] = time();
	            $user['last_login_ip'] = $currentIp;
	            Db::connect('db_config'.$db_id)->name('user')->update($user);
	            $returnArr['code'] = 1;
	            $returnArr['user_id'] = $user['id'];

	            Cookie::set('login_expire_time',time());
	            return json($returnArr);
			}else{
				$this->info(0,'密码错误');
			}
		}else{
			$this->info(0,'非法用户');
		}
	}

	/**
	@SWG\Post(
		path = "/admin/Login/loginOut",
		summary = "后台登出接口",
		description = "后台登出接口",
		tags = {"Admin/Login(后台/登录)"},
		@SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "登出用户id",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	 */
	public function loginOut(){
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		};
		$result = Db::connect('db_config'.parent::$db_id)->name('UserToken')->where('user_id',$id)->setField('expire_time',time()-10800);
		Redis::delete('ADMIN_ID_'.$id);
		if($result){
			$this->info(1,'登出成功');
		}else{
			$this->info(0,'登出失败');
		}
	}



	protected function getDbName($db_id){
		if($db_id == 1){
			$db_name = '成都';
		}
		if($db_id == 2){
			$db_name = '深圳';
		}
		return $db_name;
	}

	protected function getWebsite($db_id){
		if($db_id == 1){
			$website = 'www.cdddkqyy.com';
		}
		if($db_id == 2){
			$website = 'www.szddkqyy.com';
		}
		return $website;
	}

}

