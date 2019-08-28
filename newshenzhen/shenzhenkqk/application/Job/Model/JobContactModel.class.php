<?php
namespace Job\Model;
use Common\Model\CommonModel;
class JobContactModel extends CommonModel {
	protected $_validate = array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
			array('name', 'require', '名称不能为空！', 1, 'regex', 3),
			array('address','require','地址不能为空！',1,'regex',3),
			array('qq','require','qq不能为空!','1','regex',3),
			array('wechat', 'require', '微信不能为空！', 1, 'regex', 3),
			array('phone','require','电话不能为空！',1,'regex',3),
			array('phone',11,'手机号必须11位',1,'length',3),
			array('email','require','邮箱不能为空!',1,'regex',3),
			array('email','email','邮箱规则不正确！',1,'regex',3),
	);
}