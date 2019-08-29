<?php
namespace Job\Controller;
use Common\Controller\AdminbaseController;
class AdminJobController extends AdminbaseController {

	protected $job_model;
	protected $job_post_model;
	protected $job_welfare_model;
	protected $job_contact_model;
	protected $job_welfare_relationships_model;

	public function _initialize(){
		parent::_initialize();
		$this->job_model = D("Job/Job");
		$this->job_post_model = D("Job/JobPost");
		$this->job_welfare_model = D("Job/JobWelfare");
		$this->job_contact_model = D("Job/JobContact");
		$this->job_welfare_relationships_model = D('Job/JobWelfareRelationships');
	}

	public function index(){
		$result = $this->job_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = ' <a href="' . U("AdminJob/edit", array("id" => $r['job_id'])) . '">'.L('EDIT').'</a> | <a href="' . U("AdminJob/set", array("id" => $r['job_id'])) . '">'.L('EDITPOST').'</a>  | <a class="js-ajax-delete" href="' . U("AdminJob/delete", array("id" => $r['job_id'])) . '">'.L('DELETE').'</a> ';
			$url="/job/".$r['job_id'].".html";
			$r['url'] = $url;
			$r['id']=$r['job_id'];
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
	 	$jobs = $this->job_model->order(array("path"=>"asc"))->select();
	 	
	 	$new_jobs=array();
	 	foreach ($jobs as $r) {
	 		$r['id']=$r['job_id'];
	 		$r['parentid']=$r['parent'];
	 		$r['selected']= (!empty($parentid) && $r['job_id']==$parentid)? "selected":"";
	 		$new_jobs[] = $r;
	 	}
	 	$tree->init($new_jobs);
	 	$tree_tpl="<option value='\$id' \$selected>\$spacer\$name</option>";
	 	$tree=$tree->get_tree(0,$tree_tpl);
	 	
	 	$this->assign("jobs_tree",$tree);
	 	$this->assign("parent",$parentid);
	 	$this->display();
	}

	function add_post(){
		if (IS_POST) {
			if ($this->job_model->create()) {
				if ($this->job_model->add()!==false) {
					$this->success("添加成功！",U("AdminJob/index"));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->job_model->getError());
			}
		}
	}

	function edit(){
		$id = intval(I("get.id"));
		$data=$this->job_model->where(array("job_id" => $id))->find();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$jobs = $this->job_model->where(array("job_id" => array("NEQ",$id), "path"=>array("notlike","%-$id-%")))->order(array("path"=>"asc"))->select();
		
		$new_jobs=array();
		foreach ($jobs as $r) {
			$r['id']=$r['job_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$data['parent']==$r['job_id']?"selected":"";
			$new_jobs[] = $r;
		}
		
		$tree->init($new_jobs);
		$tree_tpl="<option value='\$id' \$selected>\$spacer\$name</option>";
		$tree=$tree->get_tree(0,$tree_tpl);
		
		$this->assign("jobs_tree",$tree);
		$this->assign("data",$data);
		$this->display();
	}
	
	function edit_post(){
		if (IS_POST) {
			$_POST['validity_data'] = strtotime($_POST['validity_data']);
			if ($this->job_model->create()) {
				if ($this->job_model->save()!==false) {
					$this->success("修改成功！");
				} else {
					$this->error("修改失败！");
				}
			} else {
				$this->error($this->job_model->getError());
			}
		}
	}

	function set(){
		$id = intval(I("get.id"));
		$job = $this->job_model->where("job_id=$id")->find();
		$post=$this->job_post_model->relation(true)->where("job_id=$id")->find();
		
		if(!empty($post['welfare'])){
			foreach ($post['welfare'] as $key => $value) {
				$welfare_ids .= $value['welfare_id'] .',';
			}
			$this->assign('welfare_ids',$welfare_ids);
		}
		
		$welfare = $this->job_welfare_model->select();
		$contact = $this->job_contact_model->select();
		$this->assign("job",$job);
		$this->assign("post",$post);
		$this->assign("welfare_list",$welfare);
		$this->assign("contact_list",$contact);
		$this->display();
	}
	
	function set_post(){
		if (IS_POST) {
			
			$job_id = intval($_POST['job_id']);
			$post_id = intval($_POST['id']);
			$post = I('post.');
			$post['id'] = intval($_POST['id']);
			$post['job_id'] = intval($_POST['job_id']);
			$post['info']=json_encode($_POST['info']);
			$post['validity_data'] = strtotime($_POST['validity_data']);
			$post['respon']=htmlspecialchars_decode($_POST['respon']);
			$post['resquest']=htmlspecialchars_decode($_POST['resquest']);
			$post['etc']=htmlspecialchars_decode($_POST['etc']);
			$is_real = $this->job_post_model->where("job_id=$job_id")->find();
			if(empty($is_real)){
				$result=$this->job_post_model->add($post);
				if(!empty($_POST['ids'])){
					$this->set_relationship($result,$_POST['ids']);
				}
				if($post['validity_data'] <= time()){
					$this->job_model->where("job_id=$job_id")->setField('status',0);
				}else{
					$this->job_model->where("job_id=$job_id")->setField('status',1);
				}
			}else{
				//var_dump($_POST);exit;
				$result=$this->job_post_model->save($post);
				if(!empty($_POST['ids'])){
					$this->set_relationship($post_id,$_POST['ids']);
				}
				if($post['validity_data'] <= time()){
					$this->job_model->where("job_id=$job_id")->setField('status',0);
				}else{
					$this->job_model->where("job_id=$job_id")->setField('status',1);
				}
			}
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}

	function set_relationship($id,$ids){
		$this->job_welfare_relationships_model->where("post_id = $id")->delete();
		foreach ($ids as $vo){
			$this->job_welfare_relationships_model->add(array("post_id"=>$id,"welfare_id"=>$vo));
		}
	}



	//排序
	public function listorders() {
		$status = parent::_listorders($this->job_model);
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
		$count = $this->job_model->where(array("parent" => $id))->count();
		
		if ($count > 0) {
			$this->error("该菜单下还有子类，无法删除！");
		}
		
		if ($this->job_model->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}



}