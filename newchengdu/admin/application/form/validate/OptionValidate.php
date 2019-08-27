<?php
namespace app\form\validate;
use think\Validate;

/**
* 表单选项验证器
*/
class OptionValidate extends Validate{
	
	protected $rule = [
		'option_title'	=>	'require|unique:FormOption',
	];

	protected $message = [
		'option_title.require' 	=>	'标题不能为空',
		'option_title.unique'	=>	'已存在相同的选项', 
	];


}