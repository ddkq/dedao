<?php
namespace app\protal\controller;
use app\common\controller\HomeBase;
use app\protal\model\ArticleModel;

/**
* 前端文章控制器
*/
class Article extends HomeBase{
	
	//读取文章详细信息
	public function read(){

		$article_id = $this->request->param('article_id');
		if(empty($article_id)){
			$this->info(0,'文章id不能为空');
		}

		ArticleModel::where('id',$article_id)->setInc('post_hits');

		$where = [];
		$where['a.delete_time'] = 0;
		$where['r.status'] = 1;
		$where['r.article_id'] = $article_id;

		$join = [
			['cmf_portal_relationships r' , 'a.id = r.article_id'],
			['cmf_portal_category c' , 'c.id = r.category_id'],
		];

		$article = ArticleModel::alias('a')->join($join)->where($where)->field('r.article_id,r.category_id,c.name as category_name,a.post_title,a.post_content,a.published_time as published_year,a.published_time as published_date,a.published_time as published_hour')->find();

		return json($article);

	}

	//获取相关文章信息
	public function relatedArticles(){

		$returnArr = [];
		
		$param = $this->request->param();
		$article_id = $param['article_id'];
		if(empty($article_id)){
			$this->info(0,'文章id不能为空');
		}
		$category_id = $param['category_id'];
		if(empty($category_id)){
			$this->info(0,'分类id不能为空');
		}
		$articleModel = new ArticleModel();
		
		$returnArr['next'] = $articleModel->getNextArticle($article_id,$category_id);
		$returnArr['prev'] = $articleModel->getPrevArticle($article_id,$category_id);
		$returnArr['related'] = $articleModel->getRelatedArticles($article_id,$category_id);

		return json($returnArr);
	}


}