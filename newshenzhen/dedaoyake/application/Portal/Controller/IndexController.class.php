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

		$commonweal_where['recommended'] = 1;
    	$c1 = sp_sql_post_where(190,'field:tid,post_title,post_excerpt,link_type,post_url,post_murl,smeta,post_modified;order:post_modified desc;',$commonweal_where);
    	$c1['smeta'] = json_decode($c1['smeta'],true);
    	$c2 = sp_sql_post_where(191,'field:tid,post_title,post_excerpt,link_type,post_url,post_murl,smeta,post_modified;order:post_modified desc;',$commonweal_where);
    	$c2['smeta'] = json_decode($c2['smeta'],true);
    	$c3 = sp_sql_post_where(192,'field:tid,post_title,post_excerpt,link_type,post_url,post_murl,smeta,post_modified;order:post_modified desc;',$commonweal_where);
    	$c3['smeta'] = json_decode($c3['smeta'],true);

		$this->assign('c1',$c1);
    	$this->assign('c2',$c2);
    	$this->assign('c3',$c3);

    	$this->display(":index");
    }
}


