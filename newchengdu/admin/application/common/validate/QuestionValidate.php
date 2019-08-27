<?php
namespace app\common\validate;
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
    ];

    protected $message = [
        'question_title.require'            => '问题不能为空',
        'question_excerpt.require'			=> '问题描述不能为空',
        'category_id.require'      		    => '请选择分类',
    ];

}