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

			$case = sp_sql_posts_bycatid_withcomment(108,'field:object_id,tid,post_title,b.smeta,link_type,post_murl,comment_count,post_modified;limit:0,8;');

			//var_dump($case);exit;
	    	$this->assign('case',$case);


	    	$brand_where['recommended'] = 1;
			$brand = sp_sql_posts_bycatid_withterms(145,'field:tid,a.term_id,name,post_title,post_excerpt,link_type,post_murl,smeta;order:post_modified desc;limit:0,3',$brand_where);
			//var_dump($brand);exit;
			$this->assign('brand',$brand);
		}else{
			$slides = sp_getslide(index_banner);
	    	$case_where['recommended'] = 1;
	    	$case = sp_sql_posts_bycatid(108,'field:tid,post_title,link_type,post_url,smeta,post_extend;limit:0,4',$case_where);
	    	//var_dump($case);exit;
	    	$this->assign('case',$case);

	    	$sick1 = sp_get_child_terms(4);
	    	$sick2 = sp_get_child_terms(3);
	    	$sick3 = sp_get_child_terms(5);
	    	$sick4 = sp_get_child_terms(154);
	    	$sick5 = sp_get_child_terms(13);
	    	array_pop($sick1);
	    	array_pop($sick2);
	    	array_pop($sick3);
	    	array_pop($sick4);
	    	array_pop($sick5);
	    	
	    	
	    	foreach ($sick1 as $key => $value) {
	    		$sick1[$key]['commended_article'] = sp_sql_post_where($value['term_id'],'field:tid,post_title,post_excerpt,link_type,post_url,post_modified;',array('recommended'=>1));
	    		$sick1[$key]['etc_article'] = sp_sql_posts('cid:'.$value[term_id].';field:tid,post_title,link_type,post_url,post_modified;order:post_modified desc;limit:0,5;',array('recommended'=>0));
	    	}
	    	foreach ($sick2 as $key => $value) {
	    		$sick2[$key]['commended_article'] = sp_sql_post_where($value['term_id'],'field:tid,post_title,post_excerpt,link_type,post_url,post_modified;',array('recommended'=>1));
	    		$sick2[$key]['etc_article'] = sp_sql_posts('cid:'.$value[term_id].';field:tid,post_title,link_type,post_url,post_modified;order:post_modified desc;limit:0,5;',array('recommended'=>0));
	    	}
	    	foreach ($sick3 as $key => $value) {
	    		$sick3[$key]['commended_article'] = sp_sql_post_where($value['term_id'],'field:tid,post_title,post_excerpt,link_type,post_url,post_modified;',array('recommended'=>1));
	    		$sick3[$key]['etc_article'] = sp_sql_posts('cid:'.$value[term_id].';field:tid,post_title,link_type,post_url,post_modified;order:post_modified desc;limit:0,5;',array('recommended'=>0));
	    	}
	    	foreach ($sick4 as $key => $value) {
	    		$sick4[$key]['commended_article'] = sp_sql_post_where($value['term_id'],'field:tid,post_title,post_excerpt,link_type,post_url,post_modified;',array('recommended'=>1));
	    		$sick4[$key]['etc_article'] = sp_sql_posts('cid:'.$value[term_id].';field:tid,post_title,link_type,post_url,post_modified;order:post_modified desc;limit:0,5;',array('recommended'=>0));
	    	}
	    	foreach ($sick5 as $key => $value) {
	    		$sick5[$key]['commended_article'] = sp_sql_post_where($value['term_id'],'field:tid,post_title,post_excerpt,link_type,post_url,post_modified;',array('recommended'=>1));
	    		$sick5[$key]['etc_article'] = sp_sql_posts('cid:'.$value[term_id].';field:tid,post_title,link_type,post_url,post_modified;order:post_modified desc;limit:0,5;',array('recommended'=>0));
	    	}

	    	$this->assign('sick1',$sick1);
	    	$this->assign('sick2',$sick2);
	    	$this->assign('sick3',$sick3);
	    	$this->assign('sick4',$sick4);
	    	$this->assign('sick5',$sick5);


	    	$activitiy_banner = sp_getslide('activitiy_banner');
	    	$this->assign('activitiy_banner',$activitiy_banner);

	    	$news_where['recommended'] = 1;
			$news_where['recommended_type'] = 41;

			$commonweal_where['recommended'] = 1;
			$commonweal_where['recommended_type'] = 18;

			$activity_where['recommended'] = 1;
			$activity_where['recommended_type'] = 0;

	    	$top_news = sp_sql_posts_bycatid(145,'field:tid,post_title,post_excerpt,link_type,post_url,smeta,post_modified;order:post_modified desc;limit:0,1;',$news_where);
	    	$news = sp_sql_posts_bycatid(145,'field:tid,post_title,post_excerpt,link_type,post_url,smeta,post_modified;order:post_modified desc;limit:0,2;',$commonweal_where);
	    	$activity = sp_sql_posts('cid:180,141,146;field:tid,post_title,link_type,post_url,post_modified;order:post_modified desc;limit:0,4;',$activity_where);


	    	$this->assign('top_news',$top_news);
	    	$this->assign('news',$news);
	    	$this->assign('activity',$activity);

		}

		$doctor = sp_get_doctor();
    	$i = 0;
    	foreach ($doctor as $k => $v) {
    		if($v['recommended'] == 0){
    			unset($doctor[$k]);
    		}else{
    			if($v['link_type'] == 1 && $phone != 1){
    				$doctor[$k]['href'] = $v['post_url'];
    			}else if($v['link_type'] == 1 && $phone == 1){
					$doctor[$k]['href'] = $v['post_murl'];
    			}else{
    				$doctor[$k]['href'] = '/doctor/'.$v['id'].'.html';
    			}
    			$smeta = json_decode($v['smeta'],true);
				$doctor[$k]['main_img'] = $smeta['thumb'];
    			$i++;
    		}	
    	}
    	//var_dump($doctor);exit;

    	
    	$this->assign('doctor',$doctor);
		$this->assign('slides',$slides);
    	$this->display(":index");
    }
}


