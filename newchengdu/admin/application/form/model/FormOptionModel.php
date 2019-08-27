<?php
namespace app\form\model;
use app\common\model\BaseModel;

/**
* 表单选项模型
*/
class FormOptionModel extends BaseModel{
	
	protected $table = 'cmf_form_option';

	protected $type = [
		'option_content' => 'json',
	];

}