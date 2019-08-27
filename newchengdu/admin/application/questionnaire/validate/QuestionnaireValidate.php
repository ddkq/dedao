<?php
namespace app\questionnaire\validate;
use think\Validate;


/**
* 问卷验证器
*/
class QuestionnaireValidate extends Validate{
	
	protected $rule = [
		'questionnaire_title'	=>	'require|unique:Questionnaire',
	];

	protected $message = [
		'questionnaire_title.require'	=>	'问卷标题不能为空',
		'questionnaire_title.unique'	=>	'已存在相同的问卷',
	];
}