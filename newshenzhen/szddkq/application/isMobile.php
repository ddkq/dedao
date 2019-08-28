<?php

	function isMobile(){
		if(substr($_SERVER['SERVER_NAME'],0,1) == 'm'){
			return true;
		}
	    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	    $is_pc = (strpos($agent, 'windows nt')) ? true : false;
	    $is_mac = (strpos($agent, 'mac os')) ? true : false;
	    $is_iphone = (strpos($agent, 'iphone')) ? true : false;
	    $is_android = (strpos($agent, 'android')) ? true : false;
	    $is_ipad = (strpos($agent, 'ipad')) ? true : false;
	    if($is_pc){
	        return  false;
	    }
	    if($is_mac){
	        return  true;
	    }
	    if($is_iphone){
	        return  true;
	    }
	    if($is_android){
	        return  true;
	    }
	    if($is_ipad){
	        return  true;
	    }
	}


	if (isMobile()){
	    define('VIEW_PATH', '../template/mobile/');
	} else  {
	    define('VIEW_PATH', '../template/pc/');
	}