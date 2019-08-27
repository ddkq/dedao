<?php
namespace app\qa\validate;
use think\Validate;
use think\Db;

/**
 * 后台问题验证器
 */
class QuestionValidate extends Validate{
    protected $rule = [
        'question_title'        => 'require',
        'question_excerpt'		=> 'require',
        'category_id'       	=> 'require',
        'questioner_age'        => 'integer',
    ];

    protected $message = [
        'question_title.require'            => '问题不能为空',
        'question_excerpt.require'			=> '问题描述不能为空',
        'category_id.require'      		    => '请选择分类',
        'questioner_age.integer'            => '请输入正确的年龄',
    ];

}