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
namespace Experience\Controller;
use Common\Controller\HomebaseController;
class ExperienceController extends HomebaseController {
    //经验内页
    public function index() {
    	$id=intval($_GET['id']);
    	$article=sp_ex_post($id,'');
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
            $term_obj= M("Exterms");
            $term=$term_obj->where("term_id='$termid'")->find();
            //var_dump($term);exit;

            $article_id=$article['id'];
            
            $posts_model=M("Experience");
            $posts_model->save(array("id"=>$article_id,"hit"=>array("exp","hit+1")));
            
            $breadcrumb = breadcrumb($termid,true);
            $this->assign('breadcrumb',$breadcrumb);

            $ad = sp_getslide('ad_article');
            $this->assign('ad',$ad);
            
            $smeta=json_decode($article['smeta'],true);
            $excerpt=json_decode($article['excerpt'],true);
            $tool=json_decode($article['tool'],true);
            $step=json_decode($article['step'],true);
            $attention = json_decode($article['attention'],true);
            
            $this->assign($article);
            $this->assign("smeta",$smeta);
            $this->assign("excerpt",$excerpt);
            $this->assign("tool",$tool);
            $this->assign("step",$step);
            $this->assign("attention",$attention);
            $this->assign("term",$term);
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
    
    
    public function step(){
    	$id=intval($_GET['id']);
    	$article=sp_ex_post($id,'');
    	if(empty($article)){
    	    header('HTTP/1.1 404 Not Found');
    	    header('Status:404 Not Found');
    	    if(sp_template_file_exists(MODULE_NAME."/404")){
    	        $this->display(":404");
    	    }
    	    return ;
    	}
    	$termid=$article['term_id'];
    	$term_obj= M("Exterms");
    	$term=$term_obj->where("term_id='$termid'")->find();
    	
    	$article_id=$article['id'];
    	
    	$posts_model=M("Experience");
    	$posts_model->save(array("id"=>$article_id,"hit"=>array("exp","hit+1")));
    	
    	$article_date=$article['createtime'];
    	
    	$next=$posts_model->where(array("createtime"=>array("egt",$article_date), "id"=>array('neq',$id), "post_status"=>1,'term_id'=>$termid))->order("createtime asc")->find();
    	$prev=$posts_model->where(array("createtime"=>array("elt",$article_date), "id"=>array('neq',$id), "post_status"=>1,'term_id'=>$termid))->order("createtime desc")->find();
    	
    	 
    	$this->assign("next",$next);
    	$this->assign("prev",$prev);
    	
    	$smeta=json_decode($article['smeta'],true);
    	$excerpt=json_decode($article['excerpt'],true);
    	$tool=json_decode($article['tool'],true);
    	$step=json_decode($article['step'],true);
    	$attention = json_decode($article['attention'],true);
    	
    	//var_dump($article);
    	//var_dump($attention);
    	
    	$this->assign("article",$article);
    	$this->assign("smeta",$smeta);
    	$this->assign("excerpt",$excerpt);
    	$this->assign("tool",$tool);
    	$this->assign("step",$step);
    	$this->assign("attention",$attention);
    	$this->assign("term",$term);
    	$this->assign("article_id",$article_id);
    	
    	//$tplname = 'article_serve-answer';
    	//$tplname=$term["one_tpl"];
    	//$tplname=sp_get_apphome_tpl($tplname, "article");
    	$this->display(":step");
    }
    
    //百科列表
	public function exlist() {
		$cid = intval($_GET['id']);
		$term=sp_get_ex_term($_GET['id']);
		
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

        $ad = sp_getslide('ad_article');
        $this->assign('ad',$ad);

        $breadcrumb = breadcrumb($cid,true);
        $this->assign('breadcrumb',$breadcrumb);
        
        $tag = "field:id,title,excerpt,smeta;order:createtime desc";
        $list = sp_ex_posts_paged_bycatid($cid,$tag,6,"{first}{prev}{list}{next}");
        //var_dump($list);
       // var_dump(json_decode($list['posts']['0']['excerpt'],true));exit;
        $this->assign($term);
        $this->assign('list',$list);
        $this->assign('cat_id',$cid );
		
    	$tplname=sp_get_apphome_tpl($tplname, "list");
    	$this->display(":$tplname");
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
