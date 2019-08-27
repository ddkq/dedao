<?php
namespace app\common\validate;
use think\Validate;
use think\Db;

/**
 * 后台百科验证器
 */
class EncyclopediaValidate extends Validate{
    protected $rule = [
        'en_title'        => 'require',
        'category_id'       => 'require',
    ];

    protected $message = [
        'en_title.require'            => '百科标题不能为空',
        'category_id.require'           => '请选择分类',
    ];

}