<?php
namespace Common\Model;
use Common\Model\CommonModel;
class MessageModel extends CommonModel{
	//自动验证
	protected $_validate = array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
			array('name', 'require', 'Masukkan nama！', 1, 'regex', CommonModel:: MODEL_BOTH ),
			array('email', 'require', 'Silakan masukkan email！', 1, 'regex', CommonModel:: MODEL_BOTH ),	
			array('content', 'require', 'Silakan masukkan pesan！', 1, 'regex', CommonModel:: MODEL_BOTH ),
			array('email','email','email error！',0,'',CommonModel:: MODEL_BOTH ),
			array('phone', 'require', 'Masukkan kontak！', 1, 'regex', CommonModel:: MODEL_BOTH ),
	);
	
	protected $_auto = array (
			array('createtime','mDate',1,'callback'), // 对msg字段在新增的时候回调htmlspecialchars方法
			array('handle',0),
	);
	
	function mDate(){
		return date("Y-m-d H:i:s");
	}
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
	
}