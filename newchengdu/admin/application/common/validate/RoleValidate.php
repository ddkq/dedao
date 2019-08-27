<?php
namespace app\common\validate;
use think\Validate;

/**
* 角色验证器
*/
class RoleValidate extends Validate{
	
	protected $rule = [
		'name'			=>	'require|unique:role',
	];

	protected $message = [
		'name.require'			=>	'名称不能为空',
		'name.unique'			=>	'已存在相同的记录',
	];
}