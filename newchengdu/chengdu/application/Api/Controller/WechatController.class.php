<?php
namespace Api\Controller;
use Common\Controller\AppframeController;
class WechatController extends AppframeController{

	function _initialize() {
		parent::_initialize();
	}

	function banner(){
		$slides = sp_getslide('wechat_banner');
		$this->ajaxReturns($slides);
	}

	function environment(){
		$slides = sp_getslide('wechat_environment');
		$this->ajaxReturns($slides);
	}

	function case1(){
		$case_where['recommended'] = 1;
	    $case = sp_sql_posts_bycatid(108,'field:tid,post_title,smeta;limit:0,3;order:post_modified asc;',$case_where);
	    foreach ($case as $key => $value) {
	    	$smeta = json_decode($value['smeta'],true);
	    	$case[$key]['smeta'] = $smeta['thumb'];
	    }
	    $this->ajaxReturns($case);
	}

	function news(){
		$news_where['recommended'] = 1;
		$news = sp_sql_posts_bycatid(145,'field:tid,post_title,post_excerpt,smeta;order:post_modified desc;limit:0,3',$news_where);
		foreach ($news as $key => $value) {
	    	$smeta = json_decode($value['smeta'],true);
	    	$news[$key]['smeta'] = $smeta['thumb_phone'];
	    }
	    $this->ajaxReturns($news);
	}

	//获取小程序openid
	function getWxData(){
		$code = I('param.code');
        $appid = "wxadf388686ed3af5f";
        $secret = "39a7abdde3714b6a57c07b318faa2883";

        $URL = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";
        $apiData = file_get_contents($URL);

        if(!isset($apiData['errcode'])){
            $openid = json_decode($apiData)->openid;
            return $openid;
        }
	}



	//收集微信登录信息
	function collectingUser(){

		$openid = $this->getWxData();

		$returnArr = [];

		$User = M('OauthUser');

		$user_where['openid'] = $openid;
		$is_user = $User->where($user_where)->find();
		if(!empty($is_user)){
			$User->where($user_where)->setField('expires_date',time()+86400);
		}else{
			$param = I('param.');
			$userinfo = json_decode(htmlspecialchars_decode($param['userinfo']));
			$data['name'] = $userinfo->nickName;
			$data['head_img'] = $userinfo->avatarUrl;
			$data['create_time'] = time();
			$data['openid'] = $openid;
			$data['access_token'] = md5(uniqid(md5(microtime(true)),true));
			$data['expires_date'] = time()+86400;
			$result = $User->add($data);
		}
	}


	//根据星期获取医生
	function getDoctorListByWeek(){
		$param = I('param.week');
		$year = date('Y');
		$date = strtotime($year.'-'.$param);
		$week = date('N',$date);
		$days = date('m-d',time());
		$nows = date('G',time());

		if($days == $param){
			if($nows >12 && $nows <=18){
				$map['working_id']  = $week.'3';
			}else if($nows >=8 && $nows <=18){
				$map['working_id']  = array('in',array($week.'1',$week.'3'));
			}
		}else{
			$map['working_id']  = array('in',array($week.'1',$week.'3'));
		}
		
		
		$map['b.post_status'] = 1;
		$work_relationship = M('Working')
								->alias("a")
								->join(C ( 'DB_PREFIX' )."doctor b ON a.doctor_id = b.id")
								->join(C ( 'DB_PREFIX' )."department c ON a.department_id = c.term_id")
								->where($map)
								->field('b.id,b.name,b.job,c.name as department,b.post_extend,a.working_id')
								->order('a.working_id,b.listorder')
								->select();

		foreach ($work_relationship as $key => $value) {
			$more = json_decode($value['post_extend'],true);
			$work_relationship[$key]['category'] = $more['post_extend2'];
			$work_relationship[$key]['fee'] = $more['post_extend3'];
			unset($work_relationship[$key]['post_extend']);

			$working = str_split($value['working_id']);
			if($working[1] == 1){
				$work_relationship[$key]['time'] = '09:00-12:00';
			}
			if($working[1] == 3){
				$work_relationship[$key]['time'] = '14:00-18:00';
			}
			$work_relationship[$key]['date'] = date('Y-m-d',$date);
			unset($work_relationship[$key]['working_id']);
		}
		$this->ajaxReturns($work_relationship);


	}

	function register(){
		$returnArr = array();


		

		//$openid = $this->getWxData();





		$data = I('param.');







		/*if(empty($openid)){
			$returnArr['code'] = 0;
			$returnArr['info'] =	'请先登录';
			$this->ajaxReturns($returnArr);
		}
		$user_where['openid'] = $openid;
		$user_where['expires_date'] = array('gt',time());
		$user = M('OauthUser')->where($user_where)->find();
		if(empty($user)){
			$returnArr['code'] = 0;
			$returnArr['info'] =	'登录已过时，请重新登录';
			$this->ajaxReturns($returnArr);
		}
		$data['user_id'] = $user['id'];
		$isregister = M('register')->where('user_id',$user['id'])->getField('createtime');
		if(!empty($isregister) && $isregister < time()){
			$returnArr['code'] = 0;
			$returnArr['info'] =	'您已经完成预约，请不要重复操作';
			$this->ajaxReturns($returnArr);
		}*/












		if(empty($data['name'])){
			$returnArr['status'] = 0;
			$returnArr['info'] = '请输入就诊人';
			$this->ajaxReturns($returnArr);
		}

		if(empty($data['phone'])){
			$returnArr['status'] = 0;
			$returnArr['info'] = '请输入联系电话';
			$this->ajaxReturns($returnArr);
		}

		$where['a.id'] = $data['id'];
		$doctor_info = M('doctor')
			->alias("a")
			->join(C ( 'DB_PREFIX' )."department_relationships b ON b.doctor_id = a.id")
			->join(C ( 'DB_PREFIX' )."department c ON b.department_id = c.term_id")
			->field('a.name as doctor,c.name as department')
			->where($where)
			->find();
		unset($data['id']);



		$data['doctor'] = $doctor_info['doctor'];
		$data['appointment'] = $data['date'];
		unset($data['date']);
		$data['department'] = $doctor_info['department'];
		$data['createtime'] = time();
		$data['remark'] = '小程序';

		$result = M('register')->data($data)->add();
		if ($result!==false) {
			$returnArr['status'] = 1;
			$returnArr['info'] = '预约成功！';
			$this->ajaxReturns($returnArr);
		} else {
			$returnArr['status'] = 0;
			$returnArr['info'] = '预约失败，清稍后重试！！';
			$this->ajaxReturns($returnArr);
		}
		
	}




}