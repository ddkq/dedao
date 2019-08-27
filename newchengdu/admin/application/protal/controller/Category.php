<?php
namespace app\protal\controller;
use app\common\controller\HomeBase;
use app\protal\model\CategoryModel;
use tree\Tree;

/**
* 前端分类控制器
*/
class Category extends HomeBase{
	
	//获取当前分类下的所有子类
	public function getCategoryItem(){
		//获取分类id
		$category_id = $this->request->param('category_id');
		if(empty($category_id)){
			$this->info(0,'请选择分类');
		}

		$path = CategoryModel::where(['status'=>1,'delete_time'=>0,'id'=>$category_id])->value('path');

		$where = [
            'status'      => 1,
            'delete_time' => 0,
            'path'        => ['like', "$path,%"]
        ];
		
		$result = CategoryModel::where($where)->field('id,parent_id,name')->order('list_order asc')->select();
		$tree = new Tree();
		$tree->init($result);
	    $category = $tree->getTreeArrayByFront($category_id);

		return json(array_values($category));
	}

	//获取面包屑信息
	public function getBreadCrumbs(){
		//分类id
		$category_id = $this->request->param('category_id');
		//获取父级id
		$path = CategoryModel::where('id',$category_id)->value('path');
		$category_ids = explode(',',$path);
		//根据path获取父级分类
		$data = CategoryModel::where(['id' => ['in', $category_ids]])->field('id,name')->order('path asc')->select();
		return json($data);
	}
	
}