<?php

/**
 * 会员中心
 */
namespace User\Controller;
use Common\Controller\MemberbaseController;
class ProfileController extends MemberbaseController {
	
	protected $users_model;
	protected $info_model;
	protected $goods_model;
	protected $question_model;
	protected $comments_model;
	
	function _initialize(){
		parent::_initialize();
		$this->users_model=D("Common/Users");
		$this->info_model = D("Goods/OrderInfo");
		$this->goods_model = D("Goods/Goods");
		$this->question_model = D("Qa/Question");
		$this->comments_model=D("Common/Comments");
	}
	
    //编辑用户资料
	public function edit() {
		$userid=sp_get_current_userid();
		$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
    	$this->display();
    }
    
    public function edit_post() {
    	if(IS_POST){
    		$userid=sp_get_current_userid();
    		$_POST['id']=$userid;
    		if ($this->users_model->field('id,user_nicename,sex,birthday,user_url,signature')->create()) {
				if ($this->users_model->save()!==false) {
					$user=$this->users_model->find($userid);
					sp_update_current_user($user);
					$this->success("保存成功！",U("user/profile/edit"));
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($this->users_model->getError());
			}
    	}
    	
    }
    
    public function password() {
    	$userid=sp_get_current_userid();
    	$user=$this->users_model->where(array("id"=>$userid))->find();
    	$this->assign($user);
    	$this->display();
    }
    
    public function password_post() {
    	if (IS_POST) {
    		if(empty($_POST['old_password'])){
    			$this->error("原始密码不能为空！");
    		}
    		if(empty($_POST['password'])){
    			$this->error("新密码不能为空！");
    		}
    		$uid=sp_get_current_userid();
    		$admin=$this->users_model->where("id=$uid")->find();
    		$old_password=$_POST['old_password'];
    		$password=$_POST['password'];
    		if(sp_compare_password($old_password, $admin['user_pass'])){
    			if($_POST['password']==$_POST['repassword']){
    				if(sp_compare_password($password, $admin['user_pass'])){
    					$this->error("新密码不能和原始密码相同！");
    				}else{
    					$data['user_pass']=sp_password($password);
    					$data['id']=$uid;
    					$r=$this->users_model->save($data);
    					if ($r!==false) {
    						$this->success("修改成功！");
    					} else {
    						$this->error("修改失败！");
    					}
    				}
    			}else{
    				$this->error("密码输入不一致！");
    			}
    	
    		}else{
    			$this->error("原始密码不正确！");
    		}
    	}
    	 
    }
    
    
    function bang(){
    	$oauth_user_model=M("OauthUser");
    	$uid=sp_get_current_userid();
    	$oauths=$oauth_user_model->where(array("uid"=>$uid))->select();
    	$new_oauths=array();
    	foreach ($oauths as $oa){
    		$new_oauths[strtolower($oa['from'])]=$oa;
    	}
    	$this->assign("oauths",$new_oauths);
    	$this->display();
    }
    
    function avatar(){
    	$userid=sp_get_current_userid();
		$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
    	$this->display();
    }
    
    function avatar_upload(){
    	$config=array(
    			'rootPath' => './'.C("UPLOADPATH"),
    			'savePath' => './avatar/',
    			'maxSize' => 512000,//500K
    			'saveName'   =>    array('uniqid',''),
    			'exts'       =>    array('jpg', 'png', 'jpeg'),
    			'autoSub'    =>    false,
    	);
    	$driver_type = sp_is_sae()?"Sae":'Local';//TODO 其它存储类型暂不考虑
    	$upload = new \Think\Upload($config,$driver_type);//
    	$info=$upload->upload();
    	//开始上传
    	if ($info) {
    	//上传成功
    	//写入附件数据库信息
    		$first=array_shift($info);
    		$file=$first['savename'];
    		$_SESSION['avatar']=$file;
    		$this->ajaxReturn(sp_ajax_return(array("file"=>$file),"上传成功！",1),"AJAX_UPLOAD");
    	} else {
    		//上传失败，返回错误
    		$this->ajaxReturn(sp_ajax_return(array(),$upload->getError(),0),"AJAX_UPLOAD");
    	}
    }
    
    function avatar_update(){
    	if(!empty($_SESSION['avatar'])){
    		$targ_w = intval($_POST['w']);
    		$targ_h = intval($_POST['h']);
    		$x = $_POST['x'];
    		$y = $_POST['y'];
    		$jpeg_quality = 90;
    		
    		$avatar=$_SESSION['avatar'];
    		$avatar_dir=C("UPLOADPATH")."avatar/";
    		if(sp_is_sae()){//TODO 其它存储类型暂不考虑
    			$src=C("TMPL_PARSE_STRING.__UPLOAD__")."avatar/$avatar";
    		}else{
    			$src = $avatar_dir.$avatar;
    		}
    		
    		$avatar_path=$avatar_dir.$avatar;
    		
    		
    		if(sp_is_sae()){//TODO 其它存储类型暂不考虑
    			$img_data = sp_file_read($avatar_path);
    			$img = new \SaeImage();
    			$size=$img->getImageAttr();
    			$lx=$x/$size[0];
            	$rx=$x/$size[0]+$targ_w/$size[0];
            	$ty=$y/$size[1];
            	$by=$y/$size[1]+$targ_h/$size[1];
    			
    			$img->crop($lx, $rx,$ty,$by);
    			$img_content=$img->exec('png');
    			sp_file_write($avatar_dir.$avatar, $img_content);
    		}else{
    			$image = new \Think\Image();
    			$image->open($src);
    			$image->crop($targ_w, $targ_h,$x,$y);
    			$image->save($src);
    		}
    		
    		$userid=sp_get_current_userid();
    		$result=$this->users_model->where(array("id"=>$userid))->save(array("avatar"=>$avatar));
    		$_SESSION['user']['avatar']=$avatar;
    		if($result){
    			$this->success("头像更新成功！");
    		}else{
    			$this->error("头像更新失败！");
    		}
    		
    	}
    }
    
    function order(){
    	$userid=sp_get_current_userid();
    	$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
		
    	$where = array();
    	$where['user_id'] = $userid;
    	$where['status'] = 1;
			
		$count=$this->info_model->where($where)->count();
		$page = $this->page($count, 20);
		
		$posts=$this->info_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("order_id DESC")->select();
		//echo $this->info_model->getLastsql();exit;
		
		//var_dump($posts);exit;
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
    	$this->display();
    }
    
    function question(){
    	$userid=sp_get_current_userid();
    	$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
		
    	$where = array();
    	$where['author_id'] = $userid;
    	$where['isdel'] = 1;
    	
    	$count=$this->question_model->where($where)->count();
		$page = $this->page($count, 20);
		
		//$field = 'a.order_id,a.order_sn,a.user_id,a.order_status,a.consignee,a.add_time,b.goods_name,b.goods_number,b.goods_price';
		//$join = "".C('DB_PREFIX').'order_goods as b on a.order_id =b.order_id';
		$posts=$this->question_model
		//->alias("a")
		//->join($join)
		//->field($field)
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("createtime DESC")->select();
		//echo $posts->_sql();exit;
		
		//var_dump($posts);exit;
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
    	$this->display();
    	
    	
    }
    
    
    function delete_order(){
		$id=I("get.id",0,"intval");
		$uid=sp_get_current_userid();
		
		$where = array();
		$where['order_id'] = $id;
    	$where['user_id'] = $uid;
    	
		$result=$this->info_model->where($where)->setField('status', '0');
		if($result){
			$this->success("取消订单成功！");
		}else {
			$this->error("取消订单失败！");
		}
	}
    
    
    
    function comment(){
    	$id=I("get.post_id",0,"intval");
    	$goods = $this->goods_model->where("good_id = $id")->find();
    	
    	$userid=sp_get_current_userid();
    	$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
		
    	$this->assign("goods",$goods);
    	$this->assign("smeta1",json_decode($goods['smeta'],true));
    	$this->display();
    }
    
    function add_comment(){
    	//var_dump($_POST);exit;
    	
    	if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
			foreach ($_POST['photos_url'] as $key=>$url){
				$photourl=sp_asset_relative_url($url);
				$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
			}
		}
		
		$article=$_POST;

		$article['smeta']=json_encode($_POST['smeta']);
		$article['post_table'] = 'goods';
		$article['url'] = 'goods/'.$_POST['post_id'].'.html';
		$article['createtime']=date("Y-m-d H:i:s",time());
		//var_dump($article);exit;
		
		$result=$this->comments_model->add($article);
		if ($result) {
			$this->success("评论成功！",'/');
		} else {
			$this->error("评论失败！");
		}
    	
    }
    
    
}
    
