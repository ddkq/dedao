<?php
namespace app\api\validate;
use think\Validate;

/**
* 小程序挂号验证器
*/
class RegisterValidate extends Validate{

	protected $rule = [
		'appointer'		=>		'require|chs',
		'phone'			=>		'require|number|length:11',
	];

	protected $message = [
		'appointer.require'		=>		'请输入就诊人',
		'appointer.chs'			=>		'姓名格式不正确',
		'phone.require'			=>		'请输入联系电话',
		'phone.number'			=>		'电话格式不正确',
		'phone.length'			=>		'电话格式不正确',
	];
}