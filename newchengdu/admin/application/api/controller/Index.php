<?php
namespace app\api\controller;
use app\common\controller\HomeBase;
use app\protal\model\CategoryModel;
use app\protal\model\ArticleModel;
use think\Db;

/**
* 主页用api
*/
class Index extends HomeBase{
	
	//首页-智能口腔中心
	public function indexItems(){
		$returnArr = [];
		//第一层分类
		$topWhere['parent_id'] = 62;
		$topWhere['status'] = 1;
		$topWhere['delete_time'] = 0;
		$topCategory = CategoryModel::where($topWhere)->order('list_order asc')->column('id,name');
		$i = 0;

		//查询文章时的条件
		$where = [];
		$where['a.delete_time'] = 0;
		$where['r.status'] = 1;
		$where['a.recommended'] = 1;

		$join = [
			['cmf_portal_relationships r' , 'a.id = r.article_id'],
			['cmf_portal_category c' , 'c.id = r.category_id'],
		];

		//组装数组
		foreach ($topCategory as $key => $value) {
			//$returnArr[$i]['category'] = $value;
			$childCategory = CategoryModel::where(['parent_id'=>$key,'delete_time'=>0])->order('list_order asc')->column('id,name');
			$j = 0;
			foreach ($childCategory as $key1 => $value1) {
				$returnArr[$i][$j]['category'] = $value1;
				$where['r.category_id'] = $key1;
				$articles = ArticleModel::alias('a')->join($join)->where($where)->order('published_time desc')->limit(0,5)->field('r.article_id,a.post_title,a.post_excerpt,a.published_time as published_year,a.published_time as published_date')->select();
				$articles = collection($articles)->toArray();
				$returnArr[$i][$j]['articles'] = $articles;
				$j++;
			}
			$i++;
		}
		return json(array_values($returnArr));
	}


	//迁移数据(文章)
    public function dataMigration(){
    	$old_data = Db::connect('db_config'.parent::$db_id)->name('posts')->select();
    	foreach ($old_data as $key => $value) {
    		$new_data['id'] = $value['id'];
	    	$new_data['post_title'] = $value['post_title'];
	    	$new_data['post_tag'] = $value['post_keywords'];
	    	$new_data['post_excerpt'] = mb_substr($value['post_excerpt'],0,500);
	    	$new_data['post_content'] = $value['post_content'];
	    	$smeta = json_decode($value['smeta'],true);
	    	$new_data['thumb'] = $smeta['thumb'];
	    	$new_data['user_id'] = $value['post_author'];
	    	$new_data['is_top'] = $value['istop'];
	    	$new_data['recommended'] = $value['recommended'];
	    	$new_data['post_hits'] = $value['post_hits'];
	    	$new_data['create_time'] = strtotime($value['post_date']);
	    	$new_data['published_time'] = strtotime($value['post_modified']);
	    	$new_data['update_time'] = strtotime($value['post_date']);
	    	Db::connect('db_config'.parent::$db_id)->name('PortalArticle')->insert($new_data);
    	}
    	//分类
    	/*$old_data = Db::connect('db_config'.parent::$db_id)->name('terms')->select();
    	//dump($old_data);
    	foreach ($old_data as $key => $value) {
    		$new_data['id'] = $value['term_id'];
    		$new_data['name'] = $value['name'];
    		$new_data['parent_id'] = $value['parent'];
    		$new_data['path'] = substr(str_replace('-',',',$value['path']),2);
    		$new_data['status'] = $value['status'];
    		$new_data['description'] = $value['description'];
    		$new_data['delete_time'] = 0;
    		Db::connect('db_config'.parent::$db_id)->name('PortalCategory')->insert($new_data);
    	}*/
    	$this->info(1,'迁移成功');
    }


    //迁移数据(表单数据)
    public function dataMigrationByForm(){
    	$old_data = Db::connect('db_config'.parent::$db_id)->name('TablesData')->select();
    	foreach ($old_data as $key => $value) {
    		$new_data['id'] = $value['id'];
    		$new_data['form_id'] = $value['tables_id'];
    		$new_data['data'] = $value['content'];
    		$new_data['page'] = $value['page'];
    		$new_data['ip'] = $value['ip'];
    		$new_data['status'] = $value['status'];
    		$new_data['create_time'] = strtotime($value['createtime']);
    		$new_data['delete_time'] = 0;
    		Db::connect('db_config'.parent::$db_id)->name('FormData')->insert($new_data);
    	}
    	$this->info(1,'迁移成功');
    }

    public function dataMigrationByTable(){
    	$old_data = Db::connect('db_config'.parent::$db_id)->name('Tables')->select();
    	foreach ($old_data as $key => $value) {
    		$new_data['id'] = $value['id'];
    		$new_data['form_name'] = $value['name'];
    		$new_data['content'] = $value['content'];
    		$new_data['status'] = 1;
    		$new_data['create_time'] = strtotime($value['createtime']);
    		$new_data['delete_time'] = 0;
    		Db::connect('db_config'.parent::$db_id)->name('Form')->insert($new_data); 
    	}
    	$this->info(1,'迁移成功');
    }
	
}