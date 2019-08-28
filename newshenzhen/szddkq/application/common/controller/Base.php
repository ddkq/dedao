<?php
namespace app\common\controller;
use think\Controller;
use think\Request;

/**
* 基础类
*/
class Base extends Controller{
	
	/**
     * 构造函数
     * @param Request $request Request对象
     * @access public
     */
    public function __construct(Request $request = null){

        if (is_null($request)) {
            $request = Request::instance();
        }

        $this->request = $request;
    }
}