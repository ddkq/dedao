<?php
namespace app\common\validate;
use think\Validate;

/**
* 前台导航验证器
*/
class SlideItemValidate extends Validate{
	
	protected $rule = [
		'title' => 'require|unique:SlideItem',
		'image' => 'require',
	];

	protected $message = [
		'title.require' => '标题不能为空',
		'title.unique'	=> '已存在相同的幻灯片',
		'image.require' => '请上传图片',
	];

}