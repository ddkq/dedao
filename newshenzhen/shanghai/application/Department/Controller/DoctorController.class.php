<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
/**
 * 文章内页
 */
namespace Department\Controller;
use Common\Controller\HomebaseController;
class DoctorController extends HomebaseController {
    //文章内页
    public function index() {
    	$id=intval($_GET['id']);
    	$article=sp_sql_doctor($id,'');
    	$phone = sp_is_mobile();
    	if(empty($article)){
    	    header('HTTP/1.1 404 Not Found');
    	    header('Status:404 Not Found');
    	    if(sp_template_file_exists(MODULE_NAME."/404")){
    	        $this->display(":404");
    	    }
    	    
    	    return ;
    	}
    	if($article['compatible'] == 0 ){
    		$dis = 1;
    	}else if($article['compatible'] == 1 ){
    		if($phone == 1){
    			$dis = 0;
    			header('Status:403');
    		}else{
    			$dis = 1;
    		}
    	}else if($article['compatible'] == 2 ){
    		if($phone == 0){
    			$dis = 0;
    			header('Status:403');
    		}else{
    			$dis = 1;
    		}
    	}
    	
    	if($dis == 1){
    		$term_obj= M("Department");
    		$map['term_id']  = array('in',$article['term_id']);
	    	$terms = $term_obj->field("term_id,name")->where($map)->select();
	    	
	    	$article_id=$article['id'];
	    	
	    	$doctor_model=M("Doctor");
	    	$doctor_model->save(array("id"=>$article_id,"post_hits"=>array("exp","post_hits+1")));

	    	
	    	$smeta=json_decode($article['smeta'],true);
	    	$extend = json_decode($article['post_extend'],true);
	    	$experience = explode(",",$extend['post_extend5']);
	    	$working = explode(",",$article['working_time']);

	    	$working_model = M('working');
	    	$working = $working_model->where("doctor_id = $article_id")->getField("working_id",true);

	    	$this->assign($article);
	    	$this->assign("smeta",$smeta);
	    	$this->assign("extend",$extend);
	    	$this->assign('experience',$experience);
	    	$this->assign("terms",$terms);
	    	$this->assign("article_id",$article_id);
	    	$this->assign("working",$working);
	    	
	    	
	    	$aptplname=isset($smeta['template'])?$smeta['template']:"";
			$amtplname=isset($smeta['template_phone'])?$smeta['template_phone']:"";
			
	    	if($phone == 1){
	    		if(empty($amtplname)){
		    		if($term["pone_tpl"] == "article"){
		    			$tplname=$term["one_tpl"];
		    		}else{
		    			$tplname=$term["pone_tpl"];
		    		}
	    		}else{
					$tplname = $amtplname;    		
	    		}
	    	}else{
	    		if(empty($aptplname)){
	    			$tplname=$term["one_tpl"];
	    		}else{
	    			$tplname = $aptplname;
	    		}
	    		
	    	}
	    	//$tplname=$term["one_tpl"];
	    	$tplname=sp_get_apphome_tpl($tplname, "article");
	    	$this->display(":$tplname");	
    	}
    	
    }
    
    public function do_like(){
    	
    	$id=intval(I('id'));
    	//var_dump($id);exit;
    	$result = M("Doctor")->where("id = $id")->setInc("doctor_like");
    	
    	if($result){
    		$this->ajaxReturn(sp_ajax_return(array("id"=>$result),"点赞成功！",1));
    	}
    	
    }
    
    public function chance(){
		//var_dump($_POST);
		
		$data = array();
		$id = intval($_POST['val']);
		
		
		if($id == 0 or empty($_POST['time'])){
			$data['status'] = 0;
			$data['info'] = '请选择科室和选择预约时间';
			die(json_encode($data));
		}else{
			
			$hour = date('H',strtotime($_POST['time']));
			$week = date('N',strtotime($_POST['time']));
			
			if($hour<=11){
				$h=1;
			}else if($hour>11 and $hour<=14){
				$h=2;
			}else if($hour>14 and $hour<=18){
				$h=3;
			}
			
			$working_id = $week.$h;
			
			$where['department_id'] = $id;
			$where['working_id'] = $working_id;
			
			
			$rs= M("Working");
			$join = "".C('DB_PREFIX').'doctor as b on a.doctor_id =b.id';
			$doctor=$rs->alias("a")->join($join)->where($where)->select();
			
			if(empty($doctor)){
				$data['status'] = 0;
				$data['info'] = '对不起，当前时间无医生坐诊';
				die(json_encode($data));
			}else{
				$str = "<td><span>预约专家：</span><select name='doctor'><option value=''>请选择预约专家</option>";
				foreach($doctor as $vo){
					$str.='<option value='.$vo[id].'>'.$vo[name].'</option>';
				}
				$str.="</select></td>";	
				$data['status'] = 1;
				$data['info'] = $str;
				die(json_encode($data));	
			}
		}
	}
}
