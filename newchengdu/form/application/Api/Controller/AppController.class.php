<?php
/**
 * 微信小程序
 */
namespace Api\Controller;
use Common\Controller\AppframeController;
class AppController extends AppframeController {

	public function app_get_slide(){

        $slide =  I('slide');
        $slides = sp_getslide($slide);
        foreach ($slides as $key => $value) {
        	$slides[$key]['slide_pic'] = 'http://www.cdddkqyy.com'.$slides[$key]['slide_pic'];
        }

        $this->ajaxReturns($slides,"JSON") ;
	}



}