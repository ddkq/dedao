<?php
namespace Questionnaire\Controller;
use Common\Controller\AppframeController;
class QuestionnaireController extends AppframeController {

	protected $q_model;
	protected $data_model;

	public function _initialize() {
		parent::_initialize();
		$this->q_model = M('Questionnaire');
		$this->data_model = M('QuestionnaireData');
	}

	public function add_post(){
		//var_dump($_POST);exit;
		//if(IS_AJAX){

			$info = array();
			$data['q_id'] = $_POST['id'];
			$data['u_id'] = intval($_POST['uid']);
			$data['content'] = json_encode($_POST['data']);
			$data['createtime'] = time();

			$result = $this->data_model->add($data);
			if($result){
				$info['code'] = 1;
				$info['info'] = '提交成功，感谢您对口腔大数据中心研究做出的贡献！';

			}else{
				$info['code'] = 0;
				$info['info'] = '提交失败！';
			}
					
			$this->ajaxReturn($info);
		//}
	}

}