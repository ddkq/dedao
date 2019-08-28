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
 * 文章列表
*/
class ListController extends HomebaseController {

	//列表页
	public function index() {
		$term_id = $_GET['id'];
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
		//
    	$tplname=sp_get_apphome_tpl($tplname, "list");
    	$site_options=get_site_options();
    	if(empty($term['seo_title'])){
    		$term['seo_title'] = $term['name'] .'_'. $site_options['site_name'];
    	}
    	if(empty($term['seo_keywords'])){
    		$term['seo_keywords'] = $site_options['site_seo_keywords'];
    	}
    	if(empty($term['seo_description'])){
    		$term['seo_description'] = $site_options['site_seo_description'];
    	}

    	$this->assign($term);

    	$terms = sp_get_terms('ids:189,190,191,192;field:term_id,name;order:path asc,listorder desc;');
    	$this->assign('terms',$terms);

    	$tag = "field:tid,post_title,post_excerpt,name,smeta,post_hits,post_modified,link_type,post_url,post_murl,post_extend;order:post_modified desc";

    	if($phone == 1){
    		$list=sp_sql_posts_paged_bycatid($term_id,$tag,4,"{first}{prev}{list}{next}");
	    	$this->assign('list',$list);
    	}else{
    		$list=sp_sql_posts_paged_bycatid(189,$tag,4,"{first}{prev}{list}{next}");
	    	$this->assign('list',$list);
	    	$list1=sp_sql_posts_paged_bycatid(190,$tag,4,"{first}{prev}{list}{next}");
	    	$this->assign('list1',$list1);
	    	$list2=sp_sql_posts_paged_bycatid(191,$tag,4,"{first}{prev}{list}{next}");
	    	$this->assign('list2',$list2);
	    	$list3=sp_sql_posts_paged_bycatid(192,$tag,4,"{first}{prev}{list}{next}");
	    	$this->assign('list3',$list3);
    	}
		

    	
    	$this->assign('cat_id', intval($_GET['id']));
    	$this->display(":$tplname");
	}

}
