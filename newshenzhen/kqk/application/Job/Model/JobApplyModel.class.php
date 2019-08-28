<?php
namespace Job\Model;
use Think\Model\RelationModel;
class JobApplyModel extends RelationModel {
	protected $_link = array(        
		'Job'=>array(
			'mapping_type'      => self::BELONGS_TO,            
			'class_name'        => 'Job',
			'foreign_key'		=> 'job_id',
			'mapping_name'		=> 'job',
		),
	);

	protected $_auto = array (
		array ('createtime', 'mGetDate', 1, 'callback' ), 	// 增加的时候调用回调函数
	);
	// 获取当前时间
	function mGetDate() {
		return date ( 'Y-m-d H:i:s' );
	}
}