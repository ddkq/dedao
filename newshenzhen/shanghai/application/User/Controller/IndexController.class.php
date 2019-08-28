<?php

/**
 * 会员注册登录
 */
namespace User\Controller;
use Common\Controller\HomebaseController;
class IndexController extends HomebaseController {
    //登录
	public function index() {
		$id=I("get.id");
		
		$users_model=M("Users");
		
		$user=$users_model->where(array("id"=>$id))->find();
		if($user['user_type'] == 3){
			
			$doctor = get_user_doctor($id);
			$qa_all = get_user_qa_all($id);
			$qa_check = get_user_qa_check($id);
			//var_dump($qa_check);exit;
			
			$term_obj= M("Department");  		
			$terms = $term_obj->getField("term_id,name",true);  	
			$termid=$doctor['term_id'];
			$term_ids = explode(",",$termid);
			$this->assign("term_ids",$term_ids);
			$this->assign("terms",$terms);
			
			$this->assign('doctor',$doctor);
			$this->assign("qa_all",$qa_all);
			$this->assign("qa_check",$qa_check);
		}
		
		if(empty($user)){
			$this->error("查无此人！");
		}
		$this->assign($user);
		$this->display(":index");

    }
    
    function is_login(){
    	if(sp_is_user_login()){
    		$this->ajaxReturn(array("status"=>1,"user"=>sp_get_current_user()));
    	}else{
    		$this->ajaxReturn(array("status"=>0,"info"=>"此用户未登录！"));
    	}
    }

    //退出
    public function logout(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
    	session("user",null);//只有前台用户退出
    	redirect(__ROOT__."/");
    }
	
	public function logout2(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
		if(isset($_SESSION["user"])){
		$referer=$_SERVER["HTTP_REFERER"];
			session("user",null);//只有前台用户退出
			$_SESSION['login_http_referer']=$referer;
			$this->success("退出成功！",__ROOT__."/");
		}else{
			redirect(__ROOT__."/");
		}
    }

}
