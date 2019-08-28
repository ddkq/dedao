<?php

/**
 * ajax数据处理
 */
namespace Api\Controller;
use Think\Controller;
class AjaxdataController extends Controller {

	public function ajax_nav(){
		if(IS_AJAX){
			$tid = I('tid');
			$cid = I('cid');

			$term_obj = M("Terms");
			$terms=$term_obj->field('term_id,name')->where("status=1 and parent=$tid")->order("listorder asc")->select();

			$where['term_id'] = array('eq',$cid);
			$where['status'] = array('eq',1);
			$where['post_status'] = array('eq',1);

			$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';
			$rs= M("TermRelationships");

			$posts=$rs->alias("a")->join($join)->field('tid,post_title,link_type,post_murl')->where($where)->select();
			$data['terms'] = $terms;
			$data['way'] = $posts;
			$this->ajaxReturn($data);
		}
	}

    public function ajax_doctor(){
        //if(IS_AJAX){
            $doctor = M("Doctor")->field('id,duties,name,post_extend')->where('post_status = 1')->order("listorder asc")->select();
            foreach ($doctor as $key => $value) {
            	$smeta = json_decode($value['post_extend'],true);
            	$doctor[$key]['smeta'] = $smeta['thumb1'];
            	$doctor[$key]['duties'] = $smeta['post_extend4'];
                unset($doctor[$key]['post_extend']);
            }

            $this->ajaxReturn($doctor);
        //}
    }

    /*public function ajax_doctor(){
        if(IS_AJAX){
            $did = intval(I('did'));
            $rs= M("DepartmentRelationships");
            $join = "".C('DB_PREFIX').'doctor as b on a.doctor_id =b.id';
            $doctor=$rs->alias("a")->join($join)->field('doctor_id,duties,name,smeta')->where(array("a.department_id"=>array("eq",$did), "status"=>1))->order("a.tid asc")->select();
            foreach ($doctor as $key => $value) {
            	$smeta = json_decode($value['smeta'],true);
            	$doctor[$key]['smeta'] = $smeta['thumb_phone'];
            }
            $this->ajaxReturn($doctor);
        }
    }*/
}