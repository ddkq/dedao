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
class AdminOrderController extends AdminbaseController {
	
	protected $info_model;
	protected $goods_model;
	protected $user_model;
	
	function _initialize() {
		parent::_initialize();
		//$this->info_model = D("Goods/Goods");
		$this->info_model = D("Goods/OrderInfo");
		$this->goods_model = D("Goods/OrderGoods");
		$this->user_model = D("Common/Users");
		

	}
	function index(){
		$this->_lists();
		$this->display();
	}
	
	
	function check(){
		$id=intval(I("get.id"));
		$post=$this->info_model->where("order_id=$id")->find();
		$user = $this->user_model->where("id=$post[user_id]")->find();
		
		$goods = $this->goods_model->where("order_id=$id")->select();
		foreach($goods as $vo){
			$goods_price += $vo['goods_number']*$vo['goods_price'];
			$market_price += $vo['goods_number']*$vo['market_price'];
		}


		//var_dump($post);exit;
		$this->assign("post",$post);
		$this->assign("user",$user);
		$this->assign("goods",$goods);
		$this->assign("goods_price",$goods_price);
		$this->assign("market_price",$market_price);

		$this->display();
	}
	
	function chance(){

		$id=intval(I("get.id"));
		$type=intval(I("get.type"));
		$result = $this->info_model->where("order_id=$id")->setField('order_status',$type);
		//echo $this->info_model->getLastSql();exit;
		if ($result) {
			$this->success("成功！");
		}else {
			$this->error("失败！");
		}
	}

	

	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status']=0;
			if ($this->info_model->where("order_id=".$id)->save($data)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}	
		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			$data['status']=0;
			if ($this->info_model->where("order_id in ($tids)")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
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
			$status=$this->info_model->where("good_id in ($ids)")->delete();
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$status=$this->info_model->where(array("good_id"=>$id))->delete();
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
			if ($this->info_model->where("good_id=$id")->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
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
		
		$where_ands=empty($term_id)?array("status=$status"):array("term_id = $term_id and status=$status");
		
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
			
		$count=$this->info_model
		->where($where)
		->count();

		$page = $this->page($count, 20);
			
			
		$posts=$this->info_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("order_id DESC")->select();
		//echo $posts->_sql();exit;
		//var_dump($posts);exit;
		
    	//$terms = $this->terms_model->order(array("term_id = $term_id"))->getField("term_id,name",true);

    	//$this->assign("terms",$terms);
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}

	
}