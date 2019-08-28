<?php
namespace Comment\Controller;
use Common\Controller\HomebaseController;
class WidgetController extends HomebaseController{
	
	function index($table,$post_id,$params){
		$comment_model=D("Common/Comments");
		$where['post_table'] = $table;
		$where['post_id'] = $post_id;
		$where['status'] = 1;
		
		$comments=$comment_model->where($where)
		->order("createtime asc")
		->page(1,5)
		->select();
		
		$new_comments=array();
		
		$parent_comments=array();
		
		if(!empty($comments)){
			foreach ($comments as $m){
				if($m['parentid']==0){
					$new_comments[$m['id']]=$m;
				}else{
					$path=explode("-", $m['path']);
					$new_comments[$path[1]]['children'][]=$m;
				}
					
				$parent_comments[$m['id']]=$m;
			}
		}

		
		
		$data['post_table']=sp_authencode($table);
		$data['post_id']=$post_id;
		$this->assign($data);
		$this->assign("comments",$new_comments);
		$this->assign("params",$params);
		$this->assign("parent_comments",$parent_comments);
		$tpl= (isset($params['tpl'])&& !empty($params['tpl']) )?$params['tpl']:"comment";
		return $this->fetch(":$tpl");
	}
	
}