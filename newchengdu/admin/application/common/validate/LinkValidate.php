<?php
namespace app\common\validate;
use think\Validate;
use think\Db;

/**
* 友情链接验证器
*/
class LinkValidate extends Validate{
	
	protected $rule = [
		'name'			=>	'require|unique:link',
		'url'			=>	'require|url',
	];

	protected $message = [
		'name.require'			=>	'友情链接名称不能为空',
		'name.unique'			=>	'已存在相同的友情链接',
		'url.require'			=>	'友情链接地址不能为空',
		'url.url'				=>	'请输入合法的链接地址',
	];
}