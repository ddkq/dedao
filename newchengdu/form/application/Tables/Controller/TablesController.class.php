<?php
namespace Tables\Controller;
use Common\Controller\AppframeController;
class TablesController extends AppframeController {

	protected $tables_model;
	protected $tablesdata_model;

	function _initialize() {
		parent::_initialize();
		$this->tables_model = D('Tables/Tables');
		$this->tablesdata_model = D('Tables/TablesData');
	}

	function add_post(){
		if(IS_AJAX){
			session_start();
			$info = array();

			//var_dump($_POST);exit;
 
			if(isset($_POST['code'])) {
				if($_POST['code'] == $_SESSION['code']){
					$info['code'] = 0;
					$info['info'] = '请不要重复提交！';
				}else{
					$_SESSION['code'] = $_POST['code']; //存储code

					$data['tables_id'] = $_POST['table_id'];
					$data['content'] = json_encode($_POST['data']);
					$data['ip'] = $_SERVER[REMOTE_ADDR];
					$data['page'] = $_POST['page'];
					$data['createtime'] = date ('Y-m-d H:i:s');

					//var_dump($data);exit;

					$result = $this->tablesdata_model->add($data);
					if($result){
						$this->tables_model->where("id = $data[tables_id]")->setInc('data_num');
						$info['code'] = 1;
						$info['u_id'] = $result;
						$info['info'] = '提交成功！';

					}else{
						$info['code'] = 0;
						$info['info'] = '提交失败！';
					}
					
				}
			}
			$this->ajaxReturn($info);
		}
	}


	


}