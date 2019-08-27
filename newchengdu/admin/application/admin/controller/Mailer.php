<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
use app\admin\validate\MailerValidate;

/**
* 邮箱控制类
*/
class Mailer extends AdminBase{
	
	/**
	@SWG\Post(
		path = "/admin/Mailer/getMailer",
		summary = "获取邮箱配置",
		description = "获取邮箱配置",
		tags = {"Admin/Mailer(后台/邮箱配置)"},
		@SWG\Parameter(ref="#/parameters/token"),
	 	@SWG\Response(
	 		response = "200",
	 		description = "邮箱配置信息",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
	 				required = {"mailer"},
					@SWG\Property(
				  		property = "from_name",
				    	type = "string",
				     	description = "发件人"
			       	),
			        @SWG\Property(
			        	property = "from",
			         	type = "string",
			          	description = "邮箱地址"
			        ),
			        @SWG\Property(
			        	property = "host",
			         	type = "string",
			          	description = "SMTP服务器",
			        ),
			        @SWG\Property(
				       property = "smtp_secure",
				       type = "string",
	 		           description = "连接方式(ssl,tls)",
			        ),
			        @SWG\Property(
				       property = "port",
				       type = "string",
				       description = "SMTP服务器端口",
			        ),
			        @SWG\Property(
				       property = "username",
				       type = "string",
				       description = "发件箱帐号",
			        ),
			        @SWG\Property(
				       property = "password",
				       type = "string",
				       description = "授权码",
			        ),
	  			),
	  		),  		
	   	),
	),
	 */
	public function getMailer(){
		$info = cmf_get_option('smtp_setting', parent::$db_id);
		return json($info);
	}

	/**
	@SWG\Post(
		path = "/admin/Mailer/mailerPost",
 		summary = "保存邮箱配置信息",
 		description = "保存邮箱配置信息",
		tags = {"Admin/Mailer(后台/邮箱配置)"},
 		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "from_name",
			type = "string",
			required = true,
 			in = "formData",
 			description = "发件人",
		),
		@SWG\Parameter(
			name = "from",
			type = "string",
			required = true,
			in = "formData",
			description = "邮箱地址",
		),
		@SWG\Parameter(
			name = "host",
			type = "string",
			required = true,
			in = "formData",
			description = "SMTP服务器",
		),
 		@SWG\Parameter(
			name = "host",
			type = "string",
			required = true,
	 		in = "formData",
			description = "SMTP服务器",
		),
		@SWG\Parameter(
			name = "smtp_secure",
			type = "string",
			required = true,
			in = "formData",
			description = "连接方式(ssl,tls)",
		),
		@SWG\Parameter(
			name = "port",
 			type = "string",
			required = true,
 			in = "formData",
			description = "SMTP服务器端口",
		),
 		@SWG\Parameter(
			name = "username",
			type = "string",
			required = true,
			in = "formData",
			description = "发件箱帐号",
		),
 		@SWG\Parameter(
			name = "password",
			type = "string",
			required = true,
			in = "formData",
			description = "授权码",
		),
		@SWG\Response(
            response = "200",
        	description = "状态码",
    	    @SWG\Schema(ref="#/definitions/info"),
	    ),
	),
	 */
	public function mailerPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data,'MailerValidate');
			if($result !== true){
				return json(['code'=>0,'result'=>$result]);
			}else{
				$result2 = Db::connect('db_config'.parent::$db_id)->name('option')->where('option_name','smtp_setting')->setField('option_value',json_encode($data));
				if($result2){
					cache('cmf_options_smtp_setting',null);
					$this->info(1,'保存成功');
				}else{
					$this->info(0,'保存失败');
				}
			}
		}
	}


	/**
	 @SWG\Post(
 		path = "/admin/Mailer/test",
 		summary = "测试邮件发送",
 		description = "测试邮件发送",
 		tags = {"Admin/Mailer(后台/邮箱配置)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "to",
			type = "string",
			required = true,
 			in = "formData",
 			description = "收件箱",
		),
		@SWG\Parameter(
			name = "subject",
 			type = "string",
			required = true,
			in = "formData",
			description = "标题",
		),
		@SWG\Parameter(
			name = "content",
			type = "string",
			required = true,
 			in = "formData",
			description = "内容",
		),
		@SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
	 ), 
	 */
	public function test(){
		if($this->request->isPost()){
			$rule = [
			    'to'      => 'require|email',
                'subject' => 'require',
                'content' => 'require',
			];

			$msg = [
                'to.require'      => '收件箱不能为空！',
                'to.email'        => '收件箱格式不正确！',
                'subject.require' => '标题不能为空！',
                'content.require' => '内容不能为空！',
			];
			$data = $this->request->param();
			$validate   = Validate::make($rule,$msg);
			$result = $validate->check($data);
			if(!$result) {
			    return json(['code'=>0,'info'=>$validate->getError()]);
			}else{
				$result2 = cmf_send_email($data['to'],$data['subject'],$data['content']);
				if($result2['code'] == 1){
					$this->info(1,'发送成功');
				}else{
					$this->info(0,$result2['info']);
				}
			}
		}
	}



}