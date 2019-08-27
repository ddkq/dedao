<?php
namespace app\api\controller;
use app\common\controller\HomeBase;
use think\Db;


/**
* 前端友情链接
*/
class Link extends HomeBase{
	
	//友情链接列表
	public function getLinkData(){
		$result = Db::connect('db_config'.parent::$db_id)->name('Link')->where('status',1)->field('id,name,url,image')->order('list_order')->select();
		return json(array_values($result));
	}
	
}