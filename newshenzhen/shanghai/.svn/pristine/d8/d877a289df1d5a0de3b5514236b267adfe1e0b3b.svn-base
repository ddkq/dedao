<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Goods\Controller;
use Common\Controller\HomebaseController;
/**
 * 文章列表
*/
class GoodstermsController extends HomebaseController {

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
    	//var_dump($tplname);exit;
    	
		$where = array();
		if(is_numeric($_GET['gender'])){
			$where['gender'] = array('eq',$_GET['gender']);
			$this->assign('gender',intval($_GET['gender']));
		};
		if(is_numeric($_GET['min_price']) and is_numeric($_GET['max_price'])){
			$where['shop_price'] = array('between',array($_GET['min_price'],$_GET['max_price']));
			$this->assign('min_price',$_GET['min_price']);
			$this->assign('max_price',$_GET['max_price']);
		}else if(is_numeric($_GET['min_price']) and empty($_GET['max_price'])){
			$where['shop_price'] = array('egt',$_GET['min_price']);
			$this->assign('min_price',$_GET['min_price']);
		}
		
		if(!empty($_GET['order'])){
			$order = $_GET['order'].' '.$_GET['order_type'];
			$this->assign('order',$_GET['order']);
			$this->assign('order_type',$_GET['order_type']);
		}
		//var_dump($_GET);exit;
		
		$post = sp_sql_goods_paged_bycatid(intval($_GET['id']),$where,$order);
    	
    	$this->assign($term);
    	$this->assign("terms",sp_get_child_terms(2));
    	$this->assign("posts",$post);
    	
    	$this->assign('cat_id', intval($_GET['id']));
    	$this->display(":$tplname");
	}
}
