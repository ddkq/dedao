<?php
namespace app\api\controller;
use app\common\controller\HomeBase;
use think\Db;
use tree\Tree;

/**
* 前端导航
*/
class Nav extends HomeBase{

	public function initialize(){
		parent::initialize();
	}

	//前端导航列表
	public function getNavData(){
		$cat_id = $this->request->param('cat_id',0,'intval');
		if(empty($cat_id)){
			$this->info(0,'非法操作');
		}
		$map['cat_id'] = $cat_id;
		$map['status'] = 1;
		$result = Db::connect('db_config'.parent::$db_id)->name('nav')->where($map)->order('list_order')->field('id,cat_id,parent_id,name,list_order,href,icon,target')->select();
		$tree = new Tree();
		$tree->init($result);
		$nav = $tree->getTree2(0);
		return json(array_values($nav));
	}

}