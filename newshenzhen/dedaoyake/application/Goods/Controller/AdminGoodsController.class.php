<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Goods\Controller;
use Common\Controller\AdminbaseController;
class AdminGoodsController extends AdminbaseController {
	
	protected $ex_model;
	protected $terms_model;
	
	function _initialize() {
		parent::_initialize();
		$this->ex_model = D("Goods/Goods");
		$this->terms_model = D("Goods/Goodsterms");
		$this->ac_model = D("Common/ArticleCat");
	}
	function index(){
		$this->_lists();
		$this->_getTree();
		$this->display();
	}
	
	
	function add(){
		$select = $this->ac_model->where('cat_value = 26')->select();
		$this->assign('select_type',$select);
	 	$this->_getTermTree();
	 	$this->display();
	}
	
	function add_post(){
		//var_dump($_POST);exit;
		if (IS_POST) {
			$ex = I('post.');
			$ex['promote_start_date'] = strtotime($_POST['promote_start_date']);
			$ex['promote_end_date'] = strtotime($_POST['promote_end_date']);
			
			$ex['smeta']=json_encode($_POST['smeta']);
			$ex['add_time']=date("Y-m-d H:i:s",time());
			
			$ex['content']=htmlspecialchars_decode($_POST['content']);
			$ex['phone_content']=htmlspecialchars_decode($_POST['phone_content']);
			
			$ex['good_status'] = 1;
			
			$extend = array();
			array_push($extend,$_POST['post_extend1'],$_POST['post_extend2'],$_POST['post_extend3'],$_POST['post_extend4'],$_POST['post_extend5'],$_POST['post_extend6'],$_POST['post_extend7'],$_POST['post_extend8']);
			$ex['post_extend']=json_encode($extend);
			
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$ex['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}

			$result=$this->ex_model->add($ex);
			if ($result) {
				$this->success("添加成功！",'index');
			} else {
				$this->error("添加失败！");
			}

		}
	}
	
	function edit(){
		$id=intval(I("get.id"));
		$post=$this->ex_model->where("good_id=$id")->find();
		$terms=$this->terms_model->where("term_id=".$post['term_id'])->find();
		$this->_getTermTree($terms);

		//var_dump($post);exit;
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));

