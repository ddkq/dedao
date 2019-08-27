<?php
namespace app\admin\validate;
use think\Validate;
use think\Db;

/**
* 友情链接验证器
*/
class AdminUserValidate extends Validate{
	
	protected $rule = [
		'user_login'			=>	'require|unique:user',
		'user_pass'				=>	'require|confirm:re_pass',
		'role_id'				=>	'require',
	];

	protected $message = [
		'user_login.require'		=>	'用户名不能为空',
		'user_login.unique'			=>	'已存在相同的用户',
		'user_pass.require'			=>	'密码不能为空',
		'user_pass.confirm'			=>	'两次密码输入不正确！',
		'role_id.require'			=>	'请选择角色',
	];

	protected $scene = [
        'add'  => ['user_login','user_pass','role_id'],
        'edit' => ['user_login','role_id'],
    ];
}