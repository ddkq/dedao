<?php
namespace Api\Controller;
use Common\Controller\AppframeController;
class FormController extends AppframeController {

	function formdata(){
		$tables_obj = M("TablesData");
		$data = $tables_obj->order("createtime DESC")->field('content')->limit(0,20)->select();

		foreach ($data as $key => $value) {
			$content = json_decode($value['content'],true);
			$rand = mt_rand(1,30);
			if($rand%2 == 0){
				$data[$key]['name'] = mb_substr($content['name'],0,1,'utf-8').'先生';
			}else{
				$data[$key]['name'] = mb_substr($content['name'],0,1,'utf-8').'女士';
			}
			$data[$key]['phone'] = substr($content['phone'],0,4).'xxxx'.substr($content['phone'],8,3);
			$data[$key]['time'] = $rand.'分钟前';
			unset($data[$key]['content']);
			
		}
	    $this->ajaxReturns($data);
	}


}