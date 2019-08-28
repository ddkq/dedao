<?php
namespace app\protal\controller;
use app\common\controller\Base;

/**
 * 单独页面控制器
 */
class Page extends Base{
    public function index(){
    	$name = $this->request->param('name');
        return view("/protal/$name");
    }
    
    public function swt(){
        return view("/protal/swt");
    }
}