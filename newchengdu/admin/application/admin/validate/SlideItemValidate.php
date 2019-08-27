<?php
namespace app\admin\validate;
use think\Validate;

/**
* 前台导航验证器
*/
class SlideItemValidate extends Validate{
	
	protected $rule = [
		'title' => 'require',
		'image' => 'require',
	];

	protected $message = [
		'title.require' => '标题不能为空',
		'image.require' => '请上传图片',
	];

}