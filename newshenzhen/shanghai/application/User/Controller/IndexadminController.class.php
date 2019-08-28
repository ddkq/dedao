<?php

/**
 * 会员
 */
namespace User\Controller;
use Common\Controller\AdminbaseController;
class IndexadminController extends AdminbaseController {
	
	protected $users_model;
	function _initialize(){
		parent::_initialize();
		$this->users_model=D("Common/Users");
	}
	
	
    function index(){

    	$count=$this->users_model->where("user_type in (2,3)")->count();
    	$page = $this->page($count, 20);
    	$lists = $this->users_model
    	->where("user_type in (2,3)")
    	->order("create_time DESC")
    	->limit($page->firstRow . ',' . $page->listRows)
    	->select();
    	$this->assign('lists', $lists);
    	$this->assign("page", $page->show('Admin'));
    	
    	$this->display(":index");
    }

    function add(){
        $this->display(':add');
    }

    function add_post(){
       
        $rules = array(
            //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
            array('email', 'require', '邮箱不能为空！', 1 ),
            array('password','require','密码不能为空！',1),
            array('repassword', 'require', '重复密码不能为空！', 1 ),
            array('repassword','password','确认密码不正确',0,'confirm'),
            array('email','email','邮箱格式不正确！',1), // 验证email字段格式是否正确
        );
        

         
        if($this->users_model->validate($rules)->create()===false){
            $this->error($this->users_model->getError());
        }
         
        $password=$_POST['password'];
        $email=$_POST['email'];
        $user_type = $_POST['user_type'];
        if(empty($_POST['user_login'])){
            $username=str_replace(array(".","@"), "_",$email);
        }else{
            $username = $_POST['user_login'];
        }
        $usernicename = $_POST['user_nicename'];
        
        //用户名需过滤的字符的正则
        $stripChar = '?<*.>\'"';
        if(preg_match('/['.$stripChar.']/is', $username)==1){
            $this->error('用户名中包含'.$stripChar.'等非法字符！');
        }
         
        if(strlen($password) < 5 || strlen($password) > 20){
            $this->error("密码长度至少5位，最多20位！");
        }
        
        $where['user_login']=$username;
        $where['user_email']=$email;
        $where['_logic'] = 'OR';
        
        $ucenter_syn=C("UCENTER_ENABLED");
        $uc_checkemail=1;
        $uc_checkusername=1;
        if($ucenter_syn){
            include UC_CLIENT_ROOT."client.php";
            $uc_checkemail=uc_user_checkemail($email);
            $uc_checkusername=uc_user_checkname($username);
        }
         
        $result = $this->users_model->where($where)->count();
        if($result || $uc_checkemail<0 || $uc_checkusername<0){
            $this->error("用户名或者该邮箱已经存在！");
        }else{
            $uc_register=true;
            if($ucenter_syn){
                 
                $uc_uid=uc_user_register($username,$password,$email);
                //exit($uc_uid);
                if($uc_uid<0){
                    $uc_register=false;
                }
            }
            if($uc_register){
                $data=array(
                    'user_login' => $username,
                    'user_email' => $email,
                    'user_nicename' =>$usernicename,
                    'user_pass' => sp_password($password),
                    'last_login_ip' => get_client_ip(0,true),
                    'create_time' => date("Y-m-d H:i:s"),
                    'last_login_time' => date("Y-m-d H:i:s"),
                    'user_status' => 1,
                    "user_type"=>$user_type,//会员
                );
                $rst = $this->users_model->add($data);
                if($rst){
                        $this->success("注册成功"); 
                }else{
                    $this->error("注册失败！");
                }
                 
            }else{
                $this->error("注册失败！");
            }
             
        }
    }
    
    function edit(){
    	$id=intval($_GET['id']);
    	if($id){
    		$where['id'] = $id;
    		$where['user_type'] = array('in','2,3');
    		$user = M('Users')->where($where)->find();
    		//var_dump($user);exit;
    		$this->assign('user',$user);
    	}
    	$this->display(":edit");
    }
    
    function edit_post() {
    	//var_dump($_POST);exit;
    	if(IS_POST){
    		$user = I('post.');
    		$result=$this->users_model->save($user);
			//echo $this->users_model->getLastSql();exit;
			if ($result) {
				$this->success("修改成功！");
			} else {
				$this->error("修改失败！");
			}
    	}
    }
    
    function reduce_pw(){
    	$user['id'] = intval($_GET['id']);
    	$user['user_pass'] = sp_password('123456');
    	$result=$this->users_model->save($user);
		//echo $this->users_model->getLastSql();exit;
		if ($result) {
			$this->success("还原成功！");
		} else {
			$this->error("密码已经是初始密码");
		}
    }
    
    function avatar(){
    	$id=intval($_GET['id']);
    	if($id){
    		$where['id'] = $id;
    		$where['user_type'] = array('in','2,3');
    		$user = M('Users')->where($where)->find();
    		//var_dump($user);exit;
    		$this->assign('user',$user);
    	}
    	$this->display(":avatar");
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
    		
    		$userid=intval($_GET['id']);
    		$result=$this->users_model->where(array("id"=>$userid))->save(array("avatar"=>$avatar));
    		$_SESSION['user']['avatar']=$avatar;
    		if($result){
    			$this->success("头像更新成功！");
    		}else{
    			$this->error("头像更新失败！");
    		}
    		
    	}
    }
    
    
    function ban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$where['id'] = $id;
    		$where['user_type'] = array('in','2,3');
    		$rst = M("Users")->where($where)->setField('user_status','0');
    		if ($rst) {
    			$this->success("会员拉黑成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员拉黑失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    
    function cancelban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$where['id'] = $id;
    		$where['user_type'] = array('in','2,3');
    		$rst = M("Users")->where($where)->setField('user_status','1');
    		if ($rst) {
    			$this->success("会员启用成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员启用失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
}
