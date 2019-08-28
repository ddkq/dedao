<?php

namespace Job\Model;
use Think\Model\RelationModel;
class JobModel extends RelationModel{   

	protected function _before_write($data) {
		$data['validity_data'] = strtotime($data['validity_data']);
	} 

	protected function _after_insert($data,$options){
		$job_id=$data['job_id'];
		$parent_id=$data['parent'];
		if($parent_id==0){
			$d['path']="0-$job_id";
		}else{
			$parent=$this->where("job_id=$parent_id")->find();
			$d['path']=$parent['path'].'-'.$job_id;
		}
		$this->where("job_id=$job_id")->save($d);
	}
	
	protected function _after_update($data,$options){
		if(isset($data['parent'])){
			$job_id=$data['job_id'];
			$parent_id=$data['parent'];
			if($parent_id==0){
				$d['path']="0-$job_id";
			}else{
				$parent=$this->where("job_id=$parent_id")->find();
				$d['path']=$parent['path'].'-'.$job_id;
			}
			$result=$this->where("job_id=$job_id")->save($d);
			if($result){
				$children=$this->where(array("parent"=>$job_id))->select();
				foreach ($children as $child){
					$this->where(array("job_id"=>$child['job_id']))->save(array("parent"=>$job_id,"job_id"=>$child['job_id']));
				}
			}
		}
	}
}
