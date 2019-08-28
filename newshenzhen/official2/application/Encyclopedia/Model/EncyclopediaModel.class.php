<?php
namespace Encyclopedia\Model;
use Common\Model\CommonModel;
class EncyclopediaModel extends CommonModel {
	
	protected $_validate = array(
		//array('title', 'require', '标题不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH ),
		//array('excerpt', 'require', '描述不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH ),
	);
	
	protected $_auto = array (
		array ('createtime', 'mGetDate', 1, 'callback' ), 	// 增加的时候调用回调函数
		//array ('post_modified', 'mGetDate', 2, 'callback' ) 
	);
	// 获取当前时间
	function mGetDate() {
		return date ( 'Y-m-d H:i:s' );
	}
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
}