<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * Ê×Ò³
 */
class IndexController extends HomebaseController {	
    //Ê×Ò³
	public function index() {

		$phone = sp_is_mobile();
		if($phone){
			$slides = sp_getslide(phone_banner);

			$case_where['recommended'] = 1;
	    	$case = sp_sql_posts_bycatid(108,'field:tid,post_title,smeta,post_extend,link_type,post_url,post_murl;limit:0,6;',$case_where);
	    	$this->assign('case',$case);


	    	$brand_where['recommended'] = 1;
			$brand = sp_sql_posts_bycatid(145,'field:tid,post_title,post_excerpt,link_type,post_murl,smeta;order:post_modified desc;limit:0,3',$brand_where);
			$this->assign('brand',$brand);


		}else{

			$slides = sp_getslide(index_banner);
			
			$commonweal_where['recommended'] = 1;
			$commonweal_where['recommended_type'] = 41;
	    	$c1 = sp_sql_posts('cid:146,148;field:tid,post_title,post_excerpt,link_type,post_url,post_murl,smeta,post_modified;order:post_modified desc;limit:0,3;',$commonweal_where);
	    	//var_dump($c1);exit;
	    	$c2 = sp_sql_posts('cid:94,141;field:tid,post_title,post_excerpt,link_type,post_url,post_murl,smeta,post_modified;order:post_modified desc;limit:0,3;',$commonweal_where);
	    	$c3 = sp_sql_posts('cid:187;field:tid,post_title,post_excerpt,link_type,post_url,post_murl,smeta,post_modified;order:post_modified desc;limit:0,3',$commonweal_where);

	    	$hot_recommend = sp_sql_post_where(182,'field:tid,post_title,link_type,post_url;',array('recommended'=>1));
	    	$this->assign('hot_recommend',$hot_recommend);

		}

		$activity = sp_sql_post_where(180,'field:tid,post_title,smeta,link_type,post_url,post_murl;',array('recommended'=>1));
    	$activity['smeta'] = json_decode($activity['smeta'],true);
    	$this->assign('activity',$activity);

    	$doctor = sp_get_doctor();
    	$i = 0;
    	foreach ($doctor as $k => $v) {
    		if($i >= 10){
    			unset($doctor[$k]);
    		}else{
	    		if($v['recommended'] == 0){
	    			unset($doctor[$k]);
	    		}else{
	    			$extend = json_decode($v['post_extend'],true);
	    			if($phone){
						$doctor[$k]['main_img'] = $extend['thumb1'];
	    			}else{
						$doctor[$k]['main_img'] = $extend['thumb'];
	    			}
	    			
	    			$doctor[$k]['experience'] = explode(",",$extend['post_extend5']);
	    			$doctor[$k]['item'] = $extend['post_extend1'];
	    			$i++;
	    		}	
    		}
    	}
    	$this->assign('doctor',$doctor);


		$this->assign('slides',$slides);
		$this->assign('c1',$c1);
    	$this->assign('c2',$c2);
    	$this->assign('c3',$c3);

    	$this->display(":index");
    }
}


