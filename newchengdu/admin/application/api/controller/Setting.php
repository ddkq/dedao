<?php
namespace app\api\controller;
use app\common\controller\HomeBase;

/**
* 网站信息 
*/
class Setting extends HomeBase{

	public function initialize(){
		parent::initialize();
	}
	
	//网站基本信息
	public function getSiteInfo(){
		$info = cmf_get_option('site_info', parent::$db_id);
		return json($info);
	}
}