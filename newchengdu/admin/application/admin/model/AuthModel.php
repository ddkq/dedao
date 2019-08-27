<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use tree\Tree;

/**
* 权限模型类
*/
class AuthModel extends model{
	
	protected $table = 'cmf_auth_access';

    public function authList($role_id){

    	$adminMenu = cache('admin_menus');
    	$tree = new Tree();
		$tree->init($adminMenu);
        $adminMenu = $tree->getTreeArray(0);
    	//dump($result);
    	return $adminMenu;
    }


}