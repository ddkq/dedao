<?php
namespace app\encyclopedia\model;
use app\common\model\BaseModel;

/**
* 百科模型
*/
class EncyclopediaModel extends BaseModel{

	protected $table = 'cmf_encyclopedia';

	protected $type = [
        'published_time'    =>  'timestamp',
    ];

	//多对多关联
	public function category(){
        return $this->belongsToMany('CategoryModel','en_relationships','category_id','en_id');
    }

    //格式化发布时间
    public function setPublishedTimeAttr($value){
    	return strtotime($value);
    }

    //获取文章列表
	public function EncyclopediaList($param){

		$where = [];
		$where['r.status'] = 1;
		$where['a.delete_time'] = 0;

		if(!empty($param['category']) && $param['category'] !== ''){
			$where['r.category_id'] = intval($param['category']);
		}
		if(!empty($param['start_time']) && !empty($param['end_time'])  ){
			$where['published_time'] = [['>=', strtotime($param['start_time'])], ['<=', strtotime($param['end_time'])+86400]];
		}
		
		if(!empty($param['keyword']) && $param['keyword'] !== ''){
			$where['en_title'] = ['like','%'.$param['keyword'].'%'];
		}


		$join = [
		    ['cmf_user u','a.user_id = u.id'],
		    ['cmf_en_relationships r','a.id = r.en_id'],
		    ['cmf_en_category c', 'r.category_id = c.id'],
		];

		$encyclopedia = $this->alias('a')->join($join)->field('a.*,r.list_order,r.id as rid,c.id as category_id,c.name as category_name,c.path as parents,u.user_login as author')->where($where)->order('published_time desc')->paginate(10);

		return $encyclopedia;

	}

	//添加百科
	public function EncyclopediaAddPost($data){

		$data['user_id'] = cmf_get_current_admin_id();
		$category = $data['category_id'];

		if(!empty($data['en_info'])){
			$data['en_info'] = json_encode($data['en_info']);
		}

		if(!empty($data['more'])){
			$data['more'] = json_encode($data['more']);
		}

		$this->allowField(true)->data($data, true)->isUpdate(false)->save();
		$this->category()->save($category);
		return $this;
	}

	//修改百科
	public function EncyclopediaEditPost($data){

		$category = $data['category_id'];

		if(!empty($data['en_info'])){
			$data['en_info'] = json_encode($data['en_info']);
		}

		if(!empty($data['more'])){
			$data['more'] = json_encode($data['more']);
		}

		$this->allowField(true)->data($data, true)->isUpdate(true)->save();

		$old_category = $this->category()->value('category_id');

		if($category != $old_category){
			$this->category()->detach($old_category);
			$this->category()->save($category);
		}
		return $this;

	}


}