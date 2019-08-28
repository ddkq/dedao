<?php
namespace Api\Controller;
use Common\Controller\AppframeController;
class GuestbookController extends AppframeController{
	
	protected $guestbook_model;
	protected $question_model;
	
	public function _initialize() {
		parent::_initialize();
		$this->guestbook_model=D("Common/Guestbook");
		$this->question_model = D("Common/Question");
	}
	
	public function index(){
		
	}
	
	public function addmsg(){
		//var_dump($_POST);exit;
		
		if (IS_AJAX) {
			$data = array();
			if ($this->guestbook_model->create()) {
				$result=$this->guestbook_model->add();
				if ($result!==false) {
					$data['status'] = 1;
					$data['info'] = '留言成功！';
					die(json_encode($data));
				} else {
					$data['status'] = 0;
					$data['info'] = '留言失败，清稍后重试！！';
					die(json_encode($data));
				}
			}else{
				$this->error($this->guestbook_model->getError());
			}
		}
	}
	
	public function addquestion(){
		if (IS_AJAX) {
			$data = array();
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}
			$article['title']=$_POST['title'];
			$article['excerpt']=$_POST['excerpt'];
			$article['help']=$_POST['help'];
			$article['author_id']=$_POST['author_id'];
			$article['term_id']=$_POST['term_id'];
			$article['smeta']=json_encode($_POST['smeta']);	
			if ($this->question_model->create()) {
				$result=$this->question_model->add($article);
				if ($result!==false) {
					$data['status'] = 1;
					$data['info'] = '提交成功！';
					die(json_encode($data));
				} else {
					$data['status'] = 0;
					$data['info'] = '提交失败，清稍后重试！！';
					die(json_encode($data));
				}
			}else{
				$this->error($this->question_model->getError());
			}
		}
	}
	
	
}