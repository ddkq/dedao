<?php
namespace app\department\controller;
use app\common\controller\HomeBase;
use app\department\model\DoctorModel;

/**
* 前端医生类
*/
class Doctor extends HomeBase{
	

	//医生具体信息
	public function read(){

		$doctor_id = $this->request->param('doctor_id');
		if(empty($doctor_id)){
			$this->info(0,'请选择医生');
		}
		DoctorModel::where('id',$doctor_id)->setInc('hits');

		$where = [];
		$where['a.delete_time'] = 0;
		$where['r.status'] = 1;
		$where['r.doctor_id'] = $doctor_id;

		$join = [
			['cmf_department_relationships r' , 'a.id = r.doctor_id'],
			['cmf_department c' , 'c.id = r.department_id'],
		];

		$doctor = DoctorModel::alias('a')->join($join)->where($where)->field('a.doctor_name,a.doctor_duties,a.doctor_job,a.doctor_champion,a.doctor_introduction,a.doctor_proficient,a.working_time,a.thumb,c.name as department_name')->find();

		return json($doctor);

	}
}