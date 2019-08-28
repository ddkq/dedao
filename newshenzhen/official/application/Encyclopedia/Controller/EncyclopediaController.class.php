<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
/**
 * 经验内页
 */
namespace Encyclopedia\Controller;
use Common\Controller\HomebaseController;
class EncyclopediaController extends HomebaseController {
    //百科内页
    public function index() {
    	$id=intval($_GET['id']);
    	$article=sp_en_post($id,'');
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
	    	$termid = $article['term_id'];
	    	$article_id = $article['id'];
	    	
	    	$posts_model = M("Encyclopedia");
	    	$posts_model->save(array("id"=>$article_id,"hit"=>array("exp","hit+1")));
	    	 
	    	$breadcrumb = breadcrumb($termid,true);
            $this->assign('breadcrumb',$breadcrumb);

            $ad = sp_getslide('ad_article');
            $this->assign('ad',$ad);
	    	
	    	$smeta = json_decode($article['smeta'],true);
	    	$step = json_decode($article['step'],true);
	    	$info = json_decode($article['info'],true);
            //$info[0]['content'] = explode("|",$info[0]['content']);
            $extend = json_decode($article['post_extend'],true);

	    	$this->assign($article);
	    	$this->assign("smeta",$smeta);
	    	$this->assign("info",$info);
	    	$this->assign("step",$step);
            $this->assign("extend",$extend);

	    	$this->assign("article_id",$article_id);
	    	
	    	
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
	    	$tplname=sp_get_apphome_tpl($tplname, "article");
	    	$this->display(":$tplname");	
    	}
    	
    }
    
    
    //百科列表
	public function enlist() {
		$id = $_GET['id'];
		$term=sp_get_en_term($id);
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

        $this->assign($term);

        $breadcrumb = breadcrumb($id,true);
        $this->assign('breadcrumb',$breadcrumb);

        $ad = sp_getslide('ad_article');
        $this->assign('ad',$ad);
    	
        $tag = "field:id,title,summary,smeta;order:createtime desc";
        $list=sp_sql_en_paged_bycatid($_GET['id'],$tag,6,"{first}{prev}{list}{next}");
        $this->assign('list',$list);
        
    	
    	$this->assign('cat_id', intval($id));
    	$this->display(":$tplname");
	}
    
    
    
    public function do_support(){
    	$this->check_login();
    	$id=intval($_GET['id']);
    	$posts_model=M("Encyclopedia");
    	$can_like=sp_check_user_action("suppot$id",1);
    	
    	if($can_like){
    		$posts_model->where("id=".$id)->setInc('suppot');
    		$this->success("感谢支持！");
    	}else{
    		$this->error("您已支持过啦！");
    	}
    }
    
    public function do_against(){
    	$this->check_login();
    	$id=intval($_GET['id']);
    	$posts_model=M("Encyclopedia");
    	$can_like=sp_check_user_action("against$id",1);
    	
    	if($can_like){
    		$posts_model->where("id=".$id)->setInc('against');
    		$this->success("....！");
    	}else{
    		$this->error("您已吐槽过啦！");
    	}
    }
}
