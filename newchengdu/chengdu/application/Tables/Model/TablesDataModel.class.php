<?php
namespace Tables\Model;
use Common\Model\CommonModel;
class TablesDataModel extends CommonModel {
	protected $_auto = array (
		array ('createtime', 'mGetDate', 1, 'callback' ), 	// 增加的时候调用回调函数
		//array ('post_modified', 'mGetDate', 2, 'callback' ) 
	);
	// 获取当前时间
	function mGetDate() {
		return date ( 'Y-m-d H:i:s' );
	}


	protected function _after_insert($data) {
		
	}

}