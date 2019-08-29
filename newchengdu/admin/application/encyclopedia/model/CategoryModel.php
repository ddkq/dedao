<?php
namespace app\encyclopedia\model;
use app\common\model\BaseModel;
use tree\Tree;
use think\Db;

/**
* 百科分类模型类
*/
class CategoryModel extends BaseModel{

	protected $table = 'cmf_en_category';
	protected $autoWriteTimestamp = false;

	protected static function init(){
		//写入path路径
		CategoryModel::event('after_write',function($category){
			if($category->parent_id == 0){
				$path = $category->id;
			}else{
				$path = CategoryModel::where('id',$category->parent_id)->value('path');
				$path = $path.','.$category->id;
			}
			CategoryModel::where('id',$category->id)->update(['path'=>$path]);
        });
	}

	public function relationship(){
        return $this->belongsTo('RelationshipsModel','category_id','id');
    }

	public function CategoryList(){
		$result = $this->field('delete_time',true)->where('delete_time',0)->order('list_order desc')->select();
		//计算百科总数
		foreach ($result as $key => $value) {
			$where['category_id'] = $value['id'];
			$where['status'] = 1;
			$count = Db::connect('db_config'.parent::$db_id)->name('EnRelationships')->where($where)->count();
			$result[$key]['en_count'] = $count;
		}
		$tree = new Tree();
		$tree->init($result);
	    $category = $tree->getTree2(0);

        return $category;
	}

	public function CategoryTree(){

        $result = $this->field('id,id as value,parent_id,name as label')->where('delete_time',0)->order('list_order')->select();
        $tree = new Tree();
        $tree->init($result);
        $category = $tree->getTreeArray(0);

        return $category;
	}




}