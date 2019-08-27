<?php
namespace app\qa\validate;
use think\Validate;
use think\Db;

/**
 * 后台问题分类验证器
 */
class QaCategoryValidate extends Validate{
    protected $rule = [
        'name'       => 'require',
        'parent_id'  => 'checkParentId',
    ];

    protected $message = [
        'name.require'       => '分类名称不能为空',
        'parent_id'          => '超过了4级',
    ];


    // 自定义验证规则(判断层数)
    protected function checkParentId($value)
    {
        $find = Db::name('QaCategory')->where(["id" => $value])->value('parent_id');

        if ($find) {
            $find2 = Db::name('QaCategory')->where(["id" => $find])->value('parent_id');
            if ($find2) {
                $find3 = Db::name('QaCategory')->where(["id" => $find2])->value('parent_id');
                if ($find3) {
                    return false;
                }
            }
        }
        return true;
    }
}