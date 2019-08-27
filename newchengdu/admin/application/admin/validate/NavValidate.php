<?php
namespace app\admin\validate;
use think\Validate;

/**
* 前台导航验证器
*/
class NavValidate extends Validate{
	
	protected $rule = [
		'name' => 'require',
	];

	protected $message = [
		'name.require' => '导航名称不能为空',
	];

}
