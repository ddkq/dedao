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
namespace Goods\Controller;
use Common\Controller\HomebaseController;
class GoodsController extends HomebaseController {
    //文章内页
    public function index() {
    	$id=intval($_GET['id']);
    	$article=sp_sql_goods($id,'');
    	//var_dump($article);exit;

    	$phone = sp_is_mobile();
    	if(empty($article)){
    	    header('HTTP/1.1 404 Not Found');
    	    header('Status:404 Not Found');
    	    if(sp_template_file_exists(MODULE_NAME."/404")){
    	        $this->display(":404");
    	    }
    	    
    	    return ;
    	}
    	
    	$termid=$article['term_id'];
    	$term_obj= M("Goodsterms");
    	$term=$term_obj->where("term_id='$termid'")->find();
    	
    	$article_id=$article['good_id'];
    	
    	$posts_model=M("Goods");
    	$posts_model->where(array('id'=>$article_id))->setInc('good_hit');
    	
    	$nows = mktime();
    	if($article['is_promote'] == 1){
    		if($nows >= $article['promote_end_date']){
    			$posts_model->where(array('id'=>$article_id))->setField('is_promote',0);
    		}
    	}
    	
    	$article_date=$article['add_time'];
    	
    	$smeta=json_decode($article['smeta'],true);
    	$extend = json_decode($article['post_extend'],true);
    	
    	$comments=sp_get_comments("field:*;limit:0,5;order:createtime desc;",$where=array('post_id'=>$article_id));
    	$count_comment = count($comments);
    	
    	$group = sp_get_group($article_id);
    	//var_dump($group);

    	$this->assign('article',$article);
    	$this->assign("smeta",$smeta);
    	$this->assign("extend",$extend);
    	$this->assign("termid",$term_ids);
    	$this->assign("term",$term);
    	$this->assign("terms",sp_get_child_terms(2));
    	$this->assign("article_id",$article_id);
    	$this->assign("hots",sp_get_hots());
    	$this->assign("comments",$comments);
    	$this->assign("count_comment",$count_comment);
    	$this->assign("group",$group);

    	
    	
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
    	//echo $tplname;exit;
    	$this->display(":$tplname");	
    	
    }
}
