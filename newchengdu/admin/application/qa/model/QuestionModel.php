<?php
namespace app\qa\model;
use app\common\model\BaseModel;

/**
* 问题模型
*/
class QuestionModel extends BaseModel{

	protected $table = 'cmf_question';

	protected $type = [
        'published_time'    =>  'timestamp',
    ];

	//多对多关联
	public function category(){
        return $this->belongsToMany('CategoryModel','qa_relationships','category_id','question_id');
    }

    //格式化发布时间
    public function setPublishedTimeAttr($value){
    	return strtotime($value);
    }

    //获取问题列表
	public function QuestionList($param){

		$where = [];
		$where['r.status'] = 1;
		$where['a.delete_time'] = 0;

		if(!empty($param['category']) && $param['category'] !== ''){
			$category_ids = $this->getCategoryParent($param['category']);
			$where['r.category_id'] = ['in',$category_ids];
		}
		if(!empty($param['start_time']) && !empty($param['end_time'])  ){
			$where['published_time'] = [['>=', strtotime($param['start_time'])], ['<=', strtotime($param['end_time'])+86400]];
		}
		
		if(!empty($param['keyword']) && $param['keyword'] !== ''){
			$where['question_title'] = ['like','%'.$param['keyword'].'%'];
		}


		$join = [
		    ['cmf_user u','a.user_id = u.id'],
		    ['cmf_qa_relationships r','a.id = r.question_id'],
		    ['cmf_qa_category c', 'r.category_id = c.id'],
		];

		$question = $this->alias('a')->join($join)->field('a.*,r.list_order,r.id as rid,c.id as category_id,c.name as category_name,c.path as parents,u.user_login as author')->where($where)->order('published_time desc')->paginate(10);

		return $question;

	}

	//添加问题
	public function QuestionAddPost($data){

		$data['user_id'] = cmf_get_current_admin_id();
		$category = $data['category_id'];

		if(!empty($data['more'])){
			$data['more'] = json_encode($data['more']);
		}

		$this->allowField(true)->data($data, true)->isUpdate(false)->save();
		$this->category()->save($category);
		return $this;
	}

	//修改问题
	public function QuestionEditPost($data){

		$category = $data['category_id'];

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

	/**
	 * 检查并查找当前分类是否有子类
	 * @param  int $category_id 分类id
	 * @return 
	 */
	private function getCategoryParent($category_id){
		$child_ids = CategoryModel::where('parent_id',$category_id)->column('id');
		if(!empty($child_ids)){
			//有子类，返回id集合
			return $child_ids;
		}else{
			//无子类，返回自身id
			return $category_id;
		}
	}


}