		$this->display();
	}
	
	function edit_post(){
		//print_r($_POST);exit;
		if (IS_POST) {
			$ex = I('post.');
			$ex['good_id'] = intval($_POST['good_id']);
			$ex['promote_start_date'] = strtotime($_POST['promote_start_date']);
			$ex['promote_end_date'] = strtotime($_POST['promote_end_date']);
			
			$ex['smeta']=json_encode($_POST['smeta']);
			
			$ex['content']=htmlspecialchars_decode($_POST['content']);
			$ex['phone_content']=htmlspecialchars_decode($_POST['phone_content']);
			
			$extend = array();
			array_push($extend,$_POST['post_extend1'],$_POST['post_extend2'],$_POST['post_extend3'],$_POST['post_extend4'],$_POST['post_extend5'],$_POST['post_extend6'],$_POST['post_extend7'],$_POST['post_extend8']);
			$ex['post_extend']=json_encode($extend);

			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$ex['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}
			
			//var_dump($ex);
			$result=$this->ex_model->save($ex);
			//$this->ex_model->getLastSql();
			if ($result) {
				$this->success("修改成功！");
			} else {
				$this->error("修改失败！");
			}
		}
	}
	

	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['good_status']=0;
			if ($this->ex_model->where("good_id=".$id)->save($data)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}	
		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			$data['good_status']=0;
			if ($this->ex_model->where("good_id in ($tids)")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function sale(){
		if(isset($_POST['ids']) && $_GET["sale"]){
			$data["is_on_sale"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $this->ex_model->where("good_id in ($ids)")->save($data)!==false) {
				$this->success("上架成功！");
			} else {
				$this->error("上架失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["offsale"]){
			$data["is_on_sale"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->ex_model->where("good_id in ($ids)")->save($data)) {
				$this->success("下架成功！");
			} else {
				$this->error("下架失败！");
			}
		}
	}
	function setnew(){
		if(isset($_POST['ids']) && $_GET["new"]){
			$data["is_new"]=1;
				
			$ids=join(",",$_POST['ids']);
			if ( $this->ex_model->where("good_id in ($ids)")->save($data)!==false) {
				$this->success("设置新品成功！");
			} else {
				$this->error("设置新品失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["untop"]){
				
			$data["is_new"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->ex_model->where("good_id in ($ids)")->save($data)) {
				$this->success("取消新品成功！");
			} else {
				$this->error("取消新品失败！");
			}
		}
	}
	
	function hot(){
		if(isset($_POST['ids']) && $_GET["hot"]){
			$data["is_hot"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $this->ex_model->where("good_id in ($ids)")->save($data)!==false) {
				$this->success("设置热销成功！");
			} else {
				$this->error("设置热销失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["hot"]){
			$data["is_hot"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->ex_model->where("good_id in ($ids)")->save($data)) {
				$this->success("取消热销成功！");
			} else {
				$this->error("取消热销失败！");
			}
		}
	}

	function move(){
		if(IS_POST){
			if(isset($_GET['ids']) && isset($_POST['term_id'])){
				$tids=$_GET['ids'];
				if ( $this->ex_model->where("good_id in ($tids)")->save($_POST) !== false) {
					$this->success("移动成功！");
				} else {
					$this->error("移动失败！");
				}
			}
		}else{
			$parentid = intval(I("get.parent"));
			
			$tree = new \Tree();
			$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
			$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
			$terms = $this->terms_model->order(array("path"=>"asc"))->select();
			$new_terms=array();
			foreach ($terms as $r) {
				$r['id']=$r['term_id'];
				$r['parentid']=$r['parent'];
				$new_terms[] = $r;
			}
			$tree->init($new_terms);
			$tree_tpl="<option value='\$id'>\$spacer\$name</option>";
			$tree=$tree->get_tree(0,$tree_tpl);
			 
			$this->assign("terms_tree",$tree);
			$this->display();
		}
	}
	
	function recyclebin(){
		$this->_lists(0);
		$this->_getTree();
		$this->display();
	}
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$status=$this->ex_model->where("good_id in ($ids)")->delete();
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$status=$this->ex_model->where(array("good_id"=>$id))->delete();
				if ($status!==false) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}	
		}
	}
	
	function restore(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data["good_status"]=1;
			if ($this->ex_model->where("good_id=$id")->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->ex_model);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	private  function _lists($status=1){
		$term_id=0;
		if(!empty($_REQUEST["term"])){
			$term_id=intval($_REQUEST["term"]);
			$term=$this->terms_model->where("term_id=$term_id")->find();
			$this->assign("term",$term);
			$_GET['term']=$term_id;
		}
		
		$where_ands=empty($term_id)?array("good_status=$status"):array("term_id = $term_id and good_status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"add_time","operator"=>">"),
				'end_time'  => array("field"=>"add_time","operator"=>"<"),
				'keyword'  => array("field"=>"good_name","operator"=>"like"),
		);
		if(IS_POST){
			
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		
		$where= join(" and ", $where_ands);
		//$where['post_status'] = 1;
			
		$count=$this->ex_model
		->where($where)
		->count();

		$page = $this->page($count, 20);
			
			
		$posts=$this->ex_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("good_id DESC")->select();
		//echo $posts->_sql();exit;
		//var_dump($posts);exit;
		
    	$terms = $this->terms_model->order(array("term_id = $term_id"))->getField("term_id,name",true);

    	$this->assign("terms",$terms);
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}
	
	private function _getTree(){
		$term_id=empty($_REQUEST['term'])?0:intval($_REQUEST['term']);
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$term_id==$r['term_id']?"selected":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}

	private function _getTermTree($term=array()){
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminExTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminExTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminExTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=in_array($r['term_id'], $term)?"selected":"";
			$r['checked'] =in_array($r['term_id'], $term)?"checked":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' id='meau\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		//var_dump($taxonomys);exit;
		$this->assign("taxonomys", $taxonomys);
	}
	
	
	
	
	
}