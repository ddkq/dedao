<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Department\Controller;
use Common\Controller\HomebaseController;
/**
 * 文章列表
*/
class DepartmentController extends HomebaseController {

	//文章内页
	public function index() {
		$term=sp_get_term($_GET['id']);
		//var_dump($term);exit;
		//var_dump(sp_is_mobile());
		if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    	
		    return ;
		}
		$phone = sp_is_mobile();
		if($phone == 1){
			if($term["plist_tpl"] == "list"){
				$tplname=$term["list_tpl"];
			}else{
				$tplname=$term["plist_tpl"];
			}
		}else{
			$tplname=$term["list_tpl"];
		}
		
    	$tplname=sp_get_apphome_tpl($tplname, "list");
    	if(empty($term['$seo_title'])){
    		$term['$seo_title'] = $site_seo_title;
    	}
    	if(empty($term['$seo_keywords'])){
    		$term['$seo_keywords'] = $site_seo_keywords;
    	}
    	if(empty($term['$seo_description'])){
    		$term['$seo_description'] = $site_seo_description;
    	}

		$doctor_model= M("Doctor");
		$doctor = sp_sql_doctors_bycatid(7);
		foreach ($doctor as $k => $v) {
			$extend = json_decode($v['post_extend'],true);
			if($phone == 1){
				$doctor[$k]['main_img'] = $extend['thumb1'];
			}else{
				$doctor[$k]['main_img'] = $extend['thumb'];
			}
			
			$doctor[$k]['experience'] = explode(",",$extend['post_extend5']);
			$doctor[$k]['item'] = $extend['post_extend1'];
		}

		$all_doctor = sp_get_doctor();
		foreach ($all_doctor as $k => $v) {
			if($v['link_type'] == 1){
				unset($all_doctor[$k]);
			}else{
				$extend = json_decode($v['post_extend'],true);
				$smeta = json_decode($v['smeta'],true);
				if($phone == 1){
					$all_doctor[$k]['main_img'] = $extend['thumb1'];
				}else{
					$all_doctor[$k]['main_img'] = $extend['thumb'];
				}
				$all_doctor[$k]['experience'] = explode(",",$extend['post_extend5']);
				$all_doctor[$k]['item'] = $extend['post_extend1'];	
			}
			
		}
		$this->assign("all_doctor",$all_doctor);
		if($_GET['id'] == 7){
			$doctor = $all_doctor;
		}
		//var_dump($doctor);exit;

		$department = sp_get_all_child_terms(7);
		$this->assign('department',$department);
    	
    	$this->assign($term);
    	$this->assign("doctor",$doctor);
    	$this->assign('cat_id', intval($_GET['id']));
    	$this->display(":$tplname");
	}
	
	
	public function introduction() {
    	$id=intval($_GET['id']);
    	$article=sp_get_department_post($id,'');
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
	    	$termid=$article['term_id'];
	    	$term_obj= M("Department");
	    	$term=$term_obj->where("term_id='$termid'")->find();
	    	
	    	$article_id=$article['id'];
	    	
	    	$posts_model=M("DepartmentPost");
	    	$posts_model->save(array("id"=>$article_id,"post_hits"=>array("exp","post_hits+1")));
	    	
	    	$article_date=$article['post_modified'];
	    	
	    	
	    	$smeta=json_decode($article['smeta'],true);
	    	$extend = json_decode($article['post_extend'],true);
	    	$content_data=sp_content_page($article['post_content']);
	    	//var_dump($content_data);exit;
	    	$article['post_content']=$content_data['content'];
	    	//var_dump($article);
	    	$this->assign("page",$content_data['page']);
	    	$this->assign('article',$article);
	    	$this->assign("smeta",$smeta);
	    	$this->assign("extend",$extend);
	    	$this->assign("term",$term);
	    	$this->assign("article_id",$article_id);
	    	
	    	$this->display(":introduction");	
    	}
    	
    }

	
}
