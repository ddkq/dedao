<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Goods\Controller;
use Common\Controller\MemberbaseController;
class OrderController extends MemberbaseController {
	
	protected $info_model;
	protected $goods_model;
	protected $user_model;
	protected $order_goods_model;
	protected $group_model;
	
	function _initialize() {
		parent::_initialize();
		$this->info_model = D("Goods/OrderInfo");
		$this->goods_model = D("Goods/Goods");
		$this->user_model = D("Common/Users");
		$this->order_goods_model = D("Goods/OrderGoods");
		$this->group_model = D("Goods/Group");

	}
	function index(){
		$id = intval(I("get.goods_id"));
		$count = intval(I("get.count"));
		$type = intval(I("get.type"));
		$gid = intval(I("get.gid"));
		
		$goods = $this->goods_model->where("good_id = $id")->find();
		$smeta=json_decode($goods['smeta'],true);
		
		
		
		$this->assign('goods_id',$id);
		$this->assign('count',$count);
		$this->assign('type',$type);
		$this->assign('gid',$gid);
		$this->assign('goods',$goods);
		$this->assign("smeta",$smeta);
		
		$this->display();
	}
	
	function group(){
		$id = intval(I("get.goods_id"));
		$gid = intval(I("get.gid"));
		$type = intval(I("get.type"));
		
		$goods = $this->goods_model->where("good_id = $id")->find();
		$smeta=json_decode($goods['smeta'],true);
		
		$group = $this->group_model->where("group_id = $gid and status = 1")->find();
		$child = $this->group_model->where("parent = $gid and status = 1")->select();
		//var_dump($group);
		
		$comments=sp_get_comments("field:*;limit:0,5;order:createtime desc;",$where=array('post_id'=>$id));
    	$count_comment = $comments.length+1;
    	
    	$userid=sp_get_current_userid();
		
		$this->assign('goods_id',$id);
		$this->assign('gid',$gid);
		$this->assign('type',$type);
		$this->assign('goods',$goods);
		$this->assign("smeta",$smeta);
		$this->assign("group",$group);
		$this->assign("child",$child);
		$this->assign("remain",$group['group_num']-$group['having_num']);
		$this->assign("comments",$comments);
    	$this->assign("count_comment",$count_comment);
    	$this->assign("uid",$userid);
		
		$this->display();
	}
	
	
	function add(){
		if (IS_AJAX) {
			$data = array();
			//var_dump($_POST);exit;
			$type = $_POST['type'];
			$gid = $_POST['g'];
			$user_id = sp_get_current_userid();
			$user = $this->user_model->where("id = $user_id")->find();
			
			$order['order_sn'] = date("Ymdhms").sp_random_stringofnum(6);
			$order['user_id'] = $user_id;
			$order['consignee'] = $user['user_truename'];
			$order['tel'] = $user['mobile'];
			$order['goods_amount'] = $_POST['price'];
			$order['order_amount'] = $_POST['price'];
			$order['order_status'] = 1;
			$order['add_time'] = date("Y-m-d H:m:s");
			if($type == 2){
				$order['is_group'] = 1;
				$order['group_status'] = 1;
			}
			if($type == 3){
				$order['is_group'] = 1;
				$order['group_status'] = 2;
			}
			
			if ($this->info_model->create()) {
				$result=$this->info_model->add($order);
				if ($result!==false) {
					$insertId = $result;
					$order_goods['order_id'] = $insertId;
					$order_goods['goods_id'] = $_POST['id'];
					$goods = $this->goods_model->where("good_id = $order_goods[goods_id]")->find();
					$order_goods['goods_name'] = $goods['good_name'];
					$order_goods['goods_number'] = $_POST['count'];
					$order_goods['smeta'] = $goods['smeta'];
					if($type == 2){
						$order_goods['goods_price'] = $goods['group_price'];
						$group['goods_id'] = $_POST['id'];
						$group['goods_name'] = $goods['good_name'];
						$group['group_num'] = $goods['group_num'];
						$group['having_num'] = 1;
						$group['user_id'] = $user_id;
						$group['user_name'] = $user['user_nicename'];
						$group['avatar'] = $user['avatar'];
						$result2 = $this->group_model->add($group);
						$this->info_model->where("order_id=$insertId")->setField('group_id',$result2);
					}else if($type == 3){
						$order_goods['goods_price'] = $goods['group_price'];
						$group['goods_id'] = $_POST['id'];
						$group['parent'] = $gid;
						$group['goods_name'] = $goods['good_name'];
						$group['group_num'] = $goods['group_num'];
						$group['having_num'] = $goods['group_num'];
						$group['user_id'] = $user_id;
						$group['user_name'] = $user['user_nicename'];
						$group['avatar'] = $user['avatar'];
						$group['user_type'] = 1;
						$group['group_type'] = 1;
						$result2 = $this->group_model->add($group);
						$this->info_model->where("order_id=$insertId")->setField('group_id',$result2);
						$this->info_model->where("group_id=$gid")->setField('group_status',2);
						$this->group_model->where("group_id=$gid")->setInc('having_num');
						$this->group_model->where("group_id=$gid")->setField('group_type',1);
					}else{
						$order_goods['goods_price'] = $goods['shop_price'];
					}
					
					$result1 = $this->order_goods_model->add($order_goods);
					if($result1!=false){
						$data['status'] = 1;
						$data['info'] = '预约成功！';
						die(json_encode($data));	
					}
				} else {
					$data['status'] = 0;
					$data['info'] = '预约失败，清稍后重试！！';
					die(json_encode($data));
				}
			}else{
				$this->error($this->info_model->getError());
			}
		}
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
			$data['good_status']=0;
			if ($this->info_model->where("good_id=".$id)->save($data)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}	
		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			$data['good_status']=0;
			if ($this->info_model->where("good_id in ($tids)")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	
	
	

	
}