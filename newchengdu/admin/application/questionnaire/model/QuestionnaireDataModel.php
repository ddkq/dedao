<?php
namespace app\questionnaire\model;
use app\common\model\BaseModel;

/**
* 问卷数据模型
*/
class QuestionnaireDataModel extends BaseModel{
	
	protected $table = 'cmf_questionnaire_data';

	protected $type = [
		'content'	=>	'json',
	];



}