<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController;
class ListqaController extends HomebaseController {
	//问答列表页
	public function index() {
		//$term=sp_get_term($_GET['id']);
		$tplname = 'list_serve-answer';
		//var_dump($term);exit;
		//var_dump(sp_is_mobile());
		/*if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    	
		    return ;
		}
		$phone = sp_is_mobile();
		if($phone == 1){
			if($term["plist_tpl"] == "list"){
				$tplname=$term["list_tpl"];
			}else{
				$tplname=$term["plist_tpl"];
			}
		}else{
			$tplname=$term["list_tpl"];
		}*/
		//var_dump($tplname);exit;
    	$tplname=sp_get_apphome_tpl($tplname, "list");
    	//$this->assign($term);
    	//$this->assign('cat_id', intval($_GET['id']));
    	$this->display(":$tplname");
	}
}

















?>