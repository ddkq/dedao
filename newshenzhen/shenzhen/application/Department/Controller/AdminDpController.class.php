<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Department\Controller;
use Common\Controller\AdminbaseController;
class AdminDpController extends AdminbaseController {
	
	protected $department_model;
	protected $department_post_model;
	
	function _initialize() {
		parent::_initialize();
		$this->department_model = D("Department/Department");
		$this->department_post_model = D("Department/DepartmentPost");
	}
	function index(){
		$result = $this->department_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="'.U("AdminDp/set",array("id" => $r['term_id'])).'">编辑详情</a> | <a href="' . U("AdminDp/edit", array("id" => $r['term_id'])) . '">'.L('EDIT').'</a> | <a class="js-ajax-delete" href="' . U("AdminDp/delete", array("id" => $r['term_id'])) . '">'.L('DELETE').'</a> ';
			$url="/department/".$r['term_id'].".html";
			$r['url'] = $url;
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$array[] = $r;
		}
		
		$tree->init($array);
		$str = "<tr>
					<td><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input input-order'></td>
					<td>\$id</td>
					<td>\$spacer <a href='\$url' target='_blank'>\$name</a></td>

					<td>\$str_manage</td>
				</tr>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
		$this->display();
	}
	
	
	function add(){
	 	$parentid = intval(I("get.parent"));
	 	$tree = new \Tree();
	 	$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
	 	$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
	 	$terms = $this->department_model->order(array("path"=>"asc"))->select();
	 	
	 	$new_terms=array();
	 	foreach ($terms as $r) {
	 		$r['id']=$r['term_id'];
	 		$r['parentid']=$r['parent'];
	 		$r['selected']= (!empty($parentid) && $r['term_id']==$parentid)? "selected":"";
	 		$new_terms[] = $r;
	 	}
	 	$tree->init($new_terms);
	 	$tree_tpl="<option value='\$id' \$selected>\$spacer\$name</option>";
	 	$tree=$tree->get_tree(0,$tree_tpl);
	 	
	 	$this->assign("terms_tree",$tree);
	 	$this->assign("parent",$parentid);
	 	$this->display();
	}
	
	function add_post(){
		//var_dump($_POST);exit;
		$dp = I('post.');
		$dp['sick']=json_encode($_POST['sick']);
		if ($this->department_model->create()) {
			$result=$this->department_model->add($dp);
			if ($result) {
				$this->success("添加成功！",'index');
			} else {
				$this->error("添加失败！");
			}
		} else {
			$this->error($this->department_model->getError());
		}
	}
	
	function edit(){
		$id = intval(I("get.id"));
		$data=$this->department_model->where(array("term_id" => $id))->find();
		$sick = json_decode($data[sick],true);
		//var_dump($sick);exit;
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$terms = $this->department_model->where(array("term_id" => array("NEQ",$id), "path"=>array("notlike","%-$id-%")))->order(array("path"=>"asc"))->select();
		
		$new_terms=array();
		foreach ($terms as $r) {
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$data['parent']==$r['term_id']?"selected":"";
			$new_terms[] = $r;
		}
		
		$tree->init($new_terms);
		$tree_tpl="<option value='\$id' \$selected>\$spacer\$name</option>";
		$tree=$tree->get_tree(0,$tree_tpl);
		
		$this->assign("terms_tree",$tree);
		$this->assign("data",$data);
		$this->assign("sick",$sick);
		$this->display();
	}
	
	function edit_post(){
		$dp = I('post.');
		$dp['sick']=json_encode($_POST['sick']);
		if ($this->department_model->create()) {
			if ($this->department_model->save($dp)!==false) {
			    F('all_terms',null);
				$this->success("修改成功！");
			} else {
				$this->error("修改失败！");
			}
		} else {
			$this->error($this->department_model->getError());
		}
	}
	
	
	function set(){
		$term_id = intval(I("get.id"));
		$term=$this->department_model->where("term_id=$term_id")->find();
		$post=$this->department_post_model->where("term_id=$term_id")->find();
		//var_dump($term_id);
		$this->assign("term",$term);
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		$this->display();
	}
	
	function set_post(){
		if (IS_POST) {
			//var_dump($_POST);exit;

			$post_id=intval($_POST['post']['id']);
			
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}
			//$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			//var_dump($_POST['smeta']['thumb']);
			//var_dump($_POST['post']);
			unset($_POST['post']['post_author']);
			$article=I("post.post");
			$article['smeta']=json_encode($_POST['smeta']);
			$article['post_content']=htmlspecialchars_decode($article['post_content']);
			$article['post_phone']=htmlspecialchars_decode($article['post_phone']);
			$extend = array();
			array_push($extend,$_POST['post_extend1'],$_POST['post_extend2'],$_POST['post_extend3'],$_POST['post_extend4'],$_POST['post_extend5'],$_POST['post_extend6'],$_POST['post_extend7'],$_POST['post_extend8']);
			$article['post_extend']=json_encode($extend);
			//var_dump($article);exit;
			
			$is_real = $this->department_post_model->where("id=$post_id")->find();
			//echo $this->department_post_model->getLastSql();exit;
			//var_dump(empty($is_real));exit;
			if(empty($is_real)){
				$result=$this->department_post_model->add($article);
			}else{
				$result=$this->department_post_model->save($article);
			}
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->department_model);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	/**
	 *  删除
	 */
	public function delete() {
		$id = intval(I("get.id"));
		$count = $this->department_model->where(array("parent" => $id))->count();
		
		if ($count > 0) {
			$this->error("该菜单下还有子类，无法删除！");
		}
		
		if ($this->department_model->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	
}