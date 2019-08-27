<?php
namespace app\form\validate;
use think\Validate;

/**
* 表单数据验证器
*/
class FormDataValidate extends Validate{
	
	protected $rule = [
		'content.name'		=>		'require|chs|length:1,6',
		'content.phone'		=>		'require|number|length:11',
		'content.age'		=>		'number|length:2',
		'content.symptom'	=>		'require',
	];


	protected $message = [
		'content.name.require'	=>	'姓名不能为空',
		'content.name.chs'		=>	'姓名格式不正确',
		'content.name.length'	=>	'姓名格式不正确',
		'content.phone.require'	=>	'电话不能为空',
		'content.phone.number'	=>	'电话格式不正确',
		'content.phone.length'	=>	'电话格式不正确',
		'content.age.number'	=>	'年龄格式不正确',
		'content.age.length'	=>	'年龄格式不正确',
		'content.symptom'		=>	'症状不能为空',
	];




}