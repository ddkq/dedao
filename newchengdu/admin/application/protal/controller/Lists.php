<?php
namespace app\protal\controller;
use app\common\controller\HomeBase;
use app\protal\model\ArticleModel;
use think\Db;

/**
* 前端文章列表控制器
*/
class Lists extends HomeBase{
	
	//文章列表(无分页)
	public function getCategoryPostLists(){
		//获取分类id
		$category_id = $this->request->param('category_id');
		if(empty($category_id)){
			$this->info(0,'分类id不能为空');
		}
		$category_ids = $this->getCategoryParent($category_id);
		//是否推荐
		$is_recommended = $this->request->param('is_recommended');
		if(empty($is_recommended)){
			$is_recommended = 0;
		}
		//是否顶置
		$is_top = $this->request->param('is_top');
		if(empty($is_top)){
			$is_top = 0;
		}

		//设置数量	
		$limit = $this->request->param('limit');
		if(empty($limit)){
			$limit = 10;
		}

		//是否设置field
		$is_field = $this->request->param('is_field');
		if(empty($is_field)){
			$field = 'r.article_id,r.category_id,c.name as category_name,a.post_title,a.post_excerpt,a.thumb,a.more,a.published_time as published_year,a.published_time as published_date';
		}else{
			$field = 'r.article_id,a.post_title,a.thumb';
		}

		$where = [];
		$where['a.delete_time'] = 0;
		$where['r.status'] = 1;
		$where['r.category_id'] = ['in',$category_ids];
		$where['a.recommended'] = $is_recommended;
		$where['a.is_top'] = $is_top;

		$join = [
			['cmf_portal_relationships r' , 'a.id = r.article_id'],
			['cmf_portal_category c' , 'c.id = r.category_id'],
		];

		$articles = ArticleModel::alias('a')->join($join)->where($where)->order('published_time desc')->field($field)->limit($limit)->select();
		
		return json($articles);
	}

	//文章列表(有分页)
	public function getCategoryPostListsByPage(){
		//获取分类id
		$category_id = $this->request->param('category_id');
		if(empty($category_id)){
			$this->info(0,'分类id不能为空');
		}
		$category_ids = $this->getCategoryParent($category_id);

		//设置每页数量	
		$per_page = $this->request->param('per_page');
		if(empty($per_page)){
			$per_page = 10;
		}

		$field = 'r.article_id,a.post_title,a.post_excerpt,a.published_time as published_year,a.published_time as published_date';

		$where = [];
		$where['a.delete_time'] = 0;
		$where['r.status'] = 1;
		$where['r.category_id'] = ['in',$category_ids];

		$join = [
			['cmf_portal_relationships r' , 'a.id = r.article_id'],
			['cmf_portal_category c' , 'c.id = r.category_id'],
		];

		$articles = ArticleModel::alias('a')->join($join)->where($where)->order('published_time desc')->field($field)->paginate(10);
		
		return json($articles);
	}






	/**
	 * 检查并查找当前分类是否有子类
	 * @param  int $category_id 分类id
	 * @return 
	 */
	private function getCategoryParent($category_id){

		$categoryPath = Db::connect('db_config'.parent::$db_id)->name('portal_category')->where('id',$category_id)->value('path');

		$where = [
	        'status'      => 1,
	        'delete_time' => 0,
	        'path'        => ['like', "$categoryPath,%"]
	    ];

		$child_ids = Db::connect('db_config'.parent::$db_id)->name('portal_category')->where($where)->column('id');

		if(!empty($child_ids)){
			//有子类，返回id集合
			return $child_ids;
		}else{
			//无子类，返回自身id
			return $category_id;
		}
	}
}