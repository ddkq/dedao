<?php
namespace app\admin\validate;
use think\Validate;

/**
* 邮箱配置验证器
*/
class MailerValidate extends Validate{
	
	protected $rule = [
		'from_name'		=>	'require',
		'from'			=>	'require|email',
		'host'			=>	'require',
		'smtp_secure'	=>	'require',
		'port'			=>	'require|integer',
		'username'		=>	'require',
		'password'		=>	'require',
	];

	protected $message = [
		'from_name.require'		=>	'发件人不能为空',
		'from.require'			=>	'邮箱地址不能为空',
		'from.email'			=>	'邮箱地址格式不正确',
		'host.require'			=>	'SMTP服务器不能为空',
		'smtp_secure.require'	=>	'请选择连接方式',
		'port.require'			=>	'SMTP服务器端口不能为空',
		'port.integer'			=>	'SMTP服务器端口必须为整数',
		'username.require'		=>	'发件箱帐号不能为空',
		'password.require'		=>	'发件箱密码不能为空',	
	];

}