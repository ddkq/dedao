<?php
namespace app\api\controller;
use app\common\controller\HomeBase;
use think\Db;

/**
* 前端幻灯片
*/
class Slide extends HomeBase{
	
	public function initialize(){
		parent::initialize();
	}

    //幻灯片列表
	public function getSlidedata(){
		$cat_id = $this->request->param('cat_id',0,'intval');
		if(empty($cat_id)){
			$this->info(0,'非法操作');
		}
		$map['slide_id'] = $cat_id;
		$map['status'] = 1;
		$result = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->where($map)->order('list_order asc')->field('id,slide_id,title,url,target,image,content')->select();
		return json(array_values($result));
	}
}
