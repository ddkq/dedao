<?php
namespace app\admin\validate;
use think\Validate;
use think\Db;

/**
 * 后台菜单验证器
 */
class AdminMenuValidate extends Validate{
    protected $rule = [
        'name'       => 'require|unique:AdminMenu',
        'app'        => 'require|alpha',
        'controller' => 'require|alpha',
        'parent_id'  => 'checkParentId',
        'action'     => 'require|unique:AdminMenu,app^controller^action',
    ];

    protected $message = [
        'name.require'       => '名称不能为空',
        'name.unique'        => '已有相同的菜单',
        'app.require'        => '应用不能为空',
        'app.alpha'          => '应用名必须英文',
        'parent_id'          => '超过了4级',
        'controller.require' => '控制器不能为空',
        'controller.alpha'   => '控制器必须英文',
        'action.require'     => '方法不能为空',
        'action.unique'      => '已有相同的记录!',
    ];

    protected $scene = [
        'add'  => ['name', 'app', 'controller', 'action', 'parent_id'],
        'edit' => ['name.unique'=>'require|unique:AdminMenu,name^id', 'app', 'controller', 'action.unique'=>'require|unique:AdminMenu,app^controller^action^id', 'id', 'parent_id'],

    ];

    // 自定义验证规则
    protected function checkParentId($value)
    {
        $find = Db::name('AdminMenu')->where(["id" => $value])->value('parent_id');

        if ($find) {
            $find2 = Db::name('AdminMenu')->where(["id" => $find])->value('parent_id');
            if ($find2) {
                $find3 = Db::name('AdminMenu')->where(["id" => $find2])->value('parent_id');
                if ($find3) {
                    return false;
                }
            }
        }
        return true;
    }
}