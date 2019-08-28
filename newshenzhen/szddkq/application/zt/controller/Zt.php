<?php
namespace app\zt\controller;
use app\common\controller\Base;

class Zt extends Base{
    public function index(){
    	$name = $this->request->param('name');
        return view("/zt/$name/index");
    }
}