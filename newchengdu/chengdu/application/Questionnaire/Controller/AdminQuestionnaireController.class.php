<?php
namespace Questionnaire\Controller;
use Common\Controller\AdminbaseController;
use PHPExcel_IOFactory;
use PHPExcel;

class AdminQuestionnaireController extends AdminbaseController {

	protected $q_model;
	protected $data_model;

	function _initialize() {
		parent::_initialize();
		$this->q_model = M('Questionnaire');
		$this->data_model = M('QuestionnaireData');
	}

	function index(){
		$this->_lists();
		$this->display();
	}

	function add(){
		$this->display();
	}

	function add_post(){
		if(IS_POST){
			$data['title'] = $_POST['title'];
			$data['content'] = json_encode($_POST['content']);
			$data['createtime'] = date('Y-m-d h:m:i',time());
			$result = $this->q_model->add($data);
			if($result){
				$this->success("添加成功！");
			}else{
				$this->error('添加失败！');
			}	
		}
	}

	function edit(){
		$id = intval(I("get.id"));
		$post = $this->q_model->where("id = $id")->find();
		$content = json_decode($post['content'],true);
		$this->assign('id',$id);
		$this->assign("post",$post);
		$this->assign('content',$content);

		//var_dump($content);exit;
		$this->display();

	}

	function edit_post(){
		if(IS_POST){
			$id = $_POST['id'];
			$data['title'] = $_POST['title'];
			$data['content'] = json_encode($_POST['content']);
			$result = $this->q_model->where("id = $id")->save($data);
			if($result){
				$this->success("修改成功！");
			}else{
				$this->error('修改失败！');
			}	
		}
	}

	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status'] = 0;
			if ($this->q_model->where("id = $id")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}


	function data(){
		$id = intval(I("get.id"));
		$post = $this->q_model->where("id = $id")->find();
		$content = json_decode($post['content'],true);
		$data = $this->data_model->where("q_id = $id")->select();
		foreach ($data as $key => $value) {
			$data_content = json_decode($value['content']);
			foreach ($data_content as $k1 => $v1) {
				$count[$v1->name.$v1->value] += 1;
				$total[$v1->name] += 1;
			}
		}
		
		$this->assign('id',$id);
		$this->assign("post",$post);
		$this->assign('content',$content);
		$this->assign('count',$count);
		$this->assign('total',$total);
		//var_dump($data);
		//var_dump($total);exit;
		$this->display();
	}


	function analysis(){
		$id = intval(I("get.id"));
		$post = $this->q_model->where("id = $id")->find();
		$content = json_decode($post['content'],true);
		
		$this->assign('id',$id);
		$this->assign("post",$post);
		$this->display();
	}

	function problem(){
		$id = intval(I("id"));
		$post = $this->q_model->where("id = $id")->find();
		$content = json_decode($post['content'],true);
		//var_dump($post['content']);exit;
		$this->ajaxReturns($content) ;
	}

	function analysis_data(){
		//$x = $_POST['x']+1;
		//$x_2 = empty($_POST['x-2']) ? 0 : $_POST['x-2']+1;
		//$y = $_POST['y']+1;
		//$y_2 = empty($_POST['y-2']) ? 0 : $_POST['y-2']+1;
		//$id = $_POST['id'];
		$x = 1;
		$x_2 = 0;
		$y = 2;
		$y_2 = 0;
		$id = 1;
		$data = $this->data_model->where("q_id = $id")->select();
		$post = $this->q_model->where("id = $id")->find();
		$content = json_decode($post['content'],true);


/*		var_dump($content);exit;
		foreach ($content as $key => $value) {
			if(!empty($x2)){
				if($key == $x-1){
					$x_option = $value['children'];
				}
				if($key == $x-1){
					$x_option = $value['children'];
				}
			}else{
				if($key == $x-1){
					$x_option = $value['children'];
				}	
			}
			
		}*/







		foreach ($data as $key => $value) {
			$data_content = json_decode($value['content']);
			var_dump($data_content);
			foreach ($data_content as $k1 => $v1) {
				if($x == intval($v1->name)){
					foreach ($data_content as $k2 => $v2) {
						if(!empty($x_2)){
							if($x_2 == intval($v2->name)){
								foreach ($data_content as $k4 => $v4) {
									if($y == intval($v4->name)){
										$result[$y][$x.$v1->value.$x_2.$v2->value.$y.$v4->value] += 1;
									}
									if(!empty($y_2)){
										if($y_2 == intval($v4->name)){
											$result[$y_2][$x.$v1->value.$x_2.$v2->value.$y_2.$v4->value] += 1;
										}
									}
								}
							}	
						}else{
							if($y == intval($v2->name)){
								//$result[$y][$x.$v1->value.$y.$v2->value] += 1;
								$result[$y]['x'.$v1->value.'y'.$v2->value] += 1;
							}
							if(!empty($y_2)){
								if($y_2 == intval($v2->name)){
									$result[$y_2]['x'.$v1->value.'y'.$v2->value] += 1;
								}
							}
						}
					}
				}
			}
		}
		$this->ajaxReturns($result) ;
		

	}



	/*private function _lists(){
		$result = array();
		$data = $this->data_model->select();
		foreach ($data as $key => $value) {
			$content = json_decode($value['content']);
			foreach ($content as $k1 => $v1) {
				$result[$k1][$v1] +=1;
			}
		}
		//var_dump($result);exit;
		$this->assign("result",$result);

	}*/

	private  function _lists(){

		if(!empty($_REQUEST['status'])){
			$status = $_REQUEST['status'];
		}else{
			$status = 1;
		}

		$where_ands=array("status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'keyword'  => array("field"=>"title","operator"=>"like"),
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
			
		$count=$this->q_model
		->where($where)
		->count();
			
		$page = $this->page($count, 20);
			
			
		$posts=$this->q_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("createtime DESC")->select();

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}


}