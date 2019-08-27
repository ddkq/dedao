<?php
namespace app\department\validate;
use think\Validate;
use think\Db;

/**
 * 后台科室验证器
 */
class DepartmentValidate extends Validate{
    protected $rule = [
        'name'       => 'require|unique:Department',
        'parent_id'  => 'checkParentId',
    ];

    protected $message = [
        'name.require'       => '科室名称不能为空',
        'name.unique'        => '已存在相同科室',
        'parent_id'          => '超过了4级',
    ];


    // 自定义验证规则(判断层数)
    protected function checkParentId($value)
    {
        $find = Db::name('Department')->where(["id" => $value])->value('parent_id');

        if ($find) {
            $find2 = Db::name('Department')->where(["id" => $find])->value('parent_id');
            if ($find2) {
                $find3 = Db::name('Department')->where(["id" => $find2])->value('parent_id');
                if ($find3) {
                    return false;
                }
            }
        }
        return true;
    }
}