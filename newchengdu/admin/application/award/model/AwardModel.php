<?php
namespace app\award\model;
use app\common\model\BaseModel;


/**
* 抽奖模型
*/
class AwardModel extends BaseModel{
	
	protected $table = 'cmf_award';

	protected $type = [
		'content'	=>		'json',
		'champion'	=>		'json',
	];


}