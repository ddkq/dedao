<?php
namespace app\common\validate;
use think\Validate;

/**
* 路由验证器
*/
class RouteValidate extends Validate{
	protected $rule = [
		'full_url'	=>	'require|unique:route',
		'url'		=>	'require',
	];

	protected $message = [
		'full_url.require'	=>	'完整url不能为空',
		'url.require'		=>	'实际显示的url不能为空',
		'full_url.unique'	=>	'该记录已存在',
	];
}