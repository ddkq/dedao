<?php
namespace app\topic\validate;
use think\Validate;

/**
* 专题验证器
*/
class TopicValidate extends Validate{
	
	protected $rule = [
		'topic_title'	=>	'require|unique:Topic',
		'topic_url'		=>	'require',
	];

	protected $message = [
		'topic_title.require'	=>		'专题名字不能为空',
		'topic_title.unique'	=>		'已存在相同的专题',
		'topic_url.require'		=>		'专题地址不能为空',
	];
}