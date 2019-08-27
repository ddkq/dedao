<?php
namespace app\common\validate;
use think\Validate;
use think\Db;

/**
* 后台回答验证器
*/
class AnswerValidate extends Validate{
	
	protected $rule = [
		'question_id' 	=> 	'require',
		'doctor_id' 	=>	'require',
		'content'		=>	'require',
	];


	protected $message = [
		'question_id.require'	=>	'请选择问题',
		'doctor_id.require'		=>	'请选择医生',
		'content.require'		=>	'回答不能为空',
	];
	
}