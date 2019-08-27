<?php
namespace app\protal\model;
use app\common\model\BaseModel;
use app\protal\model\CategoryModel;

/**
* 文章模型
*/
class ArticleModel extends BaseModel{

	// 开启自动写入时间戳字段
	protected $autoWriteTimestamp = true;

	protected $table = 'cmf_portal_article';

	protected $type = [
        'published_time'    =>  'timestamp',
        'more'				=>	'json',
        'published_year'	=>	'timestamp:Y',
        'published_date'	=>	'timestamp:m-d',
        'published_hour'	=>	'timestamp:H:i:s'
    ];

	//多对多关联
	public function category(){
        return $this->belongsToMany('CategoryModel','portal_relationships','category_id','article_id');
    }

    //格式化内容格式
    public function setPostContentAttr($value){
        return htmlspecialchars_decode($value);
    }

    //格式化发布时间
    public function setPublishedTimeAttr($value){
    	return strtotime($value);
    }

    //获取文章列表
	public function ArticleList($param){

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
			$where['post_title'] = ['like','%'.$param['keyword'].'%'];
		}

		$join = [
		    ['cmf_user u','a.user_id = u.id'],
		    ['cmf_portal_relationships r','a.id = r.article_id'],
		    ['cmf_portal_category c', 'r.category_id = c.id'],
		];

		$articles = $this->alias('a')->join($join)->field('a.*,r.list_order,r.id as rid,c.id as category_id,c.name as category_name,c.path as parents,u.user_login as author')->where($where)->order('published_time desc')->paginate(10);
		return $articles;

	}

	//添加文章
	public function ArticleAddPost($data){

		$data['user_id'] = cmf_get_current_admin_id();
		$category = $data['category_id'];

		/*if(!empty($data['more'])){
			$data['more'] = json_encode($data['more']);
		}*/

		$this->allowField(true)->data($data, true)->isUpdate(false)->save();
		$this->category()->save($category);
		return $this;
	}

	//修改文章
	public function ArticleEditPost($data){

		$category = $data['category_id'];

		/*if(!empty($data['more'])){
			$data['more'] = json_encode($data['more']);
		}*/

		$this->allowField(true)->data($data, true)->isUpdate(true)->save();

		$old_category = $this->category()->value('category_id');

		if($category != $old_category){
			$this->category()->detach($old_category);
			$this->category()->save($category);
		}
		return $this;

	}

	/**
	 * 查找下一篇文章
	 * @param  int $article_id  当前文章id
	 * @param  int $category_id 当前文章分类id
	 * @return array              
	 */
	public function getNextArticle($article_id,$category_id){
		$published_time = $this->where('id',$article_id)->value('published_time');
		$where['r.category_id'] = $category_id;
		$where['r.status'] = 1;
		$where['a.delete_time'] = 0;
		$where['a.published_time'] = ['>',$published_time];

		$join = [
		    ['cmf_portal_relationships r','a.id = r.article_id'],
		];

		$next = $this->alias('a')->join($join)->field('a.post_title,r.article_id')->where($where)->order('published_time asc')->find();
		return $next;
	}


	/**
	 * 查找上一篇文章
	 * @param  int $article_id  当前文章id
	 * @param  int $category_id 当前文章分类id
	 * @return array              
	 */
	public function getPrevArticle($article_id,$category_id){
		$published_time = $this->where('id',$article_id)->value('published_time');
		$where['r.category_id'] = $category_id;
		$where['r.status'] = 1;
		$where['a.delete_time'] = 0;
		$where['a.published_time'] = ['<',$published_time];

		$join = [
		    ['cmf_portal_relationships r','a.id = r.article_id'],
		];

		$prev = $this->alias('a')->join($join)->field('a.post_title,r.article_id')->where($where)->order('published_time desc')->find();
		return $prev;
	}

	/**
	 * 查找相关文章
	 * @param  int $article_id  当前文章id
	 * @param  int $category_id 当前文章分类id
	 * @return array
	 */
	public function getRelatedArticles($article_id,$category_id){
		$where['r.category_id'] = $category_id;
		$where['r.status'] = 1;
		$where['r.article_id'] = ['neq',$article_id];

		$join = [
			['cmf_portal_relationships r','a.id = r.article_id'],
		];

		$related = $this->alias('a')->join($join)->field('a.post_title,r.article_id')->where($where)->order('published_time desc')->limit(0,6)->select();
		return $related;
	}


	/**
	 * 检查并查找当前分类是否有子类
	 * @param  int $category_id 分类id
	 * @return 
	 */
	private function getCategoryParent($category_id){
		$categoryPath = CategoryModel::where('id',$category_id)->value('path');

		$where = [
	        'status'      => 1,
	        'delete_time' => 0,
	        'path'        => ['like', "$categoryPath,%"]
	    ];

		$child_ids = CategoryModel::where($where)->column('id');

		if(!empty($child_ids)){
			//有子类，返回id集合
			return $child_ids;
		}else{
			//无子类，返回自身id
			return $category_id;
		}
	}


}