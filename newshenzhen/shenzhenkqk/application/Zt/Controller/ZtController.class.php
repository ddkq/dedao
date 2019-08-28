<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Zt\Controller;
use Common\Controller\HomebaseController; 

class ZtController extends HomebaseController {	

	public function index(){
		$this->display(":index");
	}

    public function zlist(){
    	$name = $_GET['id'];
    	if($name == 'implanted' || $name == 'correction' || $name == 'repair' || $name == 'white' || $name == 'treatment' || $name == 'child' || $name == 'etc'){
    		$this->display(":$name");
    	}else{
    		$this->display(":$name/index");
    	}
    }
}


