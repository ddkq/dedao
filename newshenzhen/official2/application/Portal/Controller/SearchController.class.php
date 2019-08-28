<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
/**
 * 搜索结果页面
 */
namespace Portal\Controller;
use Common\Controller\HomebaseController;
class SearchController extends HomebaseController {
    public function index() {
    	
		$keyword = I('request.keyword/s','');
		$type =  I('request.type/s','');
		
		if (empty($keyword)) {
			$this -> display(":search");
		}else{
			if($type == 1){
				$result=sp_sql_posts_paged_bykeyword($keyword,"field:tid,post_title,post_excerpt,smeta,post_hits,post_modified,link_type,post_url,post_murl;order:post_modified desc",6);
				$this->assign("result",$result);
				$select1 = "selected='selected'";
				$this->assign('select1',$select1);
			}else if($type == 2){
				$result=sp_sql_qa_paged_bykeyword($keyword,"field:id,title,answer_num;order:status desc",6);
				$this->assign("result",$result);
				$select2 = "selected='selected'";
				$this->assign('select2',$select2);
			}else if($type == 3){
				$result=sp_sql_ex_paged_bykeyword($keyword,"field:id,title,excerpt,smeta;order:createtime desc",6);
				$this->assign("result",$result);
				$select3 = "selected='selected'";
				$this->assign('select3',$select3);
			}else{
				$result=sp_sql_en_paged_bykeyword($keyword,"field:id,title,summary,smeta;order:createtime desc",6);
				$this->assign("result",$result);
				$select4 = "selected='selected'";
				$this->assign('select4',$select4);
			}
		}
		//var_dump($result);
		$this -> assign("keyword", $keyword);
		$this -> assign("type",$type);

		$ad = sp_getslide('ad_article');
    	$this->assign('ad',$ad);
		
		$this -> display(":search");
    }
    
    
}
