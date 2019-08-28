<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
/**
 * qa文章内页
 */
namespace Qa\Controller;
use Common\Controller\HomebaseController;
class QaController extends HomebaseController {
    //qa文章内页
    public function index() {
    	//$a = update_seo();exit;
    	$id=intval($_GET['id']);
    	$question=sp_qusetion_post($id,'');
    	$answer=sp_answer_post($id,'');
    	
    	if(empty($question)){
    	    header('HTTP/1.1 404 Not Found');
    	    header('Status:404 Not Found');
    	    if(sp_template_file_exists(MODULE_NAME."/404")){
    	        $this->display(":404");
    	    }
    	    return ;
    	}
    	$termid=$question['term_id'];
    	$term_obj= M("Qaterms");
    	$term=$term_obj->where("term_id='$termid'")->find();
    	
        $breadcrumb = breadcrumb($termid,true);
        $this->assign('breadcrumb',$breadcrumb);
        $ad = sp_getslide('ad_article');
        $this->assign('ad',$ad);
    	
    	$question_id=$question['id'];

        $doctor = sp_get_doctor();
        foreach ($answer as $key => $value) {
            foreach ($doctor as $k2 => $v2) {
                if($v2['post_author'] == $value['author_id']){
                    $answer[$key]['doctor'] = $v2;
                }
            }
        }


        $this->assign("question",$question);
        $this->assign("answer",$answer);
        $smeta = json_decode($question['smeta'],true);
        $this->assign('smeta',$smeta);
    	
    	$rs= M("Question");
    	$related = $rs->where("term_id='$termid' and id<>'$question_id' and isdel=1")->select();
    	$article = sp_qa_post($termid,'field:tid,post_title,link_type,post_url');

    	$this->assign("related",$related);
    	$this->assign("article",$article);

    	$this->assign("term",$term);
    	$this->assign("question_id",$question_id);

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
    
    
    //问答列表
	public function qalist() {
		$id = $_GET['id'];
		$term=sp_get_question_term($id);

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

        $breadcrumb = breadcrumb($id,true);
        $this->assign('breadcrumb',$breadcrumb);

        $ad = sp_getslide('ad_article');
        $this->assign('ad',$ad);

    	$allterm = sp_get_question_child_terms(28);
    	$this->assign('allterm',$allterm);
    	
    	$childterm = sp_get_question_child_terms($id);
    	if(empty($childterm)){
    		$childterm = sp_get_question_child_terms($term[parent]);
    	}
    	$this->assign('childterm',$childterm);
    	
    	$allquestion = sp_question_posts_paged_bycatid($id,'field:id,title,answer_num;order:status desc',20,"{first}{prev}{list}{next}");
    	$this->assign('allquestion',$allquestion);
    	
    	$zeroquestion = sp_question_posts_paged_bycatid($id,'field:id,title,answer_num;where:answer_num=0;order:status desc',20,"{first}{prev}{list}{next}");
    	$this->assign('zeroquestion',$zeroquestion);
    	
    	$solvequestion = sp_question_posts_paged_bycatid($id,'field:id,title,answer_num;where:status=1;order:status desc',20,"{first}{prev}{list}{next}");
    	$this->assign('solvequestion',$solvequestion);
    	
    	$this->assign($term);
    	$this->assign('cat_id', intval($id));
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
