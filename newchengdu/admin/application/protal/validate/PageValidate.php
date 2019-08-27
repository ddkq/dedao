<?php
namespace app\protal\validate;
use think\Validate;
use think\Db;

/**
* 页面验证器
*/
class PageValidate extends Validate{
	
	protected $rule = [
		'page_title'			=>	'require',
		'url'					=>	'url',
		'category_id'			=>	'in:0,1,2',
	];

	protected $message = [
		'page_title.require'		=>	'标题不能为空',
		'url.url'					=>	'请输入合法路径',
		'category_id.in'			=>	'请选择正确的分类',
	];

}