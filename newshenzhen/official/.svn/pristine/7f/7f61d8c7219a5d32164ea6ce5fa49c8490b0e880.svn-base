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
namespace Portal\Controller;
use Common\Controller\HomebaseController;
class ArticleController extends HomebaseController {
    //文章内页
    public function index() {
    	$id=intval($_GET['id']);
    	$article=sp_sql_post($id,'');
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
	    	$term_obj= M("Terms");
	    	$term=$term_obj->where("term_id='$termid'")->find();

	    	$breadcrumb = breadcrumb($termid);
    		$this->assign('breadcrumb',$breadcrumb);
	    	
	    	$article_id=$article['object_id'];
	    	
	    	$posts_model=M("Posts");
	    	$posts_model->save(array("id"=>$article_id,"post_hits"=>array("exp","post_hits+1")));
	    	
	    	$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';
	    	$join2= "".C('DB_PREFIX').'users as c on b.post_author = c.id';
	    	$rs= M("TermRelationships");
	    	
	    	$next=$rs->alias("a")->join($join)->join($join2)->where(array("a.object_id"=>array("egt",$article_id), "tid"=>array('neq',$id), "status"=>1,'term_id'=>$termid))->order("a.tid asc")->find();
	    	$prev=$rs->alias("a")->join($join)->join($join2)->where(array("a.object_id"=>array("elt",$article_id), "tid"=>array('neq',$id), "status"=>1,'term_id'=>$termid))->order("a.tid desc")->find();
	    	$recommend = $rs->alias("a")->join($join)->join($join2)->where("b.recommended = 1")->limit(5)->select();
	    	$this->assign("next",$next);
	    	$this->assign("prev",$prev);
	    	$this->assign("recommend",$recommend);
	    	
	    	$smeta=json_decode($article['smeta'],true);
	    	$content_data=sp_content_page($article['post_content']);
	    	$article['post_content']=$content_data['content'];

	    	$year = date('Y',strtotime($article['post_modified']));
	    	$month = date('m/d',strtotime($article['post_modified']));
	    	$hour = date('h:i',strtotime($article['post_modified']));

	    	$this->assign('year',$year);
	    	$this->assign('month',$month);
	    	$this->assign('hour',$hour);

	    	$this->assign("page",$content_data['page']);
	    	$this->assign('article',$article);
	    	$this->assign("smeta",$smeta);
	    	$this->assign("term",$term);
	    	$this->assign("article_id",$article_id);

	    	$rw['recommended'] == 1; 
	   		$recommended = 
	    	
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
    	$this->check_login();
    	
    	$id=intval($_GET['id']);//posts表中id
    	
    	$posts_model=M("Posts");
    	
    	$can_like=sp_check_user_action("posts$id",1);
    	
    	if($can_like){
    		$posts_model->save(array("id"=>$id,"post_like"=>array("exp","post_like+1")));
    		$this->success("赞好啦！");
    	}else{
    		$this->error("您已赞过啦！");
    	}
    	
    }
}
