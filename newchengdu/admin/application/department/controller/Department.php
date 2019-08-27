<?php
namespace app\department\controller;
use app\common\controller\HomeBase;
use app\department\model\DoctorModel;
use app\department\model\DepartmentModel;
use think\Db;

/**
* 前端科室控制器
*/
class Department extends HomeBase{
	
	//医生信息列表
	public function getDoctorList(){

		$where = [];

		$department_id = $this->request->param('department_id');
		if(empty($department_id)){
			$department_id = 7;
		}
		$is_recommended = $this->request->param('is_recommended');
		if(!empty($is_recommended)){
			$where['a.recommended'] = 1;
		}

		$department_ids = $this->getCategoryParent($department_id);

		
		$where['r.status'] = 1;
		$where['r.department_id'] = ['in',$department_ids];
		
		
		$join = [
		    ['cmf_department_relationships r','a.id = r.doctor_id'],
		    ['cmf_department d','r.department_id = d.id'],
		];

		$lists = DoctorModel::alias('a')->join($join)->where($where)->field('doctor_id,doctor_name,r.department_id,d.name as department_name,doctor_job,doctor_duties,doctor_champion,doctor_proficient,hyperlink,thumb')->order('r.list_order asc')->select();
		return json($lists);

	}

	//科室信息列表
	public function getDepartmentItem(){
		$where['status'] = 1;
		$where['delete_time'] = 0;
		$where['parent_id'] = 7;
		$departments = DepartmentModel::where($where)->field('id,name')->order('list_order asc')->select();
		return json($departments);
	}


	/**
	 * 检查并查找当前分类是否有子类
	 * @param  int $category_id 分类id
	 * @return 
	 */
	private function getCategoryParent($category_id){
		$child_ids = Db::connect('db_config'.parent::$db_id)->name('department')->where('parent_id',$category_id)->column('id');
		if(!empty($child_ids)){
			//有子类，返回id集合
			return $child_ids;
		}else{
			//无子类，返回自身id
			return $category_id;
		}
	}
}