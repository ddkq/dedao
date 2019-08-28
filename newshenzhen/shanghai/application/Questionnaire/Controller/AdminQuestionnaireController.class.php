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
		$this->tablesdata_model = D('Tables/TablesData');
		$this->tables_model = D('Tables/Tables');
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
		$x = $_POST['x']+1;
		$x_2 = empty($_POST['x-2']) ? 0 : $_POST['x-2']+1;
		$y = $_POST['y']+1;
		$y_2 = empty($_POST['y-2']) ? 0 : $_POST['y-2']+1;
		$id = $_POST['id'];
		$data = $this->data_model->where("q_id = $id")->select();
		$post = $this->q_model->where("id = $id")->find();
		$content = json_decode($post['content'],true);

		$y_option = $content[$y-1]['children'];
		$y2_option = $content[$y_2-1]['children'];
		$result[0]['title'][0] = 'x/y';

		$x_option = $content[$x-1]['children'];
		if(!empty($x_2)){
			
			$x2_option = $content[$x_2-1]['children'];
			$j=0;
			foreach ($x_option as $key => $value) {
				foreach ($x2_option as $k1 => $v1) {
					foreach ($y_option as $yk => $yv) {
						$result[0]['title'][$yk+1] = $yv['name'];
						$result[0]['content'][$j][0] = 0;
						$result[0]['content'][$j][$yk+1] = 0;
						$result[0]['content'][$j][$yk+2] = 0;
					}
					$result[0]['content'][$j][0] = $value['name'].'/'.$v1['name'];
					if(!empty($y_2)){
						$result[1]['title'][0] = 'x/y';
						foreach ($y2_option as $yk2 => $yv2) {
							$result[1]['title'][$yk2+1] = $yv2['name'];
							$result[1]['content'][$j][0] = 0;
							$result[1]['content'][$j][$yk2+1] = 0;
							$result[1]['content'][$j][$yk2+2] = 0;
						}
						$result[1]['title'][count($y2_option)+1] = '合计';
						$result[1]['content'][$j][0] = $value['name'].'/'.$v1['name'];
					}
					$j++;
				}
			}
			
		}else{
			$x_length = count($x_option);

			for($i=0;$i<$x_length;$i++){
				foreach ($y_option as $key => $value) {
					$result[0]['title'][$key+1] = $value['name'];
					$result[0]['content'][$i][0] = 0;
					$result[0]['content'][$i][$key+1] = 0;
					$result[0]['content'][$i][$key+2] = 0;
				}
			}
			if(!empty($y_2)){
				$result[1]['title'][0] = 'x/y';
				for($i=0;$i<$x_length;$i++){
					foreach ($y2_option as $key => $value) {
						$result[1]['title'][$key+1] = $value['name'];
						$result[1]['content'][$i][0] = 0;
						$result[1]['content'][$i][$key+1] = 0;
						$result[1]['content'][$i][$key+2] = 0;
					}
				}
				$result[1]['title'][count($y2_option)+1] = '合计';
				//$result[1][0] = array_values($result[1][0]);
			}

			foreach ($x_option as $key => $value) {
				$result[0]['content'][$key][0] = $value['name'];
				if(!empty($y_2)){
					$result[1]['content'][$key][0] = $value['name'];
				}
			}
		}
		$result[0]['title'][count($y_option)+1] = '合计';

		foreach ($data as $key => $value) {
			$data_content = json_decode($value['content']);
			foreach ($data_content as $k1 => $v1) {
				if($x == intval($v1->name)){
					foreach ($data_content as $k2 => $v2) {
						if(!empty($x_2)){
							if($x_2 == intval($v2->name)){
								foreach ($data_content as $k4 => $v4) {
									if($y == intval($v4->name)){
										$result[0]['content'][intval($v1->value) * $x2_length + intval($v2->value)][intval($v4->value)+1] += 1;
									}
									if(!empty($y_2)){
										if($y_2 == intval($v4->name)){
											$result[1]['content'][intval($v1->value) * $x2_length + intval($v2->value)][intval($v4->value)+1] += 1;
										}
									}
								}
							}	
						}else{
							if($y == intval($v2->name)){
								//$result[$y][$x.$v1->value.$y.$v2->value] += 1;
								$result[0]['content'][intval($v1->value)][intval($v2->value)+1] += 1;
								//$result[0] = array_values($result[0]);
							}
							if(!empty($y_2)){
								if($y_2 == intval($v2->name)){
									$result[1]['content'][intval($v1->value)][intval($v2->value)+1] += 1;
									//$result[1] = array_values($result[1]);
								}
							}
						}
					}
				}
			}
		}

		foreach ($result[0]['content'] as $key => $value) {
			$sum = array_sum($value);
			for ($i=1; $i<count($value) ; $i++) { 
				$result[0]['content'][$key][$i] = intval($value[$i]/$sum*100);
			}
			$result[0]['content'][$key][count($value)-1] = $sum;
		}

		if(!empty($y_2)){
			foreach ($result[1]['content'] as $key => $value) {
				$sum = array_sum($value);
				for ($i=1; $i<count($value) ; $i++) { 
					$result[1]['content'][$key][$i] = intval($value[$i]/$sum*100);
				}
				$result[1]['content'][$key][count($value)-1] = $sum;
			}
		}

		$this->ajaxReturns($result);
		

	}

	function data_lists(){
		$this->_lists2();
		$this->display();
	}

	/*数据删除*/
	function view_data_delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status'] = 0;
			if ($this->tablesdata_model->where("id = $id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}


	function view_data(){
		$id = intval(I("id"));
		$data = $this->data_model->where("u_id = $id")->find();
		$data_content = json_decode($data['content']);
		$q_id = $data['q_id'];
		$post = $this->q_model->where("id = $q_id")->find();
		$content = json_decode($post['content'],true);
		//var_dump($content);
		$this->assign('post',$post);
		$this->assign('content',$content);
		$this->assign('data_content',$data_content);
		$this->display();

	}


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


	private function _lists2(){

		$where_ands = array('tables_id = 44');

		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'keyword'  => array("field"=>"content","operator"=>"like"),
				'phone'	=> array("field"=>"content","operator"=>"like"),
				'page'	=> array("field"=>"page","operator"=>"like"),
		);
		if(IS_POST){	
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					if($param == 'keyword'){
						$get=json_encode($_POST[$param]);
					}else{
						$get=$_POST[$param];
					}
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
			
		$count=$this->tablesdata_model
		->where($where)
		->count();

		$page = $this->page($count, 20);
			
		$posts=$this->tablesdata_model->where($where)
		->limit($page->firstRow . ',' . $page->listRows)->relation(true)
		->order("createtime DESC")->select();

		//var_dump($this->tablesdata_model->getLastsql());exit;
		
		$tables = $this->tables_model->select();
		$this->assign('tables',$tables);

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}


}