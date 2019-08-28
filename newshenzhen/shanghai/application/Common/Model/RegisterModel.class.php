<?php
namespace Common\Model;
use Common\Model\CommonModel;
class RegisterModel extends CommonModel{
	//自动验证
	protected $_validate = array(
		//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
		//array('name', 'require', '姓名不能为空！'),
		//array('tel', 'require', '电话不能为空！'),	
		//array('tel','/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/','电话格式错误'),
		//array('time', 'require', '预约时间不能为空！'),
		//array('time','/^d{4}-d{1,2}-d{1,2}$/','预约时间格式错误'),
		//array('department', 'require', '请选择科室！', 1, 'regex', CommonModel:: MODEL_BOTH ),
		//array('doctor', 'require', '请选择医生！', 1, 'regex', CommonModel:: MODEL_BOTH ),
		
		/*array('gender', 'require', '请选择性别！', 1, 'regex', CommonModel:: MODEL_BOTH ),
		array('phone', 'require', '联系方式不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH ),
		array('phone','require','手机号必须11位',1,11,CommonModel:: MODEL_BOTH),
		array('location', 'require', '请选择地区！', 1, 'regex', CommonModel:: MODEL_BOTH ),*/
		array('name', 'require', '请输入就诊人!'),
		array('phone', 'require', '电话不能为空！'),	
		array('phone','/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/','电话格式错误'),
	);
	
	/*protected $_auto = array (
			array('createtime','mDate',1,'callback'), // 对msg字段在新增的时候回调htmlspecialchars方法
	);
	
	function mDate(){
		return time();
	}
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}*/
	
}