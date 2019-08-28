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

    	$breadcrumb = breadcrumb($term_id);
    	$this->assign('breadcrumb',$breadcrumb);

    	if($term['parent'] == 0){
    		$this->frist_lists($term_id);
    	}
    	if($term['parent'] == 62){
    		$this->second_lists($term_id);
    	}
    	if(strlen($term['path']) > 4){
    		$this->last_lists($term_id);
    	}

    	
    	$this->assign('cat_id', intval($_GET['id']));
    	$this->display(":$tplname");
	}

	/*一级列表用*/
	public function frist_lists($term_id){
		$ad = sp_getslide('ad_article');
    	$this->assign('ad',$ad);
    	$adv = sp_getslide('information_adv');
    	$this->assign('adv',$adv);
	}

	/*二级列表用*/
	public function second_lists($term_id){

    	if($term_id == 4){
    		$case_where['select'] = 2;
    		$case_where['recommended'] = 1;
	    	$case_where['term_id'] = 174;
	    	$case = sp_sql_posts('field:tid,post_title,smeta,post_extend;',$case_where);
	    	//var_dump($case);exit;
	    	$this->assign('case',$case);
    	}
    	

    	$doctor = sp_get_doctor();
    	$i = 0;
    	foreach ($doctor as $k => $v) {
    		if($i >= 5){
    			unset($doctor[$k]);
    		}else{
	    		if($v['recommended'] == 0){
	    			unset($doctor[$k]);
	    		}else{
	    			$extend = json_decode($v['post_extend'],true);
	    			$doctor[$k]['main_img'] = $extend['thumb'];
	    			$doctor[$k]['experience'] = explode(",",$extend['post_extend5']);
	    			$doctor[$k]['item'] = $extend['post_extend1'];
	    			$i++;
	    		}	
    		}
    	}
    	$this->assign('doctor',$doctor);

    	$term_child = sp_get_child_terms($term_id);
	    $this->assign('term_child',$term_child);

    	$phone = sp_is_mobile();
    	if($phone){
    		foreach($term_child as $item){
				$catIDS[]=$item['term_id'];
			}

    		$art_where['b.recommended'] = 1;
    		$art_where['c.term_id'] = array('in',$catIDS);

    		$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';
			$join2= "".C('DB_PREFIX').'terms as c on a.term_id = c.term_id';
    		$tab_text = M("TermRelationships")->alias("a")->join($join)->join($join2)->field('a.tid,b.post_title,c.name,c.term_id,b.post_excerpt,b.link_type,b.post_url,b.post_modified')->where($art_where)->order('rand()')->limit('0,3')->select();

    		
    	}else{
	    	$tab_text = array();
	    	$pic_where['recommended'] = 1;
	    	$pic_where['recommended_type'] = 42;
	    	$art_where['recommended'] = 0;
	    	$art_where['recommended_type']  = array('neq',42);
	    	foreach ($term_child as $key => $value) {
	    		$pic_where['term_id'] = $value['term_id'];
	    		$art_where['term_id'] = $value['term_id'];
	    		$tab_text[$key]['pic_recommend'] = sp_sql_posts('field:tid,smeta,link_type,post_url;',$pic_where);
	    		$tab_text[$key]['art_recommend'] = sp_sql_posts('field:tid,post_title,post_excerpt,link_type,post_url,post_modified;order:post_date desc',$art_where);
	    		$tab_text[$key]['question'] = sp_get_qa_by_article_term_id($term_id);
	    	}
	    		
    	}
		$this->assign('tab_text',$tab_text);
    	
	}

	/*3级以下调用*/
	public function last_lists($term_id){
		$ad = sp_getslide('ad_article');
    	$this->assign('ad',$ad);

    	$gr_where['recommended'] = 1;
    	$gr_where['recommended_type'] = 42;
    	$gr_recommend = sp_sql_post_where($term_id,'field:tid,post_title,post_excerpt,smeta,link_type,post_url;order:post_date desc',$gr_where);
    	$gr_recommend['smeta'] = json_decode($gr_recommend['smeta'],true);
    	$this->assign('gr_recommend',$gr_recommend);

		$tag = "field:tid,post_title,post_excerpt,smeta,post_hits,post_modified,link_type,post_url,post_murl,post_extend;order:post_modified desc";
		$list=sp_sql_posts_paged_bycatid($_GET['id'],$tag,8,"{first}{prev}{list}{next}");
    	$this->assign('list',$list);
	}
}
