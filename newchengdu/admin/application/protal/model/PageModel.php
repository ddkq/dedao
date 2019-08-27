<?php
namespace app\protal\model;
use app\common\model\BaseModel;
use think\Db;

/**
* 页面模型
*/
class PageModel extends Model{
	
	protected $table = 'cmf_portal_page';

	public function PageList($param){

		$where['a.delete_time'] = 0;

		if(!empty($param['category']) && $param['category'] !== ''){
			$where['a.category_id'] = intval($param['category']);
		}
		if(!empty($param['start_time']) && !empty($param['end_time'])  ){
			$where['a.create_time'] = [['>=', strtotime($param['start_time'])], ['<=', strtotime($param['end_time'])+86400]];
		}
		if(!empty($param['keyword']) && $param['keyword'] !== ''){
			$where['a.page_title'] = ['like','%'.$param['keyword'].'%'];
		}

		$join = [
		    ['cmf_user u','a.user_id = u.id'],
		];

		$pages = Db::connect('db_config'.parent::$db_id)->name('PortalPage')->alias('a')->join($join)->field('a.id,a.page_title,a.category_id,a.template,a.url,a.status,a.create_time,u.user_login as author')->where($where)->order('create_time desc')->paginate(10);

		return $pages;

	}



}