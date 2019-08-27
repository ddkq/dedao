<?php
namespace app\common\validate;
use think\Validate;

/**
* 前台导航验证器
*/
class NavValidate extends Validate{
	
	protected $rule = [
		'name' => 'require|unique:Nav',
	];

	protected $message = [
		'name.require' => '导航名称不能为空',
		'name.unique'	=>	'已存在相同的导航',
	];

}
