<?php
namespace app\questionnaire\validate;
use think\Validate;

/**
* 交叉分析验证器
*/
class AnalysisValidate extends Validate{
	
	protected $rule = [
		'x'		=>		'require|different:y|different:x2|different:y2',
		'y'		=>		'require|different:x|different:x2|different:y2',
	];

	protected $message = [
		'x.require'		=>		'请选择问题',
		'y.require'		=>		'请选择问题',
		'x.different'	=>		'选择问题相同',
		'y.different'	=>		'选择问题相同',
	];

}