<?php
namespace Qa\Model;
use Common\Model\CommonModel;
class QaModel extends CommonModel {
	protected $_auto = array (
		array ('createtime', 'mGetDate', 1, 'callback' ), 	// 增加的时候调用回调函数
	);
	// 获取当前时间
	function mGetDate() {
		return date ( 'Y-m-d H:i:s' );
	}
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
}