<?php
namespace Department\Model;
use Common\Model\CommonModel;
class WorkingModel extends CommonModel {
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}

}