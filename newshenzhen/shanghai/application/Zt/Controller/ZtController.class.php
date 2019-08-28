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
    	}elseif($name == 'mid-autumn'){
            vendor('Jssdk.jssdk');
            $jssdk = new \JSSDK("wx106d61c9c8450b88", "49b750f731ea54d12c9bb0ee4c18a4fa");
            $signPackage = $jssdk->GetSignPackage();
            $this->assign('signPackage',$signPackage);
            $this->display(":$name/index");
        }else{
    		$this->display(":$name/index");
    	}
    }
}


