<?php
namespace app\common\controller;
use app\common\controller\Base;
use think\Db;
use redis\Redis;

class AdminBase extends Base{

	public function initialize(){
        parent::initialize();
        $session_admin_id = cmf_get_current_admin_id();
        if(!empty($session_admin_id)){
            if(!$this->checkAccess($session_admin_id, parent::$db_id)){
                echo json_encode(['code'=>0,'info'=>'您没有权限进行该操作！！']);
                exit;
            }
        }else{
            echo json_encode(['code'=>0,'info'=>'您还没有登录！！']);
            exit;
        }
	}

	/**
     *  检查后台用户访问权限
     * @param int $userId 后台用户id
     * @param int $db_id 数据库id
     * @return boolean 检查通过返回true
     */
    private function checkAccess($userId, $db_id = 1) {
        // 如果用户id是1，则无需判断
        if ($userId == 1) {
            return true;
        }

        $module     = $this->request->module();
        $controller = $this->request->controller();
        $action     = $this->request->action();
        $rule       = $module . $controller . $action;

        //不需要判断权限的操作
        $notRequire = ["adminIndexindex", "adminMainindex"];
        
        if (!in_array($rule, $notRequire)) {
            return cmf_auth_check($userId, $db_id);
        } else {
            return true;
        }
    }
	
  
}