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
class AdminGoodsTermController extends AdminbaseController {
	
	protected $exterms_model;
	protected $taxonomys=array("article"=>"文章","picture"=>"图片");
	
	function _initialize() {
		parent::_initialize();
		$this->exterms_model = D("Goods/Goodsterms");
		$this->assign("taxonomys",$this->taxonomys);
	}
	function index(){
		$result = $this->exterms_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminGoodsTerm/add", array("parent" => $r['term_id'])) . '">'.L('ADD_SUB_CATEGORY').'</a> | <a href="' . U("AdminGoodsTerm/edit", array("id" => $r['term_id'])) . '">'.L('EDIT').'</a> | <a class="js-ajax-delete" href="' . U("AdminGoodsTerm/delete", array("id" => $r['term_id'])) . '">'.L('DELETE').'</a> ';
			$url="/goodsterms/".$r['term_id'].".html";
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
	    			<td>\$taxonomys</td>
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
	 	$terms = $this->exterms_model->order(array("path"=>"asc"))->select();
	 	
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
		if (IS_POST) {
			if ($this->exterms_model->create()) {
				if ($this->exterms_model->add()!==false) {
				    F('all_terms',null);
					$this->success("添加成功！",U("AdminGoodsTerm/index"));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->exterms_model->getError());
			}
		}
	}
	
	function edit(){
		$id = intval(I("get.id"));
		$data=$this->exterms_model->where(array("term_id" => $id))->find();
		//var_dump($data);exit;
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$terms = $this->exterms_model->where(array("term_id" => array("NEQ",$id), "path"=>array("notlike","%-$id-%")))->order(array("path"=>"asc"))->select();
		
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
		$this->display();
	}
	
	function edit_post(){
		if (IS_POST) {
			if ($this->exterms_model->create()) {
				if ($this->exterms_model->save()!==false) {
				    F('all_terms',null);
					$this->success("修改成功！");
				} else {
					$this->error("修改失败！");
				}
			} else {
				$this->error($this->exterms_model->getError());
			}
		}
	}
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->exterms_model);
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
		$count = $this->exterms_model->where(array("parent" => $id))->count();
		
		if ($count > 0) {
			$this->error("该菜单下还有子类，无法删除！");
		}
		
		if ($this->exterms_model->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	
}