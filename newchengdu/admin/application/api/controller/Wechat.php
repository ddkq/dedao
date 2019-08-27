<?php
namespace app\api\controller;
use app\common\controller\HomeBase;
use app\department\model\DoctorModel;
use app\api\validate\RegisterValidate;
use think\Db;


/**
* 小程序api
*/
class Wechat extends HomeBase{

	protected $openid;
	
	//获取小程序openid
	public function getWxOpenId(){
		$code = $this->request->param('code');
		if(empty($code)){
			$this->info(0,'非法操作');
		}
		if(parent::$db_id == 1){
			$appid = "wxadf388686ed3af5f";
	        $secret = "39a7abdde3714b6a57c07b318faa2883";	
		}

        $URL = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";
        $apiData = file_get_contents($URL);

        if(!isset($apiData['errcode'])){
            $this->openid = json_decode($apiData)->openid;
            return $this->openid;
        }else{
        	$this->info(0,'非法操作');
        }
	}


	//收集微信登录信息
	public function collectUserInfo(){

		$returnArr = [];

		$where['openid'] = $openid;
		$is_user = Db::connect('db_config'.parent::$db_id)->name('ThirdPartyUser')->where($where)->find();
		if(!empty($is_user)){
			Db::connect('db_config'.parent::$db_id)->setField('expires_time',time()+86400);
		}else{
			$param = $this->request->param();
			$userInfo = json_decode(htmlspecialchars_decode($param['userinfo']));
			$data['nickname'] = $userInfo->nickName;
			$data['access_token'] = md5(uniqid(md5(microtime(true)),true));
			$data['openid'] = $this->openid;
			$data['create_time'] = time();
			$data['expires_time'] = time()+86400;
			$data['last_login_ip'] = get_client_ip(0, true);
			$data['last_login_time'] = time();
			$result = Db::connect('db_config'.parent::$db_id)->insert($data);
			if($result){
				$this->info(1,'登录成功');
			}else{
				$this->info(0,'登录失败，请稍后重试');
			}
		}
	}


	//根据时间医生列表
	public function getDoctorListByDay(){
		
		$returnArr = [];

		$param = $this->request->param('day');
		$year = date('Y');
		//目标时间(时间戳)
		$date = strtotime($year.'-'.$param);
		$week = date('N',$date)-1;

		//当前时间(m-d格式)
		$days = date('m-d',time());
		//当前时间-小时
		$nows = date('G',time());

		//判断日期获取筛选标志$period
		if($date < strtotime(date('Y-m-d'))){
			$this->info(0,'日期已过期');
		}else{
			if($days == $param){
				if($nows >12 && $nows <18){
					$period = 'pm';
				}else{
					$period = 1;
				}
			}else{
				$period = 1;
			}	
		}
		
		//获取全部医生
		$where['a.delete_time'] = 0;
		$where['r.status'] = 1;

		$join = [
		    ['cmf_department_relationships r','a.id = r.doctor_id'],
		];

		$doctors = DoctorModel::alias('a')->join($join)->field('a.doctor_name,a.doctor_job,a.more,a.working_time')->where($where)->order('r.list_order')->select();

		//筛选医生
		$i = 0;
		if($period === 1){
			foreach ($doctors as $key => $value) {
				if($value['working_time'][$week]['am'] == 'true'){
					$returnArr[$i] = [
						'doctor_name' 	=> 	$value['doctor_name'],
						'doctor_job'	=>	$value['doctor_job'],
						'category'		=>	$value['more']['category'],
						'fee'			=>	$value['more']['registration_fee'],
						'time'			=>	'9:00~12:00',
					];
				}
				$i++;
			}
			foreach ($doctors as $key => $value) {
				if($value['working_time'][$week]['pm'] == 'true'){
					$returnArr[$i] = [
						'doctor_name' 	=> 	$value['doctor_name'],
						'doctor_job'	=>	$value['doctor_job'],
						'category'		=>	$value['more']['category'],
						'fee'			=>	$value['more']['registration_fee'],
						'time'			=>	'14:00~18:00',
					];
				}
				$i++;
			}
		}else{
			foreach ($doctors as $key => $value) {
				if($value['working_time'][$week]['pm'] == 'true'){
					$returnArr[$i] = [
						'doctor_name' 	=> 	$value['doctor_name'],
						'doctor_job'	=>	$value['doctor_job'],
						'category'		=>	$value['more']['category'],
						'fee'			=>	$value['more']['registration_fee'],
						'time'			=>	'14:00~18:00',
					];
				}
				$i++;
			}
		}
		return json($returnArr);
	}

	//预约挂号
	public function register(){

		$param = $this->request->param();
		$result = $this->validate($param,'RegisterValidate');
		if($result !== true){
			return $this->info(0,$result);
		}

		//获取医生信息
		$doctor_id = $param['doctor_id'];
		$doctor = DoctorModel::get($doctor_id);
		$department = $doctor->department;
		foreach ($department as $value) {
			$data['department'] = $value->name;
		}

		$data['appointer'] = $param['appointer'];
		$data['phone'] = $param['phone'];
		$data['doctor'] = $doctor->doctor_name;
		$data['appointment'] = strtotime($param['appointment']);
		$data['time'] = $param['time'];
		$data['create_time'] = time();
		$data['remark'] = '小程序';

		$result = Db::connect('db_config'.parent::$db_id)->name('Reservation')->insert($data);
		if($result){
			$this->info(1,'预约成功');
		}else{
			$this->info(0,'预约失败');
		}

	}
}