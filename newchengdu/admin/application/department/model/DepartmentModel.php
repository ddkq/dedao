<?php
namespace app\department\model;
use app\common\model\BaseModel;
use tree\Tree;
use think\Db;

/**
* 科室模型类
*/
class DepartmentModel extends BaseModel{

	protected $table = 'cmf_department';
	protected $autoWriteTimestamp = false;

	protected static function init(){
		//写入path路径
		DepartmentModel::event('after_write',function($department){
			if($department->parent_id == 0){
				$path = $department->id;
			}else{
				$path = DepartmentModel::where('id',$department->parent_id)->value('path');
				$path = $path.','.$department->id;
			}
			DepartmentModel::where('id',$department->id)->update(['path'=>$path]);
        });
	}

	public function relationship(){
        return $this->belongsTo('RelationshipModels','department_id','id');
    }

	public function DepartmentList(){
		$result = $this->field('delete_time',true)->where('delete_time',0)->order('list_order')->select();
		//计算医生总数
		foreach ($result as $key => $value) {
			$where['department_id'] = $value['id'];
			$where['status'] = 1;
			$count = Db::connect('db_config'.parent::$db_id)->name('DepartmentRelationships')->where($where)->count();
			$result[$key]['doctor_count'] = $count;
		}
		$tree = new Tree();
		$tree->init($result);
	    $category = $tree->getTree2(0);
        return $category;
	}

	public function DepartmentTree(){

        $result = $this->field('id,id as value,parent_id,name as label')->where('delete_time',0)->order('list_order')->select();
        $tree = new Tree();
        $tree->init($result);
        $category = $tree->getTreeArray(0);

        return $category;
	}




}