<?php
namespace Comment\Controller;
use Common\Controller\HomebaseController;
class CommentController extends HomebaseController{
	
	protected $users_model;
	protected $comments_model;
	
	function _initialize() {
		parent::_initialize();
		$this->users_model=D("Common/Users");
		$this->comments_model=D("Common/Comments");
	}
	
	function index(){

		if(IS_AJAX){
			//var_dump($_POST);exit;
			$page = intval($_POST['page']);

			$where['post_table'] = "posts";
			$where['post_id'] = intval($_POST['aid']);
			$where['status'] = 1;
			$where['isde'] = 1;

			$count = $this->comments_model->where($where)->count();
			$pages = $this->page($count,5);

			$comments=$this->comments_model->where($where)
			->field("createtime,full_name,id,comment_like,content")
			->order("createtime asc")
			->limit(25)
			->page($page,5)
			->select();

			$comments[0]['page_count'] = intval($pages->Total_Pages);

			$this->ajaxReturns($comments,"JSON");
		}
	}
	
	function post(){

		if(C("COMMENT_ALLOW_ANONYMOUS")){

			if (IS_POST){

				if(!sp_check_verify_code()){
					$this->error("验证码错误！");
				}else{
					
					$url=parse_url(urldecode($_POST['url']));
					$query=empty($url['query'])?"":"?{$url['query']}";
					$url="{$url['scheme']}://{$url['host']}{$url['path']}$query";

					$_POST['url']=sp_get_relative_url($url);
					
					if(isset($_SESSION["user"])){//用户已登陆,且是本站会员
						$uid=$_SESSION["user"]['id'];
						$_POST['uid']=$uid;
						$users_model=M('Users');
						$user=$users_model->field("user_login,user_email,user_nicename")->where("id=$uid")->find();
						$username=$user['user_login'];
						$user_nicename=$user['user_nicename'];
						$email=$user['user_email'];
						$_POST['full_name']=empty($user_nicename)?$username:$user_nicename;
						$_POST['email']=$email;
					}else{
						$_POST['uid']=999;
						//$_POST['full_name']='游客';
						$_POST['email']='';
					}
					
					if(C("COMMENT_NEED_CHECK")){
						$_POST['status']=0;//评论审核功能开启
					}else{
						$_POST['status']=1;
					}
					if ($this->comments_model->create()){
						$this->check_last_action(intval(C("COMMENT_TIME_INTERVAL")));
						$result=$this->comments_model->add();
						if ($result!==false){
							
							//评论计数
							$post_table=ucwords(str_replace("_", " ", $post_table));
							$post_table=str_replace(" ","",$post_table);
							$post_table_model=M($post_table);
							$pk=$post_table_model->getPk();
							
							$post_table_model->create(array("comment_count"=>array("exp","comment_count+1")));
							$post_table_model->where(array($pk=>intval($_POST['post_id'])))->save();
							
							$post_table_model->create(array("last_comment"=>time()));
							$post_table_model->where(array($pk=>intval($_POST['post_id'])))->save();
							
							$this->ajaxReturn(sp_ajax_return(array("id"=>$result),"评论成功！",1));
						} else {
							$this->error("评论失败！");
						}
					} else {
						$this->error($this->comments_model->getError());
					}	
				}
				
				
			}
		}else{
			$this->error("请先登录","/user/login/index.html");
		}
	}


	function do_like(){

    	$id=intval(I('id'));
    	$result = $this->comments_model->where("id = $id")->setInc("comment_like");
    	
    	if($result){
    		$this->ajaxReturn(sp_ajax_return(array("id"=>$result),"点赞成功！",1));
    	}
    }


}