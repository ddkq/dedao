<?php
namespace app\announcement\model;
use app\common\model\BaseModel;

/**
* 后台公告模型
*/
class AnnouncementModel extends BaseModel{
	
	protected $table = 'cmf_announcement';

	protected $autoWriteTimestamp = true;

